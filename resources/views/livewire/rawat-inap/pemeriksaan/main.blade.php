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
        Current Patient ID: {{ $patientId }}
    </div>
    @endverbatim

    {{-- For debugging --}}
    @php
        dump($patientId); // This will show in your Laravel debugbar
        // dd($patientId); // Uncomment this to dump and die (stop execution)
    @endphp
</div>
