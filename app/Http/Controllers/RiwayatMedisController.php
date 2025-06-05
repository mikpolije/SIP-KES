<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

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
}
