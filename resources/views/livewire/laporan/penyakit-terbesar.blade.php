<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="container-fluid p-4">
        <!-- Main Card -->
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Header -->
                <h1 class="title">Laporan</h1>

                <!-- Date Inputs and Buttons Row -->
                <div class="row align-items-end mb-4">
                    <!-- Tanggal Masuk -->
                    <div class="col-md-3">
                        <label for="tanggalMasuk" class="form-label text-muted small">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggalMasuk" placeholder="dd/mm/yyyy">
                    </div>

                    <!-- Tanggal Keluar -->
                    <div class="col-md-3">
                        <label for="tanggalKeluar" class="form-label text-muted small">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggalKeluar" placeholder="dd/mm/yyyy">
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary me-2">
                            <i class="bi bi-search"></i>
                        </button>
                        <button type="button" class="btn btn-secondary">
                            <i class="bi bi-printer"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <!-- Table Title -->
                <h5 class="card-title mb-3">Daftar RL 5.3 ICD 10</h5>

                <!-- Responsive Table -->
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
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">J45</td>
                                <td>Asthma</td>
                                <td class="text-center">15</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center fw-bold">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
