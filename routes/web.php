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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Posts
Route::get('/', 'PostsController@index')->name('Posts');
Route::get('/p/{community}/{post}', 'PostsController@show');
Route::get('/p/{community}', 'PostsController@index');
Route::get('/create', 'PostsController@create')->name('create_post');
Route::post('/', 'PostsController@store')->name('store_post_method');
Route::get('/p/{community}/{post}/edit', 'PostsController@edit');
Route::patch('/p/{community}/{post}/', 'PostsController@update');
Route::delete('/p/{community}/{post}/delete', 'PostsController@destroy');


// Comments
Route::post('/p/{community}/{post}/comments', 'CommentsController@store');