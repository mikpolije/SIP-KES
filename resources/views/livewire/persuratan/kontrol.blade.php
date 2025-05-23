<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="container py-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h1 class="title mb-4 h3 text-center">SURAT RENCANA KONTROL</h1>

                <div class="row mb-3">
                    <label for="nomor" class="col-sm-2 col-form-label">No.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tgl.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dokter" class="col-sm-2 col-form-label">Kepada Yth.</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="dokter">
                            <option selected>Nama Dokter</option>
                            <option value="1">dr. B, Sp. PD</option>
                            <option value="2">dr. C, Sp. An</option>
                        </select>
                    </div>
                </div>

                <p class="mt-4 mb-3">Mohon Pemeriksaan dan Penanganan Lebih Lanjut:</p>

                <div class="row mb-3">
                    <label for="nomorRM" class="col-sm-2 col-form-label">Nomor RM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomorRM" placeholder="Nomor RM">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="namaPasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaPasien" placeholder="Nama Pasien">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tglLahir" class="col-sm-2 col-form-label">Tgl. Lahir</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tglLahir" placeholder="DD/MM/YYYY">
                            <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa Akhir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="diagnosa" placeholder="Diagnosa Akhir">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rencanaKontrol" class="col-sm-2 col-form-label">Rencana Kontrol</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="rencanaKontrol" placeholder="DD/MM/YYYY">
                            <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <p class="mt-4">Demikian atas bantuannya diucapkan banyak terima kasih.</p>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <!-- Spacer -->
                    </div>
                    <div class="col-md-4 text-center">
                        <p>Mengetahui</p>
                        <div class="border rounded-3 mb-2" style="height: 100px;"></div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-primary px-4">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-outline-primary px-4">
                        <i class="bi bi-printer"></i> Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
