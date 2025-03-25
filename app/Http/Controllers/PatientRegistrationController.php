<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientRegistrationController;

Route::post('/patient-registration', [PatientRegistrationController::class, 'store'])->name('patient.register');

class PatientRegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Patient Identity Fields
            'norm' => 'required|unique:data_pasien,no_rm',
            'nama' => 'required|string|max:150',
            'nik' => 'required|digits:16',
            'tempatlahir' => 'required|string|max:100',
            'tanggallahir' => 'required|date',
            'jeniskelamin' => 'required|in:tidakdiketahui,lakilaki,perempuan,tidakdapatditentukan,tidakmengisi',
            'alamatlengkap' => 'required|string|max:255',
            'provinsi' => 'nullable|string|max:50',
            'kota' => 'nullable|string|max:50',
            'kecamatan' => 'nullable|string|max:50',
            'kelurahan' => 'nullable|string|max:50',
            'kodepos' => 'nullable|string|max:10',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'agama' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu,penghayat,lainlain',
            'perkawinan' => 'nullable|in:belumkawin,kawin,ceraihidup,ceraimati',
            'pendidikan' => 'nullable|in:tidaksekolah,sd,sltpsederajat,sltasederajat,d1d3,d4,s1,s2,s3',
            'pekerjaan' => 'nullable|in:tidakbekerja,pns,tnipolri,bumn,pegawaiswasta,lain-lain',
            'kewarganegaraan' => 'nullable|in:wni,wna',
            'telepon' => 'nullable|string|max:15',
            'ibukandung' => 'nullable|string|max:150',
            'goldar' => 'nullable|in:a,b,ab,o,tidakdiketahui',

            // Guardian Fields
            'hubungan' => 'nullable|in:dirisendiri,ortu,anak,suamiistri,kerabat,lainlain',
            'namawali' => 'nullable|string|max:150',
            'tlwali' => 'nullable|date',
            'notelpwali' => 'nullable|string|max:15',
            'alamatwali' => 'nullable|string|max:255',

            // Registration Fields
            'layanan' => 'required|in:poliumum,poligigi,kia,circum,vaksin',
            'dokter' => 'required|in:dr1,dr2',
            'bayar' => 'required|in:umum,bpjs',
        ]);

        try {
            // Begin database transaction
            DB::beginTransaction();

            // Insert patient data
            $patientId = DB::table('data_pasien')->insertGetId([
                'no_rm' => $validatedData['norm'],
                'nik_pasien' => $validatedData['nik'],
                'nama_pasien' => $validatedData['nama'],
                'tempat_lahir_pasien' => $validatedData['tempatlahir'],
                'tanggal_lahir_pasien' => Carbon::parse($validatedData['tanggallahir']),
                'jenis_kelamin' => $validatedData['jeniskelamin'],
                'alamat_pasien' => $validatedData['alamatlengkap'],
                'provinsi' => $validatedData['provinsi'],
                'kota' => $validatedData['kota'],
                'kecamatan' => $validatedData['kecamatan'],
                'kelurahan' => $validatedData['kelurahan'],
                'kode_pos' => $validatedData['kodepos'],
                'rt' => $validatedData['rt'],
                'rw' => $validatedData['rw'],
                'agama' => $validatedData['agama'],
                'status_perkawinan' => $validatedData['perkawinan'],
                'pendidikan' => $validatedData['pendidikan'],
                'pekerjaan' => $validatedData['pekerjaan'],
                'kewarganegaraan' => $validatedData['kewarganegaraan'],
                'no_telepon' => $validatedData['telepon'],
                'nama_ibu_kandung' => $validatedData['ibukandung'],
                'gol_darah' => $validatedData['goldar'],
            ]);

            // Insert guardian data
            DB::table('data_wali')->insert([
                'no_rm' => $validatedData['norm'],
                'hubungan' => $validatedData['hubungan'] ?? null,
                'nama_wali' => $validatedData['namawali'] ?? null,
                'tanggal_lahir_wali' => $validatedData['tlwali'] ? Carbon::parse($validatedData['tlwali']) : null,
                'no_telp_wali' => $validatedData['notelpwali'] ?? null,
                'alamat_wali' => $validatedData['alamatwali'] ?? null,
            ]);

            // Insert registration data
            DB::table('pendaftaran')->insert([
                'no_rm' => $validatedData['norm'],
                'layanan' => $validatedData['layanan'],
                'dokter' => $validatedData['dokter'],
                'cara_bayar' => $validatedData['bayar'],
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran pasien berhasil disimpan.',
                'no_rm' => $validatedData['norm']
            ], 201);

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan pendaftaran: ' . $e->getMessage()
            ], 500);
        }
    }
}