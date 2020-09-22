<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('operations', 'OperationController');

Route::resource('typeoperations', 'TypeoperationController');

Route::resource('clients', 'ClientController');

Route::resource('typeclients', 'TypeclientController');

Route::resource('comptes', 'CompteController');

Route::resource('typecomptes', 'TypecompteController');