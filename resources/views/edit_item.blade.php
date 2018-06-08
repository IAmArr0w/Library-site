@extends('layouts.base')

@section('content')
@if(Auth::user()['role']=='admin')
	<div id="edit_wrapper">
		<a href="{{route('art')}}" id="back_to_art"> < < Back</a>
		<h3>Editing <span id="book_title">{{$book->title}}</span></h3>
		<form action="{{route('edit_book')}}" method="POST" style="margin-top: 25px;">
			Title: <input type="text" value="{{$book->title}}" name="title"><br><br>
			Description: <input type="text" value="{{$book->title}}" name="description"><br><br>
			<select name="select_type" id="select_type">
				<option value="art">Art</option>
				<option value="scientific">Scientific</option>
			</select><br><br>
			<select name="select_kind" id="select_kind">
				<option value="ancient">Ancient</option>
				<option value="middle">Middle</option>
				<option value="renaissance">Renaissance</option>
				<option value="new">New</option>
				<option value="newest">Newest</option>
			</select><br><br>
			Author: <input type="text" name="author" value="{{$book->author}}"><br><br>
			Price: <input type="number" step="any" name="price" value="{{$book->price}}"><br><br>
			Amount in stock: <input type="nubmer" name="instock" value="{{$book->instock}}"><br><br>
			Image: <input type="file" id="picrel" name="picrel"><br><br>
			<input type="hidden" name="id" value="{{$book->id}}">
			<input type="submit" onclick="editConfirm(document.getElementById('book_title').innerText)">
			{{ csrf_field() }}
		</form>
	</div>
@endif
@endsection