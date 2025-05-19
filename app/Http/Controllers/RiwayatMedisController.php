<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class RiwayatMedisController extends Controller
{
    public function index()
    {
        $data = Pendaftaran::with('data_pasien')->get();
        return view('UGD.riwayat-medis', compact('data'));
    }
}
