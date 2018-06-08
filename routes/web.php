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

Auth::routes();

Route::get('/', 'BooksController@getMainPage')->name('main');

Route::get('art', 'BooksController@getBooksListArt')->name('art');

Route::get('scientific', 'BooksController@getMainPage')->name('scientific');

Route::get('book/{id}', 'BooksController@getBooksItem')->name('item');

Route::get('admin', 'BooksController@admin')->middleware('admin')->name('admin');

Route::get('edit/{id}', 'BooksController@editItem')->middleware('admin')->name('edit');

Route::get('profile/{id}', 'HomeController@profilePage')->name('profile');

Route::post('add_book', 'BooksController@addBook')->middleware('permission')->name('add_book');

Route::post('add_comment', 'BooksController@addComment')->name('add_comment');

Route::post('edit_book', 'BooksController@editBook')->middleware('admin')->name('edit_book');

Route::post('order', 'BooksController@orderBook')->name('order');

Route::get('adminn', 'HomeController@deleteUser')->name('delete_user');