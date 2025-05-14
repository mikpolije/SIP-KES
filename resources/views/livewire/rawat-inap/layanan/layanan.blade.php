<?php

use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $msg = "lol";

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
    }
}; ?>

<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-end">
                <button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#layananModal">
                    Tambah
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>

    <div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="layananModalLabel">Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <label class="me-2">Tampilkan</label>
                                <select class="form-select form-select-sm" style="width: 70px;">
                                    <option selected>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                                <span class="ms-2">entri</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end">
                                <label class="me-2 align-self-center">Cari:</label>
                                <input type="search" class="form-control form-control-sm" style="width: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Tarif</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td>L001</td>
                                    <td>Jasa Perawat</td>
                                    <td>Rp 10.000,-</td>
                                    <td><button class="btn btn-primary btn-sm">Pilih</button></td>
                                </tr>
                                <tr>
                                    <td>L002</td>
                                    <td>Jasa Pasang Infus</td>
                                    <td>Rp 50.000,-</td>
                                    <td><button class="btn btn-primary btn-sm">Pilih</button></td>
                                </tr>
                                <tr class="table-light">
                                    <td>L003</td>
                                    <td>Bekam</td>
                                    <td>Rp 50.000,-</td>
                                    <td><button class="btn btn-primary btn-sm">Pilih</button></td>
                                </tr>
                                <tr>
                                    <td>L004</td>
                                    <td>Perawatan Luka Ringan</td>
                                    <td>Rp 30.000,-</td>
                                    <td><button class="btn btn-primary btn-sm">Pilih</button></td>
                                </tr>
                                <tr>
                                    <td>L010</td>
                                    <td>Cek Gula Darah</td>
                                    <td>Rp 10.000,-</td>
                                    <td><button class="btn btn-primary btn-sm">Pilih</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Menampilkan 1 sampai 10 dari x entri (misal)</p>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Selanjutnya</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
