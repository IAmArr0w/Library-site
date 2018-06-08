@extends('layouts.base')

@section('content')
<div id="list_wrapper">
	<div class="profile">
		<h1>Welcome to profile page, {{$user->name}}!</h1><hr>
		<h3>Info:</h3>
		<div class="info">
			<p>Name: {{$user->name}}</p>
			<p>Registarion date: {{$user->created_at}}</p>
		</div><hr>
		<h3>Comments you've left:</h3>
		@for($i=0; $i<count($comments); $i++)
		<span><i><a href="{{route('item', $books[$i]->id)}}" id="navbarDropdown">"{{$books[$i]->title}}"</a></i>:</span>
		<p>{{$comments[$i]->comment}}</p>
		<p style="font-size: 0.8em; margin-bottom: 40px;">{{$comments[$i]->created_at}}</p>
		@endfor
	</div>
</div>
@endsection