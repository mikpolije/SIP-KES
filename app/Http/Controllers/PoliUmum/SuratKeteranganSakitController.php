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

    public function storeSuratSakit(Request $request)
    {
        $validated = $request->validate([
            'id_pemeriksaan' => 'required',
            'nomor_surat' => 'required',
            'hari' => 'required',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        SuratSakit::create($validated);

        return redirect()->route('surat.sakit')->with('success', 'Surat sakit berhasil disimpan.');
    }

    public function cetak($id)
    {
        $rw = SuratSakit::with('pemeriksaan', 'pemeriksaan.pendaftaran', 'pendaftaran.data_pasien', 'pendaftaran.data_dokter')
            ->where('id_pemeriksaan', $id)
            ->firstOrFail();

        return view('PoliUmum.cetak-surat-sakit', compact('rw'));
    }
}
