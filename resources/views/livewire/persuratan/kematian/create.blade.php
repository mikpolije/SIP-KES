<?php

use Livewire\Volt\Component;
use App\Models\DataPasien;
use App\Models\ICD;

new class extends Component {
    public $nomor = '(Auto Generated)';
    public $nomorRM = '';
    public $namaPasien = '';
    public $tglLahir = '';
    public $tanggalMasukRS = '';
    public $waktuMasukRS = '';
    public $tanggalKematian = '';
    public $waktuKematian = '';
    public $tempatKematian = '';
    public $selectedDiagnosa = '';
    public $penandatangan = '';

    // Search properties
    public $diagnosaSearch = '';

    // Dropdown states
    public $showDiagnosaDropdown = false;

    public $diagnosas = [];
    public $patient = null;
    public $patientFound = false;

    public function mount()
    {
        $this->tanggalKematian = now()->format('Y-m-d');
        $this->waktuKematian = now()->format('H:i');
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

    // RM functionality
    public function updatedNomorRM()
    {
        if (!empty($this->nomorRM)) {
            $this->patient = DataPasien::where('no_rm', $this->nomorRM)->first();

            if ($this->patient) {
                $this->namaPasien = $this->patient->nama_lengkap;
                $this->tglLahir = $this->patient->tanggal_lahir_pasien ?
                    \Carbon\Carbon::parse($this->patient->tanggal_lahir_pasien)->format('Y-m-d') : '';
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
    public function closeDiagnosaDropdown()
    {
        $this->showDiagnosaDropdown = false;
    }

    public function save()
    {
        $this->validate([
            'nomorRM' => 'required|exists:data_pasien,no_rm',
            'namaPasien' => 'required',
            'tglLahir' => 'required|date',
            'tanggalKematian' => 'required|date',
            'waktuKematian' => 'required',
            'tempatKematian' => 'required|string|max:255',
            'selectedDiagnosa' => 'required|exists:icd10,id',
            'penandatangan' => 'required|string|max:255',
        ]);

        $pasien = DataPasien::where('no_rm', $this->nomorRM)->first();

        $suratKematian = new \App\Models\SuratKematian();

        // Generate nomor surat
        $countToday = \App\Models\SuratKematian::whereDate('created_at', today())->count() + 1;
        $suratKematian->nomor = 'SKM/' . now()->format('Ymd') . '/' . str_pad($countToday, 3, '0', STR_PAD_LEFT);

        $suratKematian->no_rm = $pasien->no_rm;
        $suratKematian->tanggal_masuk_rs = $this->tanggalMasukRS ? \Carbon\Carbon::parse($this->tanggalMasukRS) : null;
        $suratKematian->waktu_masuk_rs = $this->waktuMasukRS ?: null;
        $suratKematian->tanggal_kematian = \Carbon\Carbon::parse($this->tanggalKematian);
        $suratKematian->waktu_kematian = $this->waktuKematian;
        $suratKematian->tempat_kematian = $this->tempatKematian;
        $suratKematian->id_icd = $this->selectedDiagnosa;
        $suratKematian->penandatangan = $this->penandatangan;

        $suratKematian->save();

        flash()->success('Surat Kematian berhasil disimpan!');
        return redirect()->route('main.persuratan.kematian.print', ['id' => $suratKematian->id]);
    }

    public function getFormattedTanggalMasuk()
    {
        return $this->tanggalMasukRS ? \Carbon\Carbon::parse($this->tanggalMasukRS)->format('d/m/Y') : '';
    }

    public function getFormattedTglLahir()
    {
        return $this->tglLahir ? \Carbon\Carbon::parse($this->tglLahir)->format('d/m/Y') : '';
    }

    public function getFormattedTanggalKematian()
    {
        return $this->tanggalKematian ? \Carbon\Carbon::parse($this->tanggalKematian)->format('d/m/Y') : '';
    }

    // Helper method for diagnosa display
    public function getSelectedDiagnosaInfo()
    {
        if ($this->selectedDiagnosa) {
            $icd = ICD::find($this->selectedDiagnosa);
            return $icd ? $icd->code . ' - ' . $icd->display : '';
        }
        return '';
    }
}; ?>

<div>
    <div>
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h1 class="title mb-4 h3 text-center">SURAT KEMATIAN</h1>

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

                    <p class="mt-4 mb-3">Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

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

                    <hr class="my-4">

                    <div class="row mb-3">
                        <label for="tanggalMasukRS" class="col-sm-2 col-form-label">Tgl. Masuk RS</label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tanggalMasukRS') is-invalid @enderror"
                                       wire:model="tanggalMasukRS" id="tanggalMasukRS">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                            @if($tanggalMasukRS)
                                <small class="text-muted">Format tampil: {{ $this->getFormattedTanggalMasuk() }}</small>
                            @endif
                            @error('tanggalMasukRS') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <label for="waktuMasukRS" class="col-sm-1 col-form-label">Jam</label>
                        <div class="col-sm-4">
                            <input type="time" class="form-control @error('waktuMasukRS') is-invalid @enderror"
                                   wire:model="waktuMasukRS" id="waktuMasukRS">
                            @error('waktuMasukRS') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggalKematian" class="col-sm-2 col-form-label">Tgl. Kematian <span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="date" class="form-control @error('tanggalKematian') is-invalid @enderror"
                                       wire:model="tanggalKematian" id="tanggalKematian" required>
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                            @if($tanggalKematian)
                                <small class="text-muted">Format tampil: {{ $this->getFormattedTanggalKematian() }}</small>
                            @endif
                            @error('tanggalKematian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <label for="waktuKematian" class="col-sm-1 col-form-label">Jam <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="time" class="form-control @error('waktuKematian') is-invalid @enderror"
                                   wire:model="waktuKematian" id="waktuKematian" required>
                            @error('waktuKematian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tempatKematian" class="col-sm-2 col-form-label">Tempat Kematian <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('tempatKematian') is-invalid @enderror"
                                   wire:model="tempatKematian" id="tempatKematian"
                                   placeholder="Contoh: Ruang ICU, Ruang Rawat Inap, UGD, dll." required>
                            @error('tempatKematian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Searchable Diagnosa Dropdown -->
                    <div class="row mb-3">
                        <label for="diagnosa" class="col-sm-2 col-form-label">Penyebab Kematian <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="position-relative">
                                <input type="text"
                                       class="form-control @error('selectedDiagnosa') is-invalid @enderror"
                                       wire:model.live="diagnosaSearch"
                                       wire:focus="showDiagnosaDropdown = true"
                                       placeholder="Cari ICD code atau diagnosa penyebab kematian..."
                                       autocomplete="off" required>

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

                    <p class="mt-4">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <!-- Spacer -->
                        </div>
                        <div class="col-md-4 text-center">
                            <p>{{ now()->format('d F Y') }}</p>
                            <p>Dokter Yang Merawat</p>
                            <div class="border rounded-3 mb-2" style="height: 100px;"></div>
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-bottom border-dark text-center @error('penandatangan') is-invalid @enderror"
                                   wire:model="penandatangan" id="penandatangan" placeholder="Nama Dokter" required>
                            @error('penandatangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <a href="/main/persuratan/kematian" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced styling for dropdowns and date inputs -->
    <style>
        .form-control[type="date"], .form-control[type="time"] {
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

        .text-danger {
            color: #dc3545 !important;
        }
    </style>

    <!-- Click outside to close dropdowns -->
    <script>
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.position-relative');
            dropdowns.forEach(function(dropdown) {
                if (!dropdown.contains(event.target)) {
                    Livewire.dispatch('closeDiagnosaDropdown');
                }
            });
        });
    </script>
</div>
