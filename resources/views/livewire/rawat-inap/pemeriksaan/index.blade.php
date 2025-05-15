<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $currentStep = 1;
    public $totalSteps = 2;

    public function mount($pendaftaranId = null)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->totalSteps = 2;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->dispatch('submit-step1');
        }

        if ($this->currentStep === 2) {
            $this->dispatch('submit-step2');
        }
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
            $this->dispatch('scroll-to-top');
        }
    }

    public function submit()
    {
        // Save data logic here
        session()->flash('message', 'Asesmen awal dan informed consent berhasil disimpan!');
        $this->dispatch('switch-tab', tab: 'layanan');
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
        <livewire:rawat-inap.pemeriksaan.asessmen-awal :pendaftaranId="$pendaftaranId" />
    </div>

    <!-- Step 2 content - Informed Consent -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <livewire:rawat-inap.pemeriksaan.informed-consent :pendaftaranId="$pendaftaranId" />
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
