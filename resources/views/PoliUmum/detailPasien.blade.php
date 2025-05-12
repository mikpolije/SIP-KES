@extends('layouts.master')

@section('title', 'Detail Pasien')

@section('pageContent')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

    .judul-riwayat {
        font-family: 'Montserrat', sans-serif;
        color: #111754;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .judul-section {
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        color: #111754;
    }

    .close-btn {
        font-size: 24px;
        color: #111754;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close-btn:hover {
        color: #555;
    }

    .form-control {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        vertical-align: middle;
    }
</style>

<div class="container py-4">
    <div class="judul-riwayat mb-4">
        <h1>Detail Pasien</h1>
        <span class="close-btn" onclick="history.back()">&#10005;</span>
    </div>

    <div class="card p-4">
        <h4 class="judul-section">Identitas Pasien</h4>
        <div class="row g-3">
            <div class="col-md-3">
                <label>No. RM</label>
                <input type="text" class="form-control" value="RM000841" readonly>
            </div>
            <div class="col-md-3">
                <label>Nama</label>
                <input type="text" class="form-control" value="Oktavia" readonly>
            </div>
            <div class="col-md-3">
                <label>NIK</label>
                <input type="text" class="form-control" value="3509xxxxxxxxxxx" readonly>
            </div>
            <div class="col-md-3">
                <label>Tanggal Lahir</label>
                <input type="text" class="form-control" value="10/01/2003" readonly>
            </div>
            <div class="col-md-3">
                <label>Jenis Kelamin</label>
                <input type="text" class="form-control" value="Perempuan" readonly>
            </div>
            <div class="col-md-3">
                <label>Agama</label>
                <input type="text" class="form-control" value="Islam" readonly>
            </div>
            <div class="col-md-3">
                <label>No. Telepon</label>
                <input type="text" class="form-control" value="+628514453156" readonly>
            </div>
            <div class="col-md-6">
                <label>Alamat</label>
                <input type="text" class="form-control" value="Jl. Mastrip, Blok A, Jember" readonly>
            </div>
        </div>

        <h4 class="judul-section mt-5">Tabel Riwayat Kunjungan</h4>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Periksa</th>
                        <th>Diagnosis</th>
                        <th>Tindakan</th>
                        <th>Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>02-01-2025</td>
                        <td>Demam</td>
                        <td>99.21 Pemberian paracetamol</td>
                        <td>dr. Oktavia Putri</td>
                    </tr>
                    <tr>
                        <td>05-02-2025</td>
                        <td>Batuk pilek</td>
                        <td>93.94 Nebulisasi</td>
                        <td>dr. Oktavia Putri</td>
                    </tr>
                    <tr>
                        <td>13-03-2025</td>
                        <td>Sakit kepala</td>
                        <td>99.22 Pemberian analgesik</td>
                        <td>dr. Oktavia Putri</td>
                    </tr>
                    <tr>
                        <td>15-04-2025</td>
                        <td>Hipertensi ringan</td>
                        <td>89.03 Konsultasi dan resep obat</td>
                        <td>dr. Oktavia Putri</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
