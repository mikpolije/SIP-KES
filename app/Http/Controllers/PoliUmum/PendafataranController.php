<?php

namespace App\Http\Controllers\PoliUmum;

use App\Models\Desa;
use App\Models\poli;
use App\Models\Dokter;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\DataPasien;
use App\Models\WaliPasien;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PendafataranController extends Controller
{
    public function index()
    {
        return view('main.pendaftaran', [
            'data_pasien' => DataPasien::all(),
            'data_dokter' => Dokter::all(),
            'data_poli' => Poli::all(),
            'data_provinsi' => Provinsi::all(),
            'data_kabupaten' => Kabupaten::all(),
            'data_kecamatan' => Kecamatan::all(),
            'data_desa' => Desa::all(),
        ]);
    }

    public function storePendafataran(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nik_pasien' => 'nullable|digits:16',
                'nama_pasien' => 'required|string|max:150',
                'tempat_lahir_pasien' => 'required|string|max:50',
                'tanggal_lahir_pasien' => 'required|date',
                'jenis_kelamin' => 'required|numeric',
                'agama' => 'required|numeric',
                'pendidikan_pasien' => 'required|numeric',
                'pekerjaan_pasien' => 'nullable|numeric',
                'alamat_pasien' => 'required|string|max:100',
                'rt' => 'nullable|string|max:3',
                'rw' => 'nullable|string|max:3',
                'no_telepon_pasien' => 'nullable|string|max:15',
                'status_perkawinan' => 'required|numeric',
                'kewarganegaraan' => 'required|numeric',
                'gol_darah' => 'required|numeric',
                'nama_ibu_kandung' => 'required|string',
                'id_provinsi' => 'nullable|numeric',
                'id_kota' => 'nullable|numeric',
                'id_kecamatan' => 'required|numeric',
                'id_desa' => 'nullable|numeric',
                'kode_pos' => 'nullable|numeric',

                // Data Wali
                'nama_wali' => 'required|string|max:100',
                'tanggal_lahir_wali' => 'required|date',
                'hubungan_dengan_pasien' => 'required|integer',
                'no_telepon_wali' => 'nullable|string|max:15',
                'alamat_wali' => 'nullable|string|max:100',

                // Layanan
                'id_poli' => 'required|numeric',
                'id_data_dokter' => 'required|numeric',
                'jenis_pembayaran' => 'required|numeric',
            ]);

            // Cek pasien berdasarkan NIK
            $existingPatient = null;
            if (!empty($validatedData['nik_pasien'])) {
                $existingPatient = DataPasien::where('nik_pasien', $validatedData['nik_pasien'])->first();
            }

            // Jika pasien belum ada, buat pasien baru
            if (!$existingPatient) {
                // Ambil pasien terakhir berdasarkan no_rm
                $lastPatient = DataPasien::orderByDesc('no_rm')->first();

                // Ambil angka dari no_rm terakhir (hanya bagian angka setelah 'RM')
                $lastNumber = 0;

                if ($lastPatient && preg_match('/^RM(\d{6})$/', $lastPatient->no_rm, $matches)) {
                    $lastNumber = (int) $matches[1];
                }
                $newNumber = $lastNumber + 1;
                $no_rm = 'RM' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
                $existingPatient = DataPasien::create(array_merge($validatedData, [
                    'no_rm' => $no_rm
                ]));
            } else {
                // Gunakan no_rm dari data pasien lama
                $no_rm = $existingPatient->no_rm;

                // Update pasien
                $existingPatient->update([
                    'nama_pasien' => $validatedData['nama_pasien'],
                    'tempat_lahir_pasien' => $validatedData['tempat_lahir_pasien'],
                    'tanggal_lahir_pasien' => $validatedData['tanggal_lahir_pasien'],
                    'jenis_kelamin' => $validatedData['jenis_kelamin'],
                    'agama' => $validatedData['agama'],
                    'pendidikan_pasien' => $validatedData['pendidikan_pasien'],
                    'pekerjaan_pasien' => $validatedData['pekerjaan_pasien'],
                    'alamat_pasien' => $validatedData['alamat_pasien'],
                    'rt' => $validatedData['rt'],
                    'rw' => $validatedData['rw'],
                    'no_telepon_pasien' => $validatedData['no_telepon_pasien'],
                    'status_perkawinan' => $validatedData['status_perkawinan'],
                    'kewarganegaraan' => $validatedData['kewarganegaraan'],
                    'gol_darah' => $validatedData['gol_darah'],
                    'nama_ibu_kandung' => $validatedData['nama_ibu_kandung'],
                    'id_provinsi' => $validatedData['id_provinsi'],
                    'id_kota' => $validatedData['id_kota'],
                    'id_kecamatan' => $validatedData['id_kecamatan'],
                    'id_desa' => $validatedData['id_desa'],
                    'kode_pos' => $validatedData['kode_pos'],
                ]);
            }

            // Cek wali pasien
            $existingWali = WaliPasien::where('nama_wali', $validatedData['nama_wali'])
                ->where('no_telepon_wali', $validatedData['no_telepon_wali'] ?? null)
                ->first();

            if (!$existingWali) {
                $existingWali = WaliPasien::create([
                    'no_rm' => $no_rm,
                    'nama_wali' => $validatedData['nama_wali'],
                    'tanggal_lahir_wali' => $validatedData['tanggal_lahir_wali'],
                    'hubungan_dengan_pasien' => $validatedData['hubungan_dengan_pasien'],
                    'no_telepon_wali' => $validatedData['no_telepon_wali'] ?? null,
                    'alamat_wali' => $validatedData['alamat_wali'] ?? null,
                ]);
            }

            // Simpan data pendaftaran
            Pendaftaran::create([
                'no_rm' => $no_rm,
                'id_poli' => 1,
                'id_dokter' => $validatedData['id_data_dokter'],
                'id_wali_pasien' => $existingWali->id,
                'jenis_pembayaran' => $validatedData['jenis_pembayaran'],
                'status' => 'antri',
            ]);

            return redirect()->back()->with('success', 'Data pendaftaran berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data pasien: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    public function getKabupaten($provinsi_id)
    {
        $code = Provinsi::where('id', $provinsi_id)->value('code');

        $kabupaten = Kabupaten::where('province_code', $code)->get();

        return response()->json($kabupaten);
    }


    public function getKecamatan($kabupaten_id)
    {
        $code = Kabupaten::where('id', $kabupaten_id)->value('code');

        $kecamatan = Kecamatan::where('city_code', $code)->get();

        return response()->json($kecamatan);
    }

    public function getDesa($kecamatan_id)
    {
        $districtCode = Kecamatan::where('id', $kecamatan_id)->value('code');

        $desa = Desa::where('district_code', $districtCode)->get();

        return response()->json($desa);
    }


    public function getDataPasien($no_rm)
    {
        $no_rm = trim($no_rm);

        Log::info('NO_RM diterima:', ['no_rm' => $no_rm]);

        $pasien = DataPasien::with('wali', 'provinsi', 'kota', 'kecamatan', 'desa')
            ->where('no_rm', $no_rm)
            ->first();

        if (!$pasien) {
            return response()->json(['error' => 'Pasien tidak ditemukan'], 404);
        }

        Log::info('Pasien ditemukan:', ['pasien' => $pasien]);
        return response()->json($pasien);
    }
}

public function cariPasien(Request $request)
{
    $term = $request->get('term');

    $pasien = Pasien::where('no_rm', 'like', '%' . $term . '%')
        ->orWhere('nama_pasien', 'like', '%' . $term . '%')
        ->limit(10)
        ->get(['no_rm', 'nama_pasien']);

    return response()->json($pasien);
}
