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
        'id_icd10' => [],
        'id_icd9' => [],
        'id_obat' => [],
        'pemeriksaanPenunjang' => '',
    ];

    public $diagnosaList = [];
    public $tindakanList = [];
    public $obatList = [];

    // Selected items for display
    public $selectedDiagnosa = [];
    public $selectedTindakan = [];
    public $selectedObat = [];

    public $diagnosaSearch = '';
    public $tindakanSearch = '';
    public $obatSearch = '';

    public $loadingDiagnosa = false;
    public $loadingTindakan = false;
    public $loadingObat = false;
    public $kelas = '';

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->currentTime = now()->format('H:i:s');

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        if ($pendaftaran && $pendaftaran->poli_rawat_inap) {
            $this->kelas = $pendaftaran->poli_rawat_inap->kelas;
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
                    'label' => $item->display . ' (' . $item->code . ')',
                    'display' => $item->display,
                    'code' => $item->code
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
                    'label' => $item->display . ' (' . $item->code . ')',
                    'display' => $item->display,
                    'code' => $item->code
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
                    'label' => $item->nama,
                    'nama' => $item->nama
                ];
            })
            ->toArray();
        $this->loadingObat = false;
    }

    public function addDiagnosa($diagnosaId) {
        if (!in_array($diagnosaId, $this->formData['id_icd10'])) {
            $this->formData['id_icd10'][] = $diagnosaId;

            // Add to selected items for display
            $diagnosa = collect($this->diagnosaList)->firstWhere('value', $diagnosaId);
            if ($diagnosa) {
                $this->selectedDiagnosa[] = $diagnosa;
            }
        }
        $this->diagnosaSearch = '';
        $this->loadDiagnosaOptions();
    }

    public function removeDiagnosa($diagnosaId) {
        $this->formData['id_icd10'] = array_values(array_filter($this->formData['id_icd10'], function($id) use ($diagnosaId) {
            return $id != $diagnosaId;
        }));

        $this->selectedDiagnosa = array_values(array_filter($this->selectedDiagnosa, function($item) use ($diagnosaId) {
            return $item['value'] != $diagnosaId;
        }));
    }

    public function addTindakan($tindakanId) {
        if (!in_array($tindakanId, $this->formData['id_icd9'])) {
            $this->formData['id_icd9'][] = $tindakanId;

            // Add to selected items for display
            $tindakan = collect($this->tindakanList)->firstWhere('value', $tindakanId);
            if ($tindakan) {
                $this->selectedTindakan[] = $tindakan;
            }
        }
        $this->tindakanSearch = '';
        $this->loadTindakanOptions();
    }

    public function removeTindakan($tindakanId) {
        $this->formData['id_icd9'] = array_values(array_filter($this->formData['id_icd9'], function($id) use ($tindakanId) {
            return $id != $tindakanId;
        }));

        $this->selectedTindakan = array_values(array_filter($this->selectedTindakan, function($item) use ($tindakanId) {
            return $item['value'] != $tindakanId;
        }));
    }

    public function addObat($obatId) {
        if (!in_array($obatId, $this->formData['id_obat'])) {
            $this->formData['id_obat'][] = $obatId;

            // Add to selected items for display
            $obat = collect($this->obatList)->firstWhere('value', $obatId);
            if ($obat) {
                $this->selectedObat[] = $obat;
            }
        }
        $this->obatSearch = '';
        $this->loadObatOptions();
    }

    public function removeObat($obatId) {
        $this->formData['id_obat'] = array_values(array_filter($this->formData['id_obat'], function($id) use ($obatId) {
            return $id != $obatId;
        }));

        $this->selectedObat = array_values(array_filter($this->selectedObat, function($item) use ($obatId) {
            return $item['value'] != $obatId;
        }));
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
            'id_icd10' => [],
            'id_icd9' => [],
            'id_obat' => [],
            'pemeriksaanPenunjang' => '',
        ];

        $this->selectedDiagnosa = [];
        $this->selectedTindakan = [];
        $this->selectedObat = [];

        $this->diagnosaSearch = '';
        $this->tindakanSearch = '';
        $this->obatSearch = '';

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
            'formData.id_icd10' => 'nullable|array',
            'formData.id_icd10.*' => 'exists:icd10,id',
            'formData.id_icd9' => 'nullable|array',
            'formData.id_icd9.*' => 'exists:icd9,id',
            'formData.id_obat' => 'nullable|array',
            'formData.id_obat.*' => 'exists:obat,id',
        ]);

        CPPT::create([
            'id_pendaftaran' => $this->pendaftaranId,
            's' => $this->formData['soap']['s'],
            'o' => $this->formData['soap']['o'],
            'a' => $this->formData['soap']['a'],
            'p' => $this->formData['soap']['p'],
            'id_icd10' => json_encode($this->formData['id_icd10']),
            'id_icd9' => json_encode($this->formData['id_icd9']),
            'id_obat' => json_encode($this->formData['id_obat']),
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

                                <!-- Search Input -->
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

                                <!-- Selected Diagnosa Tags -->
                                @if(count($selectedDiagnosa) > 0)
                                <div class="mb-2">
                                    <small class="text-muted">Diagnosa terpilih:</small>
                                    <div class="mt-1">
                                        @foreach($selectedDiagnosa as $diagnosa)
                                        <span class="badge bg-primary me-1 mb-1 d-inline-flex align-items-center">
                                            {{ $diagnosa['display'] }} ({{ $diagnosa['code'] }})
                                            <button type="button" class="btn-close btn-close-white ms-2"
                                                    style="font-size: 0.7em;"
                                                    wire:click="removeDiagnosa({{ $diagnosa['value'] }})"></button>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Dropdown Options -->
                                @if($diagnosaSearch && count($diagnosaList) > 0)
                                <div class="border rounded bg-white" style="max-height: 200px; overflow-y: auto;">
                                    @foreach($diagnosaList as $diagnosa)
                                        @if(!in_array($diagnosa['value'], $formData['id_icd10']))
                                        <div class="p-2 border-bottom cursor-pointer hover-bg-light"
                                             wire:click="addDiagnosa({{ $diagnosa['value'] }})"
                                             style="cursor: pointer;">
                                            <small class="text-primary">{{ $diagnosa['code'] }}</small><br>
                                            {{ $diagnosa['display'] }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                                @error('formData.id_icd10') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <!-- Procedure Section -->
                            <div class="mb-4">
                                <h5>Tindakan (ICD-9)</h5>

                                <!-- Search Input -->
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

                                <!-- Selected Tindakan Tags -->
                                @if(count($selectedTindakan) > 0)
                                <div class="mb-2">
                                    <small class="text-muted">Tindakan terpilih:</small>
                                    <div class="mt-1">
                                        @foreach($selectedTindakan as $tindakan)
                                        <span class="badge bg-success me-1 mb-1 d-inline-flex align-items-center">
                                            {{ $tindakan['display'] }} ({{ $tindakan['code'] }})
                                            <button type="button" class="btn-close btn-close-white ms-2"
                                                    style="font-size: 0.7em;"
                                                    wire:click="removeTindakan({{ $tindakan['value'] }})"></button>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Dropdown Options -->
                                @if($tindakanSearch && count($tindakanList) > 0)
                                <div class="border rounded bg-white" style="max-height: 200px; overflow-y: auto;">
                                    @foreach($tindakanList as $tindakan)
                                        @if(!in_array($tindakan['value'], $formData['id_icd9']))
                                        <div class="p-2 border-bottom cursor-pointer hover-bg-light"
                                             wire:click="addTindakan({{ $tindakan['value'] }})"
                                             style="cursor: pointer;">
                                            <small class="text-success">{{ $tindakan['code'] }}</small><br>
                                            {{ $tindakan['display'] }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                                @error('formData.id_icd9') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <!-- Medicine Section -->
                            <div class="mb-4">
                                <h5>Obat</h5>

                                <!-- Search Input -->
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

                                <!-- Selected Obat Tags -->
                                @if(count($selectedObat) > 0)
                                <div class="mb-2">
                                    <small class="text-muted">Obat terpilih:</small>
                                    <div class="mt-1">
                                        @foreach($selectedObat as $obat)
                                        <span class="badge bg-warning text-dark me-1 mb-1 d-inline-flex align-items-center">
                                            {{ $obat['nama'] }}
                                            <button type="button" class="btn-close ms-2"
                                                    style="font-size: 0.7em;"
                                                    wire:click="removeObat({{ $obat['value'] }})"></button>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Dropdown Options -->
                                @if($obatSearch && count($obatList) > 0)
                                <div class="border rounded bg-white" style="max-height: 200px; overflow-y: auto;">
                                    @foreach($obatList as $obat)
                                        @if(!in_array($obat['value'], $formData['id_obat']))
                                        <div class="p-2 border-bottom cursor-pointer hover-bg-light"
                                             wire:click="addObat({{ $obat['value'] }})"
                                             style="cursor: pointer;">
                                            {{ $obat['nama'] }}
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                                @error('formData.id_obat') <div class="text-danger small">{{ $message }}</div> @enderror
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
                                            <label class="form-check-label" for="kelas1">Kelas 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="kelas" value="2" id="kelas2">
                                            <label class="form-check-label" for="kelas2">Kelas 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="kelas" value="3" id="kelas3">
                                            <label class="form-check-label" for="kelas3">Kelas 3</label>
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

    <style>
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
    @endif
</div>
