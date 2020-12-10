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
Route::get('/cintas','App\Http\Controllers\CintasController@index')->name('cintas.index');

Route::get('/cintas/create','App\Http\Controllers\CintasController@create')->name('cintas.create');

Route::post('/cintas','App\Http\Controllers\CintasController@store')->name('cintas.store');


Auth::routes();

