@extends('layouts.master')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
	<div class="row mrg-0 mrg-top-20">
		<div class="tr-single-box">
			<div class="tr-single-header">
				<h3 class="dashboard-title">All Excos</h3>
			</div>
			<div class="tr-single-body">
				<a href="{{route('exco.add')}}" class="btn theme-btn height-50 width-150">New Exco</a><br>
				@include('includes.flash')
				<div class="row">
					@forelse($excos as $exco)
			        <div class="col-md-4">
			            <div class="guides-container">
			            
			                <div class="guides-box">
			                    <div class="guides-img-box">
			                        <img src="{{ asset('public/uploads/excos/' .$exco->image)}}" class="img-responsive" alt="" />
			                    </div>
			                    <div class="guider-detail">
			                        <h4>{{$exco->name}}</h4>
			                        <h5 class="theme-cl font-bold">{{$exco->level}}</h5>
			                        <h5 class="theme-cl font-bold">{{$exco->phone}}</h5>
			                    </div>
			                    <div class="icon-box-icon-block">
									<a href="{{route('exco.edit', $exco->id)}}">
										<div class="icon-box-round">
											<i class="ti-pencil"></i>
										</div>
									</a>
									<a href="{{route('exco.delete', $exco->id)}}" onclick="return confirm('Delete Exco?')">
										<div class="icon-box-round">
											<i class="ti-trash"></i>
										</div>
									</a>
								</div>
			                </div>
			                <a href="#" class="btn theme-btn full-width">{{$exco->position}}</a>
			            
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
			</div>
			
		</div>
	</div>
</section>


@endsection