<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use App\Models\DataPasien;
use App\Models\PemeriksaanAwal;
use Illuminate\Support\Facades\Log;

class AntrianRiwayatController extends Controller
{
    public function antrean()
    {
        $data_pasien = Pendaftaran::with('data_pasien', 'wali_pasien',)->where('status', 'antri')->get();
        return view('PoliUmum.antreanPoliUmum', [
            'data_pasien' => $data_pasien
        ]);
    }

    public function pemeriksaanAwal($id_pendaftaran)
    {
        // dd($id_pendaftaran);
        $data_pendaftaran = Pendaftaran::where('id_pendaftaran', $id_pendaftaran)->first();
        return view('PoliUmum.pemeriksaanAwal', [
            'data_pendaftaran' => $data_pendaftaran
        ]);
    }

    public function storePemeriksaanAwal(Request $request)
    {
        // dd($request->all());
        try {
            $id_pendaftaran = Pendaftaran::where('id_pendaftaran', $request->id_pendaftaran)->first();
            $validatedData = $request->validate([
                'tanggal_periksa_pasien' => 'required|date',
                'kunjungan_sakit' => 'required',
                'subjektif' => 'required',
                'sistole' => 'required',
                'diastole' => 'required',
                'bb_pasien' => 'required',
                'tb_pasien' => 'required',
                'suhu' => 'required',
                'spo2' => 'required',
                'rr_pasien' => 'required',
            ]);

            $validatedData['id_pendaftaran'] = $id_pendaftaran->id_pendaftaran;
            PemeriksaanAwal::create($validatedData);

            Pendaftaran::where('id_pendaftaran', $request->id_pendaftaran)->update([
                'status' => 'belum diperiksa'
            ]);

            return redirect()->route('poliumum.antrean')->with('success', 'Data pendaftaran berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data periksaan awal: ' . $e->getMessage());
            return redirect()->route('poliumum.antrean')->withErrors(['msg' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    public function riwayat()
    {
        return view('PoliUmum.riwayatPoliUmum');
    }

    // Untuk fitur Select2 pencarian pasien
    public function searchPasien(Request $request)
    {
        $search = $request->input('q');

        $results = DB::table('pasien') // ganti jika nama tabelmu bukan 'pasien'
            ->select('no_rm', 'nama')
            ->where('no_rm', 'like', "%{$search}%")
            ->orWhere('nama', 'like', "%{$search}%")
            ->limit(10)
            ->get();

        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => $row->no_rm,
                'text' => "{$row->no_rm} - {$row->nama}"
            ];
        }

        return response()->json(['results' => $data]);
    }


    // ✅ Fungsi untuk menampilkan detail pasien + riwayat kunjungan
    public function detail($rm)
    {
        // Ambil data pendaftaran dan pasien berdasarkan no RM
        $pendaftaran = Pendaftaran::with('data_pasien')
            ->where('no_rm', $rm)
            ->firstOrFail();

        // Ambil semua riwayat pemeriksaan terkait pasien ini
        $riwayat = Pemeriksaan::with('pendaftaran')
            ->whereHas('pendaftaran', function ($query) use ($rm) {
                $query->where('no_rm', $rm);
            })
            ->orderBy('tanggal_periksa_pasien', 'desc')
            ->get();

        return view('PoliUmum.detailRiwayat', [
            'pendaftaran' => $pendaftaran,
            'riwayat' => $riwayat,
        ]);
    }

}
