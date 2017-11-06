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

Route::get('contact','PagesController@getContact');
Route::post('postcontact','PagesController@postContact');
Route::get('about','PagesController@getAbout');
Route::get('/','PagesController@getIndex');
Route::resource('posts','PostController');

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
