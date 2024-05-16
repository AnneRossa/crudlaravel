<?php

use App\Http\Controllers\KecamatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
Route::get('/', function () {
    return view('index');
});

// PROVINSI
Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi');
Route::get('/createProvinsi', [ProvinsiController::class, 'create'])->name('createProvinsi');
Route::post('/saveProvinsi', [ProvinsiController::class, 'store'])->name('saveProvinsi');
Route::get('/editProvinsi/{id}', [ProvinsiController::class, 'edit'])->name('editProvinsi');
Route::post('/editProvinsi/{id}', [ProvinsiController::class, 'update'])->name('updateProvinsi');
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('deleteProvinsi');

// KECAMATAN
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/createKecamatan', [KecamatanController::class, 'create'])->name('createKecamatan');
Route::post('/saveKecamatan', [KecamatanController::class, 'store'])->name('saveKecamatan');
Route::get('/editKecamatan/{id}', [KecamatanController::class, 'edit'])->name('editKecamatan');
Route::post('/editKecamatan/{id}', [KecamatanController::class, 'update'])->name('updateKecamatan');
Route::delete('/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('deleteKecamatan');

// KELURAHAN
Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
Route::get('/createKelurahan', [KelurahanController::class, 'create'])->name('createKelurahan');
Route::post('/saveKelurahan', [KelurahanController::class, 'store'])->name('saveKelurahan');
Route::get('/editKelurahan/{id}', [KelurahanController::class, 'edit'])->name('editKelurahan');
Route::post('/editKelurahan/{id}', [KelurahanController::class, 'update'])->name('updateKelurahan');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('deleteKelurahan');

// PEGAWAI
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/createPegawai', [PegawaiController::class, 'create'])->name('createPegawai');
Route::post('/savePegawai', [PegawaiController::class, 'store'])->name('savePegawai');
Route::get('/editPegawai/{id}', [PegawaiController::class, 'edit'])->name('editPegawai');
Route::post('/editPegawai/{id}', [PegawaiController::class, 'update'])->name('updatePegawai');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('deletePegawai');