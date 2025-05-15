<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;

class AntrianRiwayatController extends Controller
{
    public function antrean()
    {
        return view('PoliUmum.antreanPoliUmum');
    }

    public function riwayat()
    {
        return view('PoliUmum.riwayatPoliUmum'); 
    }
}
