@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title text-capitalize">Manage {{$gallery->title}} Photos</h3>
            </div>
            <div class="tr-single-body">
                <div class="row">
                    @forelse($gallery->photos as $photo)
                    <div class="col-md-2">
                        <div class="pay-integration">
                            <img src="{{asset('public/uploads/gallery/' .$photo->photo)}}" style="height: 200px;">
                            <span style="font-size: 10px; align-self: center;">{{$photo->photo}}</span>
                            <a href="{{route('gallery.deletephoto', $photo->id)}}" onclick="return confirm('Delete?')">Delete</a>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-success col-md-8">Empty</div>
                    @endforelse
                </div>
                
                @include('includes.flash')
                <div class="col-md-8">
                    Reload Page To View Uploaded Photos
                    <form id="msform" class="dropzone" action="{{route('gallery.uploadimage', $gallery->id)}}" method="post"enctype="multipart/form-data">
                        @csrf
                    </form>
                    <br><br>
                    <a href="{{route('gallery.manage')}}" class="btn btn-warning"><< Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
