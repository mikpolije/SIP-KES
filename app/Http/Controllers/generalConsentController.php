<?php

namespace App\Http\Controllers;

use App\Models\generalConsent;
use Illuminate\Http\Request;

class generalConsentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'noRm' => 'required|unique:general_consent',
            'nik' => 'required|numeric',
            'jenisKelamin' => 'required|integer',
            'namaPasien' => 'required|string',
            'tanggalLahir' => 'required|date',
            'namaWali' => 'required|string',
            'tanggalLahirWali' => 'required|date',
            'hubungan' => 'required|string',
            'alamat' => 'required|string',
            'notelp' => 'required|string',
            'beri' => 'required|string',
            'ijin' => 'required|string',
            'penanggungJawab1' => 'nullable|string',
            'penanggungJawab2' => 'nullable|string',
            'penanggungJawab3' => 'nullable|string',
            'penanggungJawab4' => 'nullable|string',
            'namaPenanggungJawab' => 'nullable|string',
            'namaPemberiInformasi' => 'nullable|string',
        ]);

        $hubungan = $request->hubungan === '7' ? $request->lain : $request->hubungan;

        $data = generalConsent::create([
            'noRm' => $request->noRm,
            'nik' => $request->nik,
            'jenisKelamin' => $request->jenisKelamin,
            'namaPasien' => $request->namaPasien,
            'tanggalLahir' => $request->tanggalLahir,
            'namaWali' => $request->namaWali,
            'tanggalLahirWali' => $request->tanggalLahirWali,
            'hubungan' => $hubungan,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'beri' => $request->beri,
            'ijin' => $request->ijin,
            'penanggungJawab1' => $request->penanggungJawab1,
            'penanggungJawab2' => $request->penanggungJawab2,
            'penanggungJawab3' => $request->penanggungJawab3,
            'penanggungJawab4' => $request->penanggungJawab4,
            'namaPenanggungJawab' => $request->namaPenanggungJawab,
            'namaPemberiInformasi' => $request->namaPemberiInformasi,
        ]);

        if ($request->input('action') === 'cetak') {
            // Redirect ke halaman cetak dengan ID
            return redirect()->route('general-consent.cetak', ['id' => $data->id]);
        }
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function cetak($id)
    {
        $data = generalConsent::findOrFail($id);
        return view('main/cetak-general-consent', compact('data'));
    }
}
