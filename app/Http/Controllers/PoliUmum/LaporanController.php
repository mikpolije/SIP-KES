<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data filter dari request
        $bulan = $request->input('bulan', 'Mei');
        $caraBayar = $request->input('cara_bayar', 'Umum');

        // Simulasi data hasil filter (di dunia nyata ini akan ambil dari DB)
        $data = [
            ['N18.5', 'Cronic infarct failure', 1000, '80%'],
            ['I63.9', 'Cerebral infarction', 900, '75%'],
            ['P07.1', 'Other low birth', 897, '70%'],
            ['J18.9', 'Pneumonia', 890, '65%'],
            ['A16.2', 'Tuberculosis', 700, '60%'],
            ['D64.9', 'Anemia', 600, '55%'],
            ['S06.0', 'Concussion', 500, '50%'],
            ['A91', 'DHF', 498, '45%'],
            ['O14.1', 'Pre-eclamsia', 367, '40%'],
            ['I25.1', 'Hearth Disease', 235, '35%'],
        ];

        // Kirim data ke view
        return view('poliumum.laporan', [
            'bulan' => $bulan,
            'caraBayar' => $caraBayar,
            'data' => $data
        ]);
    }
}
