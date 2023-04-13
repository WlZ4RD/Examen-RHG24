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

Route::resource('/personal', 'PersonalController')->names('personal');
Route::get('/personal/delete/{personal}', 'PersonalController@delete')->name('personal.delete');
Route::post('/personal/delete/{personal}', 'PersonalController@eliminate')->name('personal.eliminate');