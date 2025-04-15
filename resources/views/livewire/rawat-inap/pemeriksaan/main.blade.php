<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $patientId;
    public $currentStep = 1;
    public $totalSteps = 2;

    // Step 1 fields
    public $keluhan = '';
    public $riwayatPenyakit = '';
    public $alergi = 'tidak';
    public $jenisAlergi = '';
    public $riwayatPengobatan = '';
    public $denyutJantung = '';
    public $pernafasan = '';
    public $suhuTubuh = '';
    public $sistole = '';
    public $diastole = '';
    public $skalaNyeri = '';
    public $statusPsikologi = [];
    public $bunuhDiri = false;
    public $bunuhDiriLaporan = '';
    public $lainLain = false;
    public $lainLainText = '';

    public function mount($patientId = null)
    {
        $this->patientId = $patientId;
        $this->totalSteps = 2;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            // Add any validation for step 1 if needed
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('scroll-to-top');
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('scroll-to-top');
        }
    }

    public function submit()
    {
        // Save data logic here
        session()->flash('message', 'Asesmen awal berhasil disimpan!');
    }
}; ?>

<div class="container stepper-container p-4">
    <div class="stepper" id="stepper">
        <div class="step">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
            <div class="step-title">Asessmen Awal</div>
        </div>
        <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
        <div class="step">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
            <div class="step-title">Informed Consent</div>
        </div>
    </div>

    <!-- Step 1 content - Asessmen Awal -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <div class="container">
            <h1 class="form-title">Asessmen Awal Ranap</h1>

            <form>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan Utama</label>
                            <textarea wire:model="keluhan" class="form-control" id="keluhan" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="riwayat-penyakit" class="form-label">Riwayat Penyakit</label>
                            <textarea wire:model="riwayatPenyakit" class="form-control" id="riwayat-penyakit"
                                rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Riwayat Alergi</label>
                            <div class="mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                        id="tidak-alergi" value="tidak" checked>
                                    <label class="form-check-label" for="tidak-alergi">Tidak</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                        id="ya-alergi" value="ya">
                                    <label class="form-check-label" for="ya-alergi">Ya</label>
                                </div>
                            </div>
                            <input type="text" wire:model="jenisAlergi" class="form-control" id="jenis-alergi"
                                placeholder="Jenis alergi">
                        </div>

                        <div class="mb-3">
                            <label for="riwayat-pengobatan" class="form-label">Riwayat Pengobatan</label>
                            <textarea wire:model="riwayatPengobatan" class="form-control" id="riwayat-pengobatan"
                                rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="denyut-jantung" class="form-label">Denyut Jantung</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="denyutJantung" class="form-control"
                                        id="denyut-jantung">
                                    <span class="unit-label">bpm</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="pernafasan" class="form-label">Pernafasan</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="pernafasan" class="form-control" id="pernafasan">
                                    <span class="unit-label">x/menit</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="suhu-tubuh" class="form-label">Suhu Tubuh</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="suhuTubuh" class="form-control" id="suhu-tubuh">
                                    <span class="unit-label">°C</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tekanan Darah</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <input type="text" wire:model="sistole" class="form-control" id="sistole"
                                            placeholder="Sistole">
                                        <span class="unit-label">mmHg</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <input type="text" wire:model="diastole" class="form-control" id="diastole"
                                            placeholder="Diastole">
                                        <span class="unit-label">mmHg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Skala Nyeri</label>
                            <div class="pain-scale-checkbox">
                                @foreach([0, 2, 4, 6, 8, 10] as $value)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="skalaNyeri"
                                        name="skala-nyeri" id="nyeri-{{ $value }}" value="{{ $value }}">
                                    <label class="form-check-label" for="nyeri-{{ $value }}">{{ $value }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Psikologi</label>
                            <div class="mb-2">
                                @foreach(['tenang', 'cemas', 'takut', 'marah'] as $status)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" wire:model="statusPsikologi"
                                        id="{{ $status }}" value="{{ $status }}">
                                    <label class="form-check-label" for="{{ $status }}">{{ ucfirst($status) }}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" wire:model="bunuhDiri" id="bunuh-diri"
                                    value="1">
                                <label class="form-check-label" for="bunuh-diri">
                                    Kecenderungan bunuh diri, dilapor ke
                                    <input type="text" wire:model="bunuhDiriLaporan"
                                        class="form-control form-control-sm d-inline-block" style="width: 150px;">
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="lainLain" id="lain-lain"
                                    value="1">
                                <label class="form-check-label" for="lain-lain">Lain-lain, tuliskan</label>
                                <textarea wire:model="lainLainText" class="form-control mt-2" id="lain-lain-text"
                                    rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Step 2 content - Informed Consent (Blank Page) -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <div>
            <div class="card-body">
                <h4 class="card-title">Informed Consent</h4>
                <p class="card-text">kosongan</p>
            </div>
        </div>
    </div>

    <div class="navigation-buttons mt-4">
        <button class="btn btn-secondary" wire:click="prevStep" {{ $currentStep===1 ? 'disabled' : '' }}>
            Previous
        </button>

        @if($currentStep < $totalSteps) <button class="btn btn-primary" wire:click="nextStep">Next</button>
            @else
            <button class="btn btn-success" wire:click="submit">Simpan</button>
            @endif
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
