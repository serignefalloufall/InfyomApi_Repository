<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('operations', 'OperationAPIController');

Route::resource('typeoperations', 'TypeoperationAPIController');

Route::resource('typecomptes', 'TypecompteAPIController');

Route::resource('comptes', 'CompteAPIController');

Route::get('showOp/{id}', 'OperationAPIController@showOp');

Route::get('showSoldeByNum/{num_compte}', 'CompteAPIController@showSoldeByNum');

Route::get('showAllOperation/{num_compte}', 'CompteAPIController@showAllOperation');