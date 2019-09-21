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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'LandingController@index');

Route::get('/register', 'AuthController@index');

Route::post('/register', 'AuthController@register');

Route::get('/login', 'AuthController@showLogin');

Route::post('/login', 'AuthController@login');

Route::any('/logout', 'AuthController@logout');

Route::get('profile', 'LandingController@profile')->name('profile');


Route::group(array('prefix' => 'admin', 'middleware' => 'AuthCheck'), function() {
	Route::any('/catelog', 'AdminController@index');
	Route::any('/books', 'AdminController@create');
	Route::any('/delete-book', 'AdminController@delete');
});

