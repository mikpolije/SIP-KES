<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.blank')]
#[Title('Surat Rencana Kontrol')]
class extends Component {
    //
}; ?>

<div>
    <div class="container-fluid p-4 bg-white ">
        <div class="mx-auto" style="max-width: 1200px;">
            <div class="border-0 d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid">
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold text-dark">Formulir RL 5.3</h4>
                        <p class="mb-0 text-muted">Daftar 10 Besar Penyakit Rawat Inap</p>
                    </div>
                </div>
            </div>

            <div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" class="align-middle">NO.</th>
                                <th scope="col" class="align-middle">KODE ICD 10</th>
                                <th scope="col" class="align-middle">PENYAKIT</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>LAKI-LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-light">
                                <td class="text-center">1</td>
                                <td class="text-center">J43</td>
                                <td>Emphysema</td>
                                <td class="text-center">5</td>
                                <td class="text-center">5</td>
                                <td class="text-center">5</td>
                                <td class="text-center">5</td>
                                <td class="text-center fw-bold">20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="button" class="btn btn-primary px-4" onClick="window.print()">
                        <i class="bi bi-printer me-2"></i>Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
