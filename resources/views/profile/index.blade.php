@extends('layouts.app')

@section('content')

<section class="page-title-banner" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="tr-list-detail">
                <div class="tr-list-thumb">
                    <img src="{{ asset('public/uploads/avatar/' .$user->avatar)}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="tr-list-info">
                    <h4 class="text-capitalize">{{$user->name}}</h4>
                    @if($user->profile->is_mentor())
                    <p>Status: Mentor</p>
                    @else
                    <p> Status: Student</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<section class="tr-single-detail gray-bg">
            <div class="container">
                <div class="row">
                
                    <div class="col-md-8 col-sm-8">
                                
                        <!-- Guide Detail -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-user"></i>Profile Details</h4>
                                </div>
                                <div class="tr-single-body">
                                
                                    <div class="guider-box-detail">
                                        <div class="guider-box-thumb">
                                            <img src="{{ asset('public/uploads/avatar/' .$user->avatar)}}" class="img-responsive img-circle" alt="" />
                                            <p class="text-capitalize text-center"> {{$user->name}}</p>
                                        </div>
                                        <div class="guider-box-detail-content">
                                            <h4 class="text-capitalize">{{$user->fullname}}</h4>
                                            <dir class="clearfix"></dir>
                                        </div>
                                        @if($profile->is_mentor())
                                        <div class="booking-price-detail side-list no-border">
                                            <ul class="text-capitalize col-md-8">
                                                <li><strong>Mentorship Focus:</strong><span class="pull-right">{{$profile->category->name}}</span></li>
                                                <li><strong>Area Of Specilization:</strong><span class="pull-right"> {{$user->profile->spec}}</span></li>
                                                <li><strong>Current Employment:</strong><span class="pull-right"> {{$user->profile->employment}}</span></li>
                                                <li><strong>Role:</strong><span class="pull-right"> {{$user->profile->role}}</span></li>
                                                <li><strong>Related Experience:</strong><span class="pull-right"> {{$user->profile->experience}}</span></li>
                                                <li><strong>Relevant Skills:</strong><span class="pull-right"> {!! $user->profile->skills !!}</span></li>

                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-files"></i>Bio</h4>
                                </div>
                                <div class="tr-single-body">
                                    <p>{!! $profile->bio !!}</p>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                
                    <!-- Sidebar Start -->
                    <div class="col-md-4 col-sm-4">
                        
                        <!-- Tourist Overview -->

                        @if(Auth::id() !== $user->id)
                        <!-- overview & booking Form -->
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <div class="tr-single-header">
                                    <h4 class="text-capitalize"> message {{$user->name}}</h4>
                                </div>
                            </div>
                            <div class="tr-single-body">
                                @include('includes.flash')
                                <form class="book-form" method="post" action="{{route('message.new', $user->slug)}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" required="" name="message" id="checkin" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea type="text" required="" name="message" id="checkin" class="form-control" placeholder="Message"></textarea>
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
                        @endif
                        
                        <!-- Share this -->

                        
                        <!-- Share this -->
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="text-capitalize">Posts by {{$user->name}}</h4>
                            </div>

                            <div class="tr-single-body">
                        <div class="single-side-slide">
                            @forelse($blogs as $blog)
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
                            @empty
                            <div class="row">
                                <div class="col-md-12">
                                    Empty Data
                                </div>
                            </div>
                            @endforelse
                            
                        </div>
                    </div>

                    
                </div>
                
            </div>
            <!-- /col-md-4 -->
        </div>
    </div>
</section>


@endsection
