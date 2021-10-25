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
Route::get('/genres/{genre}', 'GenreController@show');
Route::post('/genres', 'GenreController@store');