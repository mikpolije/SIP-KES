<?php

use App\Models\AsessmenAwal;
use App\Models\GeneralConsent;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $currentStep = 1;
    public $totalSteps = 3;

    public $tabs = [
        1 => 'General Consent',
        2 => 'Assesmen Awal',
        3 => 'Informed Consent'
    ];

    public function mount($pendaftaranId = null)
    {
        $this->pendaftaranId = $pendaftaranId;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->dispatch('submit-step1');
        }

        if ($this->currentStep === 2) {
            $this->dispatch('submit-step2');
        }

        if ($this->currentStep === 3) {
            $this->dispatch('submit-step3');
        }
    }

    public function goToStep($step)
    {
        if ($step < 1 || $step > $this->totalSteps) {
            return;
        }

        $general_consent = GeneralConsent::where('id_pendaftaran', $this->pendaftaranId)->first();
        $asessmen_awal = AsessmenAwal::where('id_pendaftaran', $this->pendaftaranId)->first();

        if(!$general_consent && !$asessmen_awal) {
            flash()->error('Anda harus menyelesaikan General Consent dan Asesmen Awal terlebih dahulu.');
            return;
        }

        $this->currentStep = $step;
        $this->dispatch('scroll-to-top');
    }

    #[On('go-next-step')]
    public function goNextStep()
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('scroll-to-top');
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    #[On('submit-finally')]
    public function saveAndGo($success)
    {
        if($success) {
            flash()->success('Asesmen awal dan informed consent berhasil disimpan!');
            $this->dispatch('switch-tab', tab: 'layanan');
        } else {
            flash()->success('Gagal menyimpan asesmen awal dan informed consent!');
        }
    }

    public function submit()
    {
        $this->dispatch('submit-step3');
    }
}; ?>

<div class="container">
    <div class="card">
        <div class="card-body p-0">
            <!-- Tab Navigation -->
            <ul class="nav nav-pills nav-fill bg-primary bg-opacity-25 rounded-top">
                @foreach($tabs as $stepId => $tabName)
                <li class="nav-item">
                    <button class="nav-link rounded-0 {{ $currentStep === $stepId ? 'bg-white text-primary fw-bold' : 'bg-primary text-white' }}"
                            wire:click="goToStep({{ $stepId }})"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="goToStep({{ $stepId }})">
                            {{ $tabName }}
                        </span>
                    </button>
                </li>
                @endforeach
            </ul>

            <!-- Tab Content Area -->
            <div class="p-4">
                <!-- Loading indicator for tab content -->
                <div wire:loading wire:target="goToStep" class="text-center p-4">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- Step 1 content - General Consent -->
                <div class="{{ $currentStep !== 1 ? 'd-none' : '' }}" id="step-1">
                    <livewire:rawat-inap.pemeriksaan.general-consent :pendaftaranId="$pendaftaranId" />
                </div>

                <!-- Step 2 content - Asessmen Awal -->
                <div class="{{ $currentStep !== 2 ? 'd-none' : '' }}" id="step-2">
                    <livewire:rawat-inap.pemeriksaan.asessmen-awal :pendaftaranId="$pendaftaranId" />
                </div>

                <!-- Step 3 content - Informed Consent -->
                <div class="{{ $currentStep !== 3 ? 'd-none' : '' }}" id="step-3">
                    <livewire:rawat-inap.pemeriksaan.informed-consent :pendaftaranId="$pendaftaranId" />
                </div>

                <div class="navigation-buttons mt-4">
                    <button class="btn btn-secondary" wire:click="prevStep" {{ $currentStep === 1 ? 'disabled' : '' }}>
                        Previous
                    </button>

                    @if($currentStep < $totalSteps)
                        <button class="btn btn-primary" wire:click="nextStep">Next</button>
                    @else
                        <button class="btn btn-success" wire:click="submit">Simpan</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
