<!-- resources/views/surat-keterangan-sakit.blade.php -->

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
        Surat Keterangan Sakit
    </h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
                                <button class="btn btn-info btn-sm">
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
          <h5 class="modal-title" id="detailModalLabel">Surat Keterangan Sakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- ISI MODAL -->
          <div>
            <div class="mb-3">
              <label>Nomor</label>
              <input type="text" class="form-control" value="001/MS/I/2025" readonly>
            </div>
            <div class="mb-3">
              <label>Nama</label>
              <input type="text" class="form-control" value="Rina Sofia" readonly>
            </div>
            <div class="mb-3">
              <label>Tanggal Lahir</label>
              <input type="text" class="form-control" value="26 Oktober 2003" readonly>
            </div>
            <div class="mb-3">
              <label>Jenis Kelamin</label>
              <input type="text" class="form-control" value="Perempuan" readonly>
            </div>
            <div class="mb-3">
              <label>Alamat</label>
              <textarea class="form-control" readonly>Perumahan Taman Gading Blok 99</textarea>
            </div>
            <div class="mb-3">
              <label>Perlu istirahat selama</label>
              <input type="text" class="form-control" value="4 hari (10/02/2025 s/d 13/02/2025)" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <span>Jember, 1 Januari 2025<br>Dokter yang memeriksa: <br><br>(Nama Dokter)<br>SIP.</span>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
