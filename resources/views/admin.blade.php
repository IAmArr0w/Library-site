<h1>Welcome to admin panel, {{Auth::user()['name']}}!</h1>
<a href="{{route('main')}}">< < Back to site</a>
<hr>
@if(Auth::user()['role']=='admin')
<h3>Add a book:</h3>
	<form method="POST" action="{{route('add_book')}}" enctype="multipart/form-data">
		<p>Title:</p><input type="text" name="title" id="title"><br>
		<p>Description:</p><textarea name="description" id="description" cols="30" rows="10"></textarea><br>
		<select name="select_type" id="select_type">
			<option value="art">Art</option>
			<option value="scientific">Scientific</option>
		</select>
		<select name="select_kind" id="select_kind">
			<option value="ancient">Ancient</option>
			<option value="middle">Middle</option>
			<option value="renaissance">Renaissance</option>
			<option value="new">New</option>
			<option value="newest">Newest</option>
		</select>
		<p>Author:</p><input type="text" name="author" id="author">
		<p>Price:</p><input type="number" step="any" name="price" id="price">
		<p>Amount in stock:</p><input type="nubmer" name="instock" id="instock">
		<p>Image:</p><input type="file" id="picrel" name="picrel">
		<input type="submit"><br>
		<input type="hidden" id="role" name="role" value="{{Auth::user()['role']}}">
		{{ csrf_field() }}
	</form>
<hr>
<h3>Userlist:</h3>
	@foreach($users as $user)
	<p><a href="{{route('profile', $user->id)}}">{{$user->name}}</a> registered at {{$user->created_at}} | <a href="{{route('delete_user')}}">Delete account</a></p>
	@endforeach
@endif
