@extends('layouts.app')

@section('content')

<div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
    <div class="container">
        <div class="page-title-wrap">
        <h2>E-Library</h2>
        <p><a href="{{url('/')}}" class="theme-cl">Home</a> | <span>Elibrary</span></p>
        </div>
    </div>
</div>

<section>
    <div class="container">
    
        <div class="row">
        
            <div class="col-md-6 col-sm-12">
                <div class="ab-detail">
                    <h2>NiMechE E-Library</h2>
                    <p>Welcome to the NiMechE-SC OAU E-library. <br>THe best online resource for important research notes, books, materials, technical reports, abstracts, links and questions for all levels of the department. we have you covered. <br> Feel free to download and read our book for free.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <img src="{{asset('public/images/book.png')}}">
            </div>
            
        </div>
        <div class="clearfix"></div><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <a class="btn theme-btn" href="{{route('elibrary.books')}}">Visit E-Library</a>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection