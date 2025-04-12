@extends('layout.sidebar')

@section('content')
    <div class="card-body wizard-content">
        <h1 class="card-title"></h1>
        <h1 class="title">Pembayaran</h1>

        <!-- Progress Steps -->
        <div class="progress-container">
            <div class="progress-step" data-title="Pendaftaran">
                <div class="step-icon"><i class="fas fa-clipboard-list"></i></div>
            </div>
            <div class="progress-step" data-title="Layanan">
                <div class="step-icon"><i class="fas fa-concierge-bell"></i></div>
            </div>
            <div class="progress-step" data-title="Pemeriksaan">
                <div class="step-icon"><i class="fas fa-stethoscope"></i></div>
            </div>
            <div class="progress-step" data-title="Farmasi">
                <div class="step-icon"><i class="fas fa-pills"></i></div>
            </div>
            <div class="progress-step active" data-title="Pembayaran">
                <div class="step-icon"><i class="fas fa-credit-card"></i></div>
            </div>
        </div>

        <!-- Search Pasien -->
        <div class="d-flex justify-content-end mb-3">
            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Data Pasien"
                    style="border-radius: 10px 0 0 10px; border: 1px solid #ccc; height: 36px; font-size: 14px;" />
                <button class="btn btn-light px-2" type="button"
                    style="border: 1px solid #ccc; border-left: none; border-radius: 0 10px 10px 0; height: 36px;">
                    <i class="fas fa-search" style="font-size: 14px;"></i>
                </button>
            </div>
        </div>

        <!-- FORM DATA PEMBAYARAN -->
        <link rel="stylesheet" href="pembayaran.css">

        <div class="card-pembayaran">
            <h4 class="judul">Data Pembayaran</h4>
            <div class="row">
                <div class="col">
                    <div class="field-row">
                        <div class="label">No Nota</div>
                        <div class="colon">:</div>
                        <div class="value"></div>
                    </div>
                    <div class="field-row">
                        <div class="label">Tanggal Nota</div>
                        <div class="colon">:</div>
                        <div class="value"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="field-row">
                        <div class="label">No Rekam Medis</div>
                        <div class="colon">:</div>
                        <div class="value"></div>
                    </div>
                    <div class="field-row">
                        <div class="label">Nama Pasien</div>
                        <div class="colon">:</div>
                        <div class="value"></div>
                    </div>
                    <div class="field-row">
                        <div class="label">No Telp</div>
                        <div class="colon">:</div>
                        <div class="value"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RINCIAN & SIDEBAR -->
        <div class="row">
            <!-- KIRI -->
            <div class="col-md-8">
                <div class="card p-4">
                    <h5>Rincian Layanan</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jumlah</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Rincian Obat</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jumlah</th>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Rincian Laboratorium</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis Laboratorium</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Rincian Radiologi</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis Radiologi</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Rincian Tambahan</h5>
                    <div class="d-flex gap-2">
                        <input type="number" class="form-control" placeholder="Jumlah">
                        <input type="text" class="form-control" placeholder="Nama Tambahan">
                        <input type="text" class="form-control" placeholder="Harga">
                        <button type="button" class="btn btn-tambah d-flex align-items-center px-3">
                            Tambah&nbsp;<i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th>Jumlah</th>
                                <th>Nama Tambahan</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Keterangan</h5>
                    <textarea class="form-control" rows="3" placeholder="Tambahkan keterangan..."></textarea>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-4">
                <div class="card p-3 mb-3">
                    <h5>Rincian Pembayaran</h5>
                    <div class="mb-3">
                        <select class="form-select required" id="paymentMethod" name="paymentMethod">
                            <option value="">Pilih Metode</option>
                            <option value="Cash">Tunai</option>
                            <option value="Credit">Kartu Kredit</option>
                            <option value="Debit">Kartu Debit</option>
                            <option value="BPJS">BPJS</option>
                            <option value="Insurance">Asuransi</option>
                        </select>
                    </div>
                </div>

                <div class="rincian-tagihan card-rincian">
                    <h6 class="title">Rincian Tagihan</h6>
                    <label>Subtotal: <input type="text" id="subtotal" /></label>
                    <label>Diskon (%): <input type="number" id="diskon" /></label>
                    <label>Pajak (%): <input type="number" id="pajak" /></label>
                    <label>Total Tagihan: <input type="text" id="totalTagihan" readonly /></label>
                    <label>Total Bayar: <input type="number" id="totalBayar" /></label>
                    <label>Kembalian: <input type="text" id="kembalian" readonly /></label>
                </div>
            </div>
        </div>

        <!-- Tombol Bawah -->
        <div class="d-flex justify-content-between mt-3">
            <button class="btn btn-warning">Cetak</button>
            <div>
                <button class="btn btn-secondary">Sebelumnya</button>
                <button class="btn btn-primary">Proses Pembayaran</button>
            </div>
        </div>
    </div>
@endsection
