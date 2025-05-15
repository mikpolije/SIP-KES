<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/{main}/{view}', [PageController::class, 'show']);
