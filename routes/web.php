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
//PagesController custom route
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('about','PagesController@getAbout');


Route::get('blogs/{slug}', ['as' => 'blogs.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
//Route::get('blog/{id}', ['as' => 'blogs.single', 'uses' => 'BlogController@getSingle']);
Route::get('blogs', ['uses' => 'BlogController@getIndex', 'as' => 'blogs.index']);

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);//create method bad dewa hoyche
// Route::apiResources([
//  'categories' => 'CategoryController',
//  'tags' => 'TagController'
// ]);


// Route::get('/', function () {
//     return view('welcome');
// });

// Comments
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

  Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//if controller name an user  name is not same we must use name() function to tell
// which controller we want to use
Route::get('users/{id}/posts','UserPostController@index')->name('userposts');
Route::resource('posts','PostController');

Route::get('/','PagesController@getIndex');
