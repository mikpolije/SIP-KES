@extends('layouts.master')

@section('title', 'Detail Pasien KIA')

@section('pageContent')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@800&family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #111754;
            margin-bottom: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 1px solid #d1d5db;
            border-radius: 12px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            height: 45px;
            font-family: 'Poppins', sans-serif;
            padding: 10px 15px;
            font-size: 14px;
        }

        .table-responsive {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #F9FAFC;
        }

        thead th {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            padding: 12px 16px;
            border: 1px solid #E0E0E0;
        }

        tbody td {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 400;
            text-align: left;
            padding: 12px 16px;
            border: 1px solid #E0E0E0;
            background-color: #ffffff;
        }

        .close-btn {
            font-size: 24px;
            color: #111754;
            background: none;
            border: none;
            cursor: pointer;
        }

        .close-btn:hover {
            opacity: 0.7;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>

    <div class="container py-4">
        <div class="header-row">
            <h1>Detail Pasien</h1>
            <button class="close-btn" onclick="history.back()">&#10005;</button>
        </div>

        <div class="card">
            <h2 class="section-title">Identitas Pasien</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">No. RM</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->no_rm ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->nama_pasien ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->nik_pasien ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->tanggal_lahir_pasien ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->jenis_kelamin ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Agama</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->agama ?? '' }}" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->no_telepon_pasien ?? '' }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" value="{{ $data_pasien->alamat_pasien ?? '' }}" readonly>
                </div>
            </div>

            <h2 class="section-title mt-5">Tabel Riwayat Kunjungan</h2>
            <div class="table-responsive">
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