<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\generalConsentController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->name('api.')->group(function () {

    Route::get('/poli-kia/{idPendaftaran}', [PoliKiaController::class, 'show'])->name('poli-kia.show');
    Route::post('/poli-kia', [PoliKiaController::class, 'store'])->name('poli-kia.store');
    Route::post('/poli-kia/pemeriksaan/kehamilan', [PoliKiaController::class, 'pemeriksaanKehamilan'])->name('poli-kia.pemeriksaan-kehamilan');
    Route::post('/poli-kia/pemeriksaan/kb', [PoliKiaController::class, 'pemeriksaanKb'])->name('poli-kia.pemeriksaan-kb');
    Route::post('/poli-kia/pemeriksaan/anak', [PoliKiaController::class, 'pemeriksaanAnak'])->name('poli-kia.pemeriksaan-anak');
    Route::post('/poli-kia/pemeriksaan/persalinan', [PoliKiaController::class, 'pemeriksaanPersalinan'])->name('poli-kia.pemeriksaan-persalinan');
    Route::get('/poli-kia/laporan/data', [PoliKiaController::class, 'report'])->name('poli-kia.report');

    // Surat
    Route::post('/poli-kia/surat-kontrol', [PoliKiaController::class, 'suratKontrol'])->name('poli-kia.surat-kontrol.store');
    Route::post('/poli-kia/surat-kematian', [PoliKiaController::class, 'suratKematian'])->name('poli-kia.surat-kematian.store');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/all', [ObatController::class, 'all'])->name('obat.all');
    Route::get('/obat/rincian', [ObatController::class, 'rincian'])->name('obat.rincian');
    Route::get('/obat/detail-pembelian', [ObatController::class, 'detailPembelian'])->name('obat.detail-pembelian');
    Route::post('/obat/rincian/{id}/koreksi', [ObatController::class, 'koreksi'])->name('obat.rincian.koreksi');
    Route::get('/obat/akan-kadaluarsa', [ObatController::class, 'akanKadaluarsa'])->name('obat.akan-kadaluarsa');
    Route::get('/obat/kadaluarsa', [ObatController::class, 'kadaluarsa'])->name('obat.kadaluarsa');
    Route::post('/obat/kadaluarsa/{detailPembelianObatId}', [ObatController::class, 'hapusObatKadaluarsa'])->name('obat.kadaluarsa.delete');
    Route::post('/obat/pengambilan/{idPendaftaran}', [ObatController::class, 'pengambilan'])->name('obat.pengambilan');
    Route::post('/obat/racikan/{idPendaftaran}', [ObatController::class, 'racikan'])->name('obat.racikan');

    Route::post('/obat/rincian', [ObatController::class, 'rincianStore'])->name('obat.rincian.store');

    Route::post('/obat', [ObatController::class, 'store'])->name('obat.add');
    Route::post('/obat/{id}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::post('/obat/{id}/delete', [ObatController::class, 'delete'])->name('obat.delete');

    Route::get('icd10', [IcdController::class, 'icd10'])->name('icd10.index');
    Route::get('icd9', [IcdController::class, 'icd9'])->name('icd9.index');
});

Route::get('/signature-status/{token}', [generalConsentController::class, 'checkStatus']);

