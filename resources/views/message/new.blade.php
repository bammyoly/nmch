@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Mentorship Request</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Mentorship Request</span></p>
        </div>
    </div>
</div>

<section class="tr-single-detail gray-bg">
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1 class="text-capitalize">Send A Mentorship Request To {{$user->fullname}}</h1>
                </div>
            </div>
        </div>

        <div class="row">
        
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Message</h4>
                        </div>
                        <div class="tr-single-body">
                            @include('includes.flash')
                            <form class="book-form" method="post" action="{{route('message.new', $user->slug)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" required="" name="message" id="checkin" class="form-control" placeholder="Provide Subject">
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea type="text" required="" name="message" id="checkin" class="form-control" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <button type="submit" class="btn btn-arrow theme-btn full-width">Send Message</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                
                <!-- Tourist Overview -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4>Post Author</h4>
                    </div>
                    
                    <div class="tr-single-body">
                        <div class="guides-box">
                            <div class="guides-img-box">
                                <img src="{{ asset('public/uploads/avatar/' .$user->avatar)}}" class="img-responsive" alt="" />
                            </div>
                            <div class="guider-detail">
                                <h4 class="text-capitalize">{{$user->name}}</h4>
                            </div>
                        </div>
                        <a href="{{route('profile', $user->slug)}}" class="btn theme-btn full-width">View Profile</a>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
