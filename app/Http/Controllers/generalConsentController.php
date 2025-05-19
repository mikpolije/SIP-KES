<?php

namespace App\Http\Controllers;

use App\Models\generalConsent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
    public function showForm($token)
    {
        return view('signature.form', compact('token'));
    }

    public function submitForm(Request $request, $token)
    {
        $request->validate([
            'nama' => 'required',
            'ttd_image' => 'required|string' // base64 PNG dari canvas
        ]);

        $nama = $request->nama;
        $ttdBase64 = $request->ttd_image;

        // Hapus prefix "data:image/png;base64,"
        $ttdBase64 = preg_replace('/^data:image\/png;base64,/', '', $ttdBase64);

        // Simpan ke storage/app/public/signatures/{token}.png
        \Storage::disk('public')->put("signatures/{$token}.png", base64_decode($ttdBase64));

        // Simpan nama ke cache
        \Cache::put("signed_{$token}", [
            'nama' => $nama,
            'token' => $token
        ], now()->addMinutes(5));

        return response()->json(['message' => 'Tanda tangan berhasil disimpan']);
    }


    public function checkStatus($token)
    {
        $data = \Cache::get("signed_{$token}");

        if (!$data) {
            return response()->json(['signed' => false]);
        }

        $path = "signatures/{$token}.png";
        if (!\Storage::disk('public')->exists($path)) {
            return response()->json(['signed' => false]);
        }

        $image = \Storage::disk('public')->get($path);
        $base64 = base64_encode($image);
        $imageDataUrl = 'data:image/png;base64,' . $base64;

        return response()->json([
            'signed' => true,
            'nama' => $data['nama'],
            'ttd_base64' => $imageDataUrl
        ]);
    }

}
