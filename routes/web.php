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
//     return view('viewBlogs');
// });

Route::get('/', 'PostController@index')->name('post');

Route::post('newPost', 'PostController@newPost')->name('newPost')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::post('/store', 'PostController@store')->name('store')->middleware('auth');

