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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Posts
Route::get('/posts', 'PostsController@index')->name('Posts');
Route::get('/posts/{community}/{post}', 'PostsController@show');
Route::get('/posts/{community}', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create')->name('create_post');
Route::post('/posts/', 'PostsController@store');
Route::get('/posts/{community}/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{community}/{post}/', 'PostsController@update');
Route::delete('/posts/{community}/{post}/delete', 'PostsController@destroy');


// Comments
Route::post('/posts/{community}/{post}/comments', 'CommentsController@store');