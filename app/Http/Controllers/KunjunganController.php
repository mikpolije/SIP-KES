<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

class KunjunganController extends Controller
{
    public function index()
    {
        $poliList = DB::table('poli')->get();
        return view('main.laporankunjungan', compact('poliList'));
    }

    public function getReport(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $idPoli = 3;

        if (!$tanggalAwal || !$tanggalAkhir) {
            return response()->json([
                'message' => 'Tanggal awal dan akhir wajib diisi.'
            ], 422);
        }

        try {
            $query = DB::table('pemeriksaan_ugd')
                ->join('triase', 'pemeriksaan_ugd.triase_id', '=', 'triase.id')
                ->join('pendaftaran', 'triase.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
                ->where('pendaftaran.id_poli', $idPoli)
                ->whereBetween('pendaftaran.created_at', [$tanggalAwal, $tanggalAkhir])
                ->whereIn('pemeriksaan_ugd.kondisi_saat_keluar', ['Meninggal', 'Sembuh']) // ✅ filter kondisi
                ->select(
                    'pemeriksaan_ugd.kondisi_saat_keluar',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('pemeriksaan_ugd.kondisi_saat_keluar');

            $data = $query->get()->map(function ($item) {
                return [
                    'kondisi_saat_keluar' => $item->kondisi_saat_keluar ?? 'Tidak diketahui',
                    'total' => $item->total
                ];
            });

            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }




    public function print(Request $request)
    {
        // Ambil input dari query string
        $tanggal_awal = $request->query('tanggal_awal');
        $tanggal_akhir = $request->query('tanggal_akhir');

        // Validasi sederhana
        if (!$tanggal_awal || !$tanggal_akhir) {
            return redirect()->back()->with('error', 'Tanggal awal dan tanggal akhir harus diisi.');
        }

        // Query data pendaftaran sesuai rentang tanggal (gunakan created_at)
        $data = Pendaftaran::with(['data_pasien', 'data_poli', 'triase.pemeriksaan_ugd'])
            ->where('id_poli', 3)
            ->whereDate('created_at', '>=', $tanggal_awal)
            ->whereDate('created_at', '<=', $tanggal_akhir)
            ->get();

        // Return view atau cetak PDF sesuai kebutuhan
        // Misalnya view 'laporan.cetak_kunjungan'
        return view('main.cetak_kunjungan', [
            'data' => $data,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ]);
    }
}
