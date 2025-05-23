<?php

use Livewire\Volt\Component;
use App\Models\Diagnosa;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\CPPT;
use App\Models\Pendaftaran;

new class extends Component {
    protected $listeners = ['open-cppt-modal' => 'openModal'];

    public $pendaftaranId;
    public $showModal = false;
    public $currentTime;
    public $formData = [
        'soap' => [
            's' => '',
            'o' => '',
            'a' => '',
            'p' => ''
        ],
        'id_icd10' => null,  // Changed from diagnosaCode
        'id_icd9' => null,   // Changed from tindakanCode
        'id_obat' => null,
        'pemeriksaanPenunjang' => '',
    ];

    public $diagnosaList = [];
    public $tindakanList = [];
    public $obatList = [];

    public $diagnosaSearch = '';
    public $tindakanSearch = '';
    public $obatSearch = '';

    public $loadingDiagnosa = false;
    public $loadingTindakan = false;
    public $loadingObat = false;
    public $kelas= '';

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->currentTime = now()->format('H:i:s');

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first()->poli_rawat_inap->kelas;
        if($pendaftaran){
            $this->kelas = $pendaftaran;
        }

        $this->loadDiagnosaOptions();
        $this->loadTindakanOptions();
        $this->loadObatOptions();
    }

    public function loadDiagnosaOptions() {
        $this->loadingDiagnosa = true;
        $this->diagnosaList = Diagnosa::when($this->diagnosaSearch, function($query) {
                return $query->where('display', 'like', '%' . $this->diagnosaSearch . '%')
                            ->orWhere('code', 'like', '%' . $this->diagnosaSearch . '%');
            })
            ->limit(20)
            ->get()
            ->map(function($item) {
                return [
                    'value' => $item->id,
                    'label' => $item->display . ' (' . $item->code . ')'
                ];
            })
            ->toArray();
        $this->loadingDiagnosa = false;
    }

    public function loadTindakanOptions() {
        $this->loadingTindakan = true;
        $this->tindakanList = Tindakan::when($this->tindakanSearch, function($query) {
                return $query->where('display', 'like', '%' . $this->tindakanSearch . '%')
                            ->orWhere('code', 'like', '%' . $this->tindakanSearch . '%');
            })
            ->limit(20)
            ->get()
            ->map(function($item) {
                return [
                    'value' => $item->id,
                    'label' => $item->display . ' (' . $item->code . ')'
                ];
            })
            ->toArray();
        $this->loadingTindakan = false;
    }

    public function loadObatOptions() {
        $this->loadingObat = true;
        $this->obatList = Obat::when($this->obatSearch, function($query) {
                return $query->where('nama', 'like', '%' . $this->obatSearch . '%');
            })
            ->limit(20)
            ->get()
            ->map(function($item) {
                return [
                    'value' => $item->id,
                    'label' => $item->nama
                ];
            })
            ->toArray();
        $this->loadingObat = false;
    }

    public function updatedDiagnosaSearch() {
        $this->loadDiagnosaOptions();
    }

    public function updatedTindakanSearch() {
        $this->loadTindakanOptions();
    }

    public function updatedObatSearch() {
        $this->loadObatOptions();
    }

    public function openModal() {
        $this->showModal = true;
    }

    public function closeModal() {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm() {
        $this->formData = [
            'soap' => [
                's' => '',
                'o' => '',
                'a' => '',
                'p' => ''
            ],
            'id_icd10' => null,
            'id_icd9' => null,
            'id_obat' => null,
            'pemeriksaanPenunjang' => '',
        ];
        $this->diagnosaSearch = '';
        $this->tindakanSearch = '';
        $this->obatSearch = '';

        // Reload the options
        $this->loadDiagnosaOptions();
        $this->loadTindakanOptions();
        $this->loadObatOptions();
    }

    public function saveCppt() {
        $this->validate([
            'formData.soap.s' => 'required',
            'formData.soap.o' => 'required',
            'formData.soap.a' => 'required',
            'formData.soap.p' => 'required',
            'formData.id_icd10' => 'nullable|exists:icd10,id',
            'formData.id_icd9' => 'nullable|exists:icd9,id',
            'formData.id_obat' => 'nullable|exists:obat,id',
        ]);

        CPPT::create([
            'id_pendaftaran' => $this->pendaftaranId,
            's' => $this->formData['soap']['s'],
            'o' => $this->formData['soap']['o'],
            'a' => $this->formData['soap']['a'],
            'p' => $this->formData['soap']['p'],
            'id_icd10' => $this->formData['id_icd10'],
            'id_icd9' => $this->formData['id_icd9'],
            'id_obat' => $this->formData['id_obat'],
            'pemeriksaan' => $this->formData['pemeriksaanPenunjang'],
            'kelas' => $this->kelas,
        ]);

        flash()->success('CPPT berhasil ditambahkan!');
        $this->closeModal();
        $this->dispatch('cppt-added');
    }
} ?>
<div>
    <!-- CPPT Form Modal -->
    @if($showModal)
    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content rounded-4">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="text-center fw-bold mx-auto">Form CPPT</h2>
                        <div class="text-end">
                            <p class="text-muted mb-0">timestamp</p>
                            <span class="badge bg-light text-dark border" x-data
                                x-init="setInterval(() => { $el.textContent = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false }) }, 1000)">
                                {{ $currentTime }}
                            </span>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Left Column - SOAP Notes -->
                        <div class="col-md-5">
                            <h5>Hasil Pemeriksaan</h5>

                            <div class="mb-3">
                                <label class="form-label">S</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.s"></textarea>
                                @error('formData.soap.s') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">O</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.o"></textarea>
                                @error('formData.soap.o') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">A</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.a"></textarea>
                                @error('formData.soap.a') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">P</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.p"></textarea>
                                @error('formData.soap.p') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Right Column - Diagnosis and Treatment -->
                        <div class="col-md-7">
                            <!-- Diagnosis Section -->
                            <div class="mb-4">
                                <h5>Diagnosa Pasien (ICD-10)</h5>
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari diagnosa..."
                                        wire:model.live.debounce.500ms="diagnosaSearch"
                                    >
                                    <span class="input-group-text">
                                        @if($loadingDiagnosa)
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        @else
                                            <i class="fas fa-search"></i>
                                        @endif
                                    </span>
                                </div>
                                <select class="form-select" wire:model="formData.id_icd10">
                                    <option value="">Pilih Diagnosa</option>
                                    @foreach($diagnosaList as $diagnosa)
                                    <option value="{{ $diagnosa['value'] }}">{{ $diagnosa['label'] }}</option>
                                    @endforeach
                                </select>
                                @error('formData.id_icd10') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Procedure Section -->
                            <div class="mb-4">
                                <h5>Tindakan (ICD-9)</h5>
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari tindakan..."
                                        wire:model.live.debounce.500ms="tindakanSearch"
                                    >
                                    <span class="input-group-text">
                                        @if($loadingTindakan)
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        @else
                                            <i class="fas fa-search"></i>
                                        @endif
                                    </span>
                                </div>
                                <select class="form-select" wire:model="formData.id_icd9">
                                    <option value="">Pilih Tindakan</option>
                                    @foreach($tindakanList as $tindakan)
                                    <option value="{{ $tindakan['value'] }}">{{ $tindakan['label'] }}</option>
                                    @endforeach
                                </select>
                                @error('formData.id_icd9') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Medicine Section -->
                            <div class="mb-4">
                                <h5>Obat</h5>
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari obat..."
                                        wire:model.live.debounce.500ms="obatSearch"
                                    >
                                    <span class="input-group-text">
                                        @if($loadingObat)
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        @else
                                            <i class="fas fa-search"></i>
                                        @endif
                                    </span>
                                </div>
                                <select class="form-select" wire:model="formData.id_obat">
                                    <option value="">Pilih Obat</option>
                                    @foreach($obatList as $obat)
                                    <option value="{{ $obat['value'] }}">{{ $obat['label'] }}</option>
                                    @endforeach
                                </select>
                                @error('formData.id_obat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <h5>Pemeriksaan Penunjang</h5>
                                    <select class="form-select mb-2" wire:model="formData.pemeriksaanPenunjang">
                                        <option value="">Pilih Pemeriksaan</option>
                                        <option value="Laboratorium">Laboratorium</option>
                                        <option value="Radiologi">Radiologi</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <h5>Kelas Perawatan</h5>
                                    <div class="border rounded p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="kelas" value="1" id="kelas1">
                                            <label class="form-check-label" for="1">Kelas 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="kelas" value="2" id="kelas2">
                                            <label class="form-check-label" for="2">Kelas 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="kelas" value="3" id="kelas3">
                                            <label class="form-check-label" for="3">Kelas 3</label>
                                        </div>
                                    </div>
                                    @error('kelas') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Batal</button>
                    <button type="button" class="btn btn-primary px-4" wire:click="saveCppt">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
