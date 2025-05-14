<?php

use Livewire\Volt\Component;

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
        'pemeriksaanPenunjang' => [],
        'kelasPerawatan' => ''
    ];

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->currentTime = now()->format('H:i:s');
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
            'pemeriksaanPenunjang' => [],
            'kelasPerawatan' => ''
        ];
    }

    public function saveCppt() {
        // Logic to save CPPT data would go here
        $this->closeModal();
        $this->dispatch('cpptAdded');
    }

    public function addPemeriksaan($type) {
        if (!in_array($type, $this->formData['pemeriksaanPenunjang'])) {
            $this->formData['pemeriksaanPenunjang'][] = $type;
        }
    }

    public function removePemeriksaan($index) {
        unset($this->formData['pemeriksaanPenunjang'][$index]);
        $this->formData['pemeriksaanPenunjang'] = array_values($this->formData['pemeriksaanPenunjang']);
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
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <select class="form-select" wire:model="formData.diagnosa">
                                            <option value="">Pilih Diagnosa</option>
                                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                                            <option value="Hipertensi">Hipertensi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary w-100">Cari</button>
                                    </div>
                                </div>
                                @if($formData['diagnosa'])
                                <div class="mt-2">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded">
                                        <strong>{{ $formData['diagnosa'] }}</strong> - Kode ICD-10:
                                        @if($formData['diagnosa'] == 'Diabetes Mellitus')
                                        E11
                                        @elseif($formData['diagnosa'] == 'Hipertensi')
                                        I10
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Procedure Section -->
                            <div class="mb-4">
                                <h5>Tindakan</h5>
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <select class="form-select" wire:model="formData.tindakan">
                                            <option value="">Pilih Tindakan</option>
                                            <option value="Pemeriksaan Fisik">Pemeriksaan Fisik</option>
                                            <option value="Konsultasi">Konsultasi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary w-100">Cari</button>
                                    </div>
                                </div>
                                @if($formData['tindakan'])
                                <div class="mt-2">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded">
                                        <strong>{{ $formData['tindakan'] }}</strong> - Kode ICD 9 CM:
                                        @if($formData['tindakan'] == 'Pemeriksaan Fisik')
                                        89.7
                                        @elseif($formData['tindakan'] == 'Konsultasi')
                                        89.05
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Medicine Section -->
                            <div class="mb-4">
                                <h5>Obat</h5>
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <select class="form-select" wire:model="formData.obat">
                                            <option value="">Jenis Obat</option>
                                            <option value="Paracetamol">Paracetamol</option>
                                            <option value="Amoxicillin">Amoxicillin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary w-100">Cari</button>
                                    </div>
                                </div>
                                @if($formData['obat'])
                                <div class="mt-2">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded">
                                        <strong>{{ $formData['obat'] }}</strong>
                                        @if($formData['obat'] == 'Paracetamol')
                                        - 500mg
                                        @elseif($formData['obat'] == 'Amoxicillin')
                                        - 250mg
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Additional Examinations and Care Class -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <h5>Pemeriksaan Penunjang</h5>
                                    <select class="form-select mb-2" wire:change="addPemeriksaan($event.target.value)">
                                        <option value="">Pilih Pemeriksaan</option>
                                        <option value="Laboratorium">Laboratorium</option>
                                        <option value="Radiologi">Radiologi</option>
                                    </select>
                                    @if(count($formData['pemeriksaanPenunjang']) > 0)
                                    <div class="mt-2">
                                        @foreach($formData['pemeriksaanPenunjang'] as $index => $pemeriksaan)
                                        <div
                                            class="bg-primary bg-opacity-10 p-2 rounded mb-2 d-flex justify-content-between align-items-center">
                                            <span>{{ $pemeriksaan }}</span>
                                            <button type="button" class="btn btn-sm btn-close"
                                                wire:click="removePemeriksaan({{ $index }})"></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <h5>Kelas Perawatan</h5>
                                    <select class="form-select mb-2" wire:model="formData.kelasPerawatan">
                                        <option value="">Pilih Kelas</option>
                                        <option value="Kelas 1">Kelas 1</option>
                                        <option value="Kelas 2">Kelas 2</option>
                                        <option value="Kelas 3">Kelas 3</option>
                                    </select>
                                    @if($formData['kelasPerawatan'])
                                    <div class="mt-2">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelas" id="kelas1"
                                                    value="Kelas 1" wire:model="formData.kelasPerawatan">
                                                <label class="form-check-label" for="kelas1">
                                                    Kelas 1
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelas" id="kelas2"
                                                    value="Kelas 2" wire:model="formData.kelasPerawatan">
                                                <label class="form-check-label" for="kelas2">
                                                    Kelas 2
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kelas" id="kelas3"
                                                    value="Kelas 3" wire:model="formData.kelasPerawatan">
                                                <label class="form-check-label" for="kelas3">
                                                    Kelas 3
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
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
