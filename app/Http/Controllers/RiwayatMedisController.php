<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\AsessmenAwal;
use Illuminate\Support\Facades\DB;

class RiwayatMedisController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::with('data_pasien');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('data_pasien', function ($q) use ($search) {
                $q->where('nama_pasien', 'like', "%$search%")
                    ->orWhere('no_rm', 'like', "%$search%");
            });
        }

        $data = $query->orderByDesc('created_at')->paginate(10); // 10 data per halaman
        return view('UGD.riwayat-medis', compact('data'));
    }
    public function cetak($id_pendaftaran)
    {
        // Ambil data pendaftaran tunggal berdasarkan id_pendaftaran
        $pendaftaran = DB::table('pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->first();

        // Ambil data pasien berdasarkan no_rm dari pendaftaran
        $data_pasien = DB::table('data_pasien')
            ->where('no_rm', $pendaftaran->no_rm)
            ->first();

        // Ambil semua asessmen_awal berdasarkan id_pendaftaran
        $asessmen_awal = DB::table('asessmen_awal')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        $asuhan_keperawatan = DB::table('asuhan_keperawatan')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        $cppt = DB::table('cppt')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        $pemeriksaan = DB::table('pemeriksaan')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        // Pemeriksaan UGD berdasarkan relasi triase -> id_pendaftaran
        $pemeriksaan_ugd = DB::table('pemeriksaan_ugd')
            ->join('triase', 'pemeriksaan_ugd.triase_id', '=', 'triase.id')
            ->where('triase.id_pendaftaran', $id_pendaftaran)
            ->select('pemeriksaan_ugd.*', 'triase.id_pendaftaran')
            ->get();

        // Triase
        $triase = DB::table('triase')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        // Layanan KIA
        $layanan_kia = DB::table('poli_kia')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get();

        return view('main.riwayat-medis-cetak', compact(
            'pendaftaran',
            'data_pasien',
            'asessmen_awal',
            'asuhan_keperawatan',
            'cppt',
            'pemeriksaan',
            'pemeriksaan_ugd',
            'triase',
            'layanan_kia',
            'id_pendaftaran'
        ));
    }



    public function show($no_rm)
    {
        // Ambil semua pendaftaran berdasarkan no_rm
        $pendaftaran = DB::table('pendaftaran')->where('no_rm', $no_rm)->get();

        // Ambil data pasien (anggap 1 saja untuk no_rm unik)
        $data_pasien = DB::table('data_pasien')->where('no_rm', $no_rm)->first();

        // Ambil semua asessmen_awal berdasarkan no_rm (join ke pendaftaran)
        $asessmen_awal = DB::table('asessmen_awal')
            ->join('pendaftaran', 'asessmen_awal.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('asessmen_awal.*')
            ->get();

        // Lakukan hal sama untuk tabel lain jika perlu
        $asuhan_keperawatan = DB::table('asuhan_keperawatan')
            ->join('pendaftaran', 'asuhan_keperawatan.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('asuhan_keperawatan.*')
            ->get();

        $cppt = DB::table('cppt')
            ->join('pendaftaran', 'cppt.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('cppt.*')
            ->get();

        $pemeriksaan = DB::table('pemeriksaan')
            ->join('pendaftaran', 'pemeriksaan.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('pemeriksaan.*')
            ->get();

        $pemeriksaan_ugd = DB::table('pemeriksaan_ugd')
            ->join('triase', 'pemeriksaan_ugd.triase_id', '=', 'triase.id')
            ->join('pendaftaran', 'triase.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('pemeriksaan_ugd.*')
            ->get();

        $triase = DB::table('triase')
            ->join('pendaftaran', 'triase.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('triase.*')
            ->get();

        $layanan_kia = DB::table('poli_kia')
            ->join('pendaftaran', 'poli_kia.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('poli_kia.*')
            ->get();

        return view('main.riwayat-medis-detail', compact(
            'pendaftaran',
            'data_pasien',
            'asessmen_awal',
            'asuhan_keperawatan',
            'cppt',
            'pemeriksaan',
            'pemeriksaan_ugd',
            'triase',
            'layanan_kia'
        ));
    }

    public function cetakDetail($no_rm)
    {
        // Ambil semua pendaftaran berdasarkan no_rm
        $pendaftaran = DB::table('pendaftaran')->where('no_rm', $no_rm)->get();

        // Ambil data pasien (anggap 1 saja untuk no_rm unik)
        $data_pasien = DB::table('data_pasien')->where('no_rm', $no_rm)->first();

        // Ambil semua asessmen_awal berdasarkan no_rm (join ke pendaftaran)
        $asessmen_awal = DB::table('asessmen_awal')
            ->join('pendaftaran', 'asessmen_awal.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('asessmen_awal.*')
            ->get();

        // Lakukan hal sama untuk tabel lain jika perlu
        $asuhan_keperawatan = DB::table('asuhan_keperawatan')
            ->join('pendaftaran', 'asuhan_keperawatan.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('asuhan_keperawatan.*')
            ->get();

        $cppt = DB::table('cppt')
            ->join('pendaftaran', 'cppt.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('cppt.*')
            ->get();

        $pemeriksaan = DB::table('pemeriksaan')
            ->join('pendaftaran', 'pemeriksaan.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('pemeriksaan.*')
            ->get();

        $pemeriksaan_ugd = DB::table('pemeriksaan_ugd')
            ->join('triase', 'pemeriksaan_ugd.triase_id', '=', 'triase.id')
            ->join('pendaftaran', 'triase.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('pemeriksaan_ugd.*')
            ->get();

        $triase = DB::table('triase')
            ->join('pendaftaran', 'triase.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('triase.*')
            ->get();

        $layanan_kia = DB::table('poli_kia')
            ->join('pendaftaran', 'poli_kia.id_pendaftaran', '=', 'pendaftaran.id_pendaftaran')
            ->where('pendaftaran.no_rm', $no_rm)
            ->select('poli_kia.*')
            ->get();

        return view('main.detail-riwayat-medis-cetak', compact(
            'pendaftaran',
            'data_pasien',
            'asessmen_awal',
            'asuhan_keperawatan',
            'cppt',
            'pemeriksaan',
            'pemeriksaan_ugd',
            'triase',
            'layanan_kia'
        ));
    }
}
    