@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        .judul-riwayat {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            text-align: left;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .tabel-wrapper {
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: auto;
        }

        th,
        td {
            padding: 8px 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border: 0.3px solid #B9B9B9;
            white-space: nowrap;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #F9FAFC;
            font-weight: 600;
        }

        td {
            background-color: white;
            font-weight: 400;
        }

        .btn-detail {
            font-size: 13px;
            padding: 4px 10px;
            background-color: #4DBFFF;
            border: none;
            border-radius: 4px;
            color: white;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            font-family: 'Poppins', sans-serif;
        }

        .pagination-info {
            font-size: 14px;
            color: #6c757d;
            display: flex;
            align-items: center;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            display: block;
            padding: 5px 12px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            color: #007bff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .pagination li a:hover {
            background-color: #e9ecef;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination li.disabled a {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .select-entries {
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
    </style>

    <div class="container-fluid py-4">
        <h1 class="judul-riwayat mb-4">Riwayat Pemeriksaan</h1>
        <div class="tabel-wrapper">
            <table class="table table-bordered mb-0" id="myTable">
                <thead>
                    <tr>
                        <th>NO. RM</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>TANGGAL PERIKSA</th>
                        <th>STATUS PERIKSA</th>
                        <th>AKSI</th>
                </thead>
                </tr>
                <tbody>
                    @foreach ($data_pemeriksaan as $dp)
                        <tr>
                            <td>{{ $dp->pendaftaran->data_pasien->no_rm }}</td>
                            <td>{{ $dp->pendaftaran->data_pasien->nama_pasien }}</td>
                            <td>{{ $dp->pendaftaran->data_pasien->nik_pasien }}</td>
                            <td>{{ \Carbon\Carbon::parse($dp->tanggal_periksa_pasien)->format('d-m-Y') }}</td>
                            <td>{{ $dp->pendaftaran->status }}</td>
                            <td>
                                <a href="{{ route('poliumum.pemeriksaanAkhir.step3', $dp->id_pemeriksaan) }}"
                                    class="btn-detail">Periksa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 untuk pencarian pasien
            $('#searchPasien').select2({
                placeholder: 'Cari Data Pasien...',
                allowClear: true,
                ajax: {
                    url: '{{ route('poli-umum.search-pasien') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                }
            });

            // Fungsi pencarian pasien
            $('#btnCariPasien').on('click', function(e) {
                e.preventDefault();
                const noRM = $('#searchPasien').val();
                if (noRM) {
                    window.location.href = `/poli-umum/detail/${noRM}`;
                } else {
                    alert('Silakan pilih data pasien terlebih dahulu.');
                }
            });

            // Fungsi untuk mengubah jumlah entri per halaman
            $('#perPage').on('change', function() {
                const perPage = $(this).val();
                // Simpan preferensi ke cookie atau local storage
                localStorage.setItem('perPage', perPage);

                // Reload halaman dengan parameter per_page
                const url = new URL(window.location.href);
                url.searchParams.set('per_page', perPage);
                window.location.href = url.toString();
            });

            // Set nilai default dari cookie/local storage
            const savedPerPage = localStorage.getItem('perPage') || '10';
            $('#perPage').val(savedPerPage);
        });
    </script>
@endsection
