@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title text-capitalize">Manage {{$book->title}} Files</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <div class="row">
                    @forelse($book->uploads as $upload)
                    <div class="col-md-2">
                        <div class="pay-integration">
                            <div class="pay-inte-thumb" style="font-size: 50px;">
                               <i class="cl-purple icon ti-bag"></i>
                            </div>
                            <span style="font-size: 10px; align-self: center;">{{$upload->file}}</span>
                            <a href="{{route('upload.delete', $upload->id)}}" onclick="return confirm('Delete?')">Delete</a>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-success col-md-8">Empty</div>
                    @endforelse
                </div>
                
                <div class="col-md-8">
                    <form id="msform" class="dropzone" action="{{route('book.uploadfile', $book->id)}}" method="post"enctype="multipart/form-data">
                        @csrf
                    </form>
                    <br><br>
                    <a href="{{route('books.manage')}}" class="btn btn-warning"><< Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
