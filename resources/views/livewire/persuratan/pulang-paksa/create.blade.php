<?php

use Livewire\Volt\Component;
use App\Models\DataPasien;

new class extends Component {
    public $nomor = '';
    public $tanggal = '';
    public $nomorRM = '';
    public $namaPasien = '';
    public $tglLahir = '';
    public $alamat = '';
    public $noTelepon = '';
    public $hubungan = '';
    public $alamatLengkap = '';
    public $penandatangan = '';

    public $patient = null;
    public $patientFound = false;

    public function generateNomor()
    {
        $countThisMonth = \App\Models\SuratPulangPaksa::whereYear('created_at', now()->year)
                        ->whereMonth('created_at', now()->month)
                        ->count() + 1;

        $this->nomor = str_pad($countThisMonth, 3, '0', STR_PAD_LEFT)
                        . '/SPP/KLINIK/INMED/'
                        . now()->format('m')
                        . '/'
                        . now()->format('Y');
    }

    public function mount()
    {
        $this->generateNomor();
        $this->tanggal = now()->format('Y-m-d');
    }

    public function updatedNomorRM()
    {
        if (!empty($this->nomorRM)) {
            $this->patient = DataPasien::where('no_rm', $this->nomorRM)->first();

            if ($this->patient) {
                $this->namaPasien = $this->patient->nama_pasien;
                $this->tglLahir = $this->patient->tanggal_lahir_pasien ?
                    \Carbon\Carbon::parse($this->patient->tanggal_lahir_pasien)->format('Y-m-d') : '';
                $this->alamat = $this->patient->alamat_pasien ?? '';
                $this->patientFound = true;
            } else {
                $this->reset(['namaPasien', 'tglLahir', 'alamat', 'patient']);
                $this->patientFound = false;
            }
        } else {
            $this->reset(['namaPasien', 'tglLahir', 'alamat', 'patient']);
            $this->patientFound = false;
        }
    }

    public function save()
    {
        $this->validate([
            'nomor' => 'required',
            'tanggal' => 'required|date',
            'nomorRM' => 'required',
            'namaPasien' => 'required',
            'tglLahir' => 'required|date',
            'noTelepon' => 'required',
            'hubungan' => 'required',
            'alamatLengkap' => 'required',
            'penandatangan' => 'required',
        ]);

        $suratPulangPaksa = new \App\Models\SuratPulangPaksa();
        $suratPulangPaksa->nomor = $this->nomor;
        $suratPulangPaksa->no_rm = $this->nomorRM;
        $suratPulangPaksa->nama_lengkap = $this->namaPasien;
        $suratPulangPaksa->no_telepon = $this->noTelepon;
        $suratPulangPaksa->hubungan = $this->hubungan;
        $suratPulangPaksa->alamat_lengkap = $this->alamatLengkap;
        $suratPulangPaksa->tanggal = \Carbon\Carbon::parse($this->tanggal);
        $suratPulangPaksa->penandatangan = $this->penandatangan;
        $suratPulangPaksa->save();

        flash()->success('Surat Pulang Paksa berhasil disimpan!');
        return redirect()->route('main.persuratan.pulang-paksa.print', ['id' => $suratPulangPaksa->id]);
    }

    public function getFormattedTanggal()
    {
        return $this->tanggal ? \Carbon\Carbon::parse($this->tanggal)->format('d/m/Y') : '';
    }

    public function getFormattedTglLahir()
    {
        return $this->tglLahir ? \Carbon\Carbon::parse($this->tglLahir)->format('d/m/Y') : '';
    }
}; ?>

<div>
    <div>
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h1 class="title mb-4 h3 text-center">SURAT PERNYATAAN PULANG PAKSA</h1>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit="save">
                    <div class="row mb-3">
                        <label for="nomor" class="col-sm-2 col-form-label">No.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror"
                                   wire:model="nomor" id="nomor" disabled>
                            @error('nomor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tgl.</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                       wire:model="tanggal" id="tanggal">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                            @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nomorRM" class="col-sm-2 col-form-label">Nomor RM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nomorRM') is-invalid @enderror"
                                   wire:model.live="nomorRM" id="nomorRM" placeholder="Nomor RM">
                            @error('nomorRM') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            @if($nomorRM && !$patientFound)
                                <div class="text-danger small mt-1">Pasien tidak ditemukan</div>
                            @endif
                            @if($patientFound)
                                <div class="text-success small mt-1">Pasien ditemukan</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="namaPasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('namaPasien') is-invalid @enderror"
                                    wire:model="namaPasien" id="namaPasien"
                                    placeholder="Nama Pasien"
                                    {{ $patientFound ? 'readonly' : '' }} disabled>
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                            </div>
                            @error('namaPasien') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tglLahir" class="col-sm-2 col-form-label">Tgl. Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tglLahir') is-invalid @enderror"
                                       wire:model="tglLahir" id="tglLahir"
                                       {{ $patientFound ? 'readonly' : '' }} disabled>
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                            @if($tglLahir)
                                <small class="text-muted">Format tampil: {{ $this->getFormattedTglLahir() }}</small>
                            @endif
                            @error('tglLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="noTelepon" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('noTelepon') is-invalid @enderror"
                                   wire:model="noTelepon" id="noTelepon" placeholder="Nomor telepon yang bisa dihubungi">
                            @error('noTelepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="hubungan" class="col-sm-2 col-form-label">Hubungan dengan Pasien</label>
                        <div class="col-sm-10">
                            <select class="form-select @error('hubungan') is-invalid @enderror" wire:model="hubungan">
                                <option value="">Pilih Hubungan</option>
                                <option value="1">Diri Sendiri</option>
                                <option value="2">Orang Tua</option>
                                <option value="3">Anak</option>
                                <option value="4">Suami/Istri</option>
                                <option value="5">Kerabat/Saudara</option>
                                <option value="6">Lain-lain</option>
                            </select>
                            @error('hubungan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamatLengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamatLengkap') is-invalid @enderror"
                                      wire:model="alamatLengkap" id="alamatLengkap"
                                      rows="3" placeholder="Alamat lengkap pemohon"></textarea>
                            @error('alamatLengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="penandatangan" class="col-sm-2 col-form-label">Penandatangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('penandatangan') is-invalid @enderror"
                                   wire:model="penandatangan" id="penandatangan" placeholder="Nama dokter/penandatangan">
                            @error('penandatangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <p class="fw-bold">PERNYATAAN:</p>
                            <p>Saya yang bertanda tangan di bawah ini menyatakan dengan sesungguhnya bahwa saya telah menerima penjelasan dari dokter mengenai kondisi pasien dan segala risiko yang mungkin terjadi apabila pasien dipulangkan paksa.</p>
                            <p>Saya dengan sadar dan tanpa paksaan dari pihak manapun meminta untuk memulangkan pasien secara paksa dan bersedia menanggung segala akibat yang mungkin terjadi.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Jember, {{ $this->getFormattedTanggal() }}</p>
                            <p>Yang Membuat Pernyataan,</p>
                            <div style="border: 1px solid #000; width: 250px; height: 150px; margin: 0 auto; position: relative;">
                                <canvas id="signature-canvas" width="250" height="150"></canvas>
                            </div>
                            <p class="mt-3">(Tanda Tangan Pemohon)</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <span wire:loading.remove>Simpan</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                Menyimpan...
                            </span>
                        </button>

                        <button type="button" class="btn btn-warning px-4 text-white d-flex align-items-center gap-2"
                            style="background-color: #f0ad4e; border: none;"
                            onclick="printSurat()">
                            <i class="bi bi-printer"></i> Cetak
                        </button>

                        <a href="/main/persuratan/pulang-paksa" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-control[type="date"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const canvas = document.getElementById("signature-canvas");
            const ctx = canvas.getContext("2d");
            let drawing = false;

            canvas.addEventListener("mousedown", (e) => {
                drawing = true;
                ctx.beginPath();
                ctx.moveTo(
                    e.clientX - canvas.getBoundingClientRect().left,
                    e.clientY - canvas.getBoundingClientRect().top
                );
            });

            canvas.addEventListener("mousemove", (e) => {
                if (!drawing) return;
                ctx.lineWidth = 2;
                ctx.lineCap = "round";
                ctx.strokeStyle = "#000";
                ctx.lineTo(
                    e.clientX - canvas.getBoundingClientRect().left,
                    e.clientY - canvas.getBoundingClientRect().top
                );
                ctx.stroke();
            });

            canvas.addEventListener("mouseup", () => {
                drawing = false;
            });

            canvas.addEventListener("mouseout", () => {
                drawing = false;
            });

            // Touch support
            canvas.addEventListener("touchstart", (e) => {
                e.preventDefault();
                drawing = true;
                const touch = e.touches[0];
                ctx.beginPath();
                ctx.moveTo(
                    touch.clientX - canvas.getBoundingClientRect().left,
                    touch.clientY - canvas.getBoundingClientRect().top
                );
            });

            canvas.addEventListener("touchmove", (e) => {
                e.preventDefault();
                if (!drawing) return;
                const touch = e.touches[0];
                ctx.lineWidth = 2;
                ctx.lineCap = "round";
                ctx.strokeStyle = "#000";
                ctx.lineTo(
                    touch.clientX - canvas.getBoundingClientRect().left,
                    touch.clientY - canvas.getBoundingClientRect().top
                );
                ctx.stroke();
            });

            canvas.addEventListener("touchend", (e) => {
                e.preventDefault();
                drawing = false;
            });
        });

        function printSurat() {
            // Implement print functionality here
            window.print();
        }
    </script>
</div>
