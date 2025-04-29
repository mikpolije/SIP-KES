<?php

use App\Http\Controllers\Master\DoctorController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Livewire\Volt\Volt;
use App\Http\Controllers\generalConsentController;
use App\Http\Controllers\TriageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('main.index');
});
Route::get('/login', function () {
    return view('login');
});

Route::prefix('dokter')->name('doctor.')->group(function () {
    Volt::route('/', 'doctor.index')->name('index');
    Volt::route('/create', 'doctor.create')->name('create');
    Volt::route('/{dokter}', 'doctor.edit')->name('edit');
});

Route::post('/main/general-content/save', [generalConsentController::class, 'store'])->name('general-consent.store');
Route::get('/main/cetak-general-consent/{id}', [generalConsentController::class, 'cetak'])->name('general-consent.cetak');

Route::resource('/layanan', LayananController::class);
// Route::resource('/users', UsersController::class);
Route::resource('/triase', TriageController::class);

// Route::get('/get-layanan-by-ajax', [LayananController::class, 'getByAjax'])->name('get-layanan-by-ajax');

Route::get('/{main}/{view}', [PageController::class, 'show']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Route Suraht keterangan GOLB
use App\Http\Controllers\PoliUmum\SuratKeteranganSehatController;
use App\Http\Controllers\PoliUmum\SuratKeteranganSakitController;

Route::prefix('poli-umum')->group(function () {
    Route::get('surat-keterangan-sehat', [SuratKeteranganSehatController::class, 'index'])->name('surat.sehat');
    Route::get('surat-keterangan-sakit', [SuratKeteranganSakitController::class, 'index'])->name('surat.sakit');
});

