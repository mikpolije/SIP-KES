<?php

use Livewire\Volt\Component;
use App\Models\Diagnosa;
use App\Models\Tindakan;
use App\Models\Obat;

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
        'pemeriksaanPenunjang' => '', // Single value
        'kelasPerawatan' => ''
    ];

    // Search terms for dropdowns
    public $diagnosaSearch = '';
    public $tindakanSearch = '';
    public $obatSearch = '';

    // Dropdown states
    public $showDiagnosaDropdown = false;
    public $showTindakanDropdown = false;
    public $showObatDropdown = false;

    // Selected display values
    public $selectedDiagnosaLabel = '';
    public $selectedTindakanLabel = '';
    public $selectedObatLabel = '';

    // Lists for dropdown options
    public $diagnosaList = [];
    public $tindakanList = [];
    public $obatList = [];

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->currentTime = now()->format('H:i:s');
    }

    public function loadDiagnosaOptions() {
        $this->diagnosaList = Diagnosa::when($this->diagnosaSearch, function($query) {
                return $query->where('display', 'like', '%' . $this->diagnosaSearch . '%')
                            ->orWhere('code', 'like', '%' . $this->diagnosaSearch . '%');
            })
            ->limit(20)
            ->select('code', 'display')
            ->get()
            ->map(function($item) {
                return [
                    'value' => $item->code,
                    'label' => $item->display . ' (' . $item->code . ')'
                ];
            })
            ->toArray();
    }

    public function loadTindakanOptions() {
        $this->tindakanList = Tindakan::when($this->tindakanSearch, function($query) {
                return $query->where('display', 'like', '%' . $this->tindakanSearch . '%')
                            ->orWhere('code', 'like', '%' . $this->tindakanSearch . '%');
            })
            ->limit(20)
            ->select('code', 'display')
            ->get()
            ->map(function($item) {
                return [
                    'value' => $item->code,
                    'label' => $item->display . ' (' . $item->code . ')'
                ];
            })
            ->toArray();
    }

    public function loadObatOptions() {
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
    }

    public function updatedDiagnosaSearch() {
        $this->loadDiagnosaOptions();
        $this->showDiagnosaDropdown = true;
    }

    public function updatedTindakanSearch() {
        $this->loadTindakanOptions();
        $this->showTindakanDropdown = true;
    }

    public function updatedObatSearch() {
        $this->loadObatOptions();
        $this->showObatDropdown = true;
    }

    public function selectDiagnosa($value, $label) {
        $this->formData['diagnosa'] = $value;
        $this->formData['diagnosaCode'] = $value;
        $this->selectedDiagnosaLabel = $label;
        $this->diagnosaSearch = '';
        $this->showDiagnosaDropdown = false;
    }

    public function selectTindakan($value, $label) {
        $this->formData['tindakan'] = $value;
        $this->formData['tindakanCode'] = $value;
        $this->selectedTindakanLabel = $label;
        $this->tindakanSearch = '';
        $this->showTindakanDropdown = false;
    }

    public function selectObat($value, $label) {
        $this->formData['obat'] = $value;
        $this->selectedObatLabel = $label;
        $this->obatSearch = '';
        $this->showObatDropdown = false;
    }

    public function clearDiagnosa() {
        $this->formData['diagnosa'] = '';
        $this->formData['diagnosaCode'] = '';
        $this->selectedDiagnosaLabel = '';
    }

    public function clearTindakan() {
        $this->formData['tindakan'] = '';
        $this->formData['tindakanCode'] = '';
        $this->selectedTindakanLabel = '';
    }

    public function clearObat() {
        $this->formData['obat'] = '';
        $this->selectedObatLabel = '';
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
        $this->selectedDiagnosaLabel = '';
        $this->selectedTindakanLabel = '';
        $this->selectedObatLabel = '';
        $this->showDiagnosaDropdown = false;
        $this->showTindakanDropdown = false;
        $this->showObatDropdown = false;
    }

    public function saveCppt() {
        // Logic to save CPPT data would go here
        $this->closeModal();
        $this->dispatch('cpptAdded');
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
                            </div>

                            <div class="mb-3">
                                <label class="form-label">O</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.o"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">A</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.a"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">P</label>
                                <textarea class="form-control" rows="3" wire:model="formData.soap.p"></textarea>
                            </div>
                        </div>

                        <!-- Right Column - Diagnosis and Treatment -->
                        <div class="col-md-7">
                            <!-- Diagnosis Section -->
                            <div class="mb-4">
                                <h5>Diagnosa Pasien</h5>
                                <div class="position-relative">
                                    @if($selectedDiagnosaLabel)
                                    <div class="form-control d-flex justify-content-between align-items-center">
                                        <span>{{ $selectedDiagnosaLabel }}</span>
                                        <button type="button" class="btn-close" wire:click="clearDiagnosa"></button>
                                    </div>
                                    @else
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Cari diagnosa..."
                                            wire:model.debounce.300ms="diagnosaSearch"
                                            wire:click="$set('showDiagnosaDropdown', true)"
                                            wire:keydown.escape="$set('showDiagnosaDropdown', false)"
                                        >
                                    </div>
                                    @endif

                                    @if($showDiagnosaDropdown && !$selectedDiagnosaLabel && count($diagnosaList) > 0)
                                    <div class="position-absolute w-100 mt-1 shadow bg-white rounded-2 z-index-dropdown" style="max-height: 200px; overflow-y: auto; z-index: 1000;">
                                        @if(count($diagnosaList) > 0)
                                            @foreach($diagnosaList as $diagnosa)
                                            <div class="px-3 py-2 cursor-pointer hover-bg-light border-bottom" wire:click="selectDiagnosa('{{ $diagnosa['value'] }}', '{{ $diagnosa['label'] }}')">
                                                {{ $diagnosa['label'] }}
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="px-3 py-2 text-muted">No results found</div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Procedure Section -->
                            <div class="mb-4">
                                <h5>Tindakan</h5>
                                <div class="position-relative">
                                    @if($selectedTindakanLabel)
                                    <div class="form-control d-flex justify-content-between align-items-center">
                                        <span>{{ $selectedTindakanLabel }}</span>
                                        <button type="button" class="btn-close" wire:click="clearTindakan"></button>
                                    </div>
                                    @else
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Cari tindakan..."
                                            wire:model.debounce.300ms="tindakanSearch"
                                            wire:click="$set('showTindakanDropdown', true)"
                                            wire:keydown.escape="$set('showTindakanDropdown', false)"
                                        >
                                    </div>
                                    @endif

                                    @if($showTindakanDropdown && !$selectedTindakanLabel && count($tindakanList) > 0)
                                    <div class="position-absolute w-100 mt-1 shadow bg-white rounded-2" style="max-height: 200px; overflow-y: auto; z-index: 1000;">
                                        @if(count($tindakanList) > 0)
                                            @foreach($tindakanList as $tindakan)
                                            <div class="px-3 py-2 cursor-pointer hover-bg-light border-bottom" wire:click="selectTindakan('{{ $tindakan['value'] }}', '{{ $tindakan['label'] }}')">
                                                {{ $tindakan['label'] }}
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="px-3 py-2 text-muted">No results found</div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Medicine Section -->
                            <div class="mb-4">
                                <h5>Obat</h5>
                                <div class="position-relative">
                                    @if($selectedObatLabel)
                                    <div class="form-control d-flex justify-content-between align-items-center">
                                        <span>{{ $selectedObatLabel }}</span>
                                        <button type="button" class="btn-close" wire:click="clearObat"></button>
                                    </div>
                                    @else
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Cari obat..."
                                            wire:model.debounce.300ms="obatSearch"
                                            wire:click="$set('showObatDropdown', true)"
                                            wire:keydown.escape="$set('showObatDropdown', false)"
                                        >
                                    </div>
                                    @endif

                                    @if($showObatDropdown && !$selectedObatLabel && count($obatList) > 0)
                                    <div class="position-absolute w-100 mt-1 shadow bg-white rounded-2" style="max-height: 200px; overflow-y: auto; z-index: 1000;">
                                        @if(count($obatList) > 0)
                                            @foreach($obatList as $obat)
                                            <div class="px-3 py-2 cursor-pointer hover-bg-light border-bottom" wire:click="selectObat('{{ $obat['value'] }}', '{{ $obat['label'] }}')">
                                                {{ $obat['label'] }}
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="px-3 py-2 text-muted">No results found</div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
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

    <style>
    .cursor-pointer {
        cursor: pointer;
    }
    .hover-bg-light:hover {
        background-color: #f8f9fa;
    }
    .z-index-dropdown {
        z-index: 1050;
    }
    </style>
</div>
