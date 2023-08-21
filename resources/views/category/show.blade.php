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
        
            @forelse($profiles as $profile)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="guide-container">
                    <div class="guide-container-box">
                        <div class="fguide-thumb">
                            <img src="{{ asset('public/uploads/avatar/' .$profile->user->avatar)}}" class="img-responsive img-circle" alt="">
                            <p class="padd-15 text-center text-capitalize">{{$profile->user->name}}</p>
                        </div>
                        <div class="fguide-detail">
                            <h4 class="text-capitalize">{{$profile->user->fullname}}</h4>
                            <ul class="extra-service">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-user"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <strong>experience</strong>
                                                5 Year
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-timer"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <strong>Hire</strong>
                                                10,000
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-eye"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <strong>View</strong>
                                                16,000
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="guide-container-links">
                        <a href="{{route('profile', $profile->user->slug)}}" class="btn btn-default"><i class="ti-user mrg-r-5"></i>View Profile</a>
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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Profile
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @forelse($profiles as $profile)
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('uploads/avatar/' .$profile->user->avatar)}}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                <h4 class="card-title text-center text-capitalize">{{$profile->user->name}} </h4>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-success">Empty</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
