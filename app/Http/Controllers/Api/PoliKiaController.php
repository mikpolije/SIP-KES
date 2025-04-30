<?php

namespace App\Http\Controllers\Api;

use App\Models\FormulirKb;
use App\Models\LayananKia;
use App\Models\Pendaftaran;
use App\Models\RiwayatSoap;
use Illuminate\Support\Arr;
use App\Models\FormulirAnak;
use App\Models\SuratKontrol;
use Illuminate\Http\Request;
use App\Models\FormulirKehamilan;
use App\Models\FormulirPersalinan;
use App\Http\Controllers\Controller;
use App\Models\SuratKematian;
use Illuminate\Support\Facades\Validator;

class PoliKiaController extends Controller
{
    public function show($idPendaftaran)
    {
        $data = Pendaftaran::with([
                'data_pasien',
                'layanan_kia',
                'formulirKb',
                'formulirKehamilan',
                'formulirPersalinan',
                'formulirAnak',
                'pengambilan_obat.detail_pengambilan_obat.detail_pembelian_obat.obat',
                'pengambilan_obat.racikan.detail_pembelian_obat.obat',
                'surat_kontrol',
                'surat_kematian',
            ])
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
        $data = Pendaftaran::with([
                'data_pasien',
                'layanan_kia',
                'formulirKb',
                'formulirKehamilan',
                'formulirPersalinan',
                'formulirAnak',
            ])
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

        if ($data->layanan_terisi) {
            return response()->json([
                'message' => 'Pemeriksaan Sudah Pernah Dilakukan.',
                'data' => $data
            ], 422);
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

    public function pemeriksaanPersalinan(Request $request)
    {
        $data = Pendaftaran::with([
                'data_pasien',
                'layanan_kia',
                'formulirKb',
                'formulirKehamilan',
                'formulirPersalinan',
                'formulirAnak',
            ])
            ->where('id_pendaftaran', $request->id_pendaftaran??'null')
            ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
            ->whereHas('layanan_kia', function ($q) {
                $q->where('jenis_pemeriksaan', 'Persalinan');
            })
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan atau Jenis Pemeriksaan Tidak Cocok.',
                'data' => []
            ], 404);
        }

        if ($data->layanan_terisi) {
            return response()->json([
                'message' => 'Pemeriksaan Sudah Pernah Dilakukan.',
                'data' => $data
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'id_pendaftaran' => 'required',
            'id_bidan' => 'required',
            'tempat_persalinan' => 'required',
            'alamat_persalinan' => 'required',
            'catatan_rujukan' => 'required',
            'alasan_merujuk' => 'required',
            'tempat_merujuk' => 'required',
            'pendamping' => 'required',
            'partogram' => 'required',
            'masalah_lain_kala_i' => 'required',
            'penatalaksana' => 'required',
            'hasil' => 'required',
            'eposotormy' => 'required',
            'tindakan_eposotormy' => 'required',
            'gawat_janin' => 'required',
            'tindakan_gawat_janin' => 'required',
            'destosia' => 'required',
            'tindakan_destosia' => 'required',
            'waktu_kala_iii' => 'required',
            'waktu_oksitosin' => 'required',
            'tindakan_waktu_oksitosin' => 'required',
            'waktu_ulang_oksitosin' => 'required',
            'tindakan_waktu_ulang_oksitosin' => 'required',
            'penegangan_tali' => 'required',
            'tindakan_penegangan_tali' => 'required',
            'uteri' => 'required',
            'tindakan_uteri' => 'required',
            'atoni_uteri' => 'required',
            'tindakan_atoni_uteri' => 'required',
            'plasenta_lahir' => 'required',
            'tindakan_plasenta_lahir' => 'required',
            'plasenta_tidak_lahir' => 'required',
            'tindakan_plasenta_tidak_lahir' => 'required',
            'laserasi' => 'required',
            'tindakan_laserasi' => 'required',
            'laserasi_perineum' => 'required',
            'penjahitan' => 'required',
            'alasan_penjahitan' => 'required',
            'jumlah_pendarahan' => 'required',
            'masalah_lain_kala_iii' => 'required',
            'penatalaksanaan_masalah' => 'required',
            'hasil_kala_iii' => 'required',
            'ku' => 'required',
            'td' => 'required',
            'nadi' => 'required',
            'napas' => 'required',
            'masalah_kala_iv' => 'required',
            'normal' => 'required',
            'cacat_bawaan' => 'required',
            'masalah_lain_bayi' => 'required',
            'tindakan_masalah_lain_bayi' => 'nullable', // nullable
            'cek_asfiksia' => 'required',
            'asfiksia' => 'required',
            'cek_pemberian_asi' => 'required',
            'pemberian_asi' => 'required',
            'jam_pemberian_asi' => 'required',
            'cek_penatalaksanaan' => 'required',
            'penatalaksanaan' => 'required',
            'hpht' => 'required',
            'his' => 'required',
            'lendir' => 'required',
            'darah' => 'required',
            'ketuban' => 'required',
            'keluhan' => 'required',
            'riwayat_persalinan_lalu' => 'required',
            'riwayat_alergi' => 'required',
            'tekanan_darah_o' => 'required',
            'suhu' => 'required',
            'nadi_o' => 'required',
            'odema' => 'required',
            'palpasi' => 'required',
            'teraba' => 'required',
            'djj' => 'required',
            'kontraksi' => 'required',
            'pemeriksaan_dalam' => 'required',
            'oleh' => 'required',
            'hasil_v1' => 'required',
            'a' => 'required',
            'observasi_kala_i' => 'required',
            'detail' => 'required|array',
            'detail.*.jam_ke' => 'required',
            'detail.*.waktu' => 'required',
            'detail.*.tekanan_darah' => 'required',
            'detail.*.nadi_kala_iv' => 'required',
            'detail.*.tinggi_fundus' => 'required',
            'detail.*.kontraksi_uterus' => 'required',
            'detail.*.kandung_kemih' => 'required',
            'detail.*.pendarahan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = FormulirPersalinan::create([
            'id_pendaftaran' => $request->id_pendaftaran,
            "id_bidan" => $request->id_bidan,
            "tempat_persalinan" => $request->tempat_persalinan,
            "alamat_persalinan" => $request->alamat_persalinan,
            "catatan_rujukan" => $request->catatan_rujukan,
            "alasan_merujuk" => $request->alasan_merujuk,
            "tempat_merujuk" => $request->tempat_merujuk,
            "pendamping" => $request->pendamping,
            "partogram" => $request->partogram,
            "masalah_lain_kala_i" => $request->masalah_lain_kala_i,
            "penatalaksana" => $request->penatalaksana,
            "hasil" => $request->hasil,
            "eposotormy" => $request->eposotormy,
            "tindakan_eposotormy" => $request->tindakan_eposotormy,
            "gawat_janin" => $request->gawat_janin,
            "tindakan_gawat_janin" => $request->tindakan_gawat_janin,
            "destosia" => $request->destosia,
            "tindakan_destosia" => $request->tindakan_destosia,
            "waktu_kala_iii" => $request->waktu_kala_iii,
            "waktu_oksitosin" => $request->waktu_oksitosin,
            "tindakan_waktu_oksitosin" => $request->tindakan_waktu_oksitosin,
            "waktu_ulang_oksitosin" => $request->waktu_ulang_oksitosin,
            "tindakan_waktu_ulang_oksitosin" => $request->tindakan_waktu_ulang_oksitosin,
            "penegangan_tali" => $request->penegangan_tali,
            "tindakan_penegangan_tali" => $request->tindakan_penegangan_tali,
            "uteri" => $request->uteri,
            "tindakan_uteri" => $request->tindakan_uteri,
            "atoni_uteri" => $request->atoni_uteri,
            "tindakan_atoni_uteri" => $request->tindakan_atoni_uteri,
            "plasenta_lahir" => $request->plasenta_lahir,
            "tindakan_plasenta_lahir" => $request->tindakan_plasenta_lahir,
            "plasenta_tidak_lahir" => $request->plasenta_tidak_lahir,
            "tindakan_plasenta_tidak_lahir" => $request->tindakan_plasenta_tidak_lahir,
            "laserasi" => $request->laserasi,
            "tindakan_laserasi" => $request->tindakan_laserasi,
            "laserasi_perineum" => $request->laserasi_perineum,
            "penjahitan" => $request->penjahitan,
            "alasan_penjahitan" => $request->alasan_penjahitan,
            "jumlah_pendarahan" => $request->jumlah_pendarahan,
            "masalah_lain_kala_iii" => $request->masalah_lain_kala_iii,
            "penatalaksanaan_masalah" => $request->penatalaksanaan_masalah,
            "hasil_kala_iii" => $request->hasil_kala_iii,
            "ku" => $request->ku,
            "td" => $request->td,
            "nadi" => $request->nadi,
            "napas" => $request->napas,
            "masalah_kala_iv" => $request->masalah_kala_iv,
            "normal" => $request->normal,
            "cacat_bawaan" => $request->cacat_bawaan,
            "masalah_lain_bayi" => $request->masalah_lain_bayi,
            "tindakan_masalah_lain_bayi" => $request->tindakan_masalah_lain_bayi,
            "cek_asfiksia" => $request->cek_asfiksia,
            "asfiksia" => $request->asfiksia,
            "cek_pemberian_asi" => $request->cek_pemberian_asi,
            "pemberian_asi" => $request->pemberian_asi,
            "jam_pemberian_asi" => $request->jam_pemberian_asi,
            "cek_penatalaksanaan" => $request->cek_penatalaksanaan,
            "penatalaksanaan" => $request->penatalaksanaan,
            "hpht" => $request->hpht,
            "his" => $request->his,
            "lendir" => $request->lendir,
            "darah" => $request->darah,
            "ketuban" => $request->ketuban,
            "keluhan" => $request->keluhan,
            "riwayat_persalinan_lalu" => $request->riwayat_persalinan_lalu,
            "riwayat_alergi" => $request->riwayat_alergi,
            "tekanan_darah_o" => $request->tekanan_darah_o,
            "suhu" => $request->suhu,
            "nadi_o" => $request->nadi_o,
            "odema" => $request->odema,
            "palpasi" => $request->palpasi,
            "teraba" => $request->teraba,
            "djj" => $request->djj,
            "kontraksi" => $request->kontraksi,
            "pemeriksaan_dalam" => $request->pemeriksaan_dalam,
            "oleh" => $request->oleh,
            "hasil_v1" => $request->hasil_v1,
            "a" => $request->a,
            "observasi_kala_i" => $request->observasi_kala_i,
        ]);

        $detail = [];
        foreach ($request->detail as $value) {
            $detail[] = [
                'id_transaksi_persalinan' => $data->id,
                'jam_ke' => $value['jam_ke'],
                'waktu' => $value['waktu'],
                'tekanan_darah' => $value['tekanan_darah'],
                'nadi_kala_iv' => $value['nadi_kala_iv'],
                'tinggi_fundus' => $value['tinggi_fundus'],
                'kontraksi_uterus' => $value['kontraksi_uterus'],
                'kandung_kemih' => $value['kandung_kemih'],
                'pendarahan' => $value['pendarahan'],
            ];
        }

        RiwayatSoap::insert($detail);

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => $data
        ]);
    }

    public function pemeriksaanKb(Request $request)
    {
        $data = Pendaftaran::with([
                'data_pasien',
                'layanan_kia',
                'formulirKb',
                'formulirKehamilan',
                'formulirPersalinan',
                'formulirAnak',
            ])
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

        if ($data->layanan_terisi) {
            return response()->json([
                'message' => 'Pemeriksaan Sudah Pernah Dilakukan.',
                'data' => $data
            ], 422);
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
        $data = Pendaftaran::with([
                'data_pasien',
                'layanan_kia',
                'formulirKb',
                'formulirKehamilan',
                'formulirPersalinan',
                'formulirAnak',
            ])
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

        if ($data->layanan_terisi) {
            return response()->json([
                'message' => 'Pemeriksaan Sudah Pernah Dilakukan.',
                'data' => $data
            ], 422);
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

    public function suratKontrol(Request $request)
    {
        $data = Pendaftaran::with([
            'data_pasien',
            'layanan_kia',
            'formulirKb',
            'formulirKehamilan',
            'formulirPersalinan',
            'formulirAnak',
        ])
        ->where('id_pendaftaran', $request->id_pendaftaran??'null')
        ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
        ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan.',
                'data' => []
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'nomor' => 'required',
            'tanggal' => 'required|date',
            'kepada' => 'required',
            'diagnosa' => 'required',
            'rencana_kontrol' => 'required',
            'tanggal_tanda_tangan' => 'required|date',
            'penandatangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        SuratKontrol::updateOrCreate(
            ['id_pendaftaran' => $request->id_pendaftaran],
            $request->all()
        );

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => null
        ]);
    }

    public function suratKematian(Request $request)
    {
        $data = Pendaftaran::with([
            'data_pasien',
            'layanan_kia',
            'formulirKb',
            'formulirKehamilan',
            'formulirPersalinan',
            'formulirAnak',
        ])
        ->where('id_pendaftaran', $request->id_pendaftaran??'null')
        ->where('id_poli', 3) // Data Poli Belum Ada, Test ID 3
        ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Pendaftaran Tidak Ditemukan.',
                'data' => []
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'nomor' => 'required',
            'tanggal_masuk_rs' => 'required|date',
            'waktu_masuk_rs' => 'required',
            'tanggal_kematian' => 'required|date',
            'waktu_kematian' => 'required',
            'tempat_kematian' => 'required',
            'diagnosa' => 'required',
            'tanggal_tanda_tangan' => 'required|date',
            'penandatangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data Tidak Valid. Silahkan Periksa Kembali',
                'errors' => $validator->errors()
            ], 422);
        }

        SuratKematian::updateOrCreate(
            ['id_pendaftaran' => $request->id_pendaftaran],
            $request->all()
        );

        return response()->json([
            'message' => 'Data Berhasil Disimpan',
            'data' => null
        ]);
    }
}
