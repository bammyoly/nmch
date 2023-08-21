@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update Profile</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <h3>Personal Details</h3>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="profile-wrapper">
                            <div class="profile-wrapper-thumb">
                                <img src="{{ asset('public/uploads/avatar/' .Auth::user()->avatar)}}" class="img-responsive img-circle" alt="" />
                                <span class="dashboard-user-status bg-success"></span>
                            </div>
                            <h4 class="text-center">Change Profile Avatar</h4>
                            <form action="{{route('profile.image', $user->slug)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="avatar" required="">
                                <button type="submit" class="btn theme-btn">Update Image</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="form-horizontal" method="post" action="{{ route('user.update', $user->slug) }}" enctype="multipart/form-data">
                            @csrf

                            <fieldset>
                                <div class="row">
                                
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3">Full Name</label>
                                        <div class="col-md-9 col-sm-8">
                                            <input type="text" name="fullname" class="form-control" value="{{$user->fullname}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3">Username</label>
                                        <div class="col-md-9 col-sm-8">
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 text-center"><br><br>
                                            <button type="submit" class="btn theme-btn">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                <div class="clearfix"></div>                
                <h3>Mentorship Information</h3>
                <form class="form-horizontal" method="post" action="{{ route('profile.update', $user->slug) }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Mentorship Category</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="sl-box">
                                        <select class="form-control wide" name="category_id">
                                            <option value="{{$user->profile->category->id}}">{{$user->profile->category->name}} (Current Category)</option>
                                            <option value="">Choose New Category</option>
                                            @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @empty
                                            <option value="">No Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Area of Speciality </label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" name="spec" class="form-control" value="{{$user->profile->spec}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Year Of Graduation</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" name="grad" class="form-control" value="{{$user->profile->grad}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Current Employment</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" value="{{$user->profile->employment}}" name="employment" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Role</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" name="role" class="form-control" value="{{$user->profile->role}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Years Of Experience</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" name="experience" class="form-control" value="{{$user->profile->experience}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Relevant Educational History</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea name="ehistory" class="form-control textarea height-100">{{$user->profile->ehistory}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Career/Work History</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea name="whistory" class="form-control textarea height-100">{{$user->profile->whistory}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Relevant Skills</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea name="skills" class="form-control textarea height-100">{{$user->profile->skills}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Activities and Interests</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea name="hobbies" class="form-control textarea height-100">{{$user->profile->hobbies}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Describe Yourself</label>
                                <div class="col-md-9 col-sm-8">
                                    <textarea name="bio" class="form-control textarea height-100">{{$user->profile->bio}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center"><br><br>
                                    <button type="submit" class="btn theme-btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            
        </div>
    </div>
</section>



@endsection
