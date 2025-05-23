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

    <div class="container py-4">
        <h1 class="text-center judul-halaman" style="font-size: 3rem; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
            Rekam Medis
        </h1>

        <div class="d-flex justify-content-end my-4">
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Data Pasien">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
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
                                    <td>{{ $item->data_pasien->agama ?? '-' }}</td>
                                    <td>{{ $item->data_pasien->gol_darah ?? '-' }}</td>
                                    <td>{{ $item->data_pasien->jenis_kelamin ?? '-' }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-print"></i> Cetak
                                        </button>
                                        <button class="btn btn-info btn-sm">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- Dummy data --}}
                            {{-- Tambahkan data dummy lainnya jika mau --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
