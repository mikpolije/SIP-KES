<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use App\Exports\PoliUmumExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data filter dari request
        $bulan = $request->input('bulan', date('F'));
        $caraBayar = $request->input('cara_bayar', 'Umum');

        // Data penyakit berdasarkan filter
        $data = $this->getFilteredData($bulan, $caraBayar);

        // Kirim data ke view
        return view('PoliUmum.laporan', [
            'bulan' => $this->translateMonthToIndonesian($bulan),
            'caraBayar' => $caraBayar,
            'data' => $data
        ]);
    }

    public function downloadExcel(Request $request)
    {
        $bulan = $request->input('bulan', date('F'));
        $caraBayar = $request->input('cara_bayar', 'Umum');

        $data = $this->getFilteredData($bulan, $caraBayar);
        $bulanIndo = $this->translateMonthToIndonesian($bulan);

        return Excel::download(
            new PoliUmumExport($data, $bulanIndo, $caraBayar),
            "Laporan_10_Besar_Penyakit_{$bulanIndo}_{$caraBayar}.xlsx"
        );
    }

    private function getFilteredData($bulan, $caraBayar)
    {
        // Simulasi data dari database berdasarkan filter
        // Di implementasi nyata, ini akan query ke database
        $allData = [
            'Umum' => [
                'Januari' => [
                    ['N18.5', 'Cronic infarct failure', 950, '78%'],
                    ['I63.9', 'Cerebral infarction', 850, '72%'],
                    // ... data lainnya
                ],
                'Februari' => [
                    // Data februari
                ],
                // ... bulan lainnya
                'Mei' => [
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
                ]
            ],
            'BPJS' => [
                // Data untuk BPJS
            ],
            'Asuransi' => [
                // Data untuk Asuransi
            ]
        ];

        // Default data jika filter tidak ditemukan
        return $allData[$caraBayar][$bulan] ?? [
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
    }

    private function translateMonthToIndonesian($month)
    {
        $translations = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        return $translations[$month] ?? $month;
    }
}
