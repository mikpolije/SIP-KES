<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "assesment awal";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
