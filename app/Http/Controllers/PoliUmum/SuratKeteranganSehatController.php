<?php

namespace App\Http\Controllers\PoliUmum;
use App\Models\PemeriksaanAwal;

use App\Http\Controllers\Controller;

class SuratKeteranganSehatController extends Controller
{
    public function index()
    {
        $riwayat = PemeriksaanAwal::with('pendaftaran', 'pendaftaran.data_pasien')
            ->whereHas('pendaftaran', function ($q) {
                $q->where('status', 'selesai')
                    ->where('id_poli', 1);
            })->get();

        return view('PoliUmum.surat-keterangan-sehat', [
            'riwayat' => $riwayat // diperbaiki dari $riyawat
        ]);
    }
}
