@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan Kunjungan Poli Umum')

@section('pageContent')
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2563eb;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .col-half {
            flex: 1;
            min-width: 300px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-blue {
            background: #2563eb;
            color: white;
        }

        .btn-blue:hover {
            background: #1d4ed8;
        }

        .btn-gray {
            background: #e5e7eb;
            color: #4b5563;
        }

        .btn-gray:hover {
            background: #d1d5db;
        }

        .btn-yellow {
            background: #f59e0b;
            color: white;
        }

        .btn-yellow:hover {
            background: #d97706;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #e5e7eb;
        }

        th {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #374151;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f0f4f8;
        }

        select,
        label {
            display: block;
            margin-bottom: 12px;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            background-color: white;
        }

        .filter-header {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .table-title {
            text-align: center;
            margin-bottom: 5px;
            font-weight: 600;
            color: #1e3a8a;
        }

        .table-subtitle {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 15px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
    <div class="container">
        <h1 class="title">LAPORAN KUNJUNGAN</h1>

        <div class="row">
            <div class="col-half">
                <div class="card">
                    <div class="filter-header">
                        <button class="btn btn-gray">10 Besar Penyakit</button>
                        <button class="btn btn-blue">Laporan Kunjungan</button>
                    </div>
                    <div class="row">
                        <!-- Form Section -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="Tanggal">Tanggal</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY">
                                    <label class="mx-2 mb-0">s/d</label>
                                    <input type="date" class="form-control" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="Dokter">Dokter</label>
                            <select class="form-select required" id="Dokter" name="dokter">
                                <option value="dr. Jenie">dr. Jenie</option>
                                <option value="dr. Jisoo">dr. Jisoo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="Cara Bayar">Cara Bayar</label>
                            <select class="form-select required" id="Cara Bayar"name="carabayar">
                                <option value="Umum">Umum</option>
                                <option value="BPJS">BPJS</option>
                                <option value="Asuransi">Asuransi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-blue">Tampilkan</button>
                            <button type="button" class="btn btn-yellow">Download</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Table Panel -->
            <div class="col-half">
                <div class="card">
                    <h3 class="table-title">10 BESAR PENYAKIT</h3>
        <thead>
                            <tr>
                                <th>NO </th>
                    <th>NOMOR RM</th>
                    <th>NAMA</th>
                    <th>NIK</th>
		    <h>TANGGAL PERIKSA</th>
                            </tr>
                        </thead>
<script>
  document.getElementById("btnTampilkan").addEventListener("click", function () {
    document.getElementById("tabelData").style.display = "block";
  });
</script>
            @endsection
