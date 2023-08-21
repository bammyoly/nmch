@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Become A Mentor</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <h5>Have what it takes to become a mentor?</h5><br>
                <form id="form-horizontal" method="post" action="{{ route('mentorship.request') }}">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Tell Us About Yourself</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea required="" class="form-control" name="about"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center"><br><br>
                                    <button type="submit" class="btn theme-btn">Send Request</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
