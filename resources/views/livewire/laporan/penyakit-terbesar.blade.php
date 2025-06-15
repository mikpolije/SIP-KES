<?php

use Livewire\Volt\Component;
use App\Models\ResumeMedis;
use App\Models\Diagnosa;

new class extends Component {
    public $icd10Counts = [];
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->generateReport();
    }

    public function generateReport()
    {
        $icd10Codes = ResumeMedis::with('pendaftaran.cppt')
            ->get()
            ->flatMap(function($rm) {
                return $rm->pendaftaran->cppt
                    ->flatMap(function($cppt) {
                        return json_decode($cppt->id_icd10, true) ?? [];
                    });
            })
            ->unique()
            ->values();

        $diagnosas = Diagnosa::whereIn('id', $icd10Codes)
            ->get()
            ->keyBy('id');

        $this->icd10Counts = [];

        foreach ($icd10Codes as $code) {
                if (!isset($diagnosas[$code])) continue;

                $counts = [
                    'laki_hidup' => 0,
                    'perempuan_hidup' => 0,
                    'laki_meninggal' => 0,
                    'perempuan_meninggal' => 0
                ];

                $resumes = ResumeMedis::whereHas('pendaftaran.cppt', function($q) use ($code) {
                    $q->where('id_icd10', 'like', '%"'.$code.'"%')
                      ->orWhere('id_icd10', 'like', '%'.$code.'%');
                })
                ->with('pendaftaran.data_pasien')
                ->get();

            foreach ($resumes as $rm) {
                $gender = $rm->pendaftaran->data_pasien->jenis_kelamin;
                $status = $rm->kondisi_saat_pulang;

                if ($gender == 1 && $status == 'Hidup') $counts['laki_hidup']++;
                if ($gender == 2 && $status == 'Hidup') $counts['perempuan_hidup']++;
                if ($gender == 1 && $status == 'Meninggal') $counts['laki_meninggal']++;
                if ($gender == 2 && $status == 'Meninggal') $counts['perempuan_meninggal']++;
            }

            $this->icd10Counts[] = [
                'diagnosa' => $diagnosas[$code],
                'counts' => $counts,
                'total' => array_sum($counts)
            ];
        }
    }
};
?>

<div>
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="title">Laporan</h1>

                <div class="row align-items-end mb-4">
                    <div class="col-md-3">
                        <label for="tanggalMasuk" class="form-label text-muted small">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggalMasuk" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="col-md-3">
                        <label for="tanggalKeluar" class="form-label text-muted small">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggalKeluar" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary me-2">
                            <i class="bi bi-search"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('rawat-inap.laporan-print') }}'">
                            <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <h5 class="card-title mb-3">Daftar RL 5.3 ICD 10</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col" class="align-middle">NO.</th>
                                <th scope="col" class="align-middle">KODE ICD 10</th>
                                <th scope="col" class="align-middle">PENYAKIT</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($icd10Counts as $index => $row)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $row['diagnosa']->code ?? '-' }}</td>
                                    <td>{{ $row['diagnosa']->display ?? '-' }}</td>
                                    <td class="text-center">{{ $row['counts']['laki_hidup'] }}</td>
                                    <td class="text-center">{{ $row['counts']['perempuan_hidup'] }}</td>
                                    <td class="text-center">{{ $row['counts']['laki_meninggal'] }}</td>
                                    <td class="text-center">{{ $row['counts']['perempuan_meninggal'] }}</td>
                                    <td class="text-center fw-bold">{{ $row['total'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
