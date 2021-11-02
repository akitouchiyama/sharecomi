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

Route::get('/comics', 'ComicController@index');
Route::get('/comics/create', 'ComicController@create');
Route::get('/comics/{comic}/edit', 'ComicController@edit');
Route::put('/comics/{comic}', 'ComicController@update');
Route::delete('/comics/{comic}', 'ComicController@destroy');
Route::get('/comics/{comic}', 'ComicController@show');
Route::post('/comics', 'ComicController@store');

Route::get('/', 'ReviewController@index');
Route::get('/reviews/create/{comic}', 'ReviewController@create');
Route::get('/reviews/{review}/edit', 'ReviewController@edit');
Route::put('/reviews/{review}', 'ReviewController@update');
Route::delete('/reviews/{review}', 'ReviewController@destroy');
Route::get('/reviews/{review}', 'ReviewController@show');
Route::post('/reviews', 'ReviewController@store');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/create', 'GenreController@create');
Route::get('/genres/{genre}/edit', 'GenreController@edit');
Route::put('/genres/{genre}', 'GenreController@update');
Route::delete('/genres/{genre}', 'GenreController@destroy');
Route::get('/genres/{genre}', 'GenreController@show');
Route::post('/genres', 'GenreController@store');

Route::get('/tags', 'TagController@index');
Route::get('/tags/create', 'TagController@create');
Route::get('/tags/{tag}/edit', 'TagController@edit');
Route::put('/tags/{tag}', 'TagController@update');
Route::delete('/tags/{tag}', 'TagController@destroy');
Route::get('/tags/{tag}', 'TagController@show');
Route::post('/tags', 'TagController@store');

Route::get('/comments/{comment}', 'CommentController@show');
Route::get('/comments/create/{review}', 'CommentController@create');
Route::get('/comments/{comment}/edit', 'CommentController@edit');
Route::put('/comments/{comment}', 'CommentController@update');
Route::post('/comments', 'CommentController@store');