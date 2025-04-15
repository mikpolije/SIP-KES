<?php

use App\Http\Controllers\Master\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/{main}/{view}', [PageController::class, 'show']);

Route::resource('doctors', DoctorController::class);
