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
            $q->where('nama_lengkap', 'like', "%$search%")
              ->orWhere('no_rm', 'like', "%$search%")
              ->orWhere('nomor_telepon', 'like', "%$search%");
        });
    }

    $data = $query->orderByDesc('created_at')->paginate(10); // 10 data per halaman
    return view('UGD.riwayat-medis', compact('data'));
}
public function cetak($id)
{
    $item = DB::table('pendaftaran')
        ->where('id_pendaftaran', $id)
        ->first();

    $data_pasien = DB::table('data_pasien')
        ->where('no_rm', $item->no_rm)
        ->first();

    return view('PoliUmum.cetak-surat-keterangan-sehat', compact('item', 'data_pasien'));
}
public function show($id)
    {
        $data = Pendaftaran::with(['data_pasien', 'asessmen_awal', 'asuhan_keperawatan'])->where('no_rm', $id)->first();
    
        if (!$data) {
            abort(404, 'Data tidak ditemukan');
        }
        // dd($data);
        return view('main.riwayat-medis-detail', compact('data'));
    }
}
