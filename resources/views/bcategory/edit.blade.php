@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update Book Category</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="msform" method="post" action="{{ route('bcategory.update', $bcategory->id) }}">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Category Name</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" required="" name="name" class="form-control" value="{{$bcategory->name}}" />
                                </div>
                            </div>
                            <br><br>
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
