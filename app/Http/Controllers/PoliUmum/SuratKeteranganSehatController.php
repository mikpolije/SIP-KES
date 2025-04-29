<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeteranganSehatController extends Controller
{
    public function index()
    {
        return view('PoliUmum.surat-keterangan-sehat');
    }
}
