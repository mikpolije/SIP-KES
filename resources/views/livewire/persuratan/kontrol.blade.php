<?php

use Livewire\Volt\Component;
use App\Models\Dokter;
use App\Models\DataPasien;
use App\Models\ICD;

new class extends Component {
    public $nomor = '';
    public $tanggal = '';
    public $selectedDokter = '';
    public $nomorRM = '';
    public $namaPasien = '';
    public $tglLahir = '';
    public $selectedDiagnosa = '';
    public $rencanaKontrol = '';

    // Search properties
    public $dokterSearch = '';
    public $diagnosaSearch = '';

    // Dropdown states
    public $showDokterDropdown = false;
    public $showDiagnosaDropdown = false;

    public $dokters = [];
    public $diagnosas = [];
    public $patient = null;
    public $patientFound = false;

    public function mount()
    {
        $this->dokters = Dokter::limit(10)->get();
        $this->tanggal = now()->format('Y-m-d');
    }

    // Dokter search functionality
    public function updatedDokterSearch()
    {
        $this->showDokterDropdown = !empty($this->dokterSearch);
        if (!empty($this->dokterSearch)) {
            $this->dokters = Dokter::where('nama', 'like', '%' . $this->dokterSearch . '%')
                ->orWhere('gelar_depan', 'like', '%' . $this->dokterSearch . '%')
                ->orWhere('gelar_belakang', 'like', '%' . $this->dokterSearch . '%')
                ->limit(10)
                ->get();
        } else {
            $this->dokters = Dokter::limit(10)->get();
            $this->selectedDokter = '';
        }
    }

    public function selectDokter($dokterId, $dokterName)
    {
        $this->selectedDokter = $dokterId;
        $this->dokterSearch = $dokterName;
        $this->showDokterDropdown = false;
    }

    // Diagnosa search functionality
    public function updatedDiagnosaSearch()
    {
        $this->showDiagnosaDropdown = !empty($this->diagnosaSearch);
        if (!empty($this->diagnosaSearch)) {
            $this->diagnosas = ICD::where('code', 'like', '%' . $this->diagnosaSearch . '%')
                ->orWhere('display', 'like', '%' . $this->diagnosaSearch . '%')
                ->limit(10)
                ->get();
        } else {
            $this->diagnosas = [];
            $this->selectedDiagnosa = '';
        }
    }

    public function selectDiagnosa($icdId, $code, $display)
    {
        $this->selectedDiagnosa = $icdId;
        $this->diagnosaSearch = $code . ' - ' . $display;
        $this->showDiagnosaDropdown = false;
    }

    // RM functionality (keeping original approach)
    public function updatedNomorRM()
    {
        if (!empty($this->nomorRM)) {
            $this->patient = DataPasien::where('no_rm', $this->nomorRM)->first();

            if ($this->patient) {
                $this->namaPasien = $this->patient->nama_lengkap;
                $this->tglLahir = $this->patient->tanggal_lahir ?
                    \Carbon\Carbon::parse($this->patient->tanggal_lahir)->format('Y-m-d') : '';
                $this->patientFound = true;
            } else {
                $this->reset(['namaPasien', 'tglLahir', 'patient']);
                $this->patientFound = false;
            }
        } else {
            $this->reset(['namaPasien', 'tglLahir', 'patient']);
            $this->patientFound = false;
        }
    }

    // Close dropdowns when clicking outside
    public function closeDokterDropdown()
    {
        $this->showDokterDropdown = false;
    }

    public function closeDiagnosaDropdown()
    {
        $this->showDiagnosaDropdown = false;
    }

    public function save()
    {
        $this->validate([
            'nomor' => 'required',
            'tanggal' => 'required|date',
            'selectedDokter' => 'required',
            'nomorRM' => 'required',
            'namaPasien' => 'required',
            'tglLahir' => 'required|date',
            'selectedDiagnosa' => 'required',
            'rencanaKontrol' => 'required|date',
        ]);

        // Convert dates to desired format for saving/display
        $tanggalFormatted = \Carbon\Carbon::parse($this->tanggal)->format('d/m/Y');
        $tglLahirFormatted = \Carbon\Carbon::parse($this->tglLahir)->format('d/m/Y');
        $rencanaKontrolFormatted = \Carbon\Carbon::parse($this->rencanaKontrol)->format('d/m/Y');

        // Save logic here with converted dates
        session()->flash('message', 'Surat Rencana Kontrol berhasil disimpan!');
    }

    public function printSurat()
    {
        // Print logic here
        $this->js("window.print()");
    }

    // Helper methods to display formatted dates
    public function getFormattedTanggal()
    {
        return $this->tanggal ? \Carbon\Carbon::parse($this->tanggal)->format('d/m/Y') : '';
    }

    public function getFormattedTglLahir()
    {
        return $this->tglLahir ? \Carbon\Carbon::parse($this->tglLahir)->format('d/m/Y') : '';
    }

    public function getFormattedRencanaKontrol()
    {
        return $this->rencanaKontrol ? \Carbon\Carbon::parse($this->rencanaKontrol)->format('d/m/Y') : '';
    }

    // Helper methods for display
    public function getSelectedDokterName()
    {
        if ($this->selectedDokter) {
            $dokter = Dokter::find($this->selectedDokter);
            if ($dokter) {
                $fullName = trim($dokter->gelar_depan . ' ' . $dokter->nama . ' ' . $dokter->gelar_belakang);
                return $fullName;
            }
        }
        return '';
    }

    public function getSelectedDiagnosaInfo()
    {
        if ($this->selectedDiagnosa) {
            $icd = Icd10::find($this->selectedDiagnosa);
            return $icd ? $icd->code . ' - ' . $icd->display : '';
        }
        return '';
    }
}; ?>

<div>
    <div class="container py-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h1 class="title mb-4 h3 text-center">SURAT RENCANA KONTROL</h1>

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
                                   wire:model="nomor" id="nomor">
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

                    <!-- Searchable Dokter Dropdown -->
                    <div class="row mb-3">
                        <label for="dokter" class="col-sm-2 col-form-label">Kepada Yth.</label>
                        <div class="col-sm-10">
                            <div class="position-relative">
                                <input type="text"
                                       class="form-control @error('selectedDokter') is-invalid @enderror"
                                       wire:model.live="dokterSearch"
                                       wire:focus="showDokterDropdown = true"
                                       placeholder="Cari dokter..."
                                       autocomplete="off">

                                @if($showDokterDropdown && count($dokters) > 0)
                                    <div class="dropdown-menu show position-absolute w-100" style="z-index: 1000;">
                                        @foreach($dokters as $dokter)
                                            @php
                                                $fullName = trim($dokter->gelar_depan . ' ' . $dokter->nama . ' ' . $dokter->gelar_belakang);
                                            @endphp
                                            <button type="button"
                                                    class="dropdown-item"
                                                    wire:click="selectDokter({{ $dokter->id }}, '{{ $fullName }}')">
                                                <strong>{{ $fullName }}</strong>
                                                <br><small class="text-muted">{{ $dokter->no_sip }} | {{ $dokter->jadwal_layanan }}</small>
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @error('selectedDokter') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <p class="mt-4 mb-3">Mohon Pemeriksaan dan Penanganan Lebih Lanjut:</p>

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
                            <input type="text" class="form-control @error('namaPasien') is-invalid @enderror"
                                   wire:model="namaPasien" id="namaPasien" placeholder="Nama Pasien"
                                   {{ $patientFound ? 'readonly' : '' }} disabled>
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

                    <!-- Searchable Diagnosa Dropdown -->
                    <div class="row mb-3">
                        <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa Akhir</label>
                        <div class="col-sm-10">
                            <div class="position-relative">
                                <input type="text"
                                       class="form-control @error('selectedDiagnosa') is-invalid @enderror"
                                       wire:model.live="diagnosaSearch"
                                       wire:focus="showDiagnosaDropdown = true"
                                       placeholder="Cari ICD code atau diagnosa..."
                                       autocomplete="off">

                                @if($showDiagnosaDropdown && count($diagnosas) > 0)
                                    <div class="dropdown-menu show position-absolute w-100" style="z-index: 1000; max-height: 300px; overflow-y: auto;">
                                        @foreach($diagnosas as $icd)
                                            <button type="button"
                                                    class="dropdown-item"
                                                    wire:click="selectDiagnosa({{ $icd->id }}, '{{ $icd->code }}', '{{ $icd->display }}')">
                                                <strong>{{ $icd->code }}</strong> - {{ $icd->display }}
                                                <br><small class="text-muted">Version: {{ $icd->version }}</small>
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @error('selectedDiagnosa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rencanaKontrol" class="col-sm-2 col-form-label">Rencana Kontrol</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" class="form-control @error('rencanaKontrol') is-invalid @enderror"
                                       wire:model="rencanaKontrol" id="rencanaKontrol">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                            @if($rencanaKontrol)
                                <small class="text-muted">Format tampil: {{ $this->getFormattedRencanaKontrol() }}</small>
                            @endif
                            @error('rencanaKontrol') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <p class="mt-4">Demikian atas bantuannya diucapkan banyak terima kasih.</p>

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <!-- Spacer -->
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Mengetahui</p>
                            <div class="border rounded-3 mb-2" style="height: 100px;"></div>
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
                        <button type="button" class="btn btn-outline-primary px-4" wire:click="printSurat">
                            <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced styling for dropdowns and date inputs -->
    <style>
        .form-control[type="date"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .dropdown-menu.show {
            display: block;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #fff;
            margin-top: 0.125rem;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            white-space: normal;
            word-wrap: break-word;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #f8f9fa;
            color: #212529;
        }

        .position-relative {
            position: relative;
        }
    </style>

    <!-- Click outside to close dropdowns -->
    <script>
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.position-relative');
            dropdowns.forEach(function(dropdown) {
                if (!dropdown.contains(event.target)) {
                    // Close all dropdowns by dispatching events
                    Livewire.dispatch('closeDokterDropdown');
                    Livewire.dispatch('closeDiagnosaDropdown');
                }
            });
        });
    </script>
</div>
