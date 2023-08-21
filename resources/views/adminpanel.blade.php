@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Admin Panel</h3>
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
                                        <a href="{{route('users.manage')}}">
                                        <div class="widget-detail">
                                            <h3>{{$users->count()}}</h3>
                                            <span>Manage Users</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-danger icon fa fa-user-secret"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('excos.manage')}}">
                                        <div class="widget-detail">
                                            <h3>{{$excos->count()}}</h3>
                                            <span>Manage Excos</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-success icon ti-comment"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('blog.all')}}">
                                        <div class="widget-detail">
                                            <h3>{{$blogs->count()}}</h3>
                                            <span>Manage Posts</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-purple icon ti-bag"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('categories')}}">
                                        <div class="widget-detail">
                                            <h3>{{$categories->count()}}</h3>
                                            <span>Manage Mentorship Categories</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-inverse icon ti-gallery"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('gallery.manage')}}">
                                        <div class="widget-detail">
                                            <h3>{{$galleries->count()}}</h3>
                                            <span>Manage Gallery</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-info icon fa fa-street-view"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('mentor.requests')}}">
                                        <div class="widget-detail">
                                            <h3>{{$requests->count()}}</h3>
                                            <span>Mentorship Requests</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-primary icon ti-book"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('books.manage')}}">
                                        <div class="widget-detail">
                                            <h3>{{$books->count()}}</h3>
                                            <span>Manage Library books</span>
                                        </div>
                                        </a>
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
                                        <i class="cl-default icon fa fa-book"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="{{route('bcategories')}}">
                                        <div class="widget-detail">
                                            <h3>{{$bcategories->count()}}</h3>
                                            <span>Manage Book Categories</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
            

@endsection
