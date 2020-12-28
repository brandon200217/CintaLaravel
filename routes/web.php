<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CintasController;
use App\Http\Controllers\PerfilController;
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


Route::get('/inicio',[HomeController::class, 'index'])->name('home.index');

Route::get('/cintas',[CintasController::class, 'index'])->name('cintas.index');

Route::get('/cintas/create',[CintasController::class, 'create'])->name('cintas.create');

Route::post('/cintas',[CintasController::class, 'store'])->name('cintas.store');

Route::get('/cintas/{cinta}',[CintasController::class, 'show'])->name('cintas.show');

Route::get('/cintas/{cinta}/edit',[CintasController::class, 'edit'])->name('cintas.edit');

Route::put('/cintas/{cinta}',[CintasController::class, 'update'])->name('cintas.update');

Route::delete('/cintas/{cinta}',[CintasController::class, 'destroy'])->name('cintas.destroy');


Route::get('/perfiles/{perfil}',[PerfilController::class, 'show'])->name('perfiles.show');

Route::get('/perfiles/{perfil}/edit',[PerfilController::class, 'edit'])->name('perfiles.edit');

Route::put('/perfiles/{perfil}/',[PerfilController::class, 'update'])->name('perfiles.update');



Route::post('/cintas/{cinta}' , [LikeController::class,"update"])->name("likes.update");


Auth::routes();




//Route::match(['put','patch'],'/cintas/{cinta}',[CintasController::class, 'update']);
//Route::resource('cintas',CintasController::class);

