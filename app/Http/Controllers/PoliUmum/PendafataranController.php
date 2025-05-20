<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;

class PendafataranController extends Controller
{
    public function index()
    {
        return view('main.pendaftaran', [
            'data_pasien' => DataPasien::all(),
            'data_dokter' => dokter::all(),
            'data_poli' => poli::all()
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
                'provinsi' => 'nullable|numeric',
                'kabupaten' => 'nullable|numeric',
                'kecamatan' => 'required|numeric',
                'desa' => 'nullable|numeric',
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

            // Cek pasien berdasarkan nik atau no_rm
            $existingPatient = null;
            if (!empty($validatedData['nik_pasien'])) {
                $existingPatient = DataPasien::where('nik_pasien', $validatedData['nik_pasien'])->first();
            } elseif (!empty($validatedData['no_rm'])) {
                $existingPatient = DataPasien::where('no_rm', $validatedData['no_rm'])->first();
            }

            // Jika pasien belum ada, buat pasien baru
            if (!$existingPatient) {
                $lastPatient = DataPasien::orderByDesc('no_rm')->first();
                $lastNumber = $lastPatient ? (int) substr($lastPatient->no_rm, 2) : 0;
                $newNumber = $lastNumber + 1;
                $no_rm = 'RM' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);

                $existingPatient = DataPasien::create(array_merge(
                    $validatedData,
                    ['no_rm' => $no_rm]
                ));
            } else {
                // Update pasien yang sudah ada berdasarkan no_rm
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
                    'provinsi' => $validatedData['provinsi'],
                    'kabupaten' => $validatedData['kabupaten'],
                    'kecamatan' => $validatedData['kecamatan'],
                    'desa' => $validatedData['desa'],
                    'kode_pos' => $validatedData['kode_pos'],
                ]);
            }

            $no_rm = $existingPatient->no_rm;

            // Cek wali berdasarkan nama dan no telepon
            $existingWali = DataWali::where('nama_wali', $validatedData['nama_wali'])
                ->where('no_telepon_wali', $validatedData['no_telepon_wali'] ?? null)
                ->first();

            // Jika wali belum ada, buat wali baru
            if (!$existingWali) {
                $existingWali = DataWali::create([
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
                'id_poli' => $validatedData['id_poli'],
                'id_data_dokter' => $validatedData['id_data_dokter'],
                'id_data_wali_pasien' => $existingWali->id_data_wali_pasien,
                'jenis_pembayaran' => $validatedData['jenis_pembayaran'],
            ]);

            return redirect()->back()->with('success', 'Data pendaftaran berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data pasien: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    public function getDataPasien($no_rm)
    {
        $no_rm = trim($no_rm);

        Log::info('NO_RM diterima:', ['no_rm' => $no_rm]);

        $pasien = DataPasien::with('wali')->where('no_rm', $no_rm)->first();

        if (!$pasien) {
            return response()->json(['error' => 'Pasien tidak ditemukan'], 404);
        }

        Log::info('Pasien ditemukan:', ['pasien' => $pasien]);
        return response()->json($pasien);
    }

}
