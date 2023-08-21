@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2 class="text-capitalize">{{$blog->title}}</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>{{$blog->title}}</span></p>
        </div>
    </div>
</div>

<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">
        
            <div class="col-md-8 col-sm-12">
                @include('includes.flash')
                <div class="tab-content tabs">
                    @if($blog->image !== NULL)
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-body">
                                <div class="row">
                                
                                    <div class="col-md-6 col-sm-6">
                                        <div class="list-thumb-box">
                                            <img src="{{asset('public/uploads/blog/' .$blog->image)}}" class="img-responsive" alt="" />
                                            <a href="#" class="list-like left"><i class="ti-heart"></i></a>
                                            <h5>4.8/<sub class="theme-cl">5</sub></h5>
                                        </div>
                                    </div>
                                                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                        
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>Description</h4>
                            </div>
                            <div class="tr-single-body">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4>Comments ({{$blog->comments->count()}})</h4>
                            </div>
                            <div class="tr-single-body">
                                <ul>
                                @forelse($blog->comments as $comment)
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="{{asset('public/uploads/avatar/' .$comment->user->avatar)}}" class="img-responsive img-circle" alt="" />
                                        </div>
                                        
                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <span>{{date('M jS, Y', strtotime($comment->created_at))}}</span>
                                            </div>
                                            <div class="review-user-info">
                                                <h4 class="text-capitalize">{{$comment->user->name}}</h4>
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    @empty
                                    No Comment
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <div class="tr-single-header">
                                <h4>Post A Comment</h4>
                            </div>
                       </div>
                        <div class="tr-single-body">
                            <form class="book-form" method="post" action="{{route('blog.comment', $blog->blog_id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Add Comment</label>
                                            <textarea class="form-control" name="comment" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                               </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <button type="submit" class="btn btn-arrow theme-btn full-width">Comment</a>     
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        
            <!-- Sidebar Start -->
            <div class="col-md-4 col-sm-12">
                
                <!-- Tourist Overview -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4>Post Author</h4>
                    </div>
                    
                    <div class="tr-single-body">
                        <div class="guides-box">
                            <div class="guides-img-box">
                                <img src="{{ asset('public/uploads/avatar/' .$blog->user->avatar)}}" class="img-responsive" alt="" />
                            </div>
                            <div class="guider-detail">
                                <h4 class="text-capitalize">{{$blog->user->name}}</h4>
                            </div>
                        </div>
                        <a href="{{route('profile', $blog->user->slug)}}" class="btn theme-btn full-width">View Profile</a>
                    </div>
                    
                </div>
                
                <!-- Share this -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4>Latest Blog Posts</h4>
                    </div>
                    
                    <div class="tr-single-body">
                        <div class="single-side-slide">
                            @foreach($blogs as $blog)
                            <div class="col-md-4 col-sm-6">
                                <article class="restaurent-box style-1">

                                    <div class="restaurent-box-image">
                                        <figure>
                                            <a href="restaurant-detail.html">
                                                <img src="{{asset('public/uploads/blog/' . $blog->cover)}}" class="img-responsive listing-box-img" alt="" />
                                            </a>                                            
                                        </figure>
                                        
                                    </div>                                    
                                    <div class="restaurent-detail-box">
                                        <div class="restaurent-ellipsis">
                                            <h4 class="restaurent-name">
                                                <a href="{{route('blog.show', $blog->slug)}}">{{$blog->title}}</a>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="restaurent-inner inner-box">
                                        <div class="box-inner-ellipsis">
                                            <div class="restaurent-review entry-location">
                                                <a href="{{route('blog.show', $blog->slug)}}" class="theme-cl" title="Read More..">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </article>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    
                </div>
                
        </div>
    </div>
</section>


@endsection
