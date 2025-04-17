<?php
use Livewire\Volt\Component;

new class extends Component {
    public $patientId;
    public $currentStep = 1;
    public $totalSteps = 2;

    public function mount($patientId = null) {
        $this->patientId = $patientId;
        $this->totalSteps = 2;
    }

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

    public function submit()
    {
        session()->flash('message', 'Form submitted successfully!');
    }
};
?>

<div class="w-100">
    <!-- stepper -->
    <div class="stepper-container p-4">
        <div class="stepper" id="stepper">
            <div class="step">
                <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
                <div class="step-title">CPPT</div>
            </div>
            <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
            <div class="step">
                <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
                <div class="step-title">yg lain</div>
            </div>
        </div>
    </div>

    <!-- step 1 cppt -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        @livewire('rawat-inap.layanan.cppt.main', ['patientId' => $patientId], key('cppt-'.$patientId))
    </div>

    <!-- step 2 sesuaiin ntar -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <div class="container py-4">
            <h2 class="text-center mb-4">yg lain</h2>
            <p class="text-center">tambahin ntar stepnya</p>
        </div>
    </div>

    <!-- navigation -->
    <div class="navigation-buttons mt-4 p-4">
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
