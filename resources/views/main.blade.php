@extends('layouts.base')

@section('content')
	<div id="main_categories">
		<div class="category">
			<a href="{{ route('art') }}">
				<img src="{{ asset('images/art_pen.png') }}" alt="">
				<span>Art literature</span>
			</a>
		</div>
		<div class="category">
			<a href="#">
				<img src="{{ asset('images/square_hat.png') }}" alt="">
				<span id="right_category">Scientific literature</span>
			</a>
		</div>
	</div>
@endsection