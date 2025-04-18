<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $patientId;
    public $currentStep = 1;
    public $totalSteps = 2;

    public function mount($patientId)
    {
        $this->patientId = $patientId;
        $this->totalSteps = 2;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->dispatch('validate-identitas-diri');
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
        $this->dispatch('scroll-to-top');
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        session()->flash('message', 'Form submitted successfully!');
        $this->dispatch('patient-registered', patientId: $this->patientId);
        $this->dispatch('switch-tab', tab: 'pemeriksaan');
    }
}; ?>

<div class="container stepper-container p-4">
    <div class="stepper" id="stepper">
        <div class="step">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
            <div class="step-title">Identitas Diri</div>
        </div>
        <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
        <div class="step">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
            <div class="step-title">General Consent</div>
        </div>
    </div>

    <!-- step 1 content - identitas diri -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <livewire:rawat-inap.pendaftaran.identitas-diri.main :patientId="$patientId" />
    </div>

    <!-- step 2 content - general consent -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <livewire:rawat-inap.pendaftaran.general-consent.main :patientId="$patientId" />
    </div>

    <div class="navigation-buttons mt-4">
        <button class="btn btn-secondary" wire:click="prevStep" {{ $currentStep===1 ? 'disabled' : '' }}>
            Previous
        </button>

        @if($currentStep < $totalSteps) <button class="btn btn-primary" wire:click="nextStep">Next</button>
            @else
            <button class="btn btn-success" wire:click="submit">Submit</button>
            @endif
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
