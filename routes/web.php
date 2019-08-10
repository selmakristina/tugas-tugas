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

Route::post('/', function () {
    return view('home');
	});
	
	Route::get('/about', function () {
    return view('about');
	});
	
	Route::get('/contact', function () {
    return view('contact');
	});
	
	
route ::get('/user','UserController@index');
route ::get('/user/create','UserController@create');
route ::post('/user','UserController@store');
Route::get('/user/{id}/edit','UserController@edit');
Route::patch('/user/{id}','UserController@update');
Route::delete('/user/{id}','UserController@destroy');
Route::get('/admin/{id}','AdminController@edit');
Route::patch('/admin/{id}','AdminController@update');
Route::delete('/admin/{id}', 'AdminController@destroy');




