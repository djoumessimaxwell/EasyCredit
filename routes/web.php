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
Route::post('membre/create', 'MembreController@store');
Route::post('membre/create_ent', 'MembreController@store_ent');
Route::middleware('auth')->group( function() {
	Route::get('/get-updates', 'TelegramController@getUpdates');
	Route::post('/send-message', 'TelegramController@sendMessage');

	Route::get('/', 'HomeController@index');
	Route::get('/accueil', 'HomeController@accueil');
	Route::get('/comptes', 'CompteController@show');
	Route::get('/credit', 'CompteController@credit');
	Route::post('/credit/simulation', 'CompteController@simuler');
	Route::get('/documentation', 'HomeController@showDoc');
	Route::get('/contact', 'HomeController@contact');
	Route::get('/profile/{id}', 'MembreController@showProfile');
	Route::post('/admin/membre/update/{id}', 'MembreController@update');
	Route::post('/change-password', 'MembreController@passwordChange')->name('change.password');

	Route::get('/marchand/clients', ['uses'=>'MembreController@marchandClients','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/client/view/{id}', ['uses'=>'MembreController@viewClient','middleware'=>'roles', 'roles'=>['Admin','Personnel', 'Marchand']]);
	Route::post('/marchand/client/activer/{id}', ['uses'=>'MembreController@activerClient','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/operations', ['uses'=>'TransactionController@marchandOperations','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::post('/marchand/operation/create', ['uses'=>'TransactionController@storeOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/operations/edit/{id}', ['uses'=>'TransactionController@editOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::post('/marchand/operation/update/{id}', ['uses'=>'TransactionController@updateOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::delete('/marchand/operation/delete/{id}', ['uses'=>'TransactionController@destroyOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);

	Route::get('/admin/messages', ['uses'=>'MessageController@showAll','middleware'=>'roles', 'roles'=>['Admin']]);
	Route::post('/admin/message/create', ['uses'=>'MessageController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/message/delete/{id}', ['uses'=>'MessageController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/membres', ['uses'=>'MembreController@showAll','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/membre/profil/{id}', ['uses'=>'MembreController@showProfileById','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/membre/create', ['uses'=>'MembreController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/membre/create_ent', ['uses'=>'MembreController@store_ent','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/membre/edit/{id}', ['uses'=>'MembreController@edit','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/membre/delete/{id}', ['uses'=>'MembreController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/transactions', ['uses'=>'TransactionController@showAll','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/transaction/create', ['uses'=>'TransactionController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/transactions/edit/{id}', ['uses'=>'TransactionController@edit','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/transaction/update/{id}', ['uses'=>'TransactionController@update','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/transaction/delete/{id}', ['uses'=>'TransactionController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/marchands', ['uses'=>'MembreController@showMarchands','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/autres', ['uses'=>'ProduitController@showAutres','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
});
Auth::routes();

