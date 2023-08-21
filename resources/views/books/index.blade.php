@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>E-Library Books</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>E-Library</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Book Levels</h1>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach($bcategories as $category)
            <div class="col-md-2 col-sm-6">
                <a href="{{route('books.category', $category->slug)}}">
                    <div class="info-features">
                        <i class="ti-bag info-ibox bg-success-light"></i>
                        <h4 class="infobox_title text-uppercase">{{$category->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="gray-bg">
    <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h3>All Books</h3>
                    </div>
                </div>
            </div>

            <div class="row mrg-0">
                <div class="tr-single-box short-box">
                    <form id="msform" method="get" action="{{route('book.search')}}">
                        <div class="col-xs-4 align-self-center">
                            <input type="text" name="search" required="required" class="form-control" placeholder="Search Books">
                        </div>
                        <div class="col-xs-4 align-self-center">
                            <button type="submit" class="btn theme-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @forelse($books as $book)
                <div class="col-md-4 col-sm-6">
                    <div class="domestic-routes">
                        
                        <div class="domestic-routes-thumb">
                            <a href="#"><img src="{{asset('public/images/bk.jpeg')}}" class="img-responsive" alt="" /></a>
                        </div>
                        <div class="domestic-routes-detail">
                            <h5><a href="{{route('book.show', $book->book_id)}}">{{$book->title}}</a></h5>
                            <span class="domestic-offer bg-success">{{$book->type}}</span>
                        </div>
                        <div class="domestic-price">
                            <h5><a href="{{route('book.show', $book->book_id)}}" class="theme-cl">{{$book->level}}</a></h5>
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
