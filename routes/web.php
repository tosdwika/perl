<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ChartController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Dashboard
Route::get('/', [HomeController::class, 'dashboard']);
// Route::view('/test','test');
// Route::view('/test2','test2');
// Route::view('/test3','test3');
// Route::view('/test4','test4');
// Route::view('/testcerita','testcerita');
//Barang
Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
Route::get('/barang/detail/{id_barang}', [BarangController::class, 'detail']);
Route::get('/barang/tambah', [BarangController::class, 'tambah']);
Route::post('/barang/insert', [BarangController::class, 'insert']);
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id_barang}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id_barang}', [BarangController::class, 'delete']);

//Pegawai
Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai');
Route::get('/pegawai/detail/{nip}', [PegawaiController::class, 'detail']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/insert', [PegawaiController::class, 'insert']);
Route::get('/pegawai/edit/{nip}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update/{nip}', [PegawaiController::class, 'update']);
Route::get('/pegawai/delete/{nip}', [PegawaiController::class, 'delete']);

//penjualan
Route::get('/penjualan', [PenjualanController::class, 'penjualan'])->name('penjualan');
Route::get('/penjualan/detail/{id_penjualan}', [PenjualanController::class, 'detail']);
Route::get('/penjualan/tambah', [PenjualanController::class, 'tambah']);
Route::post('/penjualan/insert', [PenjualanController::class, 'insert']);
Route::get('/penjualan/edit/{id_penjualan}', [PenjualanController::class, 'edit']);
Route::post('/penjualan/update/{id_penjualan}', [PenjualanController::class, 'update']);
Route::get('/penjualan/delete/{id_penjualan}', [PenjualanController::class, 'delete']);
Route::get('/penjualan/cetak_pdf', [PenjualanController::class, 'cetak_pdf']);

//Chart
Route::get('/grafik_penjualan', [ChartController::class, 'sumchart']);
