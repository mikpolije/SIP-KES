<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "main pendaftaran";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
