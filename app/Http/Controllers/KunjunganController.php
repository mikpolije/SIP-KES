<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class KunjunganController extends Controller
{
    public function index()
    {
        return view('main.laporankunjungan');
    }
    public function getReport(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        if (!$tanggalAwal || !$tanggalAkhir) {
            return response()->json([
                'message' => 'Tanggal awal dan akhir wajib diisi.'
            ], 422);
        }

        try {
            // Konversi tanggal ke format yang bisa dibandingkan dengan created_at
            $start = Carbon::parse($tanggalAwal)->startOfDay();
            $end = Carbon::parse($tanggalAkhir)->endOfDay();

            // Ambil data dan kelompokkan berdasarkan jenis pemeriksaan (contoh kolom: id_poli)
            $data = Pendaftaran::whereBetween('created_at', [$start, $end])
                ->select('id_poli') // Ubah ini jika kamu pakai field lain
                ->selectRaw('count(*) as total')
                ->groupBy('id_poli')
                ->get()
                ->map(function ($item) {
                    // Ganti ini sesuai kebutuhan label
                    return [
                        'jenis_pemeriksaan' => 'Poli ID: ' . $item->id_poli, // Atau ambil dari relasi: $item->poli->nama
                        'total' => $item->total
                    ];
                });

            return response()->json([
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
