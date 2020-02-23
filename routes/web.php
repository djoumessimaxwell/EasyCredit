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
Route::middleware('auth')->group( function() {
	Route::get('/', 'HomeController@index');
	Route::get('/crédit', 'CompteController@show');
	Route::get('/documentation', 'HomeController@showDoc');
	Route::get('/contact', 'HomeController@contact');
	Route::get('/profil', 'MembreController@showProfile');

	Route::get('/admin/messages', ['uses'=>'MessageController@showAll','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::post('/admin/message/create', ['uses'=>'MessageController@store','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::delete('/admin/message/delete/{vol}', ['uses'=>'MessageController@destroy','middleware'=>'roles', 'roles'=>['Admin','Staff']]);

	Route::get('/admin/membres', ['uses'=>'MembreController@showAll','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::get('/admin/membres/profil/{id}', ['uses'=>'MembreController@showProfileById','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::post('/admin/membre/create', ['uses'=>'MembreController@store','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::post('/admin/membre/update/{vol}', ['uses'=>'MembreController@update','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::delete('/admin/membre/delete/{vol}', ['uses'=>'MembreController@destroy','middleware'=>'roles', 'roles'=>['Admin','Staff']]);

	Route::get('/admin/transactions', ['uses'=>'TransactionController@showAll','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::post('/admin/transaction/create', ['uses'=>'TransactionController@store','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::post('/admin/transaction/update/{reserve}', ['uses'=>'TransactionController@update','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
	Route::delete('/admin/transaction/delete/{reserve}', ['uses'=>'TransactionController@destroy','middleware'=>'roles', 'roles'=>['Admin','Staff']]);
});
Auth::routes();

