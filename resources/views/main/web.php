<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
