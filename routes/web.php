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
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/', 'PostsController@store');


// Comments
Route::post('/posts/{community}/{post}/comments', 'CommentsController@store');