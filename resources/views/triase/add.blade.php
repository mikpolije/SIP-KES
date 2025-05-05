@extends('layouts.master')

@section('title', $data['title'])

@section('css')
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
  <style>
    .hidden {
        display: none;
    }
  </style>
@endsection

@section('pageContent')
    @if (session()->has('error'))
        <div class="toast toast-onload align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
            <h5 class="text-white fs-3 mb-1">{{ session('error') }}</h5>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast"
            aria-label="Close"></button>
        </div>
        </div>
    @endif
    @include('triase.modal.search-pasien')
    @include('triase.modal.adl')
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Triase</div>
                            <div class="card-subtitle">Triase / Tambah</div>
                        </div>
                        <div class="mb-3 mb-sm-0">
                            <div class="form-group">
                                <button type="button" id="btnCariPasien" class="btn btn-primary hidden" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                    Cari Pasien
                                </button>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="step-1" class="step-1 row" data-step="1">
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Informasi Pasien</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Nama Pasien:</label>
                                                <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" value="{{ old('nama_pasien') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Usia Pasien:</label>
                                                <input type="number" class="form-control" placeholder="Usia Pasien" name="usia_pasien" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">No. Jamkes:</label>
                                                <input type="text" class="form-control" placeholder="No. Jamkes" name="no_jamkes" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Nama Penanggung Jawab:</label>
                                                <input type="text" class="form-control" placeholder="Nama Penanggung Jawab" name="penanggungjawab" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Informasi Kondisi Pasien</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">*Tanggal Masuk:</label>
                                                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Sarana Transportasi Kedatangan:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ambulans</option>
                                                    <option value="">Brankar</option>
                                                    <option value="">Kursi Roda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">*Jam Masuk:</label>
                                                <input type="time" class="form-control" placeholder="Jam Masuk" name="tarif" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Pasien Tiba:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Emergency</option>
                                                    <option value="">Brankar</option>
                                                    <option value="">Kursi Roda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="form-label">Triase</label>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <div class="form-check form-check-inline ml-3">
                                                <input type="radio" name="triase" id="" class="form-check-input">
                                                <label for="">Merah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id="" class="form-check-input">
                                                <label for="">Kuning</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id="" class="form-check-input">
                                                <label for="">Hijau</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id="" class="form-check-input">
                                                <label for="">Hitam</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Riwayat Alergi:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Udara</option>
                                                    <option value="">Obat</option>
                                                    <option value="">Makanan</option>
                                                    <option value="">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Keluhan:</label>
                                                <textarea name="" id="" cols="" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">KG</span>
                                                <label for="">Berat Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Tinggi Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Lingkar Perut:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="IMT" name="nama" value="{{ old('nama') }}">
                                                <label for="">IMT:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nafas" name="nama" value="{{ old('nama') }}">
                                                <label for="">Nafas:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Sistol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Diastol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">C</span>
                                                <label for="">Suhu:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nadi" name="nama" value="{{ old('nama') }}">
                                                <label for="">Nadi:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kepala:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">THT:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Leher:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Thorax:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Abdomen:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Extemitas:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Genetalia:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">ECG:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Ronsen:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Terapi:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kie:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Pemeriksaan Penunjang:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                <div class="mb-3 mb-sm-0">
                                                    <div class="card-subtitle">Pernafasan</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Jalur Nafas:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Bebas</option>
                                                    <option value="">Tidak Bebas</option>
                                                    <option value="">Total</option>
                                                    <option value="">Sebagian</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Pola Nafas:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Apnea</option>
                                                    <option value="">Bradipnea</option>
                                                    <option value="">Takipnea</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Gerakan Dada:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Simetris</option>
                                                    <option value="">Tidak Simetris</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                <div class="mb-3 mb-sm-0">
                                                    <div class="card-subtitle">Sirkulasi</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Kulit:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Jaundice</option>
                                                    <option value="">Sianosis</option>
                                                    <option value="">Pucat</option>
                                                    <option value="">Berkeringat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Turgor:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Normal</option>
                                                    <option value="">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Akral:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Hangat</option>
                                                    <option value="">Dingin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-group mb-3">
                                                <label for="">SPO:</label>
                                                <input type="text" name="" id="" aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                <div class="mb-3 mb-sm-0">
                                                    <div class="card-subtitle">Neurologi</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kesadaran:</label>
                                                <input type="text" class="form-control" placeholder="Kesadaran" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <input type="text" class="form-control" placeholder="Mata" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Motorik:</label>
                                                <input type="text" class="form-control" placeholder="Motorik" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Verbal:</label>
                                                <input type="text" class="form-control" placeholder="Verbal" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Umum:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Baik</option>
                                                    <option value="">Tidak Baik</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Laborat:</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="">Laboratorium / Farmasi:</label>
                                                <input type="file" class="form-control" placeholder="Laboratorium / Farmasi" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Faktor Resiko</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Aktifitas Fisik</label>
                                            <div class="form-check">
                                                <input type="radio" name="aktifitas_fisik" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="aktifitas_fisik" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Konsumsi Alkohol</label>
                                            <div class="form-check">
                                                <input type="radio" name="konsumsi_alkohol" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="konsumsi_alkohol" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Makan Buah & Sayur</label>
                                            <div class="form-check">
                                                <input type="radio" name="makan_buah" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="makan_buah" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Merokok</label>
                                            <div class="form-check">
                                                <input type="radio" name="merokok" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="merokok" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Keluarga</label>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_keluarga" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_keluarga" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Penyakit Terdahulu</label>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_penyakit" id="" class="form-check-input">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_penyakit" id="" class="form-check-input">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="step-2 row hidden" data-step="2">
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Data Pemeriksaan</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Nama:</label>
                                                <input type="number" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">No. RM:</label>
                                                <input type="text" class="form-control" placeholder="No. RM" name="tarif" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Alamat:</label>
                                                <input type="text" class="form-control" placeholder="Alamat" name="tarif" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Tanggal:</label>
                                                <input type="date" class="form-control" placeholder="Tanggal" name="tarif" value="{{ old('tarif') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Subjective / Keluhan</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="subjective" id="" cols="30" rows="5" class="form-control w-100"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Objective</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="number" class="form-control" placeholder="Sistole" name="nama" value="{{ old('nama') }}">
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Sistole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Diastole" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Diastole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Berat Badan" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">KG</span>
                                                    <label for="">Berat Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">CM</span>
                                                    <label for="">Tinggi Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Suhu" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">C</span>
                                                    <label for="">Suhu:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="SpO2" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">$</span>
                                                    <label for="">SpO2:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Respiration Rate" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label for="">Respiration Rate:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nadi" name="tarif" value="{{ old('tarif') }}">
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label for="">Nadi:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Plan</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="plan" id="" cols="30" rows="5" class="form-control w-100"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Assesment</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="assesment" id="" cols="30" rows="5" class="form-control w-100"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Layanan</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <select name="" id="selectLayanan" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach ($data['listLayanan'] as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-outline-secondary" id="btnAddLayanan" type="button">Tambah</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>Jumlah</td>
                                                            <td>Nama Layanan</td>
                                                            <td>Harga Layanan</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyLayanan">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title text-center">PENGKAJIAN RISIKO JATUH DEWASA (Moerse Fall Scale)</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Faktor Risiko</th>
                                                            <th>Skala</th>
                                                            <th>Poin</th>
                                                            <th>Ket</th>
                                                            <th>Skor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Riwayat Jatuh</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Ya</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                25
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="riwayat_jatuh" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_riwayat_jatuh"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="riwayat_jatuh" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Diagnosa sekunder (> 2 diagnosa medis)</td>
                                                            <td>Ya</td>
                                                            <td>
                                                                15
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="diagnosa_sekunder" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td class="skor_diagnosa_sekunder"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Tidak</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="diagnosa_sekunder" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td></td>
                                                        </tr>


                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Alat bantu</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Berpegangan pada perabot</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                30
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="alat_bantu" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_alat_bantu"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tongkat/alat penopang</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                15
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="alat_bantu" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_alat_bantu"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak ada/kursi roda/perawat/tirah baring</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="alat_bantu" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_alat_bantu"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Terpasang infuse</td>
                                                            <td>Ya</td>
                                                            <td>
                                                                20
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="terpasang_infuse" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td class="skor_terpasang_infuse"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Tidak</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="terpasang_infuse" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td></td>
                                                        </tr>


                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Gaya berjalan</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Terganggu</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                20
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="gaya_berjalan" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_gaya_berjalan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Lemah</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                10
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="gaya_berjalan" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_gaya_berjalan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Normal/tirah baring/mobilisasi</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="gaya_berjalan" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_gaya_berjalan"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Status mental</td>
                                                            <td>Sering lupa akan keterbatasan yang dimiliki</td>
                                                            <td>
                                                                15
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="status_mental" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td class="skor_status_mental"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Sadarkan kemampuan diri sendiri</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="status_mental" id="" class="form-check-input border-dark">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Pengkajian Fungsional (Diisi Oleh Perawat)</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Alat Bantu</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Protesa</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Cacat Tubuh</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Mandiri</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Dibantu</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="">Ya</option>
                                                    <option value="">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">ADL</label>
                                                <select name="adl" id="" class="form-control mb-2">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="tidak">Tidak</option>
                                                </select>
                                                <button type="button" class="btn btn-secondary hidden" id="btnADL" class="" data-bs-toggle="modal" data-bs-target="#exampleModalADL">
                                                    <i class="ti ti-plus"></i>
                                                    Tambah ADL
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="step-3 row hidden" data-step="3">
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">PEMERIKSAAN FISIK (Diisi Oleh Dokter)</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">KU dan Kesadaran</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <select name="" id="" class="form-control">
                                                                <option value="">-- Pilih --</option>
                                                                <option value="">Sadar Baik</option>
                                                                <option value="">Berespon Dengan Kata-kata</option>
                                                                <option value="">Hanya berespon jika dirangsang nyeri / pain</option>
                                                                <option value="">Pasien tidak sadar</option>
                                                                <option value="">Gelisah / Bingung</option>
                                                                <option value="">Acute Confusional States</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Kepala dan Leher</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Dada</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">KU dan Kesadaran</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Ekstrimitas</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Status Lokalis</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <img class='img-fluid w-100' src="{{ asset('assets/images/status-lokalis.jpg') }}" alt="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Keterangan:</label>
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">PENATALAKSAAN / TERAPI (Diisi oleh Dokter)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">DISCHARGE PLANNING (Diisi oleh Perawat)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Umur > 65</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id="" class="form-check-input">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id="" class="form-check-input">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Keterbatasan Mobilitas</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Perawatan / Pengobatan Lanjutan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Bantuan untuk melakukan aktivitas harian</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Tidak masuk kriteria</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">EDUKASI (Diisi oleh Dokter)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="hasil_pemeriksaan">
                                                            <label class="form-check-label" for="hasil_pemeriksaan">
                                                              Hasil Pemeriksaan Fisik
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="hasil_pemeriksaan_penunjang">
                                                            <label class="form-check-label" for="hasil_pemeriksaan_penunjang">
                                                              Hasil Pemeriksaan Penunjang
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="hasil_asuhan">
                                                            <label class="form-check-label" for="hasil_asuhan">
                                                              Hasil Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="lain_lain">
                                                            <label class="form-check-label" for="lain_lain">
                                                              Lain-lain
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="diagnosis">
                                                            <label class="form-check-label" for="diagnosis">
                                                              Diagnosis
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rencana_asuhan">
                                                            <label class="form-check-label" for="rencana_asuhan">
                                                              Rencana Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="hasil_pengobatan">
                                                            <label class="form-check-label" for="hasil_pengobatan">
                                                              Hasil Pengobatan
                                                            </label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" type="text" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">RENCANA TINDAK LANJUT (Diisi oleh Dokter)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rawat_inap">
                                                            <label class="form-check-label" for="rawat_inap">
                                                              Rawat inap, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rawat_inap1">
                                                            <label class="form-check-label" for="rawat_inap1">
                                                              Rawat inap, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rujuk">
                                                            <label class="form-check-label" for="rujuk">
                                                              Rujuk, RS yang dituju:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="aps">
                                                            <label class="form-check-label" for="aps">
                                                              Tanggal Pulang Paksa / APS:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="date" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="meninggal">
                                                            <label class="form-check-label" for="meninggal">
                                                              Meninggal:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="date" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">KONDISI SAAT KELUAR (Diisi oleh Dokter)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="">Sembuh</option>
                                                            <option value="">Belum Sembuh</option>
                                                            <option value="">Membaik</option>
                                                            <option value="">Meninggak</option>
                                                            <option value="">Melarikan Diri</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">ICD 10</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="" id="" class="form-control">
                                                    </div>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Rincian</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="" id="" class="form-control">
                                                    </div>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Jumlah</th>
                                                                    <th>Nama Obat</th>
                                                                    <th>Harga Obat</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Rencana Kontrol</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 form-group">
                                                        <label for="">Tanggal:</label>
                                                        <input type="date" name="" id="" class="form-control">
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <label for="">Alasan Kontrol:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning hidden" id="btnPrev" data-active="" type="button">Sebelumnya</button>
                    <button class="btn btn-primary" id="btnNext" data-active="1" type="button">Selanjutnya</button>
                    <button class="btn btn-success hidden" id="btnSubmit" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  {{-- <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/dashboards/dashboard.js') }}"></script> --}}

  <script>
    $(document).ready(function() {
        let currentStep = 1
        let maxStep = 3

        function toggleButton (nextStep) {
            if (nextStep  == 1) {
                $("#btnNext").removeClass("hidden")
                $("#btnPrev").addClass("hidden")
                $("#btnSubmit").addClass("hidden")

                $("#btnCariPasien").addClass("hidden")
            } else if (nextStep == 2) {
                $("#btnNext").removeClass("hidden")
                $("#btnPrev").removeClass("hidden")
                $("#btnSubmit").addClass("hidden")

                $("#btnCariPasien").removeClass("hidden")
            } else if (nextStep == 3) {
                $("#btnNext").addClass("hidden")
                $("#btnPrev").removeClass("hidden")
                $("#btnSubmit").removeClass("hidden")

                $("#btnCariPasien").addClass("hidden")
            }
        }

        $("#btnNext").on('click', function(e) {
            let stepActive = $(this).data('active')
            currentStep = stepActive
            
            if(currentStep <= maxStep) {
                let nextStep = currentStep + 1
                $(this).data('active', nextStep)
                $("#btnPrev").data('active', nextStep)

                $(`#step-${currentStep}`).addClass('hidden')
                $(`#step-${nextStep}`).removeClass('hidden')
                toggleButton(nextStep)
            } 
        })

        $("#btnPrev").on('click', function (e) {
            let stepActive = $(this).data('active')
            currentStep = stepActive
            
            if(currentStep > 1) {
                let nextStep = currentStep - 1
                console.log(nextStep);
                
                $(this).data('active', nextStep)
                $("#btnNext").data('active', nextStep)

                $(`#step-${currentStep}`).addClass('hidden')
                $(`#step-${nextStep}`).removeClass('hidden')
                toggleButton(nextStep)
            } 
        })

        $("#btnAddLayanan").on('click', function(e) {
            if($("#selectLayanan").val() == '-') {
                e.preventDefault()
            } else {
                let id = $("#selectLayanan").val()
                $.ajax({
                    type: "get",
                    url: `{{ route('get-layanan-by-ajax') }}?id=${id}`,
                    success: function(res) {
                        $("#tbodyLayanan").append(`
                            <tr>
                                <td>1</td>
                                <td>${res.layanan.nama_layanan}</td>
                                <td>${res.layanan.tarif_layanan}</td>    
                            </tr>
                        `)
                    }
                })
            }
        })

        $("select[name='adl']").on('change', function(e) {
            let val = $(this).val()

            if (val === 'ya') {
                $("#btnADL").removeClass('hidden')
            } else {
                $("#btnADL").addClass('hidden')
            }
        })
    })
  </script>
@endsection