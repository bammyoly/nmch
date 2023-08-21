@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Update Exco</h3>
            </div>
            <div class="tr-single-body">
                @include('includes.flash')
                <form id="msform" method="post" action="{{ route('exco.update', $exco->id) }}" enctype="multipart/form-data">
                    @csrf

                    <fieldset>
                        <div class="row">
                        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Full Name</label>
                                <div class="col-md-9 col-sm-8">
                                    <input type="text" required="" name="name" class="form-control" value="{{$exco->name}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Position</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="sl-box">
                                        <select required="" class="form-control wide" name="position">
                                            <option value="{{$exco->position}}">{{$exco->position}} (selected)</option>
                                            <option value="president">President</option>
                                            <option value="vice president">Vice President</option>
                                            <option value="general secretary">General Secretary</option>
                                            <option value="financial secretary">Financial Secretary</option>
                                            <option value="public relations officer">Public Relations Officer</option>
                                            <option value="librarian">Librarian</option>
                                            <option value="director of sports">Director Of Sports</option>
                                            <option value="director of socials">Director Of Socials</option>
                                            <option value="ass. general secretary">Asst. General Secretary</option>
                                            <option value="treasurer">Treasurer</option>
                                            <option value="asst. librarian">Asst. Librarian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Level</label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="sl-box">
                                        <select required="" name="level" class="form-control wide" name="position">
                                            <option value="{{$exco->level}}">{{$exco->name}} (selected)</option>
                                            <option value="100 level">100 Level</option>
                                            <option value="200 level">200 Level</option>
                                            <option value="300 level">300 Level</option>
                                            <option value="400 level">400 Level</option>
                                            <option value="500 level">500 Level</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Email Address</label>
                                <div class="col-md-9 col-sm-8">
                                    <input required="" type="text" name="email" class="form-control" value="{{$exco->email}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Phone Number</label>
                                <div class="col-md-9 col-sm-8">
                                    <input required="" type="text" name="phone" class="form-control" value="{{$exco->phone}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Select Image</label>
                                <div class="col-md-9 col-sm-8">
                                    <img src="{{asset('public/uploads/excos/' .$exco->image)}}" style="width: 70px; height: 70px;">
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
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
