<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\frontController;
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

Route::post('/logout', [authController::class, 'logout']);
route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::post('/login', [authController::class, 'authlogin']);

});
route::group(['middleware' => ['auth']], function () {
    Route::get('/', [frontController::class, 'index'])->name('home');
    Route::post('/', [frontController::class, 'index']);
    Route::get('/form', [frontController::class, 'form']);
    Route::post('/form', [frontController::class, 'upload']);
    Route::get('/form/lanjutan', [frontController::class, 'formlanjutan']);
    Route::get('/ubah/11/15', [frontController::class, 'formLanjutanEdit']);
    Route::get('/add/{id}', [frontController::class, 'addBarang']);
    Route::post('/form/lanjutan', [frontController::class, 'postlanjutan']);
    Route::post('/form/{er}', [frontController::class, 'postlanjutan']);
    route::get('/print/{id}', [frontController::class, 'print']);
    route::get('/detail/{id}', [frontController::class, 'detail']);
    route::get('/hapus/{id}', [frontController::class, 'hapus']);
    route::get('/deleteAll', [frontController::class, 'deleteAll']);
    route::get('/barang', [frontController::class, 'barang']);
    route::get('/double', [frontController::class, 'double']);
    route::get('cari', [frontController::class, 'search']);
});
// Route::get('/form2', [frontController::class,'form2']);
// Route::post('/form2', [frontController::class,'upload2']);
route::get('/{err}', [frontController::class, 'err']);
route::get('/{err}/{error}', [frontController::class, 'err']);
