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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('hi', function(){
	return "Hello";
});

Route::get('req/{id?}', 'WelcomeController@my_req');

Route::get('try/{id?}', 'FrontendController@try_param');

Route::get('blade/{id?}', 'FrontendController@try_blade');

Route::get('db', 'FrontendController@index');

Route::get('db/store', 'FrontendController@store');

Route::get('db/show/{id?}', 'FrontendController@show');

Route::get('db/update/{id?}', 'FrontendController@update');

Route::get('db/destroy', 'FrontendController@destroy');

Route::resource('frontend', 'FrontendController');

Route::resource('category', 'CategoryController');

//Route::get('category', 'CategoryController@index');
//
//Route::get('category/create', 'CategoryController@create');
//
//Route::post('category', 'CategoryController@store');
//
//Route::get('category/{category}', 'CategoryController@show');
//
//Route::get('category/{category}/edit', 'CategoryController@edit');
//
//Route::post('category/{category}', 'CategoryController@update');
//
//Route::get('category/{category}/delete', 'CategoryController@delete');
//
//Route::post('category/{category}/dodelete', 'CategoryController@dodelete');


Route::resource('admin/post', 'admin\PostController');



