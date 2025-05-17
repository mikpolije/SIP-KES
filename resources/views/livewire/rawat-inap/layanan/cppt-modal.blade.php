<?php

use Livewire\Volt\Component;
use App\Models\Diagnosa;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\CPPT;

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
        'diagnosa' => '',
        'diagnosaCode' => '',
        'tindakan' => '',
        'tindakanCode' => '',
        'obat' => '',
        'pemeriksaanPenunjang' => '',
        'kelasPerawatan' => ''
    ];

    // Lists for dropdown options
    public $diagnosaList = [];
    public $tindakanList = [];
    public $obatList = [];

    // Search terms for dropdowns
    public $diagnosaSearch = '';
    public $tindakanSearch = '';
    public $obatSearch = '';

    // Loading states
    public $loadingDiagnosa = false;
    public $loadingTindakan = false;
    public $loadingObat = false;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->currentTime = now()->format('H:i:s');

        // Load initial options
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
            ->select('code', 'display')
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
            ->select('code', 'display')
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
            ->select('id', 'nama')
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
            'diagnosa' => '',
            'diagnosaCode' => '',
            'tindakan' => '',
            'tindakanCode' => '',
            'obat' => '',
            'pemeriksaanPenunjang' => '',
            'kelasPerawatan' => ''
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
        CPPT::create([
            'id_pendaftaran' => $this->pendaftaranId,
            's' => $this->formData['soap']['s'],
            'o' => $this->formData['soap']['o'],
            'a' => $this->formData['soap']['a'],
            'p' => $this->formData['soap']['p'],
            'id_icd10' => $this->formData['diagnosaCode'] ?: null,
            'id_icd9' => $this->formData['tindakanCode'] ?: null,
            'id_obat' => $this->formData['obat'] ?: null,
            'pemeriksaan' => $this->formData['pemeriksaanPenunjang'],
            'kelas_perawatan' => $this->formData['kelasPerawatan'],
        ]);

        $this->closeModal();
        $this->dispatch('cppt-added');
        $this->dispatch('alert', type: 'success', message: 'CPPT berhasil disimpan!');
    }

    public function updatedFormDataDiagnosa($value) {
        if ($value) {
            $diagnosa = Diagnosa::where('code', $value)->first();
            if ($diagnosa) {
                $this->formData['diagnosaCode'] = $diagnosa->id;
            }
        } else {
            $this->formData['diagnosaCode'] = '';
        }
    }

    public function updatedFormDataTindakan($value) {
        if ($value) {
            $tindakan = Tindakan::where('code', $value)->first();
            if ($tindakan) {
                $this->formData['tindakanCode'] = $tindakan->id;
            }
        } else {
            $this->formData['tindakanCode'] = '';
        }
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
                                <h5>Diagnosa Pasien</h5>
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari diagnosa..."
                                        wire:model.live.debounce.500ms="diagnosaSearch"
                                    >
                                    @if($loadingDiagnosa)
                                    <span class="input-group-text">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </span>
                                    @endif
                                </div>
                                <select class="form-select" wire:model="formData.diagnosa">
                                    <option value="">Pilih Diagnosa</option>
                                    @foreach($diagnosaList as $diagnosa)
                                    <option value="{{ $diagnosa['value'] }}">{{ $diagnosa['label'] }}</option>
                                    @endforeach
                                </select>
                                @error('formData.diagnosa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Procedure Section -->
                            <div class="mb-4">
                                <h5>Tindakan</h5>
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari tindakan..."
                                        wire:model.live.debounce.500ms="tindakanSearch"
                                    >
                                    @if($loadingTindakan)
                                    <span class="input-group-text">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </span>
                                    @endif
                                </div>
                                <select class="form-select" wire:model="formData.tindakan">
                                    <option value="">Pilih Tindakan</option>
                                    @foreach($tindakanList as $tindakan)
                                    <option value="{{ $tindakan['value'] }}">{{ $tindakan['label'] }}</option>
                                    @endforeach
                                </select>
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
                                    @if($loadingObat)
                                    <span class="input-group-text">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </span>
                                    @endif
                                </div>
                                <select class="form-select" wire:model="formData.obat">
                                    <option value="">Pilih Obat</option>
                                    @foreach($obatList as $obat)
                                    <option value="{{ $obat['value'] }}">{{ $obat['label'] }}</option>
                                    @endforeach
                                </select>
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
                                    <select class="form-select mb-2" wire:model="formData.kelasPerawatan">
                                        <option value="">Pilih Kelas</option>
                                        <option value="Kelas 1">Kelas 1</option>
                                        <option value="Kelas 2">Kelas 2</option>
                                        <option value="Kelas 3">Kelas 3</option>
                                    </select>
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
