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

	Route::get('/', 'VolController@showAll');
	Route::get('/compte', 'VolController@showAll');
	Route::get('/documentation', 'VolController@showAll');
	Route::get('/contact', 'VolController@showAll');
	Route::get('/admin/membres', 'VolController@showAll');
	Route::get('/admin/transactions', 'VolController@showAll');
	Route::get('/admin/messages', 'VolController@showAll');

	Route::post('/vol/create', 'VolController@store');
	Route::post('/vol/update/{vol}', 'VolController@update');
	Route::delete('/vol/delete/{vol}', 'VolController@destroy');

	Route::post('/reservation/create', 'ReservationController@store');
	Route::post('/reservation/update/{reserve}', 'ReservationController@update');
	Route::delete('/reservation/delete/{reserve}', 'ReservationController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
