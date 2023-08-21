@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Password Reset</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Reset Password</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>{{ __('Reset Password') }}</h1>
                </div>
            </div>
        </div>
    
        <div class="row">
        
            <div class="col-md-12">
                <div class="ab-detail">
                    <div class="form-box">
                        @include('includes.flash')
                        <form id="form-horizontal" method="post" action="{{ route('password.update') }}">
                        @csrf

                        <fieldset>
                            <div class="row">
                            
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Email Address:</label>
                                    <div class="col-md-9 col-sm-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Password</label>
                                    <div class="col-md-9 col-sm-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Confirm Password</label>
                                    <div class="col-md-9 col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>
                                </div>
                                                           
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 text-center"><br><br>
                                        <button type="submit" class="btn theme-btn">{{ __('Reset Password') }}</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                            
                        </form>
                    </div>
                </div>
            </div>            
        </div>
        
    </div>
</section>


@endsection
