<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "general consent";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
