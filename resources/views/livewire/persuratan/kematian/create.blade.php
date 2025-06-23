<?php

use Livewire\Volt\Component;
use App\Models\DataPasien;
use App\Models\Dokter;
use App\Models\ICD;

new class extends Component {
    public $nomor = '';
    public $nomorRM = '';
    public $namaPasien = '';
    public $jenisKelamin = '';
    public $jenisKelaminList = [
        0 => 'Tidak Diketahui',
        1 => 'Laki-laki',
        2 => 'Perempuan',
        3 => 'Tidak Dapat Ditentukan',
        4 => 'Tidak Mengisi',
        ];
    public $alamat = '';
    public $tglLahir = '';
    public $tanggalMasukRS = '';
    public $waktuMasukRS = '';
    public $tanggalKematian = '';
    public $waktuKematian = '';
    public $tempatKematian = '';
    public $selectedDiagnosa = '';
    public $penandatangan = '';
    public $selectedDokter = '';

        // Search properties
    public $dokterSearch = '';
    public $diagnosaSearch = '';

    public $showDokterDropdown = false;
    public $showDiagnosaDropdown = false;

    public $dokters = [];
    public $diagnosas = [];
    public $patient = null;
    public $patientFound = false;

    public function generateNomor()
    {
        $countThisMonth = \App\Models\SuratKematian::whereYear('created_at', now()->year)
                        ->whereMonth('created_at', now()->month)
                        ->count() + 1;

        $this->nomor = str_pad($countThisMonth, 3, '0', STR_PAD_LEFT)
                        . '/SKM/KLINIK/INMED/'
                        . now()->format('m')
                        . '/'
                        . now()->format('Y');
    }

    public function store()
    {
        // Hitung ulang nomor (biar aman)
        $countThisMonth = \App\Models\SuratKematian::whereYear('created_at', now()->year)
                        ->whereMonth('created_at', now()->month)
                        ->count() + 1;

        $nomor = str_pad($countThisMonth, 3, '0', STR_PAD_LEFT)
                    . '/SKM/KLINIK/INMED/'
                    . now()->format('m')
                    . '/'
                    . now()->format('Y');

        $suratKematian = new \App\Models\SuratKematian();
        $suratKematian->nomor = $nomor;
        // simpan field lain
        $suratKematian->save();

        session()->flash('success', 'Surat kematian berhasil dibuat dengan nomor: ' . $nomor);
        // Reset nomor biar bisa input lagi
        $this->generateNomor();
    }

    public function mount()
    {
        $this->generateNomor();
        $this->tanggalKematian = now()->format('Y-m-d');
        $this->waktuKematian = now()->format('H:i');
        $this->dokters = Dokter::limit(10)->get();
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

    public function updatedNomorRM()
    {
        if (!empty($this->nomorRM)) {
            $this->patient = DataPasien::where('no_rm', $this->nomorRM)->first();

            if ($this->patient) {
                $this->namaPasien = $this->patient->nama_pasien;
                $kodeKelamin = $this->patient->jenis_kelamin;
                $this->jenisKelamin = $this->jenisKelaminList[$kodeKelamin] ?? 'Tidak Diketahui';
                $this->alamat = $this->patient->alamat;
                $this->tglLahir = $this->patient->tanggal_lahir_pasien ?
                    \Carbon\Carbon::parse($this->patient->tanggal_lahir_pasien)->format('Y-m-d') : '';
                $this->patientFound = true;
            } else {
                $this->reset(['namaPasien', 'jenisKelamin', 'alamat', 'tglLahir', 'patient']);
                $this->patientFound = false;
            }
        } else {
            $this->reset(['namaPasien', 'jenisKelamin', 'alamat', 'tglLahir', 'patient']);
            $this->patientFound = false;
        }
    }

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
            'nomorRM' => 'required|exists:data_pasien,no_rm',
            'namaPasien' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required|string|max:500',
            'tglLahir' => 'required|date',
            'tanggalKematian' => 'required|date',
            'waktuKematian' => 'required',
            'tempatKematian' => 'required|string|max:255',
            'selectedDiagnosa' => 'required|exists:icd10,id',
            'penandatangan' => 'required|string|max:255',
            'selectedDokter' => 'required',
        ]);

        $pasien = DataPasien::where('no_rm', $this->nomorRM)->first();

        $suratKematian = new \App\Models\SuratKematian();
        
        if ($this->selectedDokter) {
            $suratKematian->id_dokter = $this->selectedDokter;
        }

        // Generate nomor surat
        $countToday = \App\Models\SuratKematian::whereDate('created_at', today())->count() + 1;
        $suratKematian->nomor = 'SKM/' . now()->format('Y/m/d') . '/' . str_pad($countToday, 3, '0', STR_PAD_LEFT);

        $suratKematian->no_rm = $pasien->no_rm;
        $suratKematian->tanggal_masuk_rs = $this->tanggalMasukRS ? \Carbon\Carbon::parse($this->tanggalMasukRS) : null;
        $suratKematian->waktu_masuk_rs = $this->waktuMasukRS ?: null;
        $suratKematian->tanggal_kematian = \Carbon\Carbon::parse($this->tanggalKematian);
        $suratKematian->waktu_kematian = $this->waktuKematian;
        $suratKematian->tempat_kematian = $this->tempatKematian;
        $suratKematian->id_icd = $this->selectedDiagnosa;
        $suratKematian->penandatangan= $this->dokterSearch;
        $suratKematian->save();

        flash()->success('Surat Kematian berhasil disimpan!');
        return redirect()->route('main.persuratan.kematian.print', ['id' => $suratKematian->id]);
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
            <div id="form-input">
            <form wire:submit.prevent="simpanData">
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

                    <p class="mt-4 mb-3">Saya yang bertanda tangan di bawah ini menyatakan bahwa:</p>

                    <div class="row mb-3">
                        <label for="nomorRM" class="col-sm-2 col-form-label">Nomor RM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nomorRM') is-invalid @enderror"
                                wire:model.live="nomorRM" id="nomorRM" placeholder="Nomor RM">
                            @error('nomorRM') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            @if($nomorRM && !$patientFound)
                                <small class="text-danger">Pasien tidak ditemukan</small>
                            @endif
                            @if($patientFound)
                                <small class="text-success">Pasien ditemukan</small>
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
                        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control @error('jenisKelamin') is-invalid @enderror"
                                wire:model="jenisKelamin" id="jenisKelamin"
                                placeholder="Jenis Kelamin" readonly disabled>
                            @error('jenisKelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tglLahir" class="col-sm-2 col-form-label">Tgl. Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tglLahir') is-invalid @enderror"
                                wire:model="tglLahir" id="tglLahir"
                                {{ $patientFound ? 'readonly' : '' }}>
                            @if($tglLahir)
                                <small class="text-muted">Format tampil: {{ $this->getFormattedTglLahir() }}</small>
                            @endif
                            @error('tglLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                    wire:model="alamat" id="alamat" placeholder="Alamat lengkap"
                                    rows="2" {{ $patientFound ? 'readonly' : '' }}></textarea>
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

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

                    <hr class="my-4">

                    <p class="mt-4 mb-3 fw-bold text-dark"><strong>Telah Meninggal Dunia, pada:</strong></p>
                    
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
                            <p>Jember, {{ now()->format('d F Y') }}</p>
                            <p>Dokter Yang Memeriksa,</p>
                                <div style="border: 1px solid #000; width: 250px; height: 150px; margin: 0 auto; position: relative;">
                                    <canvas id="signature-canvas-memeriksa" width="250" height="150"
                                        onmouseup="updateSignature('signature-canvas-memeriksa', 'signature_data_memeriksa')"
                                        ontouchend="updateSignature('signature-canvas-memeriksa', 'signature_data_memeriksa')"></canvas>
                                </div>
                                <div class="position-relative w-100" style="max-width: 400px;">
                                <input type="text"
                                       class="form-control @error('selectedDokter') is-invalid @enderror"
                                       wire:model.live="dokterSearch"
                                       wire:focus="showDokterDropdown = true"
                                       placeholder="Cari dokter..."
                                       autocomplete="off"
                                       style="width: 100%;
                                            max-width: 600px;
                                            font-weight: bold;
                                            text-align: center;
                                            border-bottom: 2px solid #000; 
                                            border-radius: 0;">

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
                            @error('selectedDokter') <div class="invalid-feedback text-center">{{ $message }}</div> @enderror
                        </div>
                        </div>
                </form>
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
                    Livewire.dispatch('closeDokterDropdown');
                }
            });
        });
    </script>
    <script>
        const signatureHistories = {};

        function initCanvas(canvasId, inputId) {
            const canvas = document.getElementById(canvasId);
            const ctx = canvas.getContext("2d");
            let drawing = false;

            signatureHistories[canvasId] = [];

            // Gambar tombol Undo (misal kotak kecil di pojok kanan atas)
            function drawUndoButton() {
                ctx.fillStyle = "#f00";
                ctx.fillRect(canvas.width - 40, 0, 40, 20);
                ctx.fillStyle = "#fff";
                ctx.font = "10px sans-serif";
                ctx.fillText("Undo", canvas.width - 36, 14);
            }

            function saveToHistory() {
                signatureHistories[canvasId].push(canvas.toDataURL());
                document.getElementById(inputId).value = canvas.toDataURL();
            }

            function redrawFromImage(dataURL) {
                const img = new Image();
                img.onload = () => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0);
                    drawUndoButton();
                };
                img.src = dataURL;
            }

            function undoSignature() {
                if (signatureHistories[canvasId].length > 1) {
                    signatureHistories[canvasId].pop(); 
                    const prev = signatureHistories[canvasId][signatureHistories[canvasId].length - 1];
                    redrawFromImage(prev);
                    document.getElementById(inputId).value = prev;
                } else {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    drawUndoButton();
                    document.getElementById(inputId).value = '';
                    signatureHistories[canvasId] = [];
                }
            }

            canvas.addEventListener("mousedown", (e) => {
                const rect = canvas.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                // Cek klik di area Undo
                if (x >= canvas.width - 40 && y >= 0 && x <= canvas.width && y <= 20) {
                    undoSignature();
                    return;
                }

                drawing = true;
                ctx.beginPath();
                ctx.moveTo(x, y);
            });

            canvas.addEventListener("mousemove", (e) => {
                if (!drawing) return;
                const rect = canvas.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                ctx.lineWidth = 2;
                ctx.lineCap = "round";
                ctx.strokeStyle = "#000";
                ctx.lineTo(x, y);
                ctx.stroke();
            });

            canvas.addEventListener("mouseup", () => {
                if (drawing) {
                    drawing = false;
                    saveToHistory();
                }
            });

            canvas.addEventListener("mouseout", () => {
                drawing = false;
            });

            // Touch support
            canvas.addEventListener("touchstart", (e) => {
                e.preventDefault();
                const touch = e.touches[0];
                const rect = canvas.getBoundingClientRect();
                const x = touch.clientX - rect.left;
                const y = touch.clientY - rect.top;

                // Undo check
                if (x >= canvas.width - 40 && y >= 0 && x <= canvas.width && y <= 20) {
                    undoSignature();
                    return;
                }

                drawing = true;
                ctx.beginPath();
                ctx.moveTo(x, y);
            });

            canvas.addEventListener("touchmove", (e) => {
                e.preventDefault();
                if (!drawing) return;
                const touch = e.touches[0];
                const rect = canvas.getBoundingClientRect();
                const x = touch.clientX - rect.left;
                const y = touch.clientY - rect.top;
                ctx.lineWidth = 2;
                ctx.lineCap = "round";
                ctx.strokeStyle = "#000";
                ctx.lineTo(x, y);
                ctx.stroke();
            });

            canvas.addEventListener("touchend", (e) => {
                e.preventDefault();
                if (drawing) {
                    drawing = false;
                    saveToHistory();
                }
            });

            drawUndoButton();
        }

        document.addEventListener("DOMContentLoaded", () => {
            initCanvas("signature-canvas-memeriksa", "signature_data_memeriksa");
        });
    </script>
</div>
