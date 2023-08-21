@extends('layouts.app')

@section('content')


<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>Verify Email Address</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Verification</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="success-wrap text-center">
            <div class="success-text">
                <i class="ti-envelope cl-success font-80"></i>
                <h3>One More Step!</h3>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <dir class="clearfix"></dir>
                <h4 class="text-center">{{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a style="color: red;" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a></h4>
                <dir class="clearfix"></dir>
                <a href="{{url('/')}}" class="btn theme-btn">Back To Home Page</a>
            </div>
        </div>
    </div>
</section>


@endsection
