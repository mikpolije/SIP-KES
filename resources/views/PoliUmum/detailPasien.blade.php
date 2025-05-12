@extends('layouts.master')

@section('title', 'Detail Pasien')

@section('pageContent')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@800&family=Poppins:wght@400;600;700&display=swap');

.judul-riwayat {
    font-family: 'Montserrat', sans-serif;
    font-size: 3rem;
    font-weight: 800;
    color: #111754;
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.judul-section {
    font-family: 'Poppins', sans-serif;
    font-size: 1.875rem;
    font-weight: 700;
    color: #111754;
    margin-top: 30px;
    margin-bottom: 20px;
}

.close-btn {
    font-size: 2rem;
    color: #111754;
    cursor: pointer;
    background: none;
    border: none;
}

.close-btn:hover {
    opacity: 0.7;
    transform: scale(1.1);
}

.form-control {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    border-radius: 8px;
    height: 45px;
    font-family: 'Poppins', sans-serif;
}

.card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 25px;
    margin-bottom: 30px;
}

label {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.table-responsive {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e0e0e0;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead th {
    background-color: #F9FAFC;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    padding: 12px 16px;
    border: 1px solid #E0E0E0;
}

tbody td {
    background-color: #FFFFFF;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 400;
    text-align: left;
    padding: 12px 16px;
    border: 1px solid #E0E0E0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}
</style>

<div class="container py-4">
    <div class="judul-riwayat">
        <h1>Detail Pasien</h1>
        <button class="close-btn" onclick="history.back()">&#10005;</button>
    </div>

    <div class="card">
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

        <h4 class="judul-section">Tabel Riwayat Kunjungan</h4>
        <div class="table-responsive mt-3">
            <table>
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
