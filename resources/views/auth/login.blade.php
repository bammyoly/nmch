@extends('layouts.app')

@section('content')
<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Login</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Login</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    
        <div class="row">
        
            <div class="col-md-12">
                <div class="ab-detail">
                    <div class="form-box">
                        @include('includes.flash')
                        <form class="c-form" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="col-sm-6">
                                <label>Email Address:<sup class="cl-danger">*</sup></label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Password:<sup class="cl-danger">*</sup></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            
                            <div class="row">
                                <dir class="col-sm-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </dir>
                                <div class="col-sm-4">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                
                            </div>
                                                       
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn theme-btn btn-arrow">Login</button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{route('register')}}">Create An Account</a><br><br>
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
