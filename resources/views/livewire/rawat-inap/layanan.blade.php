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
        // Submit logic would go here
        session()->flash('message', 'Form submitted successfully!');
    }

    public function openCpptModal()
    {
        $this->dispatch('open-cppt-modal');
    }
}; ?>

<div class="w-100">
    <!-- Stepper -->
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

    <!-- step 1 content - cppt -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <div class="py-4">
            <h1 class="text-center mb-4">CPPT</h1>

            <div class="p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" width="40">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th scope="col">NO <span class="text-primary">*</span></th>
                                <th scope="col">TANGGAL VISIT</th>
                                <th scope="col">DPJP</th>
                                <th scope="col">PERAWAT</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">LAST EDIT</th>
                                <th scope="col" class="text-center">
                                    <i class="bi bi-pencil-square"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="check1">
                                        <label class="form-check-label" for="check1"></label>
                                    </div>
                                </td>
                                <td>1</td>
                                <td>09-01-2025 01:02</td>
                                <td>dr.Jeno Sp.J</td>
                                <td>Jaemin S.Kep.Ns</td>
                                <td>-</td>
                                <td>Jaemin S.Kep.Ns</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-sm btn-primary rounded-circle me-1">
                                            <i class="bi bi-file-text"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary rounded-circle">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="check2">
                                        <label class="form-check-label" for="check2"></label>
                                    </div>
                                </td>
                                <td>2</td>
                                <td></td>
                                <td>dr.Jeno Sp.J</td>
                                <td>Jaemin S.Kep.Ns</td>
                                <td>RUJUK LAB</td>
                                <td>dr.Jeno Sp.J</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-sm btn-primary rounded-circle me-1">
                                            <i class="bi bi-file-text"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary rounded-circle">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary rounded-pill" wire:click="openCpptModal">
                <i class="bi bi-plus-circle"></i> Tambah
            </button>
        </div>

    </div>

    <!-- step 2 content - dan seterusnya ea -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <div class="container py-4">
            <h2 class="text-center mb-4">yg lain</h2>
            <p class="text-center">tambahin ntar stepnya</p>
        </div>
    </div>

    <!-- navigation buttons -->
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

    @livewire('rawat-inap.layanan.cppt-modal', ['patientId' => $patientId], key('cppt-modal-'.$patientId))
</div>
