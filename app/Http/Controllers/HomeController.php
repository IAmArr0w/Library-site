<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profilePage($id) {
        $comments = Comment::where('user_id', $id)->get();
        $book_rel = array();
        foreach ($comments as $comment) {
            array_push($book_rel, Book::find($comment->book_id));
        }
        return view('profile', ['user'=>User::find($id), 'comments'=>$comments, 'books'=>$book_rel]);
    }

    public function deleteUser() {
        return view('delete_user', ['users'=>User::all()]);
    }
}
