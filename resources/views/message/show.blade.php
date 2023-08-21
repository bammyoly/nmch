@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title text-capitalize">
                    @if(Auth::user()->id == $message->user->id)
                    Conversation With {{$message->recipient->name}}
                    @else
                    Conversation With {{$message->user->name}}
                    @endif
                </h3>
            </div>
            <div class="tr-single-body">
                <div class="row">
                    <div class="inbox-message">
                        <h3 class="text-capitalize">{{$message->subject}}</h3>
                        <ul>
                            <li>
                                <div class="message-avatar">
                                    <img src="{{asset('public/uploads/avatar/' .$message->user->avatar)}}" alt="">
                                </div>
                                <div class="message-body">
                                    <div class="message-body-heading">
                                        <h5 class="text-capitalize">
                                            @if(Auth::user()->id == $message->user->id)
                                            Me
                                            @else
                                            {{$message->user->name}}
                                            @endif
                                        </h5>
                                        <span>{{date('M jS, Y \a\t h:i a', strtotime($message->created_at))}}</span>
                                    </div>
                                    <p>{{$message->message}}</p>
                                </div>
                            </li>
                            @foreach($message->replies as $reply)
                            <li>
                                <div class="message-avatar">
                                    <img src="{{asset('public/uploads/avatar/' .$reply->user->avatar)}}" alt="">
                                </div>
                                <div class="message-body">
                                    <div class="message-body-heading">
                                        <h5 class="text-capitalize">
                                            @if(Auth::user()->id == $reply->user->id)
                                            Me
                                            @else
                                            {{$reply->user->name}}
                                            @endif
                                        </h5>
                                        <span>{{date('M jS, Y \a\t h:i a', strtotime($reply->created_at))}}</span>
                                    </div>
                                    <p>{!! $reply->reply !!}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="card-body">
                            <form method="post" action="{{route('message.reply', $message->id)}}">
                                @csrf
                                <div class="col-xs-12">
                                    <textarea class="form-control height-120" placeholder="Reply" name="reply"></textarea>
                                </div>
                                                    
                                <button type="submit" class="btn btn-primary">
                                    Reply
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
