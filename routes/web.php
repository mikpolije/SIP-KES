<?php

use App\Http\Controllers\Master\DoctorController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Livewire\Volt\Volt;
use App\Http\Controllers\generalConsentController;

Route::get('/', function () {
    return view('main.index');
});


Route::prefix('dokter')->name('doctor.')->group(function () {
    Volt::route('/', 'doctor.index')->name('index');
    Volt::route('/create', 'doctor.create')->name('create');
    Volt::route('/{dokter}', 'doctor.edit')->name('edit');
});

Route::post('/main/general-content/save', [generalConsentController::class, 'store'])->name('general-consent.store');
Route::get('/main/cetak-general-consent/{id}', [generalConsentController::class, 'cetak'])->name('general-consent.cetak');

Route::get('/{main}/{view}', [PageController::class, 'show']);
