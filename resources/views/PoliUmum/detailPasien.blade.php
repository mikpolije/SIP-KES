@extends('layouts.master')

@section('title', 'Detail Pasien')

@section('pageContent')
<div class="container py-4">
    <h1 class="judul-riwayat mb-4">Detail Pasien</h1>

    <div class="card p-4 shadow rounded">
        <h4>Identitas Pasien</h4>
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

        <h4 class="mt-5">Tabel Riwayat Kunjungan</h4>
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
