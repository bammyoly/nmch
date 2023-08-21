@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Categories</h3>
            </div>
            <div class="tr-single-body">
                <a href="{{route('category.add')}}" class="btn theme-btn height-50 width-150">New Category</a><br><br>
                <div class="row">
                    @include('includes.flash')
                    @forelse($categories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="pay-integration">
                            <div class="pay-inte-thumb" style="font-size: 50px;">
                               <i class="cl-purple icon ti-bag"></i>
                            </div>
                            <h3 class="text-uppercase">{{$category->name}}</h3>
                            <a href="{{route('category.edit', $category->id)}}" class="btn bg-success-light">Edit</a>
                            <a href="{{route('category.delete', $category->id)}}" class="btn bg-danger-light" onclick="return confirm('Delete?')">Delete</a>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Empty Data</h1>
                                <img src="{{asset('public/images/empty.png')}}">
                            </div>
                        </div>
                    </div>
                    @endforelse


@endsection
