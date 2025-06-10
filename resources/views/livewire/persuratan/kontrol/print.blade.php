<?php

use App\Models\SuratKontrol;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('layouts.blank')]
#[Title('Surat Rencana Kontrol')]
class extends Component {

    public $surat_kontrol;

    public function mount()
    {
        $this->surat_kontrol = SuratKontrol::where('id', request()->id)->first();
    }
}; ?>

<div>
    <!-- Print Button - only visible on screen -->
    <div class="container mt-3 no-print">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

    <!-- A4 Container -->
    <div class="container py-3" style="max-width: 210mm; min-height: 297mm;">
        <div class="card border-0">
            <div class="card-body p-4">
                <!-- Header with Logo -->
                <div class="row align-items-center">
                    <div class="col-4">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <h3 class="title mb-0">SURAT RENCANA KONTROL</h3>
                        <h4 class="title">KLINIK INSAN MEDIKA</h4>
                        <div>
                            <p class="mb-0">Nomor : {{ $this->surat_kontrol->nomor }}</p>
                        </div>
                    </div>
                </div>

                <!-- Document Number -->
                <div class="row mb-3">
                </div>

                <!-- Patient Header -->
                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-0">Kepada Yth, {{ $this->surat_kontrol->data_pasien->nama_lengkap }}</p>
                        <p class="mb-0">Mohon Pemeriksaan dan Penanganan Lebih Lanjut :</p>
                    </div>
                </div>

                <!-- Form Data -->
                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">No. SIP</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->dokter->no_sip ?? "-" }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Tgl.</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Kepada Yth.</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->dokter->nama ?? $this->surat_kontrol->kepada }}</p>
                    </div>
                </div>

                <div class="row mb-2 mt-2">
                    <div class="col-12">
                        <p class="mb-1">Mohon Pemeriksaan dan Penanganan Lebih Lanjut:</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Nomor RM</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->data_pasien->no_rm }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Nama Pasien</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->data_pasien->nama_lengkap }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Tgl. Lahir</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->data_pasien->tanggal_lahir }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Diagnosa Akhir</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->diagnosa }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-2">
                        <p class="mb-1">Rencana Kontrol</p>
                    </div>
                    <div class="col-10">
                        <p class="mb-1">: {{ $this->surat_kontrol->rencana_kontrol }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <p>Demikian atas bantuannya diucapkan banyak terima kasih.</p>
                    </div>
                </div>

                <!-- Signature Section -->
                <div class="row mt-5">
                    <div class="col-8">
                        <!-- Spacer -->
                    </div>
                    <div class="col-4 text-center">
                        <p class="mb-1">Mengetahui DPJP</p>
                        <div class="border rounded" style="height: 70px; width: 100%;"></div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-8">
                        <!-- Spacer -->
                    </div>
                    <div class="col-4 text-center">
                        <p class="mb-1"> {{ $this->surat_kontrol->penandatangan ?? "_____________"}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
