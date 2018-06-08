<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		@foreach($books as $book)
		<p>{{$book->title}}</p>
		@endforeach
	</div>
	<div>
		<p>Add:</p>
		<form method="POST" action="{{route('add_book')}}">
			Title: <input type="text" name="title" id="title"><br>
			Description: <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
			<input type="submit"><br>
			{{ csrf_field() }}
		</form>
	</div>
</body>
</html>