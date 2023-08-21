@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Our Blog Posts</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Our Blogs</span></p>
        </div>
    </div>
</div>

<section class="gray-bg">
    <div class="container">
        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-md-4 col-sm-6">
                <div class="blog-box blog-grid-box">
                    <div class="blog-grid-box-img">
                        <img src="{{asset('public/uploads/blog/' . $blog->cover)}}" class="img-responsive" alt="">
                    </div>
                    
                    <div class="blog-grid-box-content">
                        <div class="blog-avatar text-center">
                            <img src="{{asset('public/uploads/avatar/' .$blog->user->avatar)}}" class="img-responsive" alt="">
                            <p><strong>By</strong> <span class="theme-cl">{{$blog->user->name}}</span></p>
                        </div>
                        <h4><a href="{{route('blog.show', $blog->slug)}}">{{$blog->title}}</a></h4>
                        <h6>
                            @if($blog->type == 'news')
                            <span class="badge badge-success" style="background: purple;">{{$blog->type}}</span>
                            @elseif($blog->type == 'article')
                            <span class="badge badge-success" style="background: green;">{{$blog->type}}</span>
                            @else
                            <span class="badge badge-success" style="background: blue;">{{$blog->type}}</span>
                            @endif
                        </h6>
                        <a href="{{route('blog.show', $blog->slug)}}" class="theme-cl" title="Read More..">Read More</a>
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
