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

Route::prefix('produits')->group(function () {
    Route::get('/', 'ProductController@show')->name('produits.show');
    Route::get('/add', 'ProductController@add')->name('produits.add');
    Route::post('/', 'ProductController@insert')->name('produits.insert');
    Route::get('/edite/{produit}', 'ProductController@edite')->name('produits.edit');
    Route::get('/delete/{produit}', 'ProductController@delete')->name('produits.delete');
    Route::post('/{produit}', 'ProductController@update')->name('produits.update');
});

Route::prefix('clients')->group(function () {
    Route::get('/', 'ClientController@show')->name('clients.show');
    Route::get('/add', 'ClientController@add')->name('clients.add');
    Route::post('/', 'ClientController@insert')->name('clients.insert');
    Route::get('/edite/{client}', 'ClientController@edite')->name('clients.edit');
    Route::get('/delete/{client}', 'ClientController@delete')->name('clients.delete');
    Route::post('/{client}', 'ClientController@update')->name('clients.update');
});
Route::prefix('contacts')->group(function (){
    Route::post('/')->name('contacts');
    Route::post('/add', 'ContactsController@addcontact')->name('contacts.add');
    Route::post('/update', 'ContactsController@updatecontact')->name('contacts.update');
    Route::get('/delete/{id}', 'ContactsController@deletecontact')->name('contacts.delete');
    Route::post('/get', 'ContactsController@getcontact')->name('contacts.get');
});
Route::prefix('adresses')->group(function () {
    Route::post('/')->name('adresses');
    Route::post('/add', 'AdressesController@addadresse')->name('adresses.add');
    Route::post('/update', 'AdressesController@updateadresse')->name('adresses.update');
    Route::get('/delete/{id}', 'AdressesController@deleteadresse')->name('adresses.delete');
    Route::post('/get', 'AdressesController@getadresse')->name('adresses.get');
});
//fournisseurs
Route::prefix('fournisseurs')->group(function () {
    Route::get('/', 'FournisseurController@show')->name('fournisseurs.show');
    Route::get('/add', 'FournisseurController@add')->name('fournisseurs.add');
    Route::post('/', 'FournisseurController@insert')->name('fournisseurs.insert');
    Route::get('/edite/{fournisseur}', 'FournisseurController@edite')->name('fournisseurs.edit');
    Route::get('/delete/{fournisseur}', 'FournisseurController@delete')->name('fournisseurs.delete');
    Route::post('/{fournisseur}', 'FournisseurController@update')->name('fournisseurs.update');
});

//factures
Route::get('/factures', 'FactureController@index')->name('factures.show');