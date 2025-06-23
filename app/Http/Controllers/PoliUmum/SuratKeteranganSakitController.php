<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemeriksaanAwal;
use App\Models\SuratSakit;

class SuratKeteranganSakitController extends Controller
{
    public function index()
    {
        $riyawat = PemeriksaanAwal::with('SuratSakit', 'pendaftaran.data_pasien', 'pendaftaran.data_dokter')
            ->whereHas('pendaftaran', function ($q) {
                $q->where('status', 'selesai')
                    ->where('id_poli', 1);
            })
            ->get();

        return view('PoliUmum.surat-keterangan-sakit', [
            'riyawat' => $riyawat
        ]);
    }
}
