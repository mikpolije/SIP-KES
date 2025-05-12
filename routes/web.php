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

//Route::post('/main/general-content/save', [generalConsentController::class, 'store'])->name('general-consent.store');
//Route::get('/main/cetak-general-consent/{id}', [generalConsentController::class, 'cetak'])->name('general-consent.cetak');

Route::resource('/layanan', LayananController::class);
// Route::resource('/users', UsersController::class);
Route::resource('/triase', TriageController::class);

Route::get('/get-layanan-by-ajax', [LayananController::class, 'getByAjax'])->name('get-layanan-by-ajax');

Route::get('/{main}/{view}', [PageController::class, 'show']);

Route::get('/main/{path}', [PageController::class, 'showByPath'])->where('path', '.*');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

use App\Http\Controllers\PoliUmum\SuratKeteranganSehatController;
use App\Http\Controllers\PoliUmum\SuratKeteranganSakitController;

// Route Surat Keterangan Sehat
Route::get('surat-keterangan-sehat', [SuratKeteranganSehatController::class, 'index'])->name('surat.sehat');

// Route Surat Keterangan Sakit
Route::get('surat-keterangan-sakit', [SuratKeteranganSakitController::class, 'index'])->name('surat.sakit');

// Route Riwayat Medis
use App\Http\Controllers\RiwayatMedisController;
Route::get('riwayat-medis', [RiwayatMedisController::class, 'index'])->name('riwayat.medis');
//Route::get('riwayat-medis/{id}', [RiwayatMedisController::class, 'show'])->name('riwayat.medis.show');

// route sidebar antrian dan riwayat
use App\Http\Controllers\PoliUmum\AntrianRiwayatController;

Route::prefix('main/poliumum2')->group(function () {
    Route::get('/antrian', [AntrianRiwayatController::class, 'antrean'])->name('antrian.poliumum');
    Route::get('/riwayat', [AntrianRiwayatController::class, 'riwayat'])->name('riwayat.poliumum');
});

