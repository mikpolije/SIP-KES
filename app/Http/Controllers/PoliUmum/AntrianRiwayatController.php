<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AntrianRiwayatController extends Controller
{
    public function antrean()
    {
        return view('PoliUmum.antreanPoliUmum');
    }

    public function riwayat()
    {
        return view('PoliUmum.riwayatPoliUmum'); //isii disini yaa mii
    }
}
