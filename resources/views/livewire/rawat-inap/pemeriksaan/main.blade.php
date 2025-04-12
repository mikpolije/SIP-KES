<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "main pemeriksaan";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
