@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">Mentorship Requests</h3>
			</div>
			<div class="tr-single-body">
				<div class="row">
					
					<div class="col-md-12">
						<table class="table table-striped">
							@if(count($mrequests))
	                        <thead>
	                            <tr>
	                                <th>Username</th>
	                                <th>Status</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        @endif
	                        <tbody>
	                        @forelse($mrequests as $mrequest)
	                            <tr>
	                                <td>
	                                	<img class="ground-avatar" src="{{asset('public/uploads/avatar/' .$mrequest->user->avatar)}}" alt="avatar">
	                                	 <h5>{{$mrequest->user->name}}</h5></td>
	                                <td>
	                                	@if($mrequest->status == 'pending')
	                                	<span class="badge badge-success" style="background: purple;">{{$mrequest->status}}</span>
	                                	@else
	                                	<span class="badge badge-primary" style="background: green;">{{$mrequest->status}}</span>
	                                	@endif
	                                </td>
	                                <td><a class="btn btn-info btn-sm" href="{{route('mentor.join', $mrequest->user->slug)}}">Approve</a> </td>
	                            </tr>
	                        </tbody>
							@empty
							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <h3>Empty Data</h3>
		                                <img src="{{asset('public/images/empty.png')}}">
		                            </div>
		                        </div>
		                    </div>
		                    @endforelse
		                </table>
		                {{$mrequests->links()}}
		            </div>
					
				</div>
			</div>
			
		</div>
	</div>
</section>


@endsection