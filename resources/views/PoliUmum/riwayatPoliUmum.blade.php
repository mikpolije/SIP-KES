@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <!-- STYLE -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        .judul-riwayat {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .tabel-wrapper {
            background-color: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th,
        td {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            padding: 8px 12px;
            border: 0.3px solid #B9B9B9;
            white-space: nowrap;
            vertical-align: middle;
        }

        th {
            background-color: #F9FAFC;
            font-weight: 600;
        }

        td {
            background-color: white;
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
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
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
        }

        .pagination li.disabled a {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
        }

        .select-entries {
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            font-size: 14px;
        }
    </style>

    <div class="container-fluid py-4">
        <h1 class="judul-riwayat mb-4">Riwayat Pemeriksaan</h1>

        <!-- Tabel Riwayat -->
        <div class="tabel-wrapper">
            <table class="table table-bordered mb-0" id='myTable'>
                <thead>
                    <tr>
                        <th>NO. RM</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>TANGGAL PERIKSA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_pemeriksaan as $dp)
                        <tr>
                            <td>{{ $dp->pendaftaran->data_pasien->no_rm }}</td>
                            <td>{{ $dp->pendaftaran->data_pasien->nama_pasien }}</td>
                            <td>{{ $dp->pendaftaran->data_pasien->nik_pasien }}</td>
                            <td>{{ \Carbon\Carbon::parse($dp->tanggal_periksa_pasien)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('poliumum.detailRiwayat', $dp->id_pemeriksaan) }}"
                                    class="btn-detail">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data pemeriksaan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#searchPasien').select2({
                placeholder: 'Cari Data Pasien...',
                allowClear: true,
                ajax: {
                    url: '{{ route('poli-umum.search-pasien') }}',
                    dataType: 'json',
                    delay: 250,
                    data: params => ({
                        q: params.term
                    }),
                    processResults: data => {
                        return data.results.length ?
                            {
                                results: data.results
                            } :
                            {
                                results: [{
                                    id: '',
                                    text: 'Pasien tidak ditemukan',
                                    disabled: true
                                }]
                            };
                    },
                    cache: true
                }
            });

            $('#btnCariPasien').on('click', function(e) {
                e.preventDefault();
                const noRM = $('#searchPasien').val();
                if (noRM) {
                    window.location.href = `/poli-umum/detail/${noRM}`;
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: 'Silakan pilih data pasien terlebih dahulu.'
                    });
                }
            });

            $('#perPage').on('change', function() {
                const perPage = $(this).val();
                localStorage.setItem('perPage', perPage);
                const url = new URL(window.location.href);
                url.searchParams.set('per_page', perPage);
                window.location.href = url.toString();
            });

            $('#perPage').val(localStorage.getItem('perPage') || '10');
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection
