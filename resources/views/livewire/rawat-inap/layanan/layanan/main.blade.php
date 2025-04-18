<?php

use Livewire\Volt\Component;

new class extends Component {
    public $patientId;
    public $msg = "lol";

    public function mount($patientId = null) {
        $this->patientId = $patientId;
    }
}; ?>

<div>
    {{ $msg }}
</div>
