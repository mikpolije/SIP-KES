<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "resume medis";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
