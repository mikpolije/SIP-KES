<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $currentStep = 1;
    public $totalSteps = 3; // Will be calculated in mount()

    #[Validate('required')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $examinationType = '';

    public function mount()
    {
        // In a real implementation, you might calculate total steps dynamically
        // For this example, we'll keep it simple with 2 steps
        $this->totalSteps = 2;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        $this->validate([
            'examinationType' => 'required',
        ]);

        // Process form submission here
        // For example: save to database, send email, etc.

        session()->flash('message', 'Form submitted successfully!');

        // Reset form or redirect
        // $this->reset();
        // return $this->redirect('/success');
    }
}; ?>

<div class="container stepper-container card w-100 p-4">
    <div class="stepper" id="stepper">
        <div class="step">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
            <div class="step-title">Pendaftaran</div>
        </div>
        <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
        <div class="step">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
            <div class="step-title">Pemeriksaan</div>
        </div>
    </div>

    <!-- Step 1 Content -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <h3>Pendaftaran</h3>
        <p>Please fill in your registration details.</p>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Enter your full name">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Enter your email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Step 2 Content -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <h3>Pemeriksaan</h3>
        <p>Examination details and information.</p>
        <div class="mb-3">
            <label for="examination-type" class="form-label">Examination Type</label>
            <select wire:model="examinationType" class="form-select @error('examinationType') is-invalid @enderror"
                id="examination-type">
                <option value="">Select examination type</option>
                <option value="1">General Check-up</option>
                <option value="2">Specialized Examination</option>
                <option value="3">Follow-up Visit</option>
            </select>
            @error('examinationType') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="navigation-buttons">
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
