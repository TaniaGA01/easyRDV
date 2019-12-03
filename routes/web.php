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

// Page d'accueil/recherche
Route::view('/','welcome');
Route::post('/','HomeController@searchPro')->name('searchpro');
Route::get('/liste-des-professionnels/{page}/{field}/{city}','HomeController@index')->name('index');
Route::get('/{name}/{city}/{profession}','HomeController@show')->name('show');

// Page "A propos"
Route::get('/a-propos', 'AboutController@index')->name('about');

// Page "Tarif"
Route::get('/tarifs', 'PriceController@index')->name('price');

// Page "Nous contacter"
Route::get('nous-contacter','ContactController@create')->name('contact.create');
Route::post('nous-contacter','ContactController@store')->name('contact.store');

// Page "Je suis un professionnel"
Route::get('je-suis-un-professionnel','ProfessionalController@create')->name('professional.create');
Route::post('je-suis-un-professionnel','ProfessionalController@store')->name('professional.store');

// Page "Se connecter/S'inscrire" Javier
Route::get('connexion-inscription','LoginController@create')->name('login');
Route::post('connexion','LoginController@store')->name('login.store');

Route::post('inscription','InscriptionController@store')->name('inscription.store');

// Page "Information légales"
Route::get('/information-legales', 'LegalController@index')->name('legal.index');


// Espace client
// Route page d'accueil ???

Route::get('mes-rendez-vous/{name}','ClientController@index')->name('client.index');

Route::get('mes-informations/{name}/editer','ClientController@edit')->name('client.edit');
Route::put('mes-informations/{name}','ClientController@update')->name('client.update');

// Espace Professionnel
Route::get('mon-agenda/{name}','ProfessionnelController@indexAgenda')->name('professionnel.indexAgenda');
// Route formulaire creation rdv perso ???
Route::post('mon-agenda/{name}','ProfessionnelController@store')->name('professionnel.store');

Route::get('mes-rendez-vous/{name}','ProfessionnelController@indexAppointment')->name('professionnel.indexAppointment');

Route::get('mes-informations/{name}/editer','ProfessionnelController@edit')->name('professionnel.edit');
Route::put('mes-informations/{name}','ProfessionnelController@update')->name('professionnel.update');




//#######################################################

// Login
Route::get('login2','LoginController@create');
Route::post('login2','LoginController@store');

// Inscription
Route::post('login/new','LoginController@storeNew');
Route::get('user','LoginController@createNew');

// Route Temporaire : test de David
Route::get('tempo','TemporaireSearch@search');
Route::get('tempo/json','TemporaireSearch@tableau');
Route::get('tempo/{name}','TemporaireSearch@results')->name('results');

// Auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
