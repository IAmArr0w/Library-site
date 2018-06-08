<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function getBooksList() {
    	$books = Book::all();
    	return view('main', ['books'=>$books]);
    }

    public function addBook(Request $request) {
    	$book = new Book;
    	if($request->method()=='POST') {
    		$book->fill(array(
    			'title' => $request['title'],
    			'description' => $request['description'],
    		));
    		$book->save();
    	}
    	return view('add_success');
    }
}
