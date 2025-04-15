<?php

namespace App\Http\Controllers\Api;

use App\Models\Pendaftaran;
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
}
