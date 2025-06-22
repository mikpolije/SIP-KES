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
        $data_pasien = Pendaftaran::with('data_pasien', 'wali_pasien', )
        ->where('status', 'antri')
        ->where('id_poli', '2')->get();
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
        \Log::info('Store KIA called', $request->all());

        $request->validate([
            'no_rm' => 'required|exists:pendaftaran,no_rm',
            'status' => 'required'
        ]);

        $pendaftaran = \App\Models\Pendaftaran::where('no_rm', $request->no_rm)
            // ->whereIn('status', ['diperiksa', 'antri'])
            ->latest()
            ->first();

        if (!$pendaftaran) {
            \Log::warning('Pendaftaran tidak ditemukan', ['no_rm' => $request->no_rm]);
            return response()->json(['error' => 'Pendaftaran tidak ditemukan'], 404);
        }

        // Ambil jenis pemeriksaan dari poli_kia
        $poliKia = \DB::table('poli_kia')
            ->where('id_pendaftaran', $pendaftaran->id_pendaftaran)
            ->latest()
            ->first();

        $jenis_pemeriksaan = $poliKia ? $poliKia->jenis_pemeriksaan : null;

        // Update status pendaftaran
        $pendaftaran->status = 'diperiksa';
        $pendaftaran->save();

        \Log::info('Pendaftaran updated', [
            'id_pendaftaran' => $pendaftaran->id_pendaftaran,
            'status' => $pendaftaran->status,
            'jenis_pemeriksaan' => $jenis_pemeriksaan,
        ]);
        $redirectUrl = url('/main/polikia?no_rm=' . $request->no_rm);

        return response()->json([
            'success' => true,
            'jenis_pemeriksaan' => $jenis_pemeriksaan,
            'redirect' => $redirectUrl
        ]);
    }

        // Return redirect URL
        // return response()->json([
        //     'success' => true,
        //     'redirect' => url('/main/polikia?no_rm=' . $request->no_rm)
        // ]);
    
}
