<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="title">Laporan</h1>

                <div class="row align-items-end mb-4">
                    <div class="col-md-3">
                        <label for="tanggalMasuk" class="form-label text-muted small">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggalMasuk" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="col-md-3">
                        <label for="tanggalKeluar" class="form-label text-muted small">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggalKeluar" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary me-2">
                            <i class="bi bi-search"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('rawat-inap.laporan-print') }}'">
                            <i class="bi bi-printer"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <h5 class="card-title mb-3">Daftar RL 5.3 ICD 10</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col" class="align-middle">NO.</th>
                                <th scope="col" class="align-middle">KODE ICD X</th>
                                <th scope="col" class="align-middle">PENYAKIT</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR HIDUP<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>LAKI LAKI</th>
                                <th scope="col" class="align-middle">PASIEN KELUAR MATI<br>PEREMPUAN</th>
                                <th scope="col" class="align-middle">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">J44</td>
                                <td>Other chronic obstructive pulmonary disease</td>
                                <td class="text-center">10</td>
                                <td class="text-center">7</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center fw-bold">17</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
