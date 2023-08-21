@extends('layouts.app')

@section('content')


	<section>
		<div class="container">
			<div class="error-page padd-top-30 padd-bot-30">
				<h1 class="mrg-top-15 mrg-bot-0 theme-cl font-250 font-bold">
                    <img src="{{asset('public/images/main.png')}}">            
                </h1>
				<h2 class="mrg-top-10 mrg-bot-5 funky-font font-60">Under Maintenance</h2>
				<p>This website is currently under maintence, try again in a few minutes</p>
			</div>
		</div>
	</section>

@endsection
