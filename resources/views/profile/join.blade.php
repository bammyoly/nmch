@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Choose Mentor Category</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="form-horizontal" method="post" action="{{route('mentor.become', $user->slug)}}">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Choose Category</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="sl-box">
                                        <select required class="form-control wide" name="category_id">
                                            <option value="">Choose One</option>
                                            @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @empty
                                            <option value="">No Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn theme-btn">submit</button>
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
