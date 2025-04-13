<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "main pemeriksaan";
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
} ?>

<div>
    ini adalah class {{ $this->msg }}
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
</div>
