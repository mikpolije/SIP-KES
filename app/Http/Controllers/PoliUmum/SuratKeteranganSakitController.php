<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeteranganSakitController extends Controller
{
    public function index()
    {
        return view('PoliUmum.surat-keterangan-sakit');
    }
}
