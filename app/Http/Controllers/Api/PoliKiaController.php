<?php

namespace App\Http\Controllers\Api;

use App\Models\LayananKia;
use App\Models\Pendaftaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PoliKiaController extends Controller
{
    public function show($idPendaftaran)
    {
        $data = Pendaftaran::with('data_pasien')
            ->where('id_pendaftaran', $idPendaftaran)
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Data Berhasil Ditemukan',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = Pendaftaran::with('data_pasien', 'layanan_kia')
            ->where('id_pendaftaran', $request->id_pendaftaran??'null')
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan',
                'data' => []
            ], 404);
        }

        if ($data->layanan_kia) {
            return response()->json([
                'message' => 'Proses layanan KIA telah dilakukan pada tanggal ' . $data->layanan_kia->tanggal,
                'data' => $data
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'no_antrian' => 'required|max:255',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|in:Kehamilan,Persalinan,KB,Anak',
            'sistole' => 'required|numeric',
            'diastole' => 'required|numeric',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'suhu' => 'required|numeric',
            'spo2' => 'required|numeric',
            'respirasi' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        $data->layanan_kia()->create([
            'id_pendaftaran' => $request->id_pendaftaran,
            'no_antrian' => $request->no_antrian,
            'tanggal' => $request->tanggal,
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'keluhan' => $request->keluhan??'-',
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'suhu' => $request->suhu,
            'spo2' => $request->spo2,
            'respirasi' => $request->respirasi,
        ]);

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => $data
        ]);
    }

    public function report(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_awal' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
            'jenis_pemeriksaan' => 'required|in:semua,ibu,anak',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = LayananKia::selectRaw('jenis_pemeriksaan, COUNT(*) as total')
            ->when($request->tanggal_awal, function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            })
            ->when($request->tanggal_akhir, function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            })
            ->when($request->jenis_pemeriksaan === 'ibu', function ($query) {
                $query->whereIn('jenis_pemeriksaan', ['Kehamilan', 'Persalinan', 'KB']);
            })
            ->when($request->jenis_pemeriksaan === 'anak', function ($query) {
                $query->where('jenis_pemeriksaan', 'Anak');
            })
            ->groupBy('jenis_pemeriksaan')
            ->get();

        return response()->json([
            'message' => 'Berhasil mengambil data',
            'data' => $data
        ]);
    }

}
