<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

Route::middleware('api')->name('api.')->group(function () {

    Route::get('/poli-kia/{idPendaftaran}', [PoliKiaController::class, 'show'])->name('poli-kia.show');
    Route::post('/poli-kia', [PoliKiaController::class, 'store'])->name('poli-kia.store');
    Route::get('/poli-kia/laporan/data', [PoliKiaController::class, 'report'])->name('poli-kia.report');

});
