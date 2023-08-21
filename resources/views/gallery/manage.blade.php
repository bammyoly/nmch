@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">Gallery Images</h3>
			</div>
			<div class="tr-single-body">
                <a href="{{route('gallery.add')}}" class="btn theme-btn height-50 width-150">New Gallery</a>
                @include('includes.flash')
                <br><br>
                <div class="row">
					@forelse($galleries as $gallery)					
					<div class="col-md-4 col-sm-6">
						<article class="tour-box style-1">
							
							<div class="tour-box-image">
								<figure>
									<a href="tour-detail.html">
										<img src="{{asset('public/uploads/gallery/' .$gallery->cover)}}" class="img-responsive listing-box-img" alt="" />
										<div class="list-overlay"></div>
									</a>
								</figure>
							</div>
							<div class="inner-box">
								<div class="box-inner-ellipsis">
									<h4 class="entry-title">
										<a href="#">{{$gallery->title}}</a>
									</h4>
									<div class="price-box">
										<div class="tour-price fl-right">
											<a href="{{route('gallery.photos', $gallery->id)}}" class="tbl-action settings" title="Photos" data-toggle="tooltip"><i class="ti-image"></i></a>
											<a href="{{route('gallery.edit', $gallery->id)}}" class="tbl-action settings" title="Edit" data-toggle="tooltip"><i class="ti-pencil"></i></a>
											<a href="{{route('gallery.delete', $gallery->id)}}" class="tbl-action" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete This Message?')"><i class="ti-trash"></i></a>
										</div>
									</div>
								</div>
							</div>
		
						</article>
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
				</div>
            </div>
        </div>
    </div>
</div>
	


@endsection