<!-- resources/views/PoliUmum/surat-keterangan-sehat.blade.php -->

@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    {{-- Include Montserrat font dari Google Fonts --}}
    @push('styles')
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    @endpush

    <style>
        .judul-halaman {
            font-family: 'Montserrat', sans-serif;
            color: #111754;
            font-weight: 700;
        }

        .table thead {
            background-color: #B9B9B9;
        }

        .table thead th {
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
        }
    </style>
    <style>
        .pagination {
            justify-content: flex-end;
            margin: 1rem 0;
        }

        .pagination li {
            margin: 0 2px;
        }

        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }

        .page-link {
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>

    <div class="container py-4">
        <h1 class="text-center judul-halaman" style="font-size: 3rem; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
            Rekam Medis
        </h1>

        <div class="d-flex justify-content-end my-4">
            <form method="GET" action="{{ route('riwayat-medis.index') }}" class="d-flex justify-content-end my-4">
                <div class="input-group" style="width: 300px;">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari pasien...">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>TANGGAL PERIKSA</th>
                                <th>NO. RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>NO TELP</th>
                                <th>AGAMA</th>
                                <th>GOLONGAN DARAH</th>
                                <th>JENIS KELAMIN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle text-center">
                            @foreach ($data as $item)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->no_rm }}</td>
                                    <td>{{ $item->data_pasien->nama_pasien ?? '-' }}</td>
                                    <td>
                                        {{ $item->data_pasien && $item->data_pasien->tanggal_lahir_pasien
                                            ? \Carbon\Carbon::parse($item->data_pasien->tanggal_lahir_pasien)->format('d-m-Y')
                                            : '-' }}
                                    </td>
                                    <td>{{ $item->data_pasien->no_telepon_pasien ?? '-' }}</td>
                                    @php
                                        $agamaList = [
                                            1 => 'Islam',
                                            2 => 'Kristen (Protestan)',
                                            3 => 'Katolik',
                                            4 => 'Hindu',
                                            5 => 'Budha',
                                            6 => 'Konghucu',
                                            7 => 'Penghayat',
                                            8 => 'Lain-lain'
                                        ];
                                        
                                    @endphp

                                    <td>
                                        {{ $agamaList[$item->data_pasien->agama] ?? '-' }}
                                    </td>
                                    @php
                                        $jenis_golongandarah = [
                                            1 => 'A',
                                            2 => 'B',
                                            3 => 'AB',
                                            4 => 'O'
                                        ]
                                    @endphp
                                    <td>{{ $jenis_golongandarah[$item->data_pasien->gol_darah] ?? '-' }}</td>
                                    @php 
                                        $jenis_kelamin = [
                                            1 => 'Laki-Laki',
                                            2 => 'Perempuan',
                                            3 => 'Tidak dapat ditentukan',
                                            4 => 'Tidak mengisi'    
                                        ]
                                    @endphp
                                    <td>{{ $jenis_kelamin[(string) $item->data_pasien->jenis_kelamin] ?? '-' }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('riwayat-medis.cetak', ['id' => $item->id_pendaftaran]) }}" target="_blank" class="btn btn-warning btn-sm">
                                            <i class="fas fa-print"></i> Cetak
                                        </a>
                                        <a href="{{ route('riwayat-medis.show', $item->no_rm) }}" class="btn btn-info btn-sm">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- Dummy data --}}
                            {{-- Tambahkan data dummy lainnya jika mau --}}
                        </tbody>
                    </table>
                     <div class="mt-3 d-flex justify-content-end px-3">
                        {{ $data->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
