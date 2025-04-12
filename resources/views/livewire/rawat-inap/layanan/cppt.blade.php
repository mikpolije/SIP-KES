<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "cppt";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
