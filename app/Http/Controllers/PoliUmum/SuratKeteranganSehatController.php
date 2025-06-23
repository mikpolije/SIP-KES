<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemeriksaanAwal;
use App\Models\SuratSehat;

class SuratKeteranganSehatController extends Controller
{
    public function index()
    {
        $riwayat = PemeriksaanAwal::with('pendaftaran', 'pendaftaran.data_pasien')
            ->whereHas('pendaftaran', function ($q) {
                $q->where('status', 'selesai')
                  ->where('id_poli', 1);
            })
            ->get();

        return view('PoliUmum.surat-keterangan-sehat', [
            'riwayat' => $riwayat
        ]);
    }

    public function storeSuratSehat(Request $request)
    {
        $validated = $request->validate([
            'id_pemeriksaan' => 'required',
            'nomor_surat' => 'required',
            'hasil' => 'required|string',
            'dipergunakan_untuk' => 'required',
        ]);

        SuratSehat::create($validated);

        return redirect()->route('surat.sehat')->with('success', 'Surat sehat berhasil disimpan.');
    }
}
