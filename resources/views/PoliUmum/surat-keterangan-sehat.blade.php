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
                        {{-- Dummy data --}}
                        <tr>
                            <td>1</td>
                            <td>17-04-2025</td>
                            <td>RM000123</td>
                            <td>30/B/IIM/IV/2025</td>
                            <td>Laili Fitriana</td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>17-04-2025</td>
                            <td>RM000124</td>
                            <td>31/B/IIM/IV/2025</td>
                            <td>Dewitasari Putri</td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        {{-- Tambahkan data dummy lainnya jika mau --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Surat Keterangan Sehat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- ISI MODAL -->
          <div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Nomor</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="001/MS/I/2025" readonly>
                </div>
            </div>
            <label class="fw-semibold">Yang bertanda tangan di bawah ini, dr. Trik Hujan Dokter KLINIK PRATAMA INSAN MEDIKA, menerangkan bahwa:</label>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Nama</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="Rina Sofia" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Tanggal Lahir</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="26 Oktober 2003" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Jenis Kelamin</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="Perempuan" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Alamat</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="Perumahan Taman Gading Blok 99" readonly>
                </div>
            </div>
            <div class="mb-3 d-flex align-items-center gap-2">
                <label class="fw-semibold">Telah menjalani pemeriksaan kesehatan jasmani pada tanggal</label>
                <input type="text" class="form-control" value="10/02/2025" readonly style="width: 150px;">
                <label class="fw-semibold">dengan hasil: </label>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <textarea class="form-control" rows="3" readonly style="resize: none;">{{ $data->keterangan }}</textarea>
            </div>
            <div class="mb-3">
                <label class="fw-semibold">Surat ini dipergunakan untuk</label>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <input type="text" class="form-control" value="Keperluan administrasi kuliah" readonly style="width: 250px;">
            </div>
            <div class="mb-3">
                <label class="fw-semibold">Keterangan:</label>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Berat badan</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="52 kg" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Tinggi badan</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="160 cm" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Golongan darah</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="A" readonly>
                </div>
            </div>
            <div class="row mb-2 align-items-center">
                <div class="col-md-2">
                  <label class="fw-semibold">Tekanan darah</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="110/70 mmHg" readonly>
                </div>
            </div>
        </div>
        <div class="mb-4 text-left ms-auto" style="width: fit-content;">
            <p>Jember, 1 Januari 2025</p>

            <p>Dokter yang memeriksa :</p>

            <div style="width: 200px; height: 80px; border: 1px dashed #666; display: inline-block; margin: 10px 0;"></div>

            <p>(Nama Dokter)</p>
            <p>SIP.</p>
          </div>
      </div>
    </div>
  </div>

<style>
    .modal-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 3rem;
        font-weight: 800;
        text-align: left;
        color: #111754;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }
</style>
@endsection
