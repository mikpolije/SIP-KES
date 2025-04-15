<?php

use Livewire\Volt\Component;

new class extends Component {
    public $patientId;

    public function mount($patientId = null) {
        $this->patientId = $patientId;
    }
} ?>

<div class="card w-100">
    @verbatim
    <div class="alert alert-info">
        Current Patient ID: {{ $this->patientId }}
    </div>
    @endverbatim

    @php
    dump($patientId);
    // dd($patientId);
    @endphp
</div>
