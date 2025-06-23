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
            Surat Keterangan Sehat
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
                                <th>NOMOR SURAT</th>
                                <th>NAMA PASIEN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle text-center">
                            @foreach ($riwayat as $rw)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rw->tanggal_periksa_pasien)->format('d-m-Y') }}</td>
                                    <td>{{ $rw->pendaftaran->data_pasien->no_rm }}</td>
                                    <td>30/B/IIM/IV/2025</td>
                                    <td>{{ $rw->pendaftaran->data_pasien->nama_pasien }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-print"></i> Cetak
                                        </button>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $rw->id_pemeriksaan }}">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($riwayat as $rw)
        <div class="modal fade" id="detailModal{{ $rw->id_pemeriksaan }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $rw->id_pemeriksaan }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $rw->id_pemeriksaan }}">Surat Keterangan Sehat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- ISI MODAL -->
                        <form action="{{ route('surat.sehat.store') }}" method="POST">
                            @csrf
                            <div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Nomor</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="nomor_surat" value="" placeholder="silahkan diisi nomor surat">
                                        <input type="hidden" class="form-control" name="id_pemeriksaan" value="{{ $rw->id_pemeriksaan }}">
                                    </div>
                                </div>
                                <label class="fw-semibold">Yang bertanda tangan di bawah ini, dr. Trik Hujan Dokter KLINIK
                                    PRATAMA
                                    INSAN MEDIKA, menerangkan bahwa:</label>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Nama</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"
                                            value="{{ $rw->pendaftaran->data_pasien->nama_pasien }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"
                                            value="{{ $rw->pendaftaran->data_pasien->tanggal_lahir_pasien }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"
                                            value="{{ $rw->pendaftaran->data_pasien->jenis_kelamin == '1' ? 'Laki-laki' : 'Perempuan' }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Alamat</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control"
                                            value="{{ $rw->pendaftaran->data_pasien->alamat_pasien }}" readonly
                                            style="height: 50px;">
                                    </div>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-2">
                                    <label class="fw-semibold">Telah menjalani pemeriksaan kesehatan jasmani pada
                                        tanggal</label>
                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($rw->tanggal_periksa_pasien)->format('d-m-Y') }}"
                                        readonly style="width: 150px;">
                                    <label class="fw-semibold">dengan hasil: </label>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="3" style="resize: none; white-space: pre-wrap;" placeholder="silahkan diisi"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Surat ini dipergunakan untuk</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="" placeholder="silahkan diisi" style="height: 70px;">
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Keterangan:</label>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Berat badan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="{{ $rw->bb_pasien }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Tinggi badan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="{{ $rw->tb_pasien }} cm"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Golongan darah</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"
                                            value="{{ $rw->pendaftaran->data_pasien->gol_darah == 1
                                                ? 'A'
                                                : ($rw->pendaftaran->data_pasien->gol_darah == 2
                                                    ? 'B'
                                                    : ($rw->pendaftaran->data_pasien->gol_darah == 3
                                                        ? 'AB'
                                                        : ($rw->pendaftaran->data_pasien->gol_darah == 4
                                                            ? 'O'
                                                            : 'Tidak Diketahui'))) }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="fw-semibold">Tekanan darah</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="{{ $rw->sistole }}/{{ $rw->diastole }} mmHg" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 text-left ms-auto" style="width: fit-content;">
                                <p>Jember, {{ \Carbon\Carbon::now()->isoFormat('d MMMM Y') }}</p>

                                <p>Dokter yang memeriksa :</p>

                                <div
                                    style="width: 200px; height: 80px; border: 1px dashed #666; display: inline-block; margin: 10px 0;">
                                </div>

                                <p>{{ $rw->pendaftaran->data_dokter->nama }}</p>
                                <p>{{ $rw->pendaftaran->data_dokter->no_sip }}</p>
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
