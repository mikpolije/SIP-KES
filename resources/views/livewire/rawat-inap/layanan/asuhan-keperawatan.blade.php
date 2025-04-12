<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "asuhan keperatawan";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
