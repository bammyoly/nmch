@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2 class="text-capitalize">{{$book->title}}</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>{{$book->title}}</span></p>
        </div>
    </div>
</div>

<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
            
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4>Description</h4>
                    </div>
                    <div class="tr-single-body">
                        {!! $book->description !!}
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-4">

                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <div class="tr-single-header">
                            <h4 class="text-capitalize">Book Category</h4>
                        </div>
                    </div>
                    <div class="tr-single-body">
                        <h3 class="text-uppercase">{{$book->bcategory->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mrg-0">
            <div class="tr-single-box short-box">
                <div class="col-xs-4 align-self-center">
                    <h4>Files</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($book->uploads as $upload)
            <div class="col-md-2 col-sm-6">
                <div class="domestic-routes">
                    
                    <div class="domestic-routes-thumb">
                        <a href="#"><img src="{{asset('public/images/pdf.ico')}}" class="img-responsive" alt="" /></a>
                    </div>
                    <div class="domestic-routes-detail">
                        <h5><a href="{{route('book.download', $upload->file)}}">{{$upload->file}}</a></h5>
                    </div>
                    <div class="domestic-price">
                        <h5><a href="{{route('book.download', $upload->file)}}" class="theme-cl"><i class="fa fa-download"></i> Download</a></h5>
                    </div>
                    
                </div>
            </div>
            @empty
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>Empty Data</h1>
                        <img src="{{asset('public/images/empty.png')}}">
                    </div>
                </div>
            </div>
            @endforelse

        </div>


    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   {{$book->title}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$book->description}}
                    <br><br>
                    Files: <br>
                    <div class="row" >
                    @foreach($book->uploads as $upload)
                    <div class="col-md-4">
                        <div class="card">
                            {{$upload->file}}
                        </div>
                        <a href="{{route('book.download', $upload->file)}}">Download</a> | <a href="#">Read Online</a>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
