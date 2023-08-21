@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2 class="text-capitalize">Photos From {{$gallery->title}}</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>{{$gallery->title}}</span></p>
        </div>
    </div>
</div>

<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">
            @forelse($gallery->photos as $photo)                    
            <div class="col-md-3 col-sm-6">
                <article class="tour-box style-1">
                    
                    <div class="tour-box-image">
                        <figure>
                            <a class="example-image-link" href="{{asset('public/uploads/gallery/' .$photo->photo)}}" data-lightbox="example-set">
                                <img src="{{asset('public/uploads/gallery/' .$photo->photo)}}" class="example-image img-responsive listing-box-img" alt="" />
                                <div class="list-overlay"></div>
                            </a>
                        </figure>
                    </div>

                </article>
            </div>
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
        </div>
    </div>
</section>


@endsection
