@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Mentorship</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Mentorship</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
    
        <div class="row">
        
            <div class="col-md-6 col-sm-12">
                <div class="ab-detail">
                    <h2>How It Works</h2>
                    <p>You are welcome to NIMechE-OAU E-mentoring platform, This platform  aims at connecting interested students of the Department of Mechanical Engineering to Prospective Mentors in a bid to  contribute to industry insights, practical career advice  as well as academic and career direction. Mentors are well-grounded and experienced professionals in their respective  industries .</p>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <img src="{{asset('public/images/convo.png')}}">
            </div>
            
        </div>
        
    </div>
</section>

<section>
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Mentorship Areas</h1>
                    <a class="btn theme-btn" href="{{route('mentors')}}">View Our Mentors</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3 col-sm-6">
                <a href="{{route('category.show', $category->slug)}}">
                    <div class="info-features">
                        <i class="ti-bag info-ibox bg-success-light"></i>
                        <h4 class="infobox_title text-uppercase">{{$category->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
    </div>
</section>

@endsection