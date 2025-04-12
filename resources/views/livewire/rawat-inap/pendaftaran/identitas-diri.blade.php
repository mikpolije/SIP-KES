<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "identitas diri";
} ?>

<div>
    ini adalah class {{ $this->msg }}
</div>
