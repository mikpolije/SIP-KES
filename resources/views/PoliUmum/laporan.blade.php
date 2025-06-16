@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan 10 Besar Penyakit')

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
        <h1 class="title">LAPORAN 10 BESAR PENYAKIT</h1>

        <div class="row">
            <!-- Filter Panel -->
            <div class="col-half">
                <div class="card">
                    <form method="GET" action="{{ route('poliumum.laporan') }}">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan">
                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                                <option value="{{ $month }}" {{ $bulan == $month ? 'selected' : '' }}>
                                    {{ $month }}</option>
                            @endforeach
                        </select>

                        <label for="cara_bayar">Cara Bayar</label>
                        <select name="cara_bayar" id="cara_bayar">
                            <option value="Umum" {{ $caraBayar == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="BPJS" {{ $caraBayar == 'BPJS' ? 'selected' : '' }}>BPJS</option>
                            <option value="Asuransi" {{ $caraBayar == 'Asuransi' ? 'selected' : '' }}>Asuransi</option>
                        </select>

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
                    <p class="table-subtitle">01 {{ $bulan }} 2024 s/d {{ date('t', strtotime($bulan . ' 2024')) }}
                        {{ $bulan }} 2024</p>

                    <table>
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="15%">KODE ICD-X</th>
                                <th>NAMA PENYAKIT</th>
                                <th width="10%">JUMLAH</th>
                                <th width="10%">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row[0] }}</td>
                                    <td>{{ $row[1] }}</td>
                                    <td class="text-right">{{ number_format($row[2], 0, ',', '.') }}</td>
                                    <td class="text-right">{{ $row[3] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.btn-yellow').addEventListener('click', function() {
            // Get form values
            const form = document.querySelector('form');
            const formData = new FormData(form);

            // Build query string
            const params = new URLSearchParams();
            params.append('bulan', formData.get('bulan'));
            params.append('cara_bayar', formData.get('cara_bayar'));

            // Redirect to download URL
            window.location.href = {{ route('poliumum.laporan.download') }} ? $ {
                params.toString()
            };
        });
    </script>
@endsection
