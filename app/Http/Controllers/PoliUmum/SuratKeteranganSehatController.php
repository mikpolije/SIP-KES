<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemeriksaanAwal;
use App\Models\SuratSehat;
use PDF;

class SuratKeteranganSehatController extends Controller
{
    public function index()
    {
        $riyawat = PemeriksaanAwal::with('SuratSakit', 'pendaftaran.data_pasien', 'pendaftaran.data_dokter')
            ->whereHas('pendaftaran', function ($q) {
                $q->where('status', 'selesai')
                    ->where('id_poli', 1);
            })
            ->get();

        return view('PoliUmum.surat-keterangan-sehat', [
            'riyawat' => $riyawat
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

    public function cetak($id)
    {
        $rw = SuratSehat::with('pemeriksaan', 'pemeriksaan.pendaftaran', 'pendaftaran.data_pasien', 'pendaftaran.data_dokter')
            ->where('id_pemeriksaan', $id)
            ->firstOrFail();

        return view('PoliUmum.cetak-surat-sehat', compact('rw'));
    }
}
