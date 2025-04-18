<?php

use App\Http\Controllers\Master\DoctorController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PoliUmum\PendafataranController;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/{main}/{view}', [PageController::class, 'show']);

Route::resource('pasien', PasienController::class);
Route::resource('doctors', DoctorController::class);

//POLI UMUM
Route::get('/main/pendaftaran', [PendafataranController::class, 'index'])->name('poli-umum.pendaftaran');
