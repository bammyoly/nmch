@extends('layouts.master')

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title text-capitalize">Update {{$book->title}}</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                 <form method="POST" id="msform" action="{{ route('book.update', $book->book_id) }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Book Category</label>
                                    <div class="col-md-9 col-sm-8">
                                        <div class="sl-box">
                                            <select required class="form-control wide" name="bcategory_id">
                                                <option value="">Choose One</option>
                                                @forelse($bcategories as $bcategory)
                                                <option value="{{$bcategory->id}}">{{$bcategory->name}}</option>
                                                @empty
                                                <option value="">Create A Book Category First</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Title</label>
                                    <div class="col-md-9 col-sm-8">
                                        <input type="text" required="" value="{{ $book->title }}" name="title" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Type</label>
                                    <div class="col-md-9 col-sm-8">
                                        <input type="text" required="" name="type" class="form-control" value="{{ $book->type }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Description</label>
                                    <div class="col-md-9 col-sm-8">
                                        <textarea class="form-control height-120" placeholder="Description" id="area2" rows="80" name="description">{{ $book->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <br><br>
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
</div>
@endsection
