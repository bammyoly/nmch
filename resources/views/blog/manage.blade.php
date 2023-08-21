@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">My Blog Posts</h3>
			</div>
			<div class="tr-single-body">
                <a href="{{route('blog.add')}}" class="btn theme-btn height-50 width-150">New Post</a><br><br>
				<div class="row">
					
					<div class="col-md-12">
						<table class="table table-striped">
							@if(count($blogs))
	                        <thead>
	                            <tr>
	                                <th>TItle</th>
	                                <th>Type</th>
	                                <th>Status</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        @endif
	                        <tbody>
	                        @forelse($blogs as $blog)
	                            <tr>
	                                <td><a target="_blank" href="{{route('blog.show', $blog->slug)}}"> {{$blog->title}}</a></td>
	                                <td>{{$blog->type}}</a></td>
	                                <td>
	                                	@if($blog->status == 'pending')
	                                	<span class="badge badge-success" style="background: purple;">{{$blog->status}}</span>
	                                	@else
	                                	<span class="badge badge-primary" style="background: green;">{{$blog->status}}</span>
	                                	@endif
	                                </td>
	                                <td><a class="btn btn-info btn-sm" href="{{route('blog.edit', $blog->slug)}}">Edit</a> | <a class="btn btn-warning btn-sm" href="{{route('blog.delete', $blog->blog_id)}}" onclick="return confirm('Delete This Message?')">Delete</a></td>
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
		                {{$blogs->links()}}
		            </div>
					
				</div>
			</div>
			
		</div>
	</div>
</section>


@endsection