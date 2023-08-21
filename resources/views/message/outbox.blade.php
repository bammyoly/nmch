@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Sent Messages</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row">
                    <div class="inbox-message">
                        <ul>
                            @forelse($messages as $message)
                            <li>
                                <a href="{{route('message.show', $message->id)}}">
                                    <div class="message-avatar">
                                        <img src="{{asset('public/uploads/avatar/' .$message->recipient->avatar)}}" alt="">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-body-heading">
                                            <h5 class="text-capitalize">{{$message->recipient->name}}</h5>
                                            <span>{{date('M jS, Y', strtotime($message->created_at))}}</span>
                                        </div>
                                        <p>{{$message->subject}}</p>
                                    </div>
                                </a>
                            </li>
                            @empty
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="heading">
                                        <h3>Empty Data</h1>
                                        <img src="{{asset('public/images/empty.png')}}">
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </ul>
                        {{$messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
