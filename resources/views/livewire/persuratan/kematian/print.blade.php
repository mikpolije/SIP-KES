<?php

use App\Models\SuratKematian;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('layouts.blank')]
#[Title('Surat Keterangan Kematian')]
class extends Component {

    public $surat_kematian;

    public function mount()
    {
        $this->surat_kematian = SuratKematian::where('id', request()->id)->first();
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
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <h3 class="title mb-0">SURAT KETERANGAN KEMATIAN</h3>
                        <h4 class="title">KLINIK INSAN MEDIKA</h4>
                        <div>
                            <p class="mb-0">Nomor : {{ $this->surat_kematian->nomor }}</p>
                        </div>
                    </div>
                </div>

                <!-- Opening Statement -->
                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-2">Saya yang bertanda tangan di bawah ini menyatakan bahwa :</p>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Nama</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->data_pasien->nama_lengkap }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Jenis Kelamin</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->data_pasien->jenis_kelamin }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Alamat</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->data_pasien->alamat_lengkap }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Tgl. Lahir</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->data_pasien->tanggal_lahir }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Tgl. Masuk RS</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->tanggal_masuk_rs }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <p class="mb-1">Pukul</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->waktu_masuk_rs }} WIB</p>
                    </div>
                </div>

                <!-- Death Information -->
                <div class="row mb-3">
                    <div class="col-12">
                        <p class="mb-2"><strong>Telah meninggal dunia, pada :</strong></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Tanggal</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->tanggal_kematian }}</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Pukul</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->waktu_kematian}} WIB</p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-3">
                        <p class="mb-1">Tempat</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->tempat_kematian ?? 'Klinik Insan Medika' }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <p class="mb-1">Diagnosa</p>
                    </div>
                    <div class="col-9">
                        <p class="mb-1">: {{ $this->surat_kematian->icd10->display }}</p>
                    </div>
                </div>

                <!-- Closing Statement -->
                <div class="row mb-5">
                    <div class="col-12">
                        <p>Demikian Surat Keterangan Kematian ini dinyatakan dengan sebenarnya untuk dapat dipergunakan sebagai mestinya.</p>
                    </div>
                </div>

                <!-- Signature Section -->
                <div class="row mt-5">
                    <div class="col-8">
                        <!-- Spacer -->
                    </div>
                    <div class="col-4 text-center">
                        <p class="mb-1">{{ $this->surat_kematian->tempat_penerbitan ?? 'Sukoharjo' }}, {{ $this->surat_kematian->created_at->format('d M Y') }}</p>
                        <p class="mb-1">Dokter Yang Memeriksa</p>
                        <div class="border rounded mt-3" style="height: 70px; width: 100%;"></div>
                        <p class="mt-2 mb-1">{{ $this->surat_kematian->dokter->nama ?? $this->surat_kematian->penandatangan ?? "_____________" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
