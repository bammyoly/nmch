@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">E-Library Books</h3>
			</div>
			<div class="tr-single-body">
                <a href="{{route('book.add')}}" class="btn theme-btn height-50 width-150">New Book</a>
                @include('includes.flash')
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Title</th>						
								<th>Type</th>
								<th>Files</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tbody>
							@forelse($books as $book)
							<tr>
								<td>
									<a href="{{route('book.show', $book->book_id)}}" target="_blank">
									<div class="bk-thumb">
										<i class="cl-primary icon ti-book"></i>
									</div>
									<h7 class="text-capitalize">{{$book->title}}</h7>
									</a>
								</td>
								<td>
									<span class="badge badge-success" style="background: purple;">{{$book->type}}</span>
								</td>
								<td><a href="{{route('book.files', $book->book_id)}}">Edit {{$book->uploads->count()}} Files</a></td>
								<td>
									<a href="{{route('book.edit', $book->book_id)}}" class="tbl-action settings" title="Edit" data-toggle="tooltip"><i class="ti-pencil"></i></a>
									<a href="{{route('book.delete', $book->book_id)}}" class="tbl-action bg-danger" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete This Message?')"><i class="ti-trash"></i></a>
								</td>
							</tr>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

							




@endsection