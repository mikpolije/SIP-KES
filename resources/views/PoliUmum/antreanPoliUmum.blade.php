@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        .judul-antrean {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            text-align: left;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .tabel-wrapper {
            overflow-x: auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 80px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: auto;
        }

        th,
        td {
            padding: 1px 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
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

        td button {
            padding: 4px 10px;
            font-size: 12px;
        }
    </style>

    <div class="container py-4">
        <h1 class="judul-antrean mb-4">Antrean Poli Umum</h1>

        {{-- Search Bar --}}
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" class="form-control w-25 me-2" placeholder="Data Pasien">
            <button class="btn btn-primary"><i class="ti ti-search"></i></button>
        </div>

        {{-- Table --}}
        <div class="tabel-wrapper">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>NO ANTRIAN</th>
                        <th>NOMOR RM</th>
                        <th>NAMA</th>
                        <th>TANGGAL PENDAFTARAN</th>
                        <th>UNIT LAYANAN</th>
                        <th>DOKTER</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pasien as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->data_pasien->no_rm }}</td>
                            <td>{{ $d->data_pasien->nama_pasien }}</td>
                            <td>{{ $d->created_at->format('d-m-Y') }}</td>
                            <td>{{ $d->poli->nama_poli }}</td>
                            <td>{{ $d->dokter->nama }}</td>
                            <td>{{ $d->status }}</td>
                            <td>
                                <a href="{{ route('poliumum.pemeriksaanAwal', $d->id_pendaftaran) }}"
                                    class="btn btn-sm btn-primary">Pilih</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
