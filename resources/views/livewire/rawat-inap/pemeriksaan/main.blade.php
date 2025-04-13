<?php

use Livewire\Volt\Component;

new class extends Component {
    public $msg = "main pemeriksaan";
} ?>

<div class="card w-100">
    <div class="card-body wizard-content">
        <form action="#" class="validation-wizard wizard-circle">
            <h6>
                <span class="step"><i class="ti ti-clipboard-text"></i></span>Assessement Awal
            </h6>
            <section>

            </section>

            <h6>
                <span class="step"><i class="ti ti-nurse"></i></span>Informed Consent
            </h6>
            <section class="d-none">
            </section>
        </form>
    </div>
</div>
