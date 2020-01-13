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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produits', 'ProductController@show')->name('produits.show');
Route::get('/produits/add', 'ProductController@add')->name('produits.add');
Route::post('/produits', 'ProductController@insert')->name('produits.insert');
Route::get('/produits/edite/{produit}', 'ProductController@edite')->name('produits.edit');
Route::get('/produits/delete/{produit}', 'ProductController@delete')->name('produits.delete');
Route::post('/produits/{produit}', 'ProductController@update')->name('produits.update');

Route::get('/clients', 'ClientController@show')->name('clients.show');
Route::get('/clients/add', 'ClientController@add')->name('clients.add');
Route::post('/clients', 'ClientController@insert')->name('clients.insert');
Route::get('/clients/edite/{client}', 'ClientController@edite')->name('clients.edit');
Route::get('/clients/delete/{client}', 'ClientController@delete')->name('clients.delete');
Route::post('/clients/{client}', 'ClientController@update')->name('clients.update');

Route::post('/clients/contacts/add', 'ContactsController@addcontact')->name('clients.contacts.add');
Route::post('/clients/contacts/update', 'ContactsController@updatecontact')->name('clients.contacts.update');
Route::get('/clients/contacts/delete/{id}', 'ContactsController@deletecontact')->name('clients.contacts.delete');
Route::post('/clients/contacts/get', 'ContactsController@getcontact')->name('clients.contacts.get');

Route::post('/clients/adresses/add', 'AdressesController@addadresse')->name('clients.adresses.add');
Route::post('/clients/adresses/update', 'AdressesController@updateadresse')->name('clients.adresses.update');
Route::get('/clients/adresses/delete/{id}', 'AdressesController@deleteadresse')->name('clients.adresses.delete');
Route::post('/clients/adresses/get', 'AdressesController@getadresse')->name('clients.adresses.get');


//fournisseurs 
Route::get('/fournisseurs', 'FournisseurController@show')->name('fournisseurs.show');
Route::get('/fournisseurs/add', 'FournisseurController@add')->name('fournisseurs.add');
Route::post('/fournisseurs', 'FournisseurController@insert')->name('fournisseurs.insert');
Route::get('/fournisseurs/edite/{fournisseur}', 'FournisseurController@edite')->name('fournisseurs.edit');
Route::get('/fournisseurs/delete/{fournisseur}', 'FournisseurController@delete')->name('fournisseurs.delete');
Route::post('/fournisseurs/{fournisseur}', 'FournisseurController@update')->name('fournisseurs.update');

Route::post('/fournisseurs/contacts/add', 'ContactsController@addcontact')->name('fournisseurs.contacts.add');
Route::post('/fournisseurs/contacts/update', 'ContactsController@updatecontact')->name('fournisseurs.contacts.update');
Route::get('/fournisseurs/contacts/delete/{id}', 'ContactsController@deletecontact')->name('fournisseurs.contacts.delete');
Route::post('/fournisseurs/contacts/get', 'ContactsController@getcontact')->name('fournisseurs.contacts.get');

Route::post('/fournisseurs/adresses/add', 'AdressesController@addadresse')->name('fournisseurs.adresses.add');
Route::post('/fournisseurs/adresses/update', 'AdressesController@updateadresse')->name('fournisseurs.adresses.update');
Route::get('/fournisseurs/adresses/delete/{id}', 'AdressesController@deleteadresse')->name('fournisseurs.adresses.delete');
Route::post('/fournisseurs/adresses/get', 'AdressesController@getadresse')->name('fournisseurs.adresses.get');