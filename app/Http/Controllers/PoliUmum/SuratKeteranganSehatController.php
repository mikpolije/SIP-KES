<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;

class SuratKeteranganSehat extends Controller
{
    public function index()
    {
        return view('PoliUmum.surat-keterangan-sehat');
    }
}

