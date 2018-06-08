@extends('layouts.base')

@section('content')
	<div id="list_wrapper">
		<span class="kind">Ancient literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'ancient')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>@if(Auth::user()['role']=='admin') | <a href="{{route('edit', $book->id)}}">Edit</a> @endif
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Middle Ages literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'middle')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>@if(Auth::user()['role']=='admin') | <a href="{{route('edit', $book->id)}}">Edit</a> @endif
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Renaissance literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'renaissance')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>@if(Auth::user()['role']=='admin') | <a href="{{route('edit', $book->id)}}">Edit</a> @endif
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">New literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'new')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>@if(Auth::user()['role']=='admin') | <a href="{{route('edit', $book->id)}}">Edit</a> @endif
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Newest literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'newest')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>@if(Auth::user()['role']=='admin') | <a href="{{route('edit', $book->id)}}">Edit</a> @endif
					</p>
				@endif
			@endforeach
		</div>
	</div>
@endsection