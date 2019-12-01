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

Route::get('/', function () {
    return view('welcome');
});


// Contact
Route::get('contact','ContactController@create');
Route::post('contact','ContactController@store');

// Login
Route::get('login','LoginController@create');
Route::post('login','LoginController@store');

// Inscription
Route::post('login/new','LoginController@storeNew');
Route::get('user','LoginController@createNew');

// Route Temporaire : test de David
Route::get('tempo','TemporaireSearch@search');
Route::get('tempo/json','TemporaireSearch@tableau');

// Auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');