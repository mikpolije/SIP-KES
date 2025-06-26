<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use App\Exports\PoliUmumExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ICD10_Umum;
use App\Models\PemeriksaanAwal;
use App\Models\Dokter;

class LaporanController extends Controller
{
    public function kunjungan(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $idDokter = $request->input('id_dokter');
        $caraBayar = $request->input('carabayar');

        $kunjungan = PemeriksaanAwal::with(['pendaftaran.data_pasien'])
            ->whereHas('pendaftaran', function ($query) use ($startDate, $endDate, $idDokter, $caraBayar) {
                $query->where('id_poli', 1)
                    ->where('status', 'selesai');

                // Filter tanggal
                if ($startDate && $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }

                // Filter dokter
                if ($idDokter) {
                    $query->where('id_dokter', $idDokter);
                }

                // Filter jenis bayar
                if ($caraBayar) {
                    $query->where('jenis_pembayaran', $caraBayar);
                }
            })
            ->orderByDesc('created_at')
            // ->limit(10)
            ->get();

        $dokter = Dokter::all();

        return view('PoliUmum.laporankunjunganpoliumum', [
            'kunjungan' => $kunjungan,
            'dokter' => $dokter,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'id_dokter' => $idDokter,
            'carabayar' => $caraBayar,
        ]);
    }

    public function index(Request $request)
    {
        $bulan = $request->input('bulan', date('F'));
        $caraBayarInput = $request->input('cara_bayar', '1');

        // Mapping angka ke label
        $caraBayarLabel = [
            '' => 'Semua',
            '1' => 'Umum',
            '2' => 'BPJS'
        ];

        $bulanIndoToAngka = [
            'Januari' => '01',
            'Februari' => '02',
            'Maret' => '03',
            'April' => '04',
            'Mei' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'Agustus' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12',
        ];

        $bulanAngka = $bulanIndoToAngka[$bulan] ?? date('m');

        $data = $this->getFilteredData($bulan, $caraBayarLabel[$caraBayarInput] ?? 'Umum');

        $icd10 = ICD10_Umum::select('id_icd10', DB::raw('COUNT(*) as jumlah'))
            ->when($bulanAngka, function ($query) use ($bulanAngka) {
                $query->whereMonth('created_at', $bulanAngka);
            })
            ->whereHas('pemeriksaan.pendaftaran', function ($query) use ($caraBayarInput) {
                if (!empty($caraBayarInput)) {
                    $query->where('jenis_pembayaran', $caraBayarInput);
                }
            })
            ->groupBy('id_icd10')
            ->orderByDesc('jumlah')
            ->take(10)
            ->with('icd10')
            ->get();

        return view('PoliUmum.laporan', [
            'bulan' => $bulan,
            'caraBayar' => $caraBayarInput,
            'data' => $data,
            'icd10' => $icd10
        ]);
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
