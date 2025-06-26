@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan Kunjungan Poli Umum')

@section('pageContent')
    <!-- ✅ Tambahkan CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

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

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin-bottom: 12px;
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
    </style>

    <div class="container">
        <h1 class="title">LAPORAN KUNJUNGAN</h1>

        <div class="row">
            <!-- Filter -->
            <div class="col-half">
                <div class="card">
                    <div class="btn-group">
                        <a href="{{ route('poliumum.laporan') }}">
                            <button
                                class="btn {{ request()->routeIs('poliumum.laporan') ? 'btn btn-primary' : 'btn btn-secondary' }}">10
                                Besar Penyakit</button>
                        </a>
                        <a href="{{ route('poliumum.laporan.kunjungan') }}">
                            <button
                                class="btn {{ request()->routeIs('poliumum.laporan.kunjungan') ? 'btn btn-primary' : 'btn btn-secondary' }}">Laporan
                                Kunjungan</button>
                        </a>
                    </div>

                    <form action="{{ route('poliumum.laporan.kunjungan') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="date" class="form-control" name="startDate" value="{{ $startDate }}">
                                <label style="margin: auto 0;">s/d</label>
                                <input type="date" class="form-control" name="endDate" value="{{ $endDate }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dokter</label>
                            <select class="form-select" name="id_dokter">
                                <option value="">-- Semua Dokter --</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->id }}" {{ $id_dokter == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cara Bayar</label>
                            <select class="form-select" name="carabayar">
                                <option value="">-- Semua --</option>
                                <option value="1" {{ $carabayar == '1' ? 'selected' : '' }}>Umum</option>
                                <option value="2" {{ $carabayar == '2' ? 'selected' : '' }}>BPJS</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                    </form>
                </div>
            </div>

            <!-- Tabel -->
            <div class="col-half">
                <div class="card">
                    <h3 class="table-title">LAPORAN KUNJUNGAN</h3>
                    <p class="table-subtitle">Data kunjungan berdasarkan filter</p>

                    <div style="overflow-x: auto;">
                        <table id="tableKunjungan" class="display nowrap" style="width: 100%;">
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
    </div>

    <!-- ✅ Tambahkan JS DataTables & Button Export -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableKunjungan').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-success',
                        title: 'Laporan Kunjungan'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        className: 'btn btn-danger',
                        title: 'Laporan Kunjungan',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        extend: 'print',
                        text: 'Cetak',
                        className: 'btn btn-secondary',
                        title: 'Laporan Kunjungan'
                    }
                ],
                paging: true,
                pageLength: 10,
                responsive: true,
                scrollX: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Data tidak tersedia",
                    paginate: {
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>
@endsection
