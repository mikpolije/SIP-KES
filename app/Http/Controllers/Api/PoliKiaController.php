<?php

namespace App\Http\Controllers\Api;

use App\Models\LayananKia;
use App\Models\Pendaftaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FormulirAnak;
use App\Models\FormulirKb;
use App\Models\FormulirKehamilan;
use Illuminate\Support\Facades\Validator;

class PoliKiaController extends Controller
{
    public function show($idPendaftaran)
    {
        $data = Pendaftaran::with(['data_pasien', 'layanan_kia'])
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
                'message' => 'Proses layanan KIA telah dilakukan pada tanggal ' . $data->layanan_kia->tanggal . '. Hubungi bidan untuk melanjutkan.',
                'data' => $data
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'no_antrian' => 'required|max:255',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|in:Kehamilan,Persalinan,KB,Anak',
            'keluhan' => 'required|max:255',
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
            'keluhan' => $request->keluhan,
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

    public function pemeriksaanKehamilan(Request $request)
    {
        $data = Pendaftaran::with('data_pasien')
            ->where('id_pendaftaran', $request->id_pendaftaran??'null')
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->whereHas('layanan_kia', function ($q) {
                $q->where('jenis_pemeriksaan', 'Kehamilan');
            })
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan atau Jenis Pemeriksaan Tidak Cocok.',
                'data' => []
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'pendampingan' => 'required',
            'keluhan_utama' => 'required',
            'pertama_haid' => 'required|date',
            'jumlah_anak' => 'required',
            'usia_kehamilan' => 'required',
            'menarche' => 'required',
            'lama_haid' => 'required',
            'banyak_haid' => 'required',
            'warna_haid' => 'required',
            'diagnosa_kebidanan' => 'required',
            'kode_tindakan_kehamilan' => 'nullable',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
            'penambahan_bb' => 'required|integer',
            'berat_janin' => 'required|integer',
            'tinggi_fundus' => 'required|integer',
            'lingkar_perut' => 'required|integer',
            'lila' => 'required|integer',
            'hb_level' => 'required',
            'siklus_haid' => 'nullable',
            'dismenore' => 'nullable',
            'flour_albus' => 'nullable',
            'hipertensi' => 'required',
            'hipertiroid' => 'required',
            'diabetes' => 'required',
            'penyakit_jantung' => 'required',
            'tuberculosis' => 'required',
            'asap_rokok' => 'required',
            'penyuluhan_kie' => 'required',
            'penambah_darah' => 'required',
            'suplemen_makanan' => 'required',
            'rujukan_pelayanan' => 'required',
            'hpht' => 'required|date',
            'hpl' => 'nullable|date',
            'his' => 'nullable|date',
            'jam' => 'nullable',
            'lendir' => 'nullable',
            'darah' => 'nullable',
            'ketuban' => 'nullable',
            'keluhan' => 'required',
            'riwayat_persalinan' => 'nullable',
            'riwayat_alergi' => 'nullable',
            'tekanan_darah' => 'nullable|numeric',
            'suhu' => 'required|numeric',
            'nadi' => 'required|numeric',
            'oedema' => 'nullable',
            'palpasi' => 'nullable',
            'teraba' => 'nullable',
            'djj' => 'nullable',
            'kontrakssi' => 'nullable',
            'pemeriksaan_dalam' => 'nullable',
            'hasil_vt' => 'nullable',
            'penilaian' => 'nullable',
            'observasi' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        FormulirKehamilan::insert($request->all());

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => $data
        ]);
    }

    public function pemeriksaanKb(Request $request)
    {
        $data = Pendaftaran::with('data_pasien')
            ->where('id_pendaftaran', $request->id_pendaftaran??'null')
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->whereHas('layanan_kia', function ($q) {
                $q->where('jenis_pemeriksaan', 'KB');
            })
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan atau Jenis Pemeriksaan Tidak Cocok.',
                'data' => []
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'umur' => 'required|numeric',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'jumlah_anak' => 'required|numeric',
            'kb' => 'required',
            'nama_suami' => 'required',
            'umur_suami' => 'required|numeric',
            'pekerjaan_suami' => 'required',
            'agama_suami' => 'required',
            'pendidikan_suami' => 'required',
            'no_telp' => 'required',
            'umur_anak' => 'required|numeric',
            'hpht' => 'required',
            'gpa' => 'required|numeric',
            'menyusui' => 'nullable',
            'manarche' => 'nullable',
            'keadaan_umum' => 'required',
            'kesadaran' => 'required',
            'sistole' => 'required|numeric',
            'berat_badan' => 'nullable|numeric',
            'suhu' => 'required|numeric',
            'respirasi' => 'required|numeric',
            'diastole' => 'required|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'spo2' => 'required|numeric',
            'nadi' => 'required|numeric',
            'kontrasepsi' => 'required',
            'dilayani' => 'nullable|date',
            'dicabut' => 'nullable|date',
            'dipasang' => 'nullable|date',
            'tipe_pasien' => 'required',
            'tindakan' => 'required|date',
            'kode_tindakan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        FormulirKb::insert($request->all());

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => $data
        ]);
    }

    public function pemeriksaanAnak(Request $request)
    {
        $data = Pendaftaran::with('data_pasien')
            ->where('id_pendaftaran', $request->id_pendaftaran??'null')
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->whereHas('layanan_kia', function ($q) {
                $q->where('jenis_pemeriksaan', 'Anak');
            })
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan atau Jenis Pemeriksaan Tidak Cocok.',
                'data' => []
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'umur' => 'required|numeric',
            'nama_ibu' => 'required',
            'umur_ibu' => 'required|numeric',
            'pekerjaan_ibu' => 'required',
            'agama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'notelp_ibu' => 'required',
            'nama_ayah' => 'required',
            'umur_ayah' => 'required|numeric',
            'pekerjaan_ayah' => 'required',
            'agama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'notelp_ayah' => 'required',
            'keadaan_umum' => 'required',
            'kesadaran' => 'required',
            'keluhan' => 'required',
            'tensi' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_dada' => 'required|numeric',
            'respirasi' => 'required|numeric',
            'nadi' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'goldarah' => 'required',
            'suhu' => 'required|numeric',
            'lingkar_perut' => 'required|numeric',
            'lila' => 'required|numeric',
            'tipe_pasien' => 'required',
            'unit_layanan' => 'required',
            'kunjungan' => 'required',
            'obat' => 'required',
            'bidan' => 'required',
            'diagnosa' => 'required',
            'kode_tindakan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        FormulirAnak::insert($request->all());

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
