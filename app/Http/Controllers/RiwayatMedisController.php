<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatMedisController extends Controller
{
    public function index()
    {
        return view('UGD.riwayat-medis');
    }
}

