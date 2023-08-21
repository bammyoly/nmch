@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update {{$gallery->title}}</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="msform" method="post" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Gallery Title</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" required="" name="title" class="form-control" value="{{$gallery->title}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Gallery Cover</label>
                                <div class="col-md-9 col-sm-8">
                                    <img style="width: 90px; height: 90px;" src="{{asset('public/uploads/gallery/' .$gallery->cover)}}">
                                    <input type="file" name="cover" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn theme-btn">Update</button>
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
