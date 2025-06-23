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
        $riyawat = SuratSehat::with('pemeriksaan.pendaftaran.data_pasien', 'pemeriksaan.pendaftaran.data_dokter')
            ->whereHas('pemeriksaan.pendaftaran', function ($q) {
                $q->where('status', 'selesai')
                    ->where('id_poli', 1);
            })
            ->get();

        return view('PoliUmum.surat-keterangan-sehat', [
            'riyawat' => $riyawat
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string',
            'hasil' => 'required|string',
            'dipergunakan_untuk' => 'required|string',
        ]);

        $surat = SuratSehat::findOrFail($id);
        $surat->update($validated);

        return redirect()->route('surat.sehat')->with('success', 'Surat sehat berhasil diperbarui.');
    }


    public function cetak($id)
    {
        $rw = SuratSehat::with('pemeriksaan', 'pemeriksaan.pendaftaran', 'pendaftaran.data_pasien', 'pendaftaran.data_dokter')
            ->where('id_pemeriksaan', $id)
            ->firstOrFail();

        return view('PoliUmum.cetak-surat-sehat', compact('rw'));
    }
}
