<?php

use Livewire\Volt\Component;

new class extends Component {
} ?>

<div class="card w-100">
    <div class="card-body wizard-content">
        <h1 class="title" id="page-title">Layanan</h1>
        <form action="#" class="validation-wizard wizard-circle mt-5">
            <h6>
                <span class="step"><i class="ti ti-clipboard-text"></i></span>Pendaftaran
            </h6>
            <section>

            </section>

            <h6>
                <span class="step"><i class="ti ti-nurse"></i></span>Layanan
            </h6>
            <section class="d-none">
                one
            </section>

            <h6>
                <span class="step"><i class="ti ti-stethoscope"></i></span>Pemeriksaan
            </h6>
            <section>
                <div id="pemeriksaan-kb" class="d-none">
                    two
                </div>

                <div id="pemeriksaan-anak" class="d-none">
                    three
                </div>

                <div id="pemeriksaan-persalinan" class="d-none">
                    four
                </div>

                <div id="pemeriksaan-kehamilan" class="d-none">
                    five
                </div>
            </section>

            <h6><span class="step"><i class="ti ti-pill"></i></span>Farmasi</h6>
            <section></section>

            <h6><span class="step"><i class="ti ti-receipt-2"></i></span>Pembayaran</h6>
            <section></section>
        </form>
    </div>
</div>
