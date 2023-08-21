@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update Welcome Address</h3>
                <span><a href="{{route('excos.manage')}}"> << Go Back</a></span>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="msform" method="post" action="{{ route('address.store') }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            @if($president)
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Welcome Address</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea id="area2" class="form-control" name="address">{{$president->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center"><br><br>
                                    <button type="submit" class="btn theme-btn">Update</button>
                                </div>
                            </div>
                            @else
                            <div class="alert alert-success">Add A President TO the Excos Before Updating THe Welcome Address</div>
                            @endif
                        </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>





@endsection
