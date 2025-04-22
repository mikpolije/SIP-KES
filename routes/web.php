<?php

use App\Http\Controllers\Master\DoctorController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/{main}/{view}', [PageController::class, 'show']);

Route::resource('pasien', PasienController::class);
Route::resource('doctors', DoctorController::class);

Volt::route('/rawat-inap', 'rawat-inap.index');
Volt::route('/pembayaran', 'pembayaran.index');
