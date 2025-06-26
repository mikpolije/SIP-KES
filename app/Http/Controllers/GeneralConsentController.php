<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\GeneralConsent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneralConsentController extends Controller
{
    public function index()
    {
        $pasiens = DataPasien::orderBy("created_at", "desc")->get();
        return view('main.general-consent', compact('pasiens'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_rm' => 'required|',
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
            'ttdPenanggungJawab' => 'nullable|string',
            'ttdPemberiInformasi' => 'nullable|string',
        ]);


        $ttdPath = null;
        if ($request->filled('ttdPenanggungJawab')) {
            $ttdData = $request->ttdPenanggungJawab;

            // Ambil hanya isi base64 tanpa prefix
            $base64Image = explode(',', $ttdData)[1] ?? null;

            if ($base64Image) {
                $ttdFileName = 'ttd_' . Str::random(10) . '.png';
                $path = public_path('ttd/' . $ttdFileName);
                file_put_contents($path, base64_decode($base64Image));
                $ttdPath = 'ttd/' . $ttdFileName; // Simpan relative path ke DB
            }
        }

        $ttdPemberiPath = null;
        if ($request->filled('ttdPemberiInformasi')) {
            $ttdData = $request->ttdPemberiInformasi;

            // Ambil hanya isi base64 tanpa prefix
            $base64Image = explode(',', $ttdData)[1] ?? null;

            if ($base64Image) {
                $ttdFileName = 'ttd_pemberi_' . Str::random(10) . '.png';
                $path = public_path('ttd/' . $ttdFileName);
                file_put_contents($path, base64_decode($base64Image));
                $ttdPemberiPath = 'ttd/' . $ttdFileName; // Simpan relative path ke DB
            }
        }
        $hubungan = $request->hubungan === '7' ? $request->lain : $request->hubungan;

        $data = GeneralConsent::create([
            'no_rm' => $request->no_rm,
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
            'ttdPenanggungJawab' => $ttdPath,
            'ttdPemberiInformasi' => $ttdPemberiPath,

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
            'ttd_image' => 'required|string' // base64 PNG dari canvas
        ]);

        $ttdBase64 = $request->ttd_image;

        // Hapus prefix "data:image/png;base64,"
        $ttdBase64 = preg_replace('/^data:image\/png;base64,/', '', $ttdBase64);

        // Simpan ke storage
        Storage::disk('public')->put("signatures/{$token}.png", base64_decode($ttdBase64));

        // Simpan ke cache hanya tanda tangan, nama diisi null dulu
        Cache::put("signed_{$token}", [
            'ttd' => true,
            'token' => $token
        ], now()->addMinutes(5));

        return response()->json(['message' => 'Tanda tangan berhasil disimpan']);
    }

    public function checkStatus($token)
    {
        $data = Cache::get("signed_{$token}");

        if (!$data) {
            return response()->json(['signed' => false]);
        }

        $path = "signatures/{$token}.png";
        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['signed' => false]);
        }

        $image = Storage::disk('public')->get($path);
        $base64 = base64_encode($image);
        $imageDataUrl = 'data:image/png;base64,' . $base64;

        // Nama diambil dari request sebelumnya saat form submit (namaWali)
        // Anda bisa menyimpan namaWali ke cache saat generate QR, misal saat showQRModal()
        $namaWali = session("nama_wali_for_{$token}"); // atau pakai cache jika disimpan saat scan

        return response()->json([
            'signed' => true,
            'nama' => $namaWali,
            'ttd_base64' => $imageDataUrl
        ]);
    }
}
