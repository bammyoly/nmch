@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Dashboard</h3>
            </div>

            <div class="tr-single-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget simple-widget">
                            <div class="rwidget-caption info">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-info icon ti-user"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{$mentors->count()}}</h3>
                                            <span>Mentors</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="widget simple-widget">
                            <div class="widget-caption danger">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-danger icon fa fa-envelope-o"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{$messages->count()}}</h3>
                                            <span>Inbox Messages</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="widget simple-widget">
                            <div class="widget-caption warning">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-success icon ti-medall"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{$blogs->count()}}</h3>
                                            <span>My Blog Posts</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="widget simple-widget">
                            <div class="widget-caption purple">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-purple icon ti-bell"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{Auth::user()->notifications()->count()}}</h3>
                                            <span>Notifications</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                
                <!-- row -->
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="mb-0">About</h4>
                            </div>
                            <div class="tr-single-body">
                                @if(Auth::user()->profile->is_mentor())
                                <div class="booking-price-detail side-list no-border">
                                    <ul class="text-capitalize col-md-8">
                                        <li><strong>Mentorship Focus:</strong><span class="pull-right">{{Auth::user()->profile->category->name}}</span></li>
                                        <li><strong>Area Of Specilization:</strong><span class="pull-right"> {{Auth::user()->profile->spec}}</span></li>
                                        <li><strong>Current Employment:</strong><span class="pull-right"> {{Auth::user()->profile->employment}}</span></li>
                                        <li><strong>Role:</strong><span class="pull-right"> {{Auth::user()->profile->role}}</span></li>
                                        <li><strong>Related Experience:</strong><span class="pull-right"> {{Auth::user()->profile->experience}}</span></li>
                                        <li><strong>Relevant Skills:</strong><span class="pull-right"> {!! Auth::user()->profile->skills !!}</span></li>

                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="heading"><br><br>
                                            <a href="{{route('settings', Auth::user()->slug)}}" class="btn theme-btn">Update Profile</a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="booking-price-detail side-list no-border">
                                    <ul class="text-capitalize col-md-8">
                                        <li><strong>Username:</strong><span class="pull-right">{{Auth::user()->name}}</span></li>
                                        <li><strong>Full Name:</strong><span class="pull-right"> {{Auth::user()->fullname}}</span></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="heading"><br><br>
                                            <a href="{{route('mentor.request')}}" class="btn theme-btn">Become A Mentor</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h5>Recent Notifications</h5>
                            </div>
                            <div class="ground-list ground-list-hove">
                                @forelse(Auth::user()->notifications()->latest()->get() as $notification)
                                @include('nots.'.snake_case(class_basename($notification->type)))
                                @empty
                                <label class="alert alert-warning">No New Notification</label>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                
            </div>
        </div>
    </div>
</div>
            

@endsection
