<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;

class SuratKeteranganSakitController extends Controller
{
    public function index()
    {
        return view('PoliUmum.surat-keterangan-sakit');
    }
}
