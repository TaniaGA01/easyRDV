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
Route::get('/json','HomeController@tableau_1');
Route::get('/json-loc','HomeController@tableau_2');
Route::get('/json-pros','HomeController@tableau_3');
Route::post('/','HomeController@search')->name('search');
Route::post('/pros','HomeController@searchPro')->name('searchPro');
Route::get('/liste-des-professionnels/{page}/{field}/{city}','HomeController@index')->name('index');

// Page espace pro
Route::get('/professionnels/{profession}/{city}/{first_name}_{last_name}','HomeController@show')->name('show');
Route::post('/professionnels/{profession}/{city}/{first_name}_{last_name}','EspaceProController@storeRdv')->name('espacePro.storeRdv')->middleware('verified');
Route::post('/professionnels/{profession}/{city}/{first_name}_{last_name}/delete','EspaceProController@deleteRdv')->name('espacePro.deleteRdv')->middleware('verified');

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

Route::get('mes-rendez-vous-client/{id}','ClientAreaController@index')->where('id','[0-9]+')->name('clientArea.index')->middleware('verified');

Route::get('mes-informations-client/{id}/editer','ClientAreaController@edit')->where('id','[0-9]+')->name('clientArea.edit')->middleware('verified');
Route::put('mes-informations-client/{id}','ClientAreaController@update')->where('id','[0-9]+')->name('clientArea.update')->middleware('verified');

// Espace Professionnel
Route::get('mon-agenda/{id}/agenda','ProfessionalAreaController@indexAgenda')->where('id','[0-9]+')->name('professionnelArea.indexAgenda')->middleware('verified');
// Route formulaire creation rdv perso ???
Route::post('mon-agenda/{id}/agenda','ProfessionalAreaController@storeRdv')->where('id','[0-9]+')->name('professionnelArea.storeRdv')->middleware('verified');
Route::post('mon-agenda/{id}/agenda/delete','ProfessionalAreaController@deleteRdv')->where('id','[0-9]+')->name('professionnelArea.deleteRdv')->middleware('verified');
Route::post('mon-agenda/{id}/agenda/update','ProfessionalAreaController@updateRdv')->where('id','[0-9]+')->name('professionnelArea.updateRdv')->middleware('verified');

Route::get('mes-rendez-vous/{id}','ProfessionalAreaController@indexAppointment')->where('id','[0-9]+')->name('professionnelArea.indexAppointment')->middleware('verified');
Route::post('mes-rendez-vous/{id}/delete','ProfessionalAreaController@deleteAppointment')->where('id','[0-9]+')->name('professionnelArea.deleteAppointment')->middleware('verified');
Route::post('mes-rendez-vous/{id}/update','ProfessionalAreaController@updateAppointment')->where('id','[0-9]+')->name('professionnelArea.updateAppointment')->middleware('verified');

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

// Auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

//#######################################################
// Avatar Profile

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
