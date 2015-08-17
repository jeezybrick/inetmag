<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$min = App\Notebook::min('price'); 
     $max = App\Notebook::max('price'); 
     return view('index', compact('min','max'));
});

Route::get('notebooks', 'NotebooksController@index');
Route::get('notebooks/sort', 'NotebooksController@sort');
Route::get('notebooks/sortM/{id}', 'NotebooksController@sortM');
Route::get('notebooks/search', 'NotebooksController@search');
Route::get('notebooks/create', 'NotebooksController@create');
Route::get('notebooks/store', 'NotebooksController@store');
Route::post('notebooks', 'NotebooksController@store');
Route::get('notebooks/{id}/show', 'NotebooksController@show');
Route::get('notebooks/{id}/characteristics', 'NotebooksController@characteristics');


Route::get('user', 'UserController@index');


Route::get('notebooks/{id}/comments', 'CommentsController@index');
Route::get('notebooks/{id}/comments/add', 'CommentsController@create');
Route::post('notebooks/{id}/comments', 'CommentsController@store');
Route::get('notebooks/comments/{id}/add_reply', 'CommentsController@addReply');
/*
Route::post('notebooks/{id}/comments', function () {
   return App\Comment::create(Request::all());
});*/

Route::get('cart', 'CartController@index');
Route::post('cart/add/{id}', 'CartController@store');
Route::get('cart/remove_product/{id}', 'CartController@delete');


Route::get('test',  function () {
     return view('notebooks.test');
});

Route::get('guestbook',  function () {
     return view('guestbook');
});

Route::get('guestbook/api', function () {
    return App\Guestbook::all();
});
Route::post('guestbook/api', function () {
     App\Guestbook::create(Request::all());
    return App\Guestbook::all();
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

