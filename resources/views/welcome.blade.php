@extends('layouts.app')

@section('content')

<div class="clearfix"></div>

    <div class="main-banner" style="background-image:url(public/images/home.jpg);">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            
                <div class="caption text-center cl-white">
                    <h2 class="text-uppercase">The Nigerian Institution Of Mechanical Engineers</h2>
                    <p style="font-size: 30px;">Obafemi Awolowo University Chapter</p>
                </div>

            </div>
        </div>
    </div>

    <section class="gray-bg">
        <div class="container">
        
            <div class="row">
            

                <div class="col-md-6 col-sm-12">
                    <img style="margin: 50px 0 0 80px;" src="{{ asset('public/images/nimeche.jpg')}}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="ab-detail">
                        <h3 class="text-center">About Us</h3>
                        <h5>Aims and Objectives</h5>
                        <p><i class="fa fa-check"></i> To unite all students of  the  department of  Mechanical  Engineering of this  university for the purpose of creating mutual understanding among them.</p>
                        <p><i class="fa fa-check"></i> To project, promote and  protect  the  image  of the  much-valued academic, moral  and intellectual standard of the department.</p>
                        <p><i class="fa fa-check"></i> To cater for the academic and social welfare of the members of the chapter.</p>
                        <p><i class="fa fa-check"></i> To  cooperate  and  communicate  with the department, faculty and  university administration as the need arises for the purpose of achieving (2) & (3) above.</p>
                        <p><i class="fa fa-check"></i> To cooperate with    other student association in the faculty of technology in all causes affecting technology, students in general </p>
                        <p><i class="fa fa-check"></i> To communicate  and cooperate with  professional  bodies,  institutions  and any other organization that promotes the interest of the engineering professions.</p>
                        <p><i class="fa fa-check"></i> To establish, maintain and foster a cordial alumni –student relationship.</p>
                    </div>
                </div>

            </div>
            
        </div>
    </section>

    <section>
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <span class="theme-cl">NiMechE</span>
                        <h1>The Executives</h1>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @forelse($excos as $exco)
                <!-- Single Guide -->
                <div class="col-md-3 col-sm-6">
                    <div class="guides-container">
                    
                        <div class="guides-box">
                            <div class="guides-img-box">
                                <img src="{{ asset('public/uploads/excos/' .$exco->image)}}" class="img-responsive" alt="" />
                            </div>
                            <div class="guider-detail">
                                <h4>{{$exco->name}}</h4>
                                <h5 class="theme-cl font-bold text-capitalize">{{$exco->level}}</h5>
                                <h5 class="theme-cl font-bold"><i class="fa fa-phone"></i> {{$exco->phone}}</h5>
                                <h5 class="theme-cl font-bold"><i class="fa fa-envelope"></i> {{$exco->email}}</h5>
                            </div>
                        </div>
                        <a class="btn theme-btn full-width">{{$exco->position}}</a>
                    
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h4>Empty Data</h4>
                            <img src="{{asset('public/images/empty.png')}}">
                        </div>
                    </div>
                </div>
                @endforelse
                <!-- Single Guide -->

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <a href="{{route('excos')}}" class="btn theme-btn text-center">View All</a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

        <div class="clearfix"></div>

<section class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <span class="theme-cl">NiMechE</span>
                    <h1>Latest From The Blog</h1>
                </div>
            </div>
        </div>
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
                        <h4 class="text-capitalize"><a href="{{route('blog.show', $blog->slug)}}">{{$blog->title}}</a></h4>
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
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <a href="{{route('blog')}}" class="btn theme-btn text-center">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
