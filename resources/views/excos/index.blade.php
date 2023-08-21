@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>NiMechE Excos</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Excos</span></p>
        </div>
    </div>
</div>

<section class="gray-bg">
<div class="container">
    <div class="row">


        @forelse($excos as $exco)
        <div class="col-lg-6 col-md-6">
            <article class="tour-box list-style">
                <div class="row">
                    
                    <div class="col-md-5 col-sm-5">
                        <div class="tour-box-image">
                            <img src="{{ asset('public/uploads/excos/' .$exco->image)}}" class="img-responsive tour-box-img" alt="">
                        </div>
                    </div>
                
                    <div class="col-md-7 col-sm-7"> 
                        <div class="inner-box">
                            <div class="box-inner-ellipsis">
                                <div class="text-center" style="margin: 0px; padding: 0px; border: 0px;">
                                    <h3>{{$exco->name}}</h3>
                                    <div class="guider-detail">
                                        <h4 class="text-capitalize">{{$exco->position}}</h4>
                                        <p class="theme-cl font-bold text-capitalize">{{$exco->level}}</p>
                                        <p class="theme-cl font-bold"><i class="fa fa-phone"></i> {{$exco->phone}}</p>
                                        <p class="theme-cl font-bold"><i class="fa fa-envelope"></i> {{$exco->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

            </article>
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


        <div class="row mrg-0">
            <div class="tr-single-box short-box">
                <div class="col-xs-4 align-self-center">
                    <h4>Staff Advisers</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="guides-container">
            
                <div class="guides-box">
                    <div class="guides-img-box">
                        <img src="{{ asset('public/images/koya.jpg')}}" class="img-responsive" alt="" />
                    </div>
                    <div class="guider-detail">
                        <h4>Prof. Olufemi Koya</h4>
                        <h5 class="theme-cl font-bold"><i class="fa fa-envelope"></i> femikoya@oauife.edu.ng</h5>
                    </div>
                </div>
                <a href="#" class="btn theme-btn full-width">Staff Adviser</a>
            
            </div>
        </div>
        <div class="col-md-4">
            <div class="guides-container">
            
                <div class="guides-box">
                    <div class="guides-img-box">
                        <img src="{{ asset('public/images/adetan.jpg')}}" class="img-responsive" alt="adetan" />
                    </div>
                    <div class="guider-detail">
                        <h4>Dr Dare Adetan</h4>
                        <h5 class="theme-cl font-bold"><i class="fa fa-envelope"></i> dadetan@oauife.edu.ng</h5>
                    </div>
                </div>
                <a href="#" class="btn theme-btn full-width">Head Of Department</a>
            
            </div>
        </div>


    </div>                
</div>

@endsection
