<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "layanan";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
