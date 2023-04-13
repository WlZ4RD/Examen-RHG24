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

Route::resource('/contrato', 'ContratoController')->names('contrato');
Route::get('/search', 'ContratoController@search')->name('contrato.search');
Route::get('/contrato/delete/{contrato}', 'ContratoController@delete')->name('contrato.delete');
Route::post('/contrato/delete/{contrato}', 'ContratoController@eliminate')->name('contrato.eliminate');


