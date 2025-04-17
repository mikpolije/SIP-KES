<?php

use App\Http\Controllers\Master\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/{main}/{view}', [PageController::class, 'show']);
<<<<<<< HEAD
Route::resource('pasien', PasienController::class);
=======

Route::resource('doctors', DoctorController::class);
>>>>>>> 7479952ddcd4531fc15899d7fadf9b974a6a142a
