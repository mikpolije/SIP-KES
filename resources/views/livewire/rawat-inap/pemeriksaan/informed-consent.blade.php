<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "informed consent";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
