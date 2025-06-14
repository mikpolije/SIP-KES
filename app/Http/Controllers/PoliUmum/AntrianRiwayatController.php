<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use App\Models\DataPasien;

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
       public function index()
{
    $dataRiwayat = DB::table('pemeriksaan')
        ->select('no_rm', 'nama', 'nik', 'tanggal_periksa')
        ->get();

    return view('PoliUmum.riwayatPoliUmum', compact('dataRiwayat'));
}

}
