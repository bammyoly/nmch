@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>E-Library Book Category</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>E-Library</span></p>
        </div>
    </div>
</div>

<section class="gray-bg">
    <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h3 class="text-capitalize"> {{$bcategory->name}} Books</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($books as $book)
                <div class="col-md-4 col-sm-6">
                    <div class="domestic-routes">
                        
                        <div class="domestic-routes-thumb">
                            <a href="{{route('book.show', $book->book_id)}}"><img src="{{asset('public/images/bk.jpeg')}}" class="img-responsive" alt="" /></a>
                        </div>
                        <div class="domestic-routes-detail">
                            <h5><a href="{{route('book.show', $book->book_id)}}">{{$book->title}}</a></h5>
                            <span class="domestic-offer bg-success">{{$book->type}}</span>
                        </div>
                        <div class="domestic-price">
                            <h5><a href="{{route('book.show', $book->book_id)}}" class="theme-cl">{{$book->bcategory->name}}</a></h5>
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
            {{$books->links()}}
        </div>
    </div>
</section>


@endsection
