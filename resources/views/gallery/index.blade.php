@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Gallery</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Gallery</span></p>
        </div>
    </div>
</div>

<section class="gray-bg">
    <div class="container">
        <div class="row">
            @forelse($galleries as $gallery)                    
            <div class="col-md-4 col-sm-6">
                <article class="tour-box style-1">
                    
                    <div class="tour-box-image">
                        <figure>
                            <a href="{{route('gallery.show', $gallery->slug)}}">
                                <img src="{{asset('public/uploads/gallery/' .$gallery->cover)}}" class="img-responsive listing-box-img" alt="" />
                                <div class="list-overlay"></div>
                            </a>
                        </figure>
                    </div>
                    <div class="inner-box">
                        <div class="box-inner-ellipsis">
                            <h4 class="entry-title">
                                <a href="{{route('gallery.show', $gallery->slug)}}" class="text-capitalize">{{$gallery->title}}</a>
                            </h4>
                        </div>
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
