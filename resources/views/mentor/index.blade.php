@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>NiMechE Mentors</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Mentors</span></p>
        </div>
    </div>
</div>

<section class="gray-bg">
    <div class="container">
        
        <!-- Start all guider -->
        <div class="row">
        
            @forelse($users as $user)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="guide-container">
                    <div class="guide-container-box">
                        <div class="fguide-thumb">
                            <img src="{{ asset('public/uploads/avatar/' .$user->user->avatar)}}" class="img-responsive img-circle" alt="">
                            <p class="padd-15 text-center text-capitalize">{{$user->user->name}}</p>
                        </div>
                        <div class="fguide-detail">
                            <h4 class="text-capitalize">{{$user->user->fullname}}</h4>
                            <ul class="extra-service">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-binoculars"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <strong>Mentorship Focus</strong>
                                                {{$user->category->name}}
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fa fa-empire"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <strong>Specialization</strong>
                                                {{$user->spec}}
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="guide-container-links">
                        <a href="{{route('profile', $user->user->slug)}}" class="btn btn-default"><i class="ti-user"></i>View Profile</a>
                        @if(Auth::id() == $user->user->id)
                        <a href="{{route('inbox', $user->user->slug)}}" class="btn btn-default"><i class="fa fa-envelope"></i> Go To Inbox</a>
                        @else
                        <a href="{{route('request.new', $user->user->slug)}}" class="btn btn-default"><i class="fa fa-envelope"></i> Send Request</a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h3>Empty Data</h3>
                        <img src="{{asset('public/images/empty.png')}}">
                    </div>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>




@endsection
