<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ARController extends Controller
{
    public function antrean()
    {
        $data = DB::table('poli_kia');

        return view('main.polikia.antreanPoliKIA', ['data' => $data]);
    }

    public function riwayat()
    {
        return view('main.polikia.riwayatPoliKIA',['data' => $id]); 
    }

    // Tambahkan method ini untuk Search Select2
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
}
