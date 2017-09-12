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
// Route native du framework
Route::get('/', function () { return view('welcome'); });

// Route pour l'inventaire
Route::resource('/game', 'GameController');
Route::get('/game/{id}/delete', 'GameController@destroy')->middleware('admin');

// Routes pour l'authentification
Auth::routes();
Route::get('/home', 'HomeController@index');
