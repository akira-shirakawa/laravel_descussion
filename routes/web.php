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
Route::get('/','ArticleController@index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); 
Route::resource('/articles', 'ArticleController')->only(['show']); 
Route::resource('/comments', 'CommentController')->except(['index','show'])->middleware('auth');
// Route::resource('/comments', 'CommentController')->only(['show']);
Route::post('/vote','ArticleController@vote')->name('vote')->middleware('auth');
Route::get('/vote/{article}','ArticleController@getVote')->name('getVote');
Route::get('/hasMyVote/{article}','ArticleController@hasMyVote')->name('hasMyVote');
Route::post('/like','CommentController@like')->name('like')->middleware('auth');
Route::get('/category/{id}','ArticleController@category')->name('category');