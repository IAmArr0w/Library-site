<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//comit
Auth::routes();

Route::get('/', 'BooksController@getMainPage')->name('main');

Route::get('art', 'BooksController@getBooksListArt')->name('art');

Route::get('scientific', 'BooksController@getMainPage')->name('scientific');

Route::get('book/{id}', 'BooksController@getBooksItem')->name('item');

Route::post('add_book', 'BooksController@addBook')->middleware('permission')->name('add_book');

Route::post('add_comment', 'BooksController@addComment')->name('add_comment');
