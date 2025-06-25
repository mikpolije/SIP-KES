@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan Kunjungan Poli Umum')

@section('pageContent')
    <!-- ✅ Tambah DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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

        th,
        td {
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
                    <div class="filter-header">
                        <a href="{{ route('poliumum.laporan') }}">
                            <button class="btn {{ request()->routeIs('poliumum.laporan') ? 'btn-blue' : 'btn-gray' }}">
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

                    <form action="{{ route('poliumum.laporan.kunjungan') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="date" class="form-control" id="startDate" name="startDate"
                                    value="{{ $startDate }}">
                                <label class="form-label" style="margin: auto 0;">s/d</label>
                                <input type="date" class="form-control" id="endDate" name="endDate"
                                    value="{{ $endDate }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Dokter">Dokter</label>
                            <select class="form-select" id="Dokter" name="id_dokter">
                                <option value="">-- Semua Dokter --</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->id }}" {{ $id_dokter == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="CaraBayar">Cara Bayar</label>
                            <select class="form-select" id="CaraBayar" name="carabayar">
                                <option value="">-- Semua --</option>
                                <option value="1" {{ $carabayar == '1' ? 'selected' : '' }}>Umum</option>
                                <option value="2" {{ $carabayar == '2' ? 'selected' : '' }}>BPJS</option>
                            </select>
                        </div>

                        <div class="btn-group mt-4">
                            <button type="submit" class="btn btn-blue">Tampilkan</button>
                            <button onclick="exportKunjunganExcel()" type="button" class="btn btn-yellow">Download</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-half">
                <div class="card" id="tabelData">
                    <p id="filterText"></p>
                    <h3 class="table-title">LAPORAN KUNJUNGAN</h3>
                    <p class="table-subtitle" id="periodeText"></p>

                    <table id="tableKunjungan">
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
                            @foreach ($kunjungan as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->pendaftaran->data_pasien->no_rm }}</td>
                                    <td>{{ $k->pendaftaran->data_pasien->nama_pasien }}</td>
                                    <td>{{ $k->pendaftaran->data_pasien->nik_pasien }}</td>
                                    <td>{{ $k->pendaftaran->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ XLSX Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- ✅ jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- ✅ Export Excel + Inisialisasi DataTables -->
    <script>
        function exportKunjunganExcel() {
            var table = document.getElementById("tableKunjungan");
            var wb = XLSX.utils.table_to_book(table, {
                sheet: "Kunjungan"
            });
            XLSX.writeFile(wb, 'Laporan_Kunjungan.xlsx');
        }

        $(document).ready(function() {
            $('#tableKunjungan').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                language: {
                    search: "Cari:",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Tidak ada data ditemukan",
                    infoEmpty: "Tidak ada data tersedia"
                }
            });
        });
    </script>
@endsection
