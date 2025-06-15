<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\generalConsentController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TriageController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\PoliUmum\PendafataranController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Api\ARController;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});

Route::prefix('dokter')->name('doctor.')->group(function () {
    Volt::route('/', 'doctor.index')->name('index');
    Volt::route('/create', 'doctor.create')->name('create');
    Volt::route('/{dokter}', 'doctor.edit')->name('edit');
});

Volt::route('pembayaran', 'pembayaran.index')->name('pembayaran.index');

// Route General Consent
Route::post('/main/general-content/save', [generalConsentController::class, 'store'])->name('general-consent.store');
Route::get('/main/cetak-general-consent/{id}', [generalConsentController::class, 'cetak'])->name('general-consent.cetak');
Route::get('/sign-request/{token}', [generalConsentController::class, 'showForm']);
Route::post('/sign-request/{token}', [generalConsentController::class, 'submitForm']);

Route::prefix('/main/persuratan')->name('main.persuratan')->group(function () {
    Volt::route('/kontrol/print', 'persuratan.kontrol.print')->name('.kontrol.print');
    Volt::route('/kontrol/create', 'persuratan.kontrol.create')->name('.kontrol.create');
    Volt::route('/sakit/print', 'persuratan.sakit.create')->name('.sakit.print');
    Volt::route('/sakit/create', 'persuratan.sakit.print')->name('.sakit.create');
    Volt::route('/pulang-paksa/print', 'persuratan.pulang-paksa.create')->name('.pulang-paksa.print');
    Volt::route('/pulang-paksa/create', 'persuratan.pulang-paksa.print')->name('.pulang-paksa.create');
    Volt::route('/kematian/print', 'persuratan.kematian.print')->name('.kematian.print');
    Volt::route('/kematian/create', 'persuratan.kematian.create')->name('.kematian.create');
});

Route::prefix('/main/rawat-inap')->name('main.rawat-inap')->group(function () {
    Volt::route('/cppt/print/{id}', 'rawat-inap.layanan.cppt-print')->name('.layanan.cppt-print');
});

Route::prefix('main/polikia')->group(function () {
    Route::post('/main/pendaftaran/pasien', [PendaftaranController::class, 'storePendafataran'])->name('pendaftaran.store');
    Route::get('/get-data-pasien/{no_rm}', [PendaftaranController::class, 'getDataPasien']);
    Route::get('/antrean', [ARController::class, 'antrean'])->name('antrean.polikia');
    Route::get('/riwayat', [ARController::class, 'riwayat'])->name('riwayat.polikia');
});

// Route detail riwayat pasien
Route::get('/poli-kia/detail/{id}', function ($id) {
    return view('main.polikia.detailkia');
})->name('main.polikia.detailkia');

Route::get('/poli-kia/search-pasien', [App\Http\Controllers\Api\ARController::class, 'searchPasien'])->name('poli-kia.search-pasien');

Route::resource('/layanan', LayananController::class);
// Route::resource('/users', UsersController::class);
Route::resource('/triase', TriageController::class);

Route::get('/get-layanan-by-ajax', [LayananController::class, 'getByAjax'])->name('get-layanan-by-ajax');
Route::get('/get-list-layanan', [LayananController::class, 'getListLayanan'])->name('get-list-layanan');
Route::get('/get-list-icd', [TriageController::class, 'getListICD'])->name('get-list-icd');
Route::post('/store-pasien', [TriageController::class, 'storePasien'])->name('store-pasien');
Route::get('/get-pasien', [TriageController::class, 'getPasien'])->name('get-pasien');
Route::get('/get-list-obat', [TriageController::class, 'getObat'])->name('get-list-obat');
Route::get('/print-pdf/{id}', [TriageController::class, 'printPdf'])->name('print-pdf');

// Route pendaftaran GolB
Route::get('/main/pendaftaran', [PendafataranController::class, 'index'])->name('pendaftaran.index');
Route::post('/main/pendaftaran/pasien', [PendafataranController::class, 'storePendafataran'])->name('pendaftaran.store');
Route::get('/get-data-pasien/{no_rm}', [PendafataranController::class, 'getDataPasien']);
Route::get('/get-kabupaten/{province_code}', [PendafataranController::class, 'getKabupaten']);
Route::get('/get-kecamatan/{city_code}', [PendafataranController::class, 'getKecamatan']);
Route::get('/get-desa/{district_code}', [PendafataranController::class, 'getDesa']);


Route::get('/{main}/{view}', [PageController::class, 'show']);
Route::get('/main/to/{path}', [PageController::class, 'showByPath'])->where('path', '.*');

// route sidebar antrian dan riwayat
use App\Http\Controllers\PoliUmum\AntrianRiwayatController;

Route::prefix('main/poliumum')->group(function () {
    Route::post('/main/pendaftaran/pasien', [PendafataranController::class, 'storePendafataran'])->name('pendaftaran.store');
    Route::get('/get-data-pasien/{no_rm}', [PendafataranController::class, 'getDataPasien']);
    Route::get('/antrean', [AntrianRiwayatController::class, 'antrean'])->name('antrean.poliumum');
    Route::get('/riwayat', [AntrianRiwayatController::class, 'riwayat'])->name('riwayat.poliumum');
});

// Route detail riwayat pasien
Route::get('/poli-umum/detail/{rm}', function ($rm) {
    return view('PoliUmum.detailPasien');
})->name('poli-umum.detail');
// ROUTE DETAIL PASIEN
Route::get('/riwayat/detail/{no_rm}', [App\Http\Controllers\PoliUmum\AntrianRiwayatController::class, 'detail'])->name('riwayat.detail');
Route::get('/riwayat/search-pasien', [App\Http\Controllers\PoliUmum\AntrianRiwayatController::class, 'searchPasien'])->name('riwayat.searchPasien');

Route::get('/poli-umum/search-pasien', [App\Http\Controllers\PoliUmum\AntrianRiwayatController::class, 'searchPasien'])->name('poli-umum.search-pasien');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route Laporan poli umum
use App\Http\Controllers\PoliUmum\LaporanController;

Route::get('laporan', [LaporanController::class, 'index'])->name('poliumum.laporan');
Route::get('poliumum/laporan/download', [LaporanController::class, 'downloadExcel'])->name('poliumum.laporan.download');


use App\Http\Controllers\PoliUmum\SuratKeteranganSakitController;
use App\Http\Controllers\PoliUmum\SuratKeteranganSehatController;

// Route Surat Keterangan Sehat
Route::get('surat-keterangan-sehat', [SuratKeteranganSehatController::class, 'index'])->name('surat.sehat');

// Route Surat Keterangan Sakit
Route::get('surat-keterangan-sakit', [SuratKeteranganSakitController::class, 'index'])->name('surat.sakit');

// Route Riwayat Medis
use App\Http\Controllers\RiwayatMedisController;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

Route::get('/riwayat-medis', [RiwayatMedisController::class, 'index'])->name('riwayat-medis.index');
//Route::get('riwayat-medis/{id}', [RiwayatMedisController::class, 'show'])->name('riwayat.medis.show');

// Poli
Route::resource('/poli', PoliController::class);

// Laporan Kunjungan
Route::get('/laporan/kunjungan', [KunjunganController::class, 'index']);
Route::get('/laporan/kunjungan/report', [KunjunganController::class, 'getReport'])->name('api.kunjungan.report');



Route::get('/main/{path}', [PageController::class, 'showByPath'])->where('path', '.*');



Route::resource('user', \App\Http\Controllers\UserController::class);


//route autocomplete cari data pasien
Route::get('/cari-pasien', [PendafataranController::class, 'cariPasien']);
