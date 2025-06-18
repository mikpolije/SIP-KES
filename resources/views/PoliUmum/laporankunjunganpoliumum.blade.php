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
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
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

        .form-label {
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin-bottom: 12px;
            background-color: white;
        }

        .filter-header {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .table-title {
            text-align: center;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        .table-subtitle {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f0f4f8;
        }

        #filterText {
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }
    </style>

    <div class="container">
        <h1 class="title">LAPORAN KUNJUNGAN</h1>

        <div class="row">
            <div class="col-half">
                <div class="card">
                    <!-- Tombol navigasi -->
                    <div class="filter-header">
                        <a href="{{ route('poliumum.laporan') }}">
                            <button
                                class="btn {{ request()->routeIs('poliumum.laporan') ? 'btn-blue' : 'btn-gray' }}">
                                10 Besar Penyakit
                            </button>
                        </a>
                        <a href="{{ route('poliumum.laporan.kunjungan') }}">
                            <button
                                class="btn {{ request()->routeIs('poliumum.laporan.kunjungan') ? 'btn-blue' : 'btn-gray' }}">
                                Laporan Kunjungan
                            </button>
                        </a>
                    </div>

                    <!-- Form Filter -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="date" class="form-control" id="startDate" placeholder="DD/MM/YYYY">
                            <label class="form-label" style="margin: auto 0;">s/d</label>
                            <input type="date" class="form-control" id="endDate" placeholder="DD/MM/YYYY">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Dokter">Dokter</label>
                        <select class="form-select" id="Dokter" name="dokter">
                            <option value="dr. Jenie">dr. Jenie</option>
                            <option value="dr. Jisoo">dr. Jisoo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="CaraBayar">Cara Bayar</label>
                        <select class="form-select" id="CaraBayar" name="carabayar">
                            <option value="Umum">Umum</option>
                            <option value="BPJS">BPJS</option>
                            <option value="Asuransi">Asuransi</option>
                        </select>
                    </div>

                    <!-- Tombol -->
                    <div class="btn-group mt-4">
                        <button type="button" class="btn btn-blue" id="btnTampilkan">Tampilkan</button>
                        <button type="button" class="btn btn-yellow">Download</button>
                    </div>
                </div>
            </div>

            <!-- Kolom Hasil Tabel -->
            <div class="col-half">
                <div class="card" id="tabelData" style="display: none;">
                    <p id="filterText"></p>
                    <h3 class="table-title">LAPORAN KUNJUNGAN</h3>
                    <p class="table-subtitle" id="periodeText"></p>

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NO RM</th>
                                <th>NAMA</th>
                                <th>NIK</th>
                                <th>TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>RM000754</td><td>Mudafiatun</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>2</td><td>RM000841</td><td>Vivi</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>3</td><td>RM000645</td><td>Na Jaemin</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>4</td><td>RM000312</td><td>Oktavia</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>5</td><td>RM00410</td><td>Jennie</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>6</td><td>RM000453</td><td>Laili</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>7</td><td>RM000458</td><td>Shofi</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>8</td><td>RM000777</td><td>Jaehyun</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>9</td><td>RM000934</td><td>Asahi</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                            <tr><td>10</td><td>RM000422</td><td>Erwiyan</td><td>3509XXXXXXXXXXXX</td><td>25-05-2025</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.getElementById("btnTampilkan").addEventListener("click", function () {
            const start = document.getElementById("startDate").value;
            const end = document.getElementById("endDate").value;

            const formatter = new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });

            let tglStart = start ? formatter.format(new Date(start)) : '-';
            let tglEnd = end ? formatter.format(new Date(end)) : '-';

            document.getElementById("filterText").textContent = `Filter: ${tglStart} s/d ${tglEnd}`;
            document.getElementById("periodeText").textContent = `${tglStart} s/d ${tglEnd}`;

            document.getElementById("tabelData").style.display = "block";
        });
    </script>
@endsection
