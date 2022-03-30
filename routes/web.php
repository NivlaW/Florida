<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\pesanController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\clientController;
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

Route::get('/', roomController::class. '@client' );
Route::get('/login', [authController::class, 'formLogin'])->name('login');
Route::post('/admin', [authController::class, 'login']);
Route::post('/resepsionis', [authController::class, 'login']);
Route::get('/jenis/{id_jenis}',[roomController::class,'jenis']);
Route::get('kamar',[pesanController::class,'detail']);
Route::post('kamar/reserve',[pesanController::class,'pesan']);
Route::get('kamar/{uuid}/reserve/kwitansi',[pesanController::class,'kwitansi']);
Route::middleware('auth')->group(function(){
    Route::resource('/admin/dashboard', roomController::class);
    Route::get('/admin/logout',[authController::class,'logout']);
    Route::resource('/admin/list-tipe',jenisController::class);
    Route::resource('/admin/fasilitas',fasilitasController::class);
    Route::get('/admin/fasilitas/edit/{fasilitas}',[fasilitasController::class,'edit']);
    Route::get('/admin/list-tipe/edit/{jenis}',[jenisController::class,'edit']);
    Route::get('/admin/edit/{room}',[roomController::class,'edit']);
    Route::post('/resepsionis/client',[clientController::class,'status']);
    Route::get('/resepsionis/client',[clientController::class,'index']);
});