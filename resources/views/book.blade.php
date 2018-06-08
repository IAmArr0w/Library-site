@extends('layouts.base')

@section('content')
	<div class="book_wrapper">
		<a href="{{route('art')}}" id="back_to_art"> < < Back</a>
		<div class="book_item">
			<h1>"{{$book->title}}"</h1>
			<div class="image_desc">
				<img src="{{asset('upload/'.$book->picrel)}}" alt="">
				<span>{{$book->description}}</span>
			</div>
			<p>Written by <i>{{$book->author}}.</i></p>
			<p>Price: {{substr($book->price, 0, -3)}} UAH.</p>
			@if($book->instock==0)
			<p id="outofstock">Out of stock</p>
			@else
			<p id="instock">In stock</p>
			@endif
		</div>
		@guest
		@else
		<div class="order_wrapper">
			<form action="{{route('order')}}" method="POST">
				<input type="hidden" value="{{Auth::user()['id']}}" name="us_id">
				<input type="hidden" value="{{$book->id}}" name="b_id">
				<button type="submit" name="submit">Order!</button>
				{{ csrf_field() }}
			</form>
		</div>
		@endguest
		<div class="comments">
			@for($i=0; $i<count($comments); $i++)

				<div class="comment_item">
					<span class="commentator">{{$commentators[$i]->name}}:</span>
					<p>{{$comments[$i]->comment}}</p>
					<span class="comment_time">{{$comments[$i]->created_at}}</span>
				</div>
			@endfor
			@if(count($comments)==0)
			<p id="nocomments">No comments yet...</p>
			@endif
			@guest
			@else
			<form action="{{route('add_comment')}}" method="POST">
				<textarea name="new_comment" id="comment_form"></textarea><br>
				<input type="submit">
				<input type="hidden" id="user" name="user" value="{{Auth::user()['id']}}">
				<input type="hidden" id="book" name="book"  value="{{$book->id}}">
				{{ csrf_field() }}
			</form>
			@endguest
		</div>
	</div>
@endsection