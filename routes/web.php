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
Route::post('/membrePart/create', 'MembreController@storePart');
Route::post('/membreEnt/create', 'MembreController@storeEnt');
Route::post('/membre/modalValidation', 'MembreController@modalValidation');
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
	Route::post('/admin/membrePart/update/{id}', 'MembreController@updatePart');
	Route::post('/admin/membreEnt/update/{id}', 'MembreController@updateEnt');
	Route::post('/change-password', 'MembreController@passwordChange')->name('change.password');
	Route::post('/message/create', 'MessageController@store');

	Route::get('/marchand/clientsPart', ['uses'=>'MembreController@showClients_Part','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/clientsEnt', ['uses'=>'MembreController@showClients_Ent','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/client/view/{id}', ['uses'=>'MembreController@viewClient','middleware'=>'roles', 'roles'=>['Admin','Personnel', 'Marchand']]);
	Route::get('/marchand/client_ent/view/{id}', ['uses'=>'MembreController@viewClient_ent','middleware'=>'roles', 'roles'=>['Admin','Personnel', 'Marchand']]);
	Route::post('/marchand/client/activer/{id}', ['uses'=>'MembreController@activerClient','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::post('/marchand/client_ent/activer/{id}', ['uses'=>'MembreController@activerClient_ent','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/operations', ['uses'=>'TransactionController@marchandOperations','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/operation/{id}', ['uses'=>'TransactionController@effectuerOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/operation/verification', ['uses'=>'TransactionController@verifyOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/operation/sendMessage', ['uses'=>'TransactionController@sendMessage','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/operation/confirmCode', ['uses'=>'TransactionController@confirmCode','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::post('/marchand/operation/create/{id}', ['uses'=>'TransactionController@storeOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::get('/marchand/operation/edit/{id}', ['uses'=>'TransactionController@editOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::post('/marchand/operation/update/{id}', ['uses'=>'TransactionController@updateOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);
	Route::delete('/marchand/operation/delete/{id}', ['uses'=>'TransactionController@destroyOperation','middleware'=>'roles', 'roles'=>['Admin','Personnel','Marchand']]);

	Route::get('/admin/messages', ['uses'=>'MessageController@showAll','middleware'=>'roles', 'roles'=>['Admin']]);
	Route::delete('/admin/message/delete/{id}', ['uses'=>'MessageController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/autres', ['uses'=>'ProduitController@showAutres','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/produit/create', ['uses'=>'ProduitController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/produit/edit/{id}', ['uses'=>'ProduitController@edit','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/produit/update/{id}', ['uses'=>'ProduitController@update','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/produit/delete/{id}', ['uses'=>'ProduitController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/guichet/create', ['uses'=>'GuichetController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/guichet/edit/{id}', ['uses'=>'GuichetController@edit','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/guichet/update/{id}', ['uses'=>'GuichetController@update','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/guichet/delete/{id}', ['uses'=>'GuichetController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/membresPart', ['uses'=>'MembreController@showAll_part','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/membresEnt', ['uses'=>'MembreController@showAll_ent','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/membrePart/create', ['uses'=>'MembreController@storePart','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/membreEnt/create', ['uses'=>'MembreController@storeEnt','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/membrePart/edit/{id}', ['uses'=>'MembreController@editPart','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/membreEnt/edit/{id}', ['uses'=>'MembreController@editEnt','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/membrePart/delete/{id}', ['uses'=>'MembreController@destroyPart','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/membreEnt/delete/{id}', ['uses'=>'MembreController@destroyEnt','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/marchands', ['uses'=>'MembreController@showMarchands','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/marchand/profil/{id}', ['uses'=>'MembreController@showMarchandById','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/marchand/search', ['uses'=>'MembreController@searchMarchand','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/marchand/create', ['uses'=>'MembreController@storeMarchand','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/marchand/edit/{id}', ['uses'=>'MembreController@editMarchand','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/marchand/update/{id}', ['uses'=>'MembreController@updateMarchand','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/marchand/delete/{id}', ['uses'=>'MembreController@destroyMarchand','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

	Route::get('/admin/transactions', ['uses'=>'TransactionController@showAll','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/transaction/create', ['uses'=>'TransactionController@store','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::get('/admin/transactions/edit/{id}', ['uses'=>'TransactionController@edit','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::post('/admin/transaction/update/{id}', ['uses'=>'TransactionController@update','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);
	Route::delete('/admin/transaction/delete/{id}', ['uses'=>'TransactionController@destroy','middleware'=>'roles', 'roles'=>['Admin','Personnel']]);

});
Auth::routes();

