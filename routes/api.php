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

Route::get('carros/{id?}', 'CarroController@getCarros');
Route::post('carros', 'CarroController@createCarro');
Route::put('carros/{id}', 'CarroController@updateCarro');
Route::delete('carros/{id}', 'CarroController@deleteCarro');