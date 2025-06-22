<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;

class ARController extends Controller
{
    public function antrean()
    {
        $data_pasien = Pendaftaran::with('data_pasien', 'wali_pasien', )->where('id_poli', '2')->get();
        return view('main.polikia.antreanPoliKIA', [
            'data_pasien' => $data_pasien
        ]);

        /*         $data = DB::table('poli_kia');
                $i = db::table('pendaftaran')
                    ->join('poli_kia', 'pendaftaran.no_rm')
                    ->join('data_pasien', 'data_pasien.no_rm', '=', 'pendaftaran.no_rm')
                    ->select(
                        'data_pasien.no_rm',
                        'pendaftaran.created_at',
                        'pendaftaran.id_poli',
                        'pendaftaran.id_dokter',
                        'pendaftaran.jenis_pembayaran',
                        'pendaftaran.status',
                    )
                    ->where(column: 'poli_kia.id', operator: 2) // Ganti dengan ID Poli KIA yang sesuai
                    ->orderBy(column: 'pendaftaran.created_at', direction: 'asc')
                    ->get();
                $data = $i->map(callback: function (TValue $item): array {
                    return [
                        'Nomor RM' => $item->id,
                        'created_at' => $item->created_at->format('Y-m-d'),
                        'Unit Layanan' => $item->nama_poli,
                        'Dokter' => $item->id_dokter,
                        'Tipe Pasien' => $item->jenis_pembayaran,
                        'Status' => $item->status,
                    ];
                });
                // Jika kamu ingin mengembalikan data dalam format JSON, gunakan return response()->json($data);
                // Jika kamu ingin mengembalikan data ke view, gunakan return view('nama_view', ['data' => $data]);
                // Contoh mengembalikan data ke view
                // Pastikan view 'main.polikia.antreanPoliKIA' ada di direktori resources/views/main/polikia/
                // Jika tidak ada view, kamu bisa mengembalikan data dalam format JSON
                // return response()->json($data);
                // Jika kamu ingin mengembalikan data ke view, gunakan return view('nama_view', ['data' => $data]);
                // Pastikan view 'main.polikia.antreanPoliKIA' ada di direktori resources/views/main/polikia/
                // Jika tidak ada view, kamu bisa mengembalikan data dalam format JSON
                // Contoh mengembalikan data ke view
                // Pastikan view 'main.polikia.antreanPoliKIA' ada di direktori resources/views/main/polikia/
                // Jika tidak ada view, kamu bisa mengembalikan data dalam format JSON
                // return response()->json($data);
                // Jika kamu ingin mengembalikan data ke view, gunakan return view('nama_view', ['data' => $data]);
                return view('main.polikia.antreanPoliKIA', ['data' => $data]);
         */
    }

    public function riwayat()
    {
        // If you don't need to pass any data, just remove 'data' => $id
        return view('main.polikia.riwayatPoliKIA');
    }

    // Tambahkan method ini untuk Search Select2
    public function searchPasien(Request $request)
    {
        $search = $request->input('q');

        $results = DB::table('pasiens') // ganti jika nama tabelmu bukan 'pasien'
            ->select('no_rm', 'nama')
            ->where('no_rm', 'like', "%{$search}%")
            ->orWhere('nama', 'like', "%{$search}%")
            ->limit(10)
            ->get();

        $data = [];
        foreach ($results as $i) {
            $data[] = [
                'id' => $i->no_rm,
                'text' => "{$i->no_rm} - {$i->nama}"
            ];
        }

        return response()->json(['results' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|exists:pendaftaran,no_rm',
            'jenis_pemeriksaan' => 'required|in:Kehamilan,Persalinan,KB,Anak',
            'status' => 'required'
        ]);

        $pendaftaran = \App\Models\Pendaftaran::where('no_rm', $request->no_rm)
            ->whereIn('status', ['belum diperiksa', 'antri'])
            ->latest()
            ->first();

        if (!$pendaftaran) {
            return response()->json(['error' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $layananKia = $pendaftaran->layanan_kia;
        if ($layananKia) {
            $layananKia->jenis_pemeriksaan = $request->jenis_pemeriksaan;
            $layananKia->save();
        } else {
            $pendaftaran->layanan_kia()->create([
                'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            ]);
        }

        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        // Return redirect URL
        return response()->json([
            'success' => true,
            'redirect' => url('/main/polikia?no_rm=' . $request->no_rm)
        ]);
    }
}
