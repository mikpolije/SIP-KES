<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use App\Exports\PoliUmumExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\ICD10_Umum;
use App\Models\ICD;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function kunjungan()
    {
        return view('PoliUmum.laporankunjunganpoliumum');
    }

    public function index(Request $request)
    {
        $bulan = $request->input('bulan', date('F'));
        $caraBayar = $request->input('cara_bayar', 'Umum');

        $data = $this->getDataPenyakit($bulan, $caraBayar);

        return view('PoliUmum.laporan', [
            'bulan' => $this->translateMonthToIndonesian($bulan),
            'caraBayar' => $caraBayar,
            'data' => $data,
        ]);
    }

    private function getDataPenyakit($bulan, $caraBayar)
    {
        $bulanAngka = date('m', strtotime("1 $bulan 2024"));
        $tahun = 2024;

        $startDate = Carbon::create($tahun, $bulanAngka, 1)->startOfMonth()->toDateString();
        $endDate = Carbon::create($tahun, $bulanAngka, 1)->endOfMonth()->toDateString();

        // Query data ICD10
        $data = ICD10_Umum::select('id_icd10', DB::raw('COUNT(*) as jumlah'))
            ->whereHas('pemeriksaan', function ($query) use ($startDate, $endDate, $caraBayar) {
                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->whereHas('pendaftaran', function ($q) use ($caraBayar) {
                        $q->where('jenis_pembayaran', $caraBayar);
                    });
            })
            ->groupBy('id_icd10')
            ->orderByDesc('jumlah')
            ->limit(10)
            ->get();

        $total = $data->sum('jumlah');

        // Format data tabel
        return $data->map(function ($item) use ($total) {
            $kode = $item->id_icd10;
            $nama = ICD::where('id', $kode)->value('display') ?? '-'; // Pastikan ada data
            $jumlah = $item->jumlah;
            $persen = $total > 0 ? number_format(($jumlah / $total) * 100, 2) : '0.00';

            return [$kode, $nama, $jumlah, $persen . '%'];
        });
    }

    public function downloadExcel(Request $request)
    {
        $bulan = $request->input('bulan', date('F'));
        $caraBayar = $request->input('cara_bayar', 'Umum');
        $data = $this->getFilteredData($bulan, $caraBayar);
        $bulanIndo = $this->translateMonthToIndonesian($bulan);

        // Prepare data for export
        $exportData = [];
        foreach ($data as $index => $row) {
            $exportData[] = [
                $index + 1,
                $row[0],
                $row[1],
                $row[2],
                $row[3]
            ];
        }

        $title = "10 Besar Penyakit {$bulanIndo} {$caraBayar}";

        return Excel::download(
            new PoliUmumExport($exportData, $title),
            "10_besar_penyakit_{$bulanIndo}_{$caraBayar}.xlsx"
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
