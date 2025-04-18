<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

Route::middleware('api')->name('api.')->group(function () {

    Route::get('/poli-kia/{idPendaftaran}', [PoliKiaController::class, 'show'])->name('poli-kia.show');
    Route::post('/poli-kia', [PoliKiaController::class, 'store'])->name('poli-kia.store');
    Route::get('/poli-kia/laporan/data', [PoliKiaController::class, 'report'])->name('poli-kia.report');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/all', [ObatController::class, 'all'])->name('obat.all');
    Route::get('/obat/rincian', [ObatController::class, 'rincian'])->name('obat.rincian');
    Route::post('/obat/rincian/{id}/koreksi', [ObatController::class, 'koreksi'])->name('obat.rincian.koreksi');
    Route::get('/obat/akan-kadaluarsa', [ObatController::class, 'akanKadaluarsa'])->name('obat.akan-kadaluarsa');
    Route::get('/obat/kadaluarsa', [ObatController::class, 'kadaluarsa'])->name('obat.kadaluarsa');
    Route::post('/obat/kadaluarsa/{detailPembelianObatId}', [ObatController::class, 'hapusObatKadaluarsa'])->name('obat.kadaluarsa.delete');

    Route::post('/obat/rincian', [ObatController::class, 'rincianStore'])->name('obat.rincian.store');

    Route::post('/obat', [ObatController::class, 'store'])->name('obat.add');
    Route::post('/obat/{id}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::post('/obat/{id}/delete', [ObatController::class, 'delete'])->name('obat.delete');

});
