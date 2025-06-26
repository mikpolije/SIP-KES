<?php

use App\Models\SuratPulangPaksa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('layouts.blank')]
#[Title('Surat Pulang Paksa')]
class extends Component {

    public $surat_pulang_paksa;

    public function mount()
    {
        $this->surat_pulang_paksa = SuratPulangPaksa::where('id', request()->id)->first();
    }
}; ?>

<div>
    <div class="container mt-3 no-print">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

    <div class="container py-1" style="max-width: 210mm; min-height: 297mm;">
        <div class="card border-0">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-4">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <h3 class="title mb-0">SURAT PULANG PAKSA</h3>
                        <h4 class="title">KLINIK INSAN MEDIKA</h4>
                        <div>
                            <p class="mb-0">Nomor : {{ $this->surat_pulang_paksa->nomor }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-2">Yang bertanda tangan di bawah ini :</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Nama</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->nama_lengkap }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">No. Telepon</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->no_telepon }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Hubungan dengan Pasien</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">:
                            @php
                                $hubungan = $this->surat_pulang_paksa->hubungan;
                                $hubunganText = '';

                                switch($hubungan) {
                                    case '1':
                                        $hubunganText = 'Diri Sendiri';
                                        break;
                                    case '2':
                                        $hubunganText = 'Orang Tua';
                                        break;
                                    case '3':
                                        $hubunganText = 'Anak';
                                        break;
                                    case '4':
                                        $hubunganText = 'Suami/Istri';
                                        break;
                                    case '5':
                                        $hubunganText = 'Kerabat/Saudara';
                                        break;
                                    case '6':
                                        // If it's "Lain-lain", we should show the custom text if available
                                        $hubunganText = $this->surat_pulang_paksa->hubungan_lainnya ?? 'Lain-lain';
                                        break;
                                    default:
                                        $hubunganText = $hubungan; // fallback to whatever is stored
                                }
                            @endphp
                            {{ $hubunganText }}
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <p class="mb-1">Alamat</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->alamat_lengkap }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-2">Dengan ini menyatakan bahwa pasien atas nama :</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Nomor RM</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->data_pasien->no_rm ?? ""}}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Nama Pasien</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->data_pasien->nama_pasien }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Tanggal Lahir</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_pulang_paksa->data_pasien->tanggal_lahir_pasien }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <p class="mb-1">Tanggal</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ \Carbon\Carbon::parse($this->surat_pulang_paksa->tanggal)->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-2">Akan <strong>PULANG PAKSA</strong> dari Klinik Insan Medika atas permintaan sendiri/keluarga dengan tidak mengikuti anjuran dokter yang merawat.</p>
                        <p class="mb-2">Saya menyadari bahwa tindakan pulang paksa ini dapat berakibat buruk bagi kondisi kesehatan pasien dan saya bersedia menanggung segala resiko yang mungkin timbul.</p>
                        <p class="mb-2">Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan penuh kesadaran tanpa ada paksaan dari pihak manapun.</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-6">
                        <div class="text-center">
                            <p class="mb-1">Mengetahui Dokter</p>
                            <div class="border rounded" style="height: 70px; width: 100%;"></div>
                            <p class="mb-1 mt-2">_____________</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <p class="mb-1">{{ \Carbon\Carbon::parse($this->surat_pulang_paksa->tanggal)->format('d M Y') }}</p>
                            <p class="mb-1">Yang Menyatakan,</p>
                            <div class="border rounded" style="height: 70px; width: 100%;"></div>
                            <p class="mb-1 mt-2">{{ $this->surat_pulang_paksa->penandatangan ?? $this->surat_pulang_paksa->nama_lengkap }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
