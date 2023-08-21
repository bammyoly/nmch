@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update Post</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="msform" method="post" action="{{ route('blog.update', $blog->blog_id) }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Blog Title</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Blog Type</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="sl-box">
                                        <select class="form-control wide" name="type">
                                            <option value="{{$blog->type}}">{{$blog->type}} (selected)</option>
                                            <option value="article">Article</option>
                                            <option value="event">Event</option>
                                            <option value="news">News</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Description</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea class="form-control height-120" placeholder="Description" id="area2" rows="80" name="description">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Select Image (optional)</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="cf-input">
                                         <img style="width: 90px; height: 90px;" src="{{asset('public/uploads/blog/' .$blog->image)}}">
                                        <label class="custom-file">
                                          <input type="file" id="file" name="image" class="custom-file-input">
                                         
                                          <span class="custom-file-control"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center"><br><br><br><br><br>
                                    <button type="submit" class="btn theme-btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            
        </div>
    </div>
</section>



@endsection
