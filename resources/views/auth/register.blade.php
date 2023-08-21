@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Create Account</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Create Account</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Create Account</h1>
                </div>
            </div>
        </div>
    
        <div class="row">
        
            <div class="col-md-12">
                <div class="ab-detail">
                    <div class="form-box">
                        @include('includes.flash')
                        <form class="c-form" method="post" action="{{route('register')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Full Name:<sup class="cl-danger">*</sup></label>
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Username:<sup class="cl-danger">*</sup></label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Email Address:<sup class="cl-danger">*</sup></label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Gender<sup class="cl-danger">*</sup></label>
                                    <select name="gender" class="form-control wide">
                                        <option value="">Choose One</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Password:<sup class="cl-danger">*</sup></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Confirm Password:<sup class="cl-danger">*</sup></label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            
                                                       
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn theme-btn btn-arrow">Register</button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{route('login')}}">Have An Account? Login Here</a><br><br>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>            
        </div>
        
    </div>
</section>


@endsection
