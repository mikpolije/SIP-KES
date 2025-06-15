<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\ResumeMedis;
use App\Models\Diagnosa;

new
#[Layout('layouts.blank')]
#[Title('Surat Rencana Kontrol')]
class extends Component {
    public $icd10Counts = [];
    public $startDate;
    public $endDate;

    public function mount($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->generateReport();
    }

    public function generateReport()
    {
        $query = ResumeMedis::with(['pendaftaran.cppt', 'pendaftaran.data_pasien']);

        if ($this->startDate) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if ($this->endDate) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $resumeMedis = $query->get();

        $icd10Codes = $resumeMedis
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

            foreach ($resumeMedis as $rm) {
                $hasCode = $rm->pendaftaran->cppt->contains(function($cppt) use ($code) {
                    $codes = json_decode($cppt->id_icd10, true) ?? [];
                    return in_array($code, $codes);
                });

                if (!$hasCode) continue;

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
    <div class="container-fluid p-4 bg-white ">
        <div class="mx-auto" style="max-width: 1200px;">
            <div class="border-0 d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid">
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold text-dark">Formulir RL 5.3</h4>
                        <p class="mb-0 text-muted">Daftar 10 Besar Penyakit Rawat Inap</p>
                        @if($startDate || $endDate)
                            <p class="mb-0 text-muted small">
                                Periode:
                                {{ $startDate ? \Carbon\Carbon::parse($startDate)->format('d/m/Y') : 'Awal' }} -
                                {{ $endDate ? \Carbon\Carbon::parse($endDate)->format('d/m/Y') : 'Akhir' }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" class="align-middle">NO.</th>
                                <th scope="col" class="align-middle">KODE ICD 10</th>
                                <th scope="col" class="align-middle">PENYAKIT</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>LAKI-LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($icd10Counts as $index => $row)
                                <tr class="table-light">
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

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="button" class="btn btn-primary px-4" onClick="window.print()">
                        <i class="bi bi-printer me-2"></i>Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
