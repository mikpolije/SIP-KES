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
    <style>
        .step-circle {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin: auto;
            font-weight: bold;
            border-radius: 50%;
            text-align: center;
            border: 2px solid #2196f3;
            color: #2196f3;
            background-color: transparent;
            transition: all 0.3s ease-in-out;
        }

        .step-circle.active {
            background-color: #2196f3;
            color: white;
            border-color: #2196f3;
        }

        .step-line {
            height: 2px;
            background-color: #e0e0e0;
            flex: 1;
            margin: 0 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .step-line.active {
            background-color: #2196f3;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                    data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @include('triase.modal.search-pasien')
    <div class="row">
        <div class="container my-5">
            <div class="position-relative" style="height: 80px;">

                <!-- Garis antar step (potongan) -->
                <div class="position-absolute top-50 start-0 translate-middle-y w-100 d-flex justify-content-between px-4"
                    style="z-index: 0;">
                    <div class="step-line" data-line="1"></div>
                    <div class="step-line" data-line="2"></div>
                    <div class="step-line" data-line="3"></div>
                    <div class="step-line" data-line="4"></div>
                </div>

                <!-- Stepper -->
                <div class="d-flex justify-content-between align-items-center position-relative z-1" id="stepper">
                    <div class="text-center step" data-step="1">
                        <div class="step-circle">1</div>
                        <small class="d-block text-muted">Pendaftaran</small>
                    </div>
                    <div class="text-center step" data-step="2">
                        <div class="step-circle">2</div>
                        <small class="d-block text-muted">Triase</small>
                    </div>
                    <div class="text-center step" data-step="3">
                        <div class="step-circle">3</div>
                        <small class="d-block text-muted">Pemeriksaan</small>
                    </div>
                    <div class="text-center step" data-step="4">
                        <div class="step-circle">4</div>
                        <small class="d-block text-muted">Farmasi</small>
                    </div>
                    <div class="text-center step" data-step="5">
                        <div class="step-circle">5</div>
                        <small class="d-block text-muted">Pembayaran</small>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">

                <form action="{{ route('triase.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @include('triase.modal.adl')

                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <div class="card-title">Triase</div>
                                <div class="card-subtitle">Triase / Tambah</div>
                            </div>
                            <div class="mb-3 mb-sm-0">
                                <div class="form-group">
                                    <button type="button" id="btnCariPasien" class="btn btn-primary hidden"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ti ti-search"></i>
                                        Cari Pasien
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_pasien" value="0">
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
                                                <input type="text" class="form-control" placeholder="Nama Pasien"
                                                    name="nama_pasien" value="{{ old('nama_pasien') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Usia Pasien:</label>
                                                <input type="number" class="form-control" placeholder="Usia Pasien"
                                                    name="usia_pasien">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">No. Jamkes:</label>
                                                <input type="text" class="form-control" placeholder="No. Jamkes"
                                                    name="no_jamkes">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Nama Penanggung Jawab:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nama Penanggung Jawab" name="nama_penanggung_jawab">
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
                                                <input type="date" class="form-control" placeholder="Tanggal Masuk"
                                                    name="tanggal_masuk">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Sarana Transportasi Kedatangan:</label>
                                                <select name="sarana_transportasi_kedatangan" id=""
                                                    class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Ambulans">Ambulans</option>
                                                    <option value="Brankar">Brankar</option>
                                                    <option value="Kursi Roda">Kursi Roda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">*Jam Masuk:</label>
                                                <input type="time" class="form-control" placeholder="Jam Masuk"
                                                    name="jam_masuk">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Pasien Tiba:</label>
                                                <select name="kondisi_pasien_tiba" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Emergency">Emergency</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="form-label">Triase</label>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <div class="form-check form-check-inline ml-3">
                                                <input type="radio" name="triase" id=""
                                                    class="form-check-input" value="Merah">
                                                <label for="">Merah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id=""
                                                    class="form-check-input" value="Kuning">
                                                <label for="">Kuning</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id=""
                                                    class="form-check-input" value="Hijau">
                                                <label for="">Hijau</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="triase" id=""
                                                    class="form-check-input" value="Hitam">
                                                <label for="">Hitam</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Riwayat Alergi:</label>
                                                <select name="riwayat_alergi" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Udara">Udara</option>
                                                    <option value="Obat">Obat</option>
                                                    <option value="Makanan">Makanan</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Keluhan:</label>
                                                <textarea name="keluhan" id="" cols="" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="berat_badan" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">KG</span>
                                                <label for="">Berat Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="tinggi_badan" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Tinggi Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="lingkar_perut" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Lingkar Perut:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="IMT"
                                                    name="imt">
                                                <label for="">IMT:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nafas"
                                                    name="nafas">
                                                <label for="">Nafas:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="sistol" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Sistol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="diastol" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Diastol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="suhu" id=""
                                                    aria-describedby="basic-addon" class="form-control">
                                                <span class="input-group-text" id="basic-addon">C</span>
                                                <label for="">Suhu:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nadi"
                                                    name="nadi">
                                                <label for="">Nadi:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kepala:</label>
                                                <select name="kepala" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <select name="mata" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">THT:</label>
                                                <select name="tht" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Leher:</label>
                                                <select name="leher" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Thorax:</label>
                                                <select name="thorax" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Abdomen:</label>
                                                <select name="abdomen" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Extemitas:</label>
                                                <select name="extemitas" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Genetalia:</label>
                                                <select name="genetalia" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">ECG:</label>
                                                <select name="ecg" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Ronsen:</label>
                                                <select name="ronsen" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Terapi:</label>
                                                <select name="terapi" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="tidak normal">Tidak Normal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kie:</label>
                                                <select name="kie" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Pemeriksaan Penunjang:</label>
                                                <select name="pemeriksaan_penunjang" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
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
                                                <select name="jalur_nafas" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Bebas">Bebas</option>
                                                    <option value="Tidak Bebas">Tidak Bebas</option>
                                                    <option value="Total">Total</option>
                                                    <option value="Sebagian">Sebagian</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Pola Nafas:</label>
                                                <select name="pola_nafas" id="" class="form-select">
                                                    <option value="Normal">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Apnea">Apnea</option>
                                                    <option value="Bradipnea">Bradipnea</option>
                                                    <option value="Takipnea">Takipnea</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Gerakan Dada:</label>
                                                <select name="gerakan_dada" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Simetris">Simetris</option>
                                                    <option value="Tidak Simetris">Tidak Simetris</option>
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
                                                <select name="kulit" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Jaundice">Jaundice</option>
                                                    <option value="Sianosis">Sianosis</option>
                                                    <option value="Pucat">Pucat</option>
                                                    <option value="Berkeringat">Berkeringat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Turgor:</label>
                                                <select name="turgor" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Akral:</label>
                                                <select name="akral" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Hangat">Hangat</option>
                                                    <option value="Dingin">Dingin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">SPO:</label>
                                                <div class="input-group">
                                                    <input type="text" name="spo" id=""
                                                        aria-describedby="basic-addon" class="form-control">
                                                    <span class="input-group-text" id="basic-addon">%</span>
                                                </div>
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
                                                <input type="text" class="form-control" placeholder="Kesadaran"
                                                    name="kesadaran">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <input type="text" class="form-control" placeholder="Mata"
                                                    name="mata_neurologi">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Motorik:</label>
                                                <input type="text" class="form-control" placeholder="Motorik"
                                                    name="motorik">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Verbal:</label>
                                                <input type="text" class="form-control" placeholder="Verbal"
                                                    name="verbal">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Umum:</label>
                                                <select name="kondisi_umum" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Tidak Baik">Tidak Baik</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Laborat:</label>
                                                <select name="laborat" id="" class="form-select">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="">Laboratorium / Farmasi:</label>
                                                <input type="file" class="form-control"
                                                    placeholder="Laboratorium / Farmasi" name="laboratorium_farmasi"
                                                    value="{{ old('nama') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <div class="card-title">Faktor Risiko</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Aktifitas Fisik</label>
                                            <div class="form-check">
                                                <input type="radio" name="aktivitas_fisik" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="aktivitas_fisik" id=""
                                                    class="form-check-input" value="0">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Konsumsi Alkohol</label>
                                            <div class="form-check">
                                                <input type="radio" name="konsumsi_alkohol" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="konsumsi_alkohol" id=""
                                                    class="form-check-input" value="0">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Makan Buah & Sayur</label>
                                            <div class="form-check">
                                                <input type="radio" name="makan_buah_sayur" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="makan_buah_sayur" id=""
                                                    class="form-check-input" value="0">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Merokok</label>
                                            <div class="form-check">
                                                <input type="radio" name="merokok" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="merokok" id=""
                                                    class="form-check-input" value="0">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Keluarga</label>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_keluarga" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_keluarga" id=""
                                                    class="form-check-input" value="0">
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Penyakit Terdahulu</label>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_penyakit_terdahulu" id=""
                                                    class="form-check-input" value="1">
                                                <label for="">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="riwayat_penyakit_terdahulu" id=""
                                                    class="form-check-input" value="0">
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
                                                <input type="text" class="form-control" placeholder="Nama" readonly
                                                    id="nama-readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">No. RM:</label>
                                                <input type="text" class="form-control" placeholder="No. RM" readonly
                                                    id="no_rm-readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Alamat:</label>
                                                <input type="text" class="form-control" placeholder="Alamat" readonly
                                                    id="alamat-readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Tanggal:</label>
                                                <input type="text" class="form-control" placeholder="Tanggal" readonly
                                                    id="tanggal-readonly">
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
                                                <textarea name="keluhan" id="" cols="30" rows="5" class="form-control w-100"></textarea>
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
                                                    <input type="number" class="form-control" placeholder="Sistole"
                                                        name="sistole">
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Sistole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Diastole"
                                                        name="diastole">
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Diastole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Berat Badan"
                                                        name="berat_badan">
                                                    <span class="input-group-text" id="basic-addon">KG</span>
                                                    <label for="">Berat Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan"
                                                        name="tinggi_badan">
                                                    <span class="input-group-text" id="basic-addon">CM</span>
                                                    <label for="">Tinggi Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Suhu"
                                                        name="suhu">
                                                    <span class="input-group-text" id="basic-addon">C</span>
                                                    <label for="">Suhu:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="SpO2"
                                                        name="spo02">
                                                    <span class="input-group-text" id="basic-addon">%</span>
                                                    <label for="">SpO2:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Respiration Rate" name="respiration_rate">
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label for="">Respiration Rate:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nadi"
                                                        name="nadi">
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
                                            <div class="mb-3 w-100">
                                                <select name="" id="selectLayanan" class="form-select"
                                                    style="width: 100%;">
                                                    <option value="">-- Pilih --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-outline-secondary" id="btnAddLayanan"
                                                type="button">Tambah</button>
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
                                            <div class="card-title text-center">PENGKAJIAN RISIKO JATUH DEWASA (Moerse Fall
                                                Scale)</div>
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
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                Riwayat Jatuh</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Ya
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                25
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_riwayat_jatuh"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="25">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"
                                                                class="text-dark skor_riwayat_jatuh"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_riwayat_jatuh"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Diagnosa sekunder (> 2 diagnosa medis)</td>
                                                            <td>Ya</td>
                                                            <td>
                                                                15
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_diagnosa_sekunder"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="15">
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
                                                                <input type="radio" name="risiko_diagnosa_sekunder"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td></td>
                                                        </tr>


                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Alat
                                                                bantu</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                Berpegangan pada perabot</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                30
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_alat_bantu"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="30">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"
                                                                class="text-dark skor_alat_bantu"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                Tongkat/alat penopang</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                15
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_alat_bantu"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="15">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak
                                                                ada/kursi roda/perawat/tirah baring</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_alat_bantu"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Terpasang infuse</td>
                                                            <td>Ya</td>
                                                            <td>
                                                                20
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_terpasang_infuse"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="20">
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
                                                                <input type="radio" name="risiko_terpasang_infuse"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td></td>
                                                        </tr>


                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Gaya
                                                                berjalan</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                Terganggu</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                20
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_gaya_berjalan"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="20">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"
                                                                class="text-dark skor_gaya_berjalan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Lemah
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                10
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_gaya_berjalan"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="10">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                Normal/tirah baring/mobilisasi</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_gaya_berjalan"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Status mental</td>
                                                            <td>Sering lupa akan keterbatasan yang dimiliki</td>
                                                            <td>
                                                                15
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_status_mental"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="15">
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
                                                                <input type="radio" name="risiko_status_mental"
                                                                    id="" class="form-check-input border-dark"
                                                                    value="0">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2" style="background-color: #E7EEFF"
                                                                class="text-center text-dark"><b>Total Skor</b></td>
                                                            <td colspan="3" style="background-color: #E7EEFF"
                                                                class="text-dark text-center"><b id="total-skor"></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="background-color: #E7EEFF"
                                                                class="text-center text-dark"><b>Keterangan</b></td>
                                                            <td colspan="3" style="background-color: #E7EEFF"
                                                                class="text-dark text-center"><b id="keterangan-skor"></b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p>Skor 0-24 : Risiko Rendah</p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p>Skor 25-50 : Risiko Sedang</p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p>Skor 51 : Risiko Tinggi</p>
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
                                                <select name="alat_bantu" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Protesa</label>
                                                <select name="protesa" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Cacat Tubuh</label>
                                                <select name="cacat_tubuh" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Mandiri</label>
                                                <select name="mandiri" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Dibantu</label>
                                                <select name="dibantu" id="" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">ADL</label>
                                                <select name="adl" id="" class="form-control mb-2">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                                <button type="button" class="btn btn-secondary hidden" id="btnADL"
                                                    class="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalADL">
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
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">KU dan Kesadaran</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <select name="ku_dan_kesadaran" id=""
                                                                class="form-control">
                                                                <option value="">-- Pilih --</option>
                                                                <option value="Sadar Baik">Sadar Baik</option>
                                                                <option value="Berespon Dengan Kata-kata">Berespon Dengan
                                                                    Kata-kata</option>
                                                                <option
                                                                    value="Hanya berespon jika dirangsang nyeri / pain">
                                                                    Hanya berespon jika dirangsang nyeri / pain</option>
                                                                <option value="Pasien tidak sadar">Pasien tidak sadar
                                                                </option>
                                                                <option value="Gelisah / Bingung">Gelisah / Bingung
                                                                </option>
                                                                <option value="Acute Confusional States">Acute Confusional
                                                                    States</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Kepala dan Leher</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="kepala_dan_leher" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Dada</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="dada" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Perut</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="perut" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Ekstrimitas</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="ekstrimitas" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Status Lokalis</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <img class='img-fluid w-100'
                                                            src="{{ asset('assets/images/status-lokalis.jpg') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Keterangan:</label>
                                                            <textarea name="status_lokalis" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">PENATALAKSAAN / TERAPI (Diisi oleh Dokter)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea name="penatalaksanaan" id="" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">DISCHARGE PLANNING (Diisi oleh Perawat)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Umur > 65</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id=""
                                                                class="form-check-input" value="1">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id=""
                                                                class="form-check-input" value="0">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Keterbatasan
                                                            Mobilitas</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas"
                                                                id="" class="form-check-input"
                                                                value="1">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas"
                                                                id="" class="form-check-input"
                                                                value="0">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Perawatan / Pengobatan
                                                            Lanjutan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan"
                                                                id="" class="form-check-input"
                                                                value="1">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan"
                                                                id="" class="form-check-input"
                                                                value="0">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Bantuan untuk melakukan
                                                            aktivitas harian</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id=""
                                                                class="form-check-input" value="1">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id=""
                                                                class="form-check-input" value="0">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Tidak masuk
                                                            kriteria</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id=""
                                                                class="form-check-input" value="1">
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id=""
                                                                class="form-check-input" value="0">
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">EDUKASI (Diisi oleh Dokter)</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="hasil_pemeriksaan">
                                                            <label class="form-check-label" for="hasil_pemeriksaan">
                                                                Hasil Pemeriksaan Fisik
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="hasil_pemeriksaan_penunjang">
                                                            <label class="form-check-label"
                                                                for="hasil_pemeriksaan_penunjang">
                                                                Hasil Pemeriksaan Penunjang
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="hasil_asuhan">
                                                            <label class="form-check-label" for="hasil_asuhan">
                                                                Hasil Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="lain_lain">
                                                            <label class="form-check-label" for="lain_lain">
                                                                Lain-lain
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="diagnosis">
                                                            <label class="form-check-label" for="diagnosis">
                                                                Diagnosis
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="rencana_asuhan">
                                                            <label class="form-check-label" for="rencana_asuhan">
                                                                Rencana Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" name="hasil_pengobatan">
                                                            <label class="form-check-label" for="hasil_pengobatan">
                                                                Hasil Pengobatan
                                                            </label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" type="text" value=""
                                                                name="keterangan_edukasi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-12">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">RENCANA TINDAK LANJUT (Diisi oleh Dokter)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" id="rawat_jalan">
                                                            <label class="form-check-label" for="rawat_inap">
                                                                Rawat jalan, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text"
                                                                name="rawat_jalan" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" id="rawat_inap1">
                                                            <label class="form-check-label" for="rawat_inap1">
                                                                Rawat inap, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" value=""
                                                                name="rawat_inap">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="rujuk">
                                                            <label class="form-check-label" for="rujuk">
                                                                Rujuk, RS yang dituju:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" value=""
                                                                name="rujuk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="aps">
                                                            <label class="form-check-label" for="aps">
                                                                Tanggal Pulang Paksa / APS:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="date" value=""
                                                                name="tanggal_pulang_paksa">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="meninggal">
                                                            <label class="form-check-label" for="meninggal">
                                                                Meninggal:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="date" value=""
                                                                name="meninggal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">KONDISI SAAT KELUAR (Diisi oleh Dokter)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="kondisi_saat_keluar" id=""
                                                            class="form-control">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Sembuh">Sembuh</option>
                                                            <option value="Belum Sembuh">Belum Sembuh</option>
                                                            <option value="Membaik">Membaik</option>
                                                            <option value="Meninggal">Meninggal</option>
                                                            <option value="Melarikan Diri">Melarikan Diri</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">ICD 10</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="" id="selectIcd" class="form-select"
                                                            style="width: 100%;">
                                                            <option value="-">-- Pilih --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button class="btn btn-outline-secondary" id="btnAddIcd"
                                                            type="button">Tambah</button>
                                                    </div>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyIcd"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Rincian</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="" id="selectObat" class="form-select"
                                                            style="width: 100%">
                                                            <option value="-">-- Pilih --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button class="btn btn-outline-secondary" id="btnAddObat"
                                                            type="button">Tambah</button>
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
                                                            <tbody id="tbodyObat"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div
                                                    class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Rencana Kontrol</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 form-group">
                                                        <label for="">Tanggal:</label>
                                                        <input type="date" name="" id="tanggal_kontrol"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <label for="">Alasan Kontrol:</label>
                                                        <input type="text" class="form-control"
                                                            id="alasan_kontrol">
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button class="btn btn-outline-secondary" id="btnAddKontrol"
                                                            type="button">Tambah</button>
                                                    </div>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tanggal</th>
                                                                    <th>Alasan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyKontrol"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-warning hidden" id="btnPrev" data-active=""
                            type="button">Sebelumnya</a>
                        <a href="#" class="btn btn-primary" id="btnNext" data-active="1"
                            type="button">Selanjutnya</a>
                        <button class="btn btn-success hidden" id="btnSubmit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/dashboards/dashboard.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentStep = 2; // ubah ini sesuai progress

            // lingkaran aktif
            document.querySelectorAll('.step').forEach(step => {
                const stepNum = parseInt(step.dataset.step);
                const circle = step.querySelector('.step-circle');
                if (stepNum <= currentStep) {
                    circle.classList.add('active');
                }
            });

            // garis aktif
            document.querySelectorAll('.step-line').forEach(line => {
                const lineNum = parseInt(line.dataset.line);
                if (lineNum < currentStep) {
                    line.classList.add('active');
                }
            });
        });
    </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })

        $("select").each(function () {
            const select = $(this)
            if(select.attr('id') == 'selectLayanan') {
                select.select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    placeholder: 'Masukkan nama layanan',
                    ajax: {
                        dataType: 'json',
                        url: '{{ route('get-list-layanan') }}',
                        delay: 800,
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.nama_layanan,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    }
                })
            } else if (select.attr('id') == 'selectIcd') {
                select.select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    placeholder: 'Masukkan nama ICD10',
                    ajax: {
                        dataType: 'json',
                        url: '{{ route('get-list-icd') }}?type=10',
                        delay: 800,
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.code + ' - ' + item.display,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    }
                })
            } else if (select.attr('id') == 'selectIcd9') {
                select.select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    placeholder: 'Masukkan nama ICD 9',
                    ajax: {
                        dataType: 'json',
                        url: '{{ route('get-list-icd') }}?type=9',
                        delay: 800,
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.code + ' - ' + item.display,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    }
                })
            } else if (select.attr('id') == 'selectObat') {
                select.select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    placeholder: 'Masukkan nama obat',
                    ajax: {
                        dataType: 'json',
                        url: '{{ route('get-list-obat') }}',
                        delay: 800,
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: 'Rp. ' + item.harga + ' - ' + item.nama,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    }
                })
            } else {
                select.select2()
            }
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        });

            let currentStep = 1
            let maxStep = 3

            function storePasien() {
                let dataInput = {
                    id_pasien: $("input[name=id_pasien]").val()
                }
                $("#step-1 input, #step-1 select").each(function() {
                    const input = $(this)
                    if (input.attr('type') == 'radio') {
                        if (input.is(":checked")) {
                            dataInput[input.attr('name')] = input.val()
                        }
                    } else {
                        dataInput[input.attr('name')] = input.val()
                    }
                })

                $.ajax({
                    url: "{{ route('store-pasien') }}",
                    method: 'POST',
                    data: dataInput,
                    success: function(res) {
                        $("input[name=id_pasien]").val(res.id)
                    }
                })
            }

        function toggleButton (nextStep) {
            if (nextStep  == 1) {
                $("#btnNext").removeClass("hidden")
                $("#btnPrev").addClass("hidden")
                $("#btnSubmit").addClass("hidden")
                $(".title").html('Triase')

                $("#btnCariPasien").addClass("hidden")
            } else if (nextStep == 2) {
                $("#btnNext").removeClass("hidden")
                $("#btnPrev").removeClass("hidden")
                $("#btnSubmit").addClass("hidden")
                $(".title").html('Formulir Pemeriksaan UGD')

                $("#btnCariPasien").removeClass("hidden")
            } else if (nextStep == 3) {
                $("#btnNext").addClass("hidden")
                $("#btnPrev").removeClass("hidden")
                $("#btnSubmit").removeClass("hidden")
                $(".title").html('Formulir Pemeriksaan UGD')

                $("#btnCariPasien").addClass("hidden")
            }
        }

        function valCurrentStep (step) {
            let nullValue = 0
            let nullable = ['selectObat', 'selectIcd9', 'selectIcd', 'selectLayanan', 'alamat-readonly']
            let adlForm = [ 'adl_makan', 'adl_berpindah', 'adl_kebersihan_diri', 'adl_aktivitas_di_toilet', 'adl_mandi', 'adl_berjalan_di_datar', 'adl_naik_turun_tangga', 'adl_berpakaian', 'adl_mengontrol_bab', 'adl_mengontrol_bak',]

            $(`#${step} select, #${step} input`).each(function () {
                const input = $(this)
                if(input.attr('type') == 'radio') {
                    if(input.is(":checked").length === 0) {
                        nullValue++
                        console.log(input);
                        
                    }
                } else {
                    if(input.val() === "" || input.val() === "-" || input.val() === null) {
                        if(!nullable.includes(input.attr('id')) && !adlForm.includes(input.attr('name'))) {
                            nullValue++
                            console.log(input);
                        }
                        
                        if (input.attr('name') == 'adl' && input.val() == 1) {
                            $.each(adlForm, (i, v) => {
                                const adlInput = $(`#${v}`)
                                if (adlInput.is(":checked").length === 0) {
                                    nullValue++
                                }
                            })
                        }
                    }
                }
            })

            if(nullValue > 0) {
                return false;
            } 
            return true;
        }

        $("#btnNext").on('click', function(e) {
            let stepActive = $(this).data('active')
            currentStep = stepActive
            let validation = valCurrentStep(`step-${currentStep}`)
            
            if (!validation) {
                Swal.fire({
                    title: 'Terjadi Kesalahan!',
                    text: 'Harap isi semua formulir',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
                 e.preventDefault()
             } else {
                if(currentStep <= maxStep) {
                    let nextStep = currentStep + 1
                    $(this).data('active', nextStep)
                    $("#btnPrev").data('active', nextStep)
    
                    $(`#step-${currentStep}`).addClass('hidden')
                    $(`#step-${nextStep}`).removeClass('hidden')
                    if(currentStep < 2) {
                        storePasien()
                        $(".f1-step").each(function (i, v) {
                            if (i == 2) {
                                console.log(i);
                                
                                $(this).addClass('active')
                            }
                        })
                    }
                    $('.f1-progress-line').data('now-value', 60)
                    $('.f1-progress-line').width('60%')
                    toggleButton(nextStep)
                } 
            }
        })

            $("#btnPrev").on('click', function(e) {
                let stepActive = $(this).data('active')
                currentStep = stepActive

                if (currentStep > 1) {
                    let nextStep = currentStep - 1
                    console.log(nextStep);

                    $(this).data('active', nextStep)
                    $("#btnNext").data('active', nextStep)

                $(`#step-${currentStep}`).addClass('hidden')
                $(`#step-${nextStep}`).removeClass('hidden')
                toggleButton(nextStep)
            } 
        })

        let countObat = 0;
        let countIcd = 0;
        let countIcd9 = 0;
        let countKontrol = 0;
        let countLayanan = 0;

        $("#btnAddLayanan").on('click', function(e) {
            if($("#selectLayanan").val() == '-') {
                e.preventDefault()
            } else {
                let id = $("#selectLayanan").val()
                countLayanan++
                $.ajax({
                    type: "get",
                    url: `{{ route('get-layanan-by-ajax') }}?id=${id}`,
                    success: function(res) {
                        $("#tbodyLayanan").append(`
                            <tr id="rowLayanan-${countLayanan}">
                                <td>1</td>
                                <td>${res.layanan.nama_layanan}</td>
                                <input type='hidden' name='layanan_id[]' value='${id}'/>
                                <td>${res.layanan.tarif_layanan}</td>   
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-danger deleteLayananBtn" data-row="${countLayanan}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td> 
                            </tr>
                        `)
                        }
                    })
                }
            })

        $("#btnAddObat").on('click', function (e) {
            let value = $("#selectObat :selected").text().toString()
            let nama = value.split(' - ')[1]
            let harga = value.split(' - ')[0]
            countObat++

            $("#tbodyObat").append(`
                <tr id="rowObat-${countObat}">
                    <input type='hidden' name='obat_id[]' value=${$("#selectObat").val()} />
                    <td>1</td>
                    <td>${nama}</td>
                    <td>${harga}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger deleteObatBtn" data-row="${countObat}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `)
            })

        $("#btnAddIcd").on('click', function (e) {
            let value = $("#selectIcd").val()
            countIcd++

            $("#tbodyIcd").append(`
                <tr id="rowIcd-${countIcd}">
                    <input type='hidden' name='icd_id[]' value=${$("#selectIcd").val()} />
                    <td>${$("#selectIcd :selected").text()}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger deleteIcdBtn" data-row="${countIcd}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `)
        })

        $("#btnAddIcd9").on('click', function (e) {
            let value = $("#selectIcd9").val()
            countIcd9++

            $("#tbodyIcd9").append(`
                <tr id="rowIcd9-${countIcd9}">
                    <input type='hidden' name='icd9_id[]' value=${$("#selectIcd9").val()} />
                    <td>${$("#selectIcd9 :selected").text()}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger deleteIcd9Btn" data-row="${countIcd9}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `)
            })

        $("#btnAddKontrol").on('click', function (e) {
            let tanggal = $("#tanggal_kontrol").val()
            let alasan = $("#alasan_kontrol").val()
            countKontrol++

            $("#tbodyKontrol").append(`
                <tr id="rowKontrol-${countKontrol}">
                    <input type='hidden' name='alasan_kontrol[]' value=${alasan} />
                    <input type='hidden' name='tanggal_kontrol[]' value=${tanggal} />
                    <td>${tanggal}</td>
                    <td>${alasan}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger deleteKontrolBtn" data-row="${countKontrol}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `)
        })

        $("#tbodyLayanan").on('click', '.deleteLayananBtn', function (e) {
            const btn = $(this)
            let dataRow = btn.data('row')
            $(`#rowLayanan-${dataRow}`).html('')
        })

        $("#tbodyObat").on('click', '.deleteObatBtn', function (e) {
            const btn = $(this)
            let dataRow = btn.data('row')
            $(`#rowObat-${dataRow}`).html('')
        })

        $("#tbodyIcd").on('click', '.deleteIcdBtn', function (e) {
            const btn = $(this)
            let dataRow = btn.data('row')
            $(`#rowIcd-${dataRow}`).html('')
        })

        $("#tbodyIcd9").on('click', '.deleteIcd9Btn', function (e) {
            const btn = $(this)
            let dataRow = btn.data('row')
            $(`#rowIcd9-${dataRow}`).html('')
        })

        $("#tbodyKontrol").on('click', '.deleteKontrolBtn', function (e) {
            const btn = $(this)
            let dataRow = btn.data('row')
            $(`#rowKontrol-${dataRow}`).html('')
        })

            $("select[name='adl']").on('change', function(e) {
                let val = $(this).val()

                if (val === '1') {
                    $("#btnADL").removeClass('hidden')
                } else {
                    $("#btnADL").addClass('hidden')
                }
            })

            $("#btnCariPasien").on('click', function(e) {
                let table = $("#tablePasien").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get-pasien') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'no_rm',
                            name: 'no_rm'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'tanggal_registrasi',
                            name: 'tanggal_registrasi'
                        },
                        {
                            data: 'dokter',
                            name: 'dokter'
                        },
                        {
                            data: 'tipe_pasien',
                            name: 'tipe_pasien'
                        },
                        {
                            data: 'btnAksi',
                            name: 'btnAksi'
                        },
                    ]
                })
            })

            $(".closePasien").on('click', function() {
                $("#tablePasien").DataTable().destroy()
            })

            $("#tablePasien").on('click', '.btnPilihPasien', function() {
                let btn = $(this)

                $("#nama-readonly").val(btn.data('nama'))
                $("#no_rm-readonly").val(btn.data('id'))
                $("#alamat-readonly").val('-')
                $("#tanggal-readonly").val(btn.data('tanggal'))

                $(".closePasien").trigger('close')
            })
        })
    </script>
    @include('triase.scripts.count-total')
@endsection
