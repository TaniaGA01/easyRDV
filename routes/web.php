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
Route::get('/professionnels/{profession}/{city}/{first_name}-{last_name}','HomeController@show')->name('show');
Route::get('/liste-des-professionnels/{page}/{field}/{city}','HomeController@index')->name('index');


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
Route::get('/informations-legales', 'LegalController@index')->name('legal.index');


// Espace client
// Route page d'accueil ???

Route::get('mes-rendez-vous/{id}','ClientAreaController@index')->where('id','[0-9]+')->name('clientArea.index');

Route::get('mes-informations/{id}/editer','ClientAreaController@edit')->where('id','[0-9]+')->name('clientArea.edit');
Route::put('mes-informations/{id}','ClientAreaController@update')->where('id','[0-9]+')->name('clientArea.update');

// Espace Professionnel
Route::get('mon-agenda/{id}','ProfessionalAreaController@indexAgenda')->where('id','[0-9]+')->name('professionnelArea.indexAgenda')->middleware('verified');
// Route formulaire creation rdv perso ???
Route::post('mon-agenda/{id}/send','ProfessionalAreaController@store')->where('id','[0-9]+')->name('professionnelArea.store')->middleware('verified');

Route::get('mes-rendez-vous/{id}','ProfessionalAreaController@indexAppointment')->where('id','[0-9]+')->name('professionnelArea.indexAppointment')->middleware('verified');

Route::get('mes-informations/{id}/editer','ProfessionalAreaController@edit')->where('id','[0-9]+')->name('professionnelArea.edit')->middleware('verified');
Route::put('mes-informations/{id}','ProfessionalAreaController@update')->where('id','[0-9]+')->name('professionnelArea.update')->middleware('verified');




//#######################################################

// Login
Route::get('login2','LoginController@create');
Route::post('login2','LoginController@store');

// Inscription
Route::post('login/new','LoginController@storeNew');
Route::get('user','LoginController@createNew');

//#######################################################
// Déconnection
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route informations personnelles
Route::get('/informations-personnelles', 'UserInfoController@create')->name('userInformations.create');
Route::post('/informations-personnelles', 'UserInfoController@store')->name('userInformations.store');


// Route Temporaire : test de David
Route::get('tempo','TemporaireSearch@search');
Route::get('tempo/json','TemporaireSearch@tableau_1');
Route::get('tempo/json-loc','TemporaireSearch@tableau_2');
Route::get('tempo/json-pros','TemporaireSearch@tableau_3');
Route::post('tempo','TemporaireSearch@results')->name('results');

// Auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
