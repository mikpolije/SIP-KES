<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $layanan = $request->input('layanan');

        if (!$tanggalAwal || !$tanggalAkhir) {
            return response()->json([
                'message' => 'Tanggal awal dan akhir wajib diisi.'
            ], 422);
        }

        try {
            $start = Carbon::parse($tanggalAwal)->startOfDay();
            $end = Carbon::parse($tanggalAkhir)->endOfDay();

            $query = DB::table('pendaftaran')
                ->select('layanan', DB::raw('COUNT(*) as total'))
                ->whereBetween('created_at', [$start, $end]);

            if ($layanan) {
                $query->where('layanan', $layanan);
            }

            $data = $query->groupBy('layanan')->get()
                ->map(function ($item) {
                    return [
                        'jenis_pemeriksaan' => $item->layanan ?? 'Tidak diketahui',
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

}
