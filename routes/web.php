<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GeneralConsentController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TriageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoliUmum\PendafataranController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Api\ARController;
use App\Http\Middleware\CheckProfesi;


    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/', function () {
        return redirect()->route('login'); });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showIdentityForm'])->name('password.forgot');
Route::post('/forgot-password/check', [AuthController::class, 'checkIdentity'])->name('password.checkIdentity');
Route::get('/reset-password/{id}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password/{id}', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register.users');
    Route::view('/user/register', 'user.register')->name('register.forms');

Route::resource('user', \App\Http\Controllers\UserController::class);

Route::prefix('dokter')->name('doctor.')->group(function () {
    Volt::route('/', 'doctor.index')->name('index');
    Volt::route('/create', 'doctor.create')->name('create');
    Volt::route('/{dokter}', 'doctor.edit')->name('edit');
});

Volt::route('pembayaran', 'pembayaran.index')->name('pembayaran.index');

// Route General Consent
Route::get('/main/general-consent', [GeneralConsentController::class, 'index'])->name('general-consent.index');
Route::post('/main/general-content/save', [generalConsentController::class, 'store'])->name('general-consent.store');
Route::get('/main/cetak-general-consent/{id}', [generalConsentController::class, 'cetak'])->name('general-consent.cetak');
Route::get('/sign-request/{token}', [generalConsentController::class, 'showForm']);
Route::post('/sign-request/{token}', [generalConsentController::class, 'submitForm']);
Route::post('/api/register-token/{token}', [generalConsentController::class, 'registerToken']);

Route::prefix('rawat-inap')->name('rawat-inap.')->group(function () {
    Volt::route('/laporan', 'laporan.penyakit-terbesar')->name('laporan');
    Volt::route('/laporan/print/{startDate?}/{endDate?}', 'laporan.penyakit-terbesar-print')
        ->name('laporan-print');
});

Route::prefix('/main/persuratan')->name('main.persuratan')->group(function () {
    Volt::route('/kontrol/print', 'persuratan.kontrol.print')->name('.kontrol.print');
    Volt::route('/kontrol/create', 'persuratan.kontrol.create')->name('.kontrol.create');
    Volt::route('/sakit/print', 'persuratan.sakit.create')->name('.sakit.print');
    Volt::route('/sakit/create', 'persuratan.sakit.print')->name('.sakit.create');
    Volt::route('/pulang-paksa/print', 'persuratan.pulang-paksa.print')->name('.pulang-paksa.print');
    Volt::route('/pulang-paksa/create', 'persuratan.pulang-paksa.create')->name('.pulang-paksa.create');
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

Route::get('/poli-kia/detail/{no_rm}', [App\Http\Controllers\Api\PoliKiaController::class, 'getDataPasien'])->name('main.polikia.detailkia');

Route::get('/poli-kia/search-pasien', [App\Http\Controllers\Api\ARController::class, 'searchPasien'])->name('poli-kia.search-pasien');

Route::get('/main/layanan', function () {
    return view('main.layanankia');
})->name('layanan.kia');
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




// route sidebar antrian dan riwayat
use App\Http\Controllers\PoliUmum\AntrianRiwayatController;
Route::get('main/antrian/pemeriksaan-awal/{id_pendaftaran}', [AntrianRiwayatController::class, 'pemeriksaanAwal'])->name('poliumum.pemeriksaanAwal');
Route::post('main/antrian/pemeriksaan-awal/{id_pendaftaran}', [AntrianRiwayatController::class, 'storePemeriksaanAwal'])->name('poliumum.pemeriksaanAwal.store');
Route::get('main/antrian/pemeriksaan-akhir', [AntrianRiwayatController::class, 'antrianPemeriksaan3'])->name('poliumum.pemeriksaanAkhir');
Route::get('main/antrian/pemeriksaan-akhir/{id_pemeriksaan}', [AntrianRiwayatController::class, 'pemeriksaanAkhir'])->name('poliumum.pemeriksaanAkhir.step3');
Route::post('main/antrian/pemeriksaan-akhir/{id_pemeriksaan}', [AntrianRiwayatController::class, 'storePemeriksaanStep3'])->name('poliumum.pemeriksaanAkhir.store');
Route::get('/search/icd9', [AntrianRiwayatController::class, 'searchICD9'])->name('search.icd9');
Route::get('/search-icd10', [AntrianRiwayatController::class, 'searchICD10'])->name('search.icd10');
Route::get('/search-layanan', [AntrianRiwayatController::class, 'searchLayanan'])->name('search.layanan');
Route::get('/search-obat', [AntrianRiwayatController::class, 'searchObat'])->name('search.obat');
Route::get('/main/antrian/riwayat', [AntrianRiwayatController::class, 'riwayat'])->name('poliumum.riwayat');
Route::get('/main/antrian/riyawat/detail/{id_pemeriksaan}', [AntrianRiwayatController::class, 'detalRiyawat'])->name('poliumum.detailRiwayat');

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






// Route Laporan poli umum
use App\Http\Controllers\PoliUmum\LaporanController;

Route::get('laporan', [LaporanController::class, 'index'])->name('poliumum.laporan');
// Route::get('/poli-umum/laporan', [LaporanController::class, 'getDataPenyakit'])->name('poliumum.laporan.filter');
Route::get('poliumum/laporan/download', [LaporanController::class, 'downloadExcel'])->name('poliumum.laporan.download');
Route::prefix('poliumum/laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name(''); // poliumum.laporan
    Route::get('/kunjungan', [LaporanController::class, 'kunjungan'])->name('poliumum.laporan.kunjungan');
});


use App\Http\Controllers\PoliUmum\SuratKeteranganSakitController;
use App\Http\Controllers\PoliUmum\SuratKeteranganSehatController;

// Route Surat Keterangan Sehat
Route::get('surat-keterangan-sehat', [SuratKeteranganSehatController::class, 'index'])->name('surat.sehat');
Route::post('surat-keterangan-sehat', [SuratKeteranganSehatController::class, 'storeSuratSehat'])->name('surat.sehat.store');
Route::get('surat-keterangan-sehat/cetak/{id}', [SuratKeteranganSehatController::class, 'cetak'])->name('surat.sehat.cetak');

// Route Surat Keterangan Sakit
Route::get('surat-keterangan-sakit', [SuratKeteranganSakitController::class, 'index'])->name('surat.sakit');
Route::post('surat-keterangan-sakit', [SuratKeteranganSakitController::class, 'storeSuratSakit'])->name('surat.sakit.store');
Route::get('surat-keterangan-sakit/cetak/{id}', [SuratKeteranganSakitController::class, 'cetak'])->name('surat.sakit.cetak');

// Route Riwayat Medis
use App\Http\Controllers\RiwayatMedisController;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

Route::get('/riwayat-medis', [RiwayatMedisController::class, 'index'])->name('riwayat-medis.index');
Route::get('riwayat-medis/{id}', [RiwayatMedisController::class, 'show'])->name('riwayat-medis.show');

// Poli
Route::resource('/poli', PoliController::class);

// Laporan Kunjungan
Route::get('/main/laporanUGD', [KunjunganController::class, 'index'])->name('laporan.kunjungan.index');
Route::get('/laporan/kunjungan/report', [KunjunganController::class, 'getReport'])->name('api.kunjungan.report');
Route::get('/cetak-kunjungan', [KunjunganController::class, 'print'])->name('laporan_kunjungan.print');

Route::get('/riwayat-medis/cetak/{id}', [App\Http\Controllers\RiwayatMedisController::class, 'cetak'])->name('riwayat-medis.cetak');
Route::get('/detail-riwayat-medis/{id}/cetak', [App\Http\Controllers\RiwayatMedisController::class, 'cetakDetail'])->name('detail-riwayat-medis.cetak');





//route autocomplete cari data pasien
Route::get('/cari-pasien', [PendafataranController::class, 'cariPasien']);



Route::get('/main/{path}', [PageController::class, 'showByPath'])->where('path', '.*');
Route::get('/{main}/{view}', [PageController::class, 'show']);
Route::get('/main/to/{path}', [PageController::class, 'showByPath'])->where('path', '.*');
