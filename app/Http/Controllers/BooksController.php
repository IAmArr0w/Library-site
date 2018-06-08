<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Comment;
use App\User;
use App\Order;
use Intervention\Image\Facades\Image as ImageInt;

class BooksController extends Controller
{
	public function getMainPage() {
		return view('main');
	}

	public function admin() {
		return view('admin', ['users'=>User::all()]);
	}

    public function getBooksListArt() {
    	$books = Book::where('type', 'art')->get();
    	return view('art', ['books'=>$books]);
    }

    public function getBooksItem($id) {
    	$comments = Comment::where('book_id', $id)->get();
    	$commentators = array();
    	foreach ($comments as $comment) {
    		array_push($commentators, User::find($comment->user_id));
    	}
    	return view('book', ['book'=>Book::find($id), 'comments'=>$comments, 'commentators'=>$commentators]);
    }

    public function editItem($id) {
    	return view('edit_item', ['book'=>Book::find($id)]);
    }

    public function editBook(Request $request) {
    	$book = Book::find($request['id']);

   		if($request->file('picrel')) {
   			$path = public_path()."\upload\\";
			$file = $request->file('picrel');
			$filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
			$img = ImageInt::make($file);
			$img->resize(200,200)->save($path . $filename);
			$book->update(array(
	       			'title' => $request['title'],
	    			'description' => $request['description'],
	    			'type' => $request['select_type'],
	    			'kind' => $request['select_kind'],
	    			'author' => $request['author'],
	    			'price' => $request['price'],
	    			'instock' => $request['instock'],
	    			'picrel' => "$filename",
	    		));
		}
    	else {
    		$book->update(array(
	       			'title' => $request['title'],
	    			'description' => $request['description'],
	    			'type' => $request['select_type'],
	    			'kind' => $request['select_kind'],
	    			'author' => $request['author'],
	    			'price' => $request['price'],
	    			'instock' => $request['instock'],
	    		));
    	}
    	return redirect()->route($request['select_type']); 
    }
 
    public function addBook(Request $request) {
    	$book = new Book;

    	if($request->method()=='POST') {
    		$path = public_path()."\upload\\";
    		$file = $request->file('picrel');
    		$filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
    		$img = ImageInt::make($file);
    		$img->resize(200,200)->save($path . $filename);

    		$book->fill(array(
       			'title' => $request['title'],
    			'description' => $request['description'],
    			'type' => $request['select_type'],
    			'kind' => $request['select_kind'],
    			'author' => $request['author'],
    			'price' => $request['price'],
    			'instock' => $request['instock'],
    			'picrel' => "$filename",
    		));
    		$book->save();
    	}
    	return redirect()->route('main');
    }

    public function addComment(Request $request) {
    	$comment = new Comment;
    	if($request->method()=='POST') {
    		$comment->fill(array(
    			'book_id' => $request['book'],
    			'user_id' => $request['user'],
    			'comment' => $request['new_comment'],
    		));
    		$comment->save();
    	}
    	return redirect()->route('item', $request['book']);
    }

    public function orderBook(Request $request) {
    	$order = new Order;
    	if($request->method()=='POST') {
    		$order->fill(array(
    			'book_id' => $request['b_id'],
    			'user_id' => $request['us_id'],
    		));
    		$order->save();
    	}
    	return redirect()->route('main');
    }
}
