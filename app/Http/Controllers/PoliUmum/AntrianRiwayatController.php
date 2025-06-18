<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use App\Models\DataPasien;
use App\Models\PemeriksaanAwal;
use Illuminate\Support\Facades\Log;

class AntrianRiwayatController extends Controller
{
    public function antrean()
    {
        $data_pasien = Pendaftaran::with('data_pasien', 'wali_pasien',)->where('status', 'antri')->get();
        return view('PoliUmum.antreanPoliUmum', [
            'data_pasien' => $data_pasien
        ]);
    }

    public function pemeriksaanAwal($id_pendaftaran)
    {
        // dd($id_pendaftaran);
        $data_pendaftaran = Pendaftaran::where('id_pendaftaran', $id_pendaftaran)->first();
        return view('PoliUmum.pemeriksaanAwal', [
            'data_pendaftaran' => $data_pendaftaran
        ]);
    }

    public function storePemeriksaanAwal(Request $request)
    {
        // dd($request->all());
        try {
            $id_pendaftaran = Pendaftaran::where('id_pendaftaran', $request->id_pendaftaran)->first();
            $validatedData = $request->validate([
                'tanggal_periksa_pasien' => 'required|date',
                'kunjungan_sakit' => 'required',
                'subjektif' => 'required',
                'sistole' => 'required',
                'diastole' => 'required',
                'bb_pasien' => 'required',
                'tb_pasien' => 'required',
                'suhu' => 'required',
                'spo2' => 'required',
                'rr_pasien' => 'required',
            ]);

            $validatedData['id_pendaftaran'] = $id_pendaftaran->id_pendaftaran;
            PemeriksaanAwal::create($validatedData);

            Pendaftaran::where('id_pendaftaran', $request->id_pendaftaran)->update([
                'status' => 'belum diperiksa'
            ]);

            return redirect()->route('antrean.poliumum')->with('success', 'Data pendaftaran berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data periksaan awal: ' . $e->getMessage());
            return redirect()->route('antrean.poliumum')->withErrors(['msg' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    public function riwayat()
    {
        $data_pemeriksaan = PemeriksaanAwal::with('pendaftaran', 'pendaftaran.data_pasien')->get();
        return view('PoliUmum.antreanPoliUmumstep3', [
            'data_pemeriksaan' => $data_pemeriksaan
        ]);
    }

    public function pemeriksaanAkhir($id_pemeriksaan)
    {
        // $icd10 = ICD::orderBy('id', 'asc')->get();
        $pemeriksaan = PemeriksaanAwal::where('id_pemeriksaan', $id_pemeriksaan)->first();
        return view('PoliUmum.pemeriksaanAkhir', [
            'pemeriksaan' => $pemeriksaan,
            // 'icd10' => $icd10
        ]);
    }

    public function storePemeriksaanStep3(Request $request, $id_pemeriksaan)
    {
        try {
            $validatedData = $request->validate([
                'diagnosa' => 'nullable',
                'assesment' => 'nullable',
                'plan' => 'nullable',
                'bagian_diperiksa' => 'nullable',
                'keterangan' => 'nullable',
                'rencana_kontrol' => 'date|nullable',
                'alasan_kontrol' => 'nullable',
                'catatan_obat' => 'nullable',
                'id_icd10_list' => 'nullable|array',
                'id_icd9_list' => 'nullable|array',
                'id_layanan_list' => 'nullable|array',
                'id_obat_list' => 'nullable|array',
                'qty_obat_list' => 'nullable|array',
            ]);

            $pemeriksaan = PemeriksaanAwal::where('id_pemeriksaan', $id_pemeriksaan)->firstOrFail();
            $pemeriksaan->update([
                'diagnosa' => $request->diagnosa,
                'assesment' => $request->assesment,
                'plan' => $request->plan,
                'bagian_diperiksa' => $request->bagian_diperiksa,
                'keterangan' => $request->keterangan,
                'rencana_kontrol' => $request->rencana_kontrol,
                'alasan_kontrol' => $request->alasan_kontrol,
                'catatan_obat' => $request->catatan_obat,
                'bagian_diperiksa' => $request->bagian_diperiksa,
                'keterangan' => $request->keterangan,
            ]);

            // di pendafataran status selesai
            Pendaftaran::where('id_pendaftaran', $pemeriksaan->id_pendaftaran)->update([
                'status' => 'selesai'
            ]);

            // ICD9
            foreach ($request->id_icd9_list as $id_icd9) {
                if ($id_icd9) {
                    ICD9_Umum::create([
                        'id_icd9' => $id_icd9,
                        'id_pemeriksaan' => $pemeriksaan->id_pemeriksaan,
                    ]);
                }
            }

            // ICD10
            foreach ($request->id_icd10_list as $id_icd10) {
                if ($id_icd10) {
                    ICD10_Umum::create([
                        'id_icd10' => $id_icd10,
                        'id_pemeriksaan' => $pemeriksaan->id_pemeriksaan,
                    ]);
                }
            }
            Log::info('ID Layanan List:', $request->input('id_layanan_list'));

            // Layanan
            if ($request->has('id_layanan_list') && is_array($request->id_layanan_list)) {
                foreach ((array)$request->id_layanan_list as $id_layanan) {
                    if ($id_layanan) {
                        LayananPendaftaran::create([
                            'id_layanan' => $id_layanan,
                            'id_pendaftaran' => $pemeriksaan->id_pendaftaran,
                        ]);
                    }
                }
            }

            // Obat
            if ($request->has('id_obat_list') && is_array($request->id_obat_list)) {
                $qtyList = $request->qty_obat_list;

                foreach ($request->id_obat_list as $index => $id_obat) {
                    if ($id_obat && isset($qtyList[$index])) {
                        ObatPendaftaran::create([
                            'id_pendaftaran' => $pemeriksaan->id_pendaftaran,
                            'id_obat' => $id_obat,
                            'qty' => $qtyList[$index],
                        ]);

                        // Kurangi stok di tabel obat
                        $obat = Obat::find($id_obat);
                        if ($obat) {
                            $obat->stok = max(0, $obat->stok - $qtyList[$index]);
                            $obat->save();
                        }
                    }
                }
            }


            return redirect()->route('PoliUmum.antreanPoliUmumstep3')->with('success', 'Data pemeriksaan berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data pemeriksaan: ' . $e->getMessage());
            return redirect()->route('PoliUmum.antreanPoliUmumstep3')->withErrors(['msg' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    // searching ICD9
    public function searchICD9(Request $request)
    {
        $term = $request->input('term');

        $results = ICD9::where('code', 'LIKE', "%{$term}%")
            ->orWhere('display', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['id', 'code', 'display']);

        return response()->json($results);
    }

    // searching ICD10
    public function searchICD10(Request $request)
    {
        $term = $request->input('term');

        $results = ICD::where('code', 'LIKE', "%{$term}%")
            ->orWhere('display', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['id', 'code', 'display']);

        return response()->json($results);
    }

    // search layanan
    public function searchLayanan(Request $request)
    {
        $term = $request->input('term');

        $results = Layanan::where('nama_layanan', 'LIKE', "%{$term}%")
            ->orWhere('tarif_layanan', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['id', 'nama_layanan', 'tarif_layanan']);

        return response()->json($results);
    }

    // search obat
    public function searchObat(Request $request)
    {
        $term = $request->input('term');

        $results = Obat::where('nama', 'LIKE', "%{$term}%")
            ->orWhere('harga', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['id_obat', 'nama', 'harga', 'stok']);

        return response()->json($results);
    }

    public function antrianPemeriksaan3()
    {
        $data_pemeriksaan = PemeriksaanAwal::with('pendaftaran', 'pendaftaran.data_pasien')->get();
        return view('PoliUmum.antreanPoliumumstep3', [
            'data_pemeriksaan' => $data_pemeriksaan
        ]);
    }

    // public function riwayat()
    // {
    //     return view('PoliUmum.riwayatPoliUmum');
    // }

    // Untuk fitur Select2 pencarian pasien
    public function searchPasien(Request $request)
    {
        $search = $request->input('q');

        $results = DB::table('pasien') // ganti jika nama tabelmu bukan 'pasien'
            ->select('no_rm', 'nama')
            ->where('no_rm', 'like', "%{$search}%")
            ->orWhere('nama', 'like', "%{$search}%")
            ->limit(10)
            ->get();

        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => $row->no_rm,
                'text' => "{$row->no_rm} - {$row->nama}"
            ];
        }

        return response()->json(['results' => $data]);
    }


    // ✅ Fungsi untuk menampilkan detail pasien + riwayat kunjungan
    public function detail($rm)
    {
        // Ambil data pendaftaran dan pasien berdasarkan no RM
        $pendaftaran = Pendaftaran::with('data_pasien')
            ->where('no_rm', $rm)
            ->firstOrFail();

        // Ambil semua riwayat pemeriksaan terkait pasien ini
        $riwayat = Pemeriksaan::with('pendaftaran')
            ->whereHas('pendaftaran', function ($query) use ($rm) {
                $query->where('no_rm', $rm);
            })
            ->orderBy('tanggal_periksa_pasien', 'desc')
            ->get();

        return view('PoliUmum.detailRiwayat', [
            'pendaftaran' => $pendaftaran,
            'riwayat' => $riwayat,
        ]);
    }

}
