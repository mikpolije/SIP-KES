<?php

use Livewire\Volt\Component;

new class extends Component {
    public $currentStep = 1;
    public $totalSteps = 2;

    public function nextStep()
    {
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

    public function goToStep($step)
    {
        if ($step >= 1 && $step <= $this->totalSteps) {
            $this->currentStep = $step;
        }
    }
} ?>

<div>
    <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
            <!-- Step 1 -->
            <div class="step {{ $currentStep >= 1 ? 'active' : '' }}">
                <button type="button" class="step-trigger" role="tab" wire:click="goToStep(1)">
                    <span class="bs-stepper-circle">{{ $currentStep > 1 ? '✓' : '1' }}</span>
                    <span class="bs-stepper-label">Identitas Diri</span>
                </button>
            </div>
            <div class="line"></div>
            <!-- Step 2 -->
            <div class="step {{ $currentStep >= 2 ? 'active' : '' }}">
                <button type="button" class="step-trigger" role="tab" wire:click="goToStep(2)">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">General Consent</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <!-- Step 1 Content -->
            <div id="logins-part" class="content {{ $currentStep === 1 ? 'd-block' : 'd-none' }}">
                <p>apa kek isinya</p>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <button class="btn btn-secondary" disabled>Previous</button>
                    <button class="btn btn-primary" wire:click="nextStep">Next</button>
                </div>
            </div>

            <!-- Step 2 Content -->
            <div id="information-part" class="content {{ $currentStep === 2 ? 'd-block' : 'd-none' }}">
                <h4>kuliah di polije b aja</h4>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-secondary" wire:click="prevStep">Previous</button>
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
