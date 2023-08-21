@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">All Users</h3>
			</div>
			<div class="tr-single-body">
				<ul id="progressbar">
					<li class="active"><a href="{{route('users.manage')}}"> All Users</a></li>
					<li><a href="{{route('mentors.manage')}}">Mentors</a></li>
					<li><a href="{{route('admins.manage')}}">Admins</a></li>
				</ul>
				@include('includes.flash')
				<div class="row">
					@forelse($users as $user)
			        <div class="col-md-3 col-sm-6">
			            <div class="guides-container">
			            
			                <div class="guides-box">
			                    <div class="guides-img-box">
			                        <img src="{{ asset('public/uploads/avatar/' .$user->avatar)}}" class="img-responsive" alt="" />
			                    </div>
			                    <div class="guider-detail text-capitalize">
			                        <h4>{{$user->name}}</h4>
			                        @if($user->profile->is_mentor())
			                        <h5 class="font-bold">Mentor</h5>
			                        @else
			                        <h5 class="font-bold" style="color: green;">Student</h5>
			                        @endif
			                        <h5 class="theme-cl font-bold">{{$user->gender}}</h5>
			                    </div>
			                </div>
			                @if($user->profile->is_mentor())
			                <a href="{{route('mentor.remove', $user->slug)}}" class="btn btn-warning">Remove Mentor</a> 
			                @else
			                <a href="{{route('mentor.join', $user->slug)}}" class="btn theme-btn">Make Mentor</a> 
			                @endif
			                @if($user->is_admin())
			                <a href="{{route('admin.remove', $user->slug)}}" class="btn btn-secondary">Remove Admin</a> 
			                @else
			                <a href="{{route('admin.make', $user->slug)}}" class="btn btn-success">Make Admin</a> 
			                @endif
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
				{{$users->links()}}
			</div>
			
		</div>
	</div>
</section>


@endsection