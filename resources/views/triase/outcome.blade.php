@extends('layouts.master')

@section('title', $data['title'])

@section('css')
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
  <style>
    .hidden {
        display: none;
    }
        
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }
        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #6877DC;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 20%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #6877DC;
            color: #6877DC;
            line-height: 38px;
        }
        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #6877DC;
            font-size: 22px;
            line-height: 48px;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
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
    @if (session()->has('success'))
        <div class="toast toast-onload align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
            <h5 class="text-white fs-3 mb-1">{{ session('success') }}</h5>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast"
            aria-label="Close"></button>
        </div>
        </div>
    @endif
    @include('triase.modal.outcome.adl')
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100">
                    <div class="card-header">
                        <b><h1 class="title form-label">Triase</h1></b>
                    </div>
                {{-- <form action="{{ route('triase.store') }}" enctype="multipart/form-data" method="post"> --}}
                    {{-- @csrf --}}
                    <div class="card-body">
                        <div class="row text-center" style="text-align: center;">
                            <div class="col-md-12">
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="40" data-number-of-steps="5" style="width: 40%;"></div>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon">1</div>
                                        <p>Pendaftaran</p>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon">2</div>
                                        <p>Triase</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon">3</div>
                                        <p>Pemeriksaan</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon">4</div>
                                        <p>Farmasi</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon">5</div>
                                        <p>Pembayaran</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <h3 class="mt-3 shadow-none-title">Triase</h3>
                                <div class="card-subtitle">Triase / Outcome</div>
                            </div>
                            <div class="mb-3 mb-sm-0">
                                <div class="form-group">
                                    <button type="button" id="btnCariPasien" class="btn btn-primary hidden" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ti ti-search"></i>
                                        Cari Pasien
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                        <input type="hidden" name="id_pasien" value="0">
                        <div id="step-1" class="step-1 row" data-step="1">
                            <div class="card shadow-none col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Informasi Pasien</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Nama Pasien:</label>
                                                <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" value="{{ $data['data']->pendaftaran->data_pasien->nama_pasien ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Usia Pasien:</label>
                                                @php
                                                    if ($data['data']->pendaftaran->data_pasien) {
                                                        $birth_date = $data['data']->pendaftaran->data_pasien->tanggal_lahir_pasien;
                                                        $current_date = date('Y-m-d');
                                                        $birth_date_obj = new DateTime($birth_date);
                                                        $current_date_obj = new DateTime($current_date);
                                                        $diff = $current_date_obj->diff($birth_date_obj);
                                                        $age_years = $diff->y;
                                                    }
                                                @endphp
                                                <input type="number" class="form-control" placeholder="Usia Pasien" name="usia_pasien" value="{{ $age_years ?? 0 }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">No. Jamkes:</label>
                                                <input type="text" class="form-control" placeholder="No. Jamkes" name="no_jamkes" value="{{ $data['data']->pendaftaran->data_pasien->no_jamkes ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Nama Penanggung Jawab:</label>
                                                <input type="text" class="form-control" placeholder="Nama Penanggung Jawab" name="nama_penanggung_jawab" value="{{ $data['data']->pendaftaran->wali_pasien->nama_wali ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Informasi Kondisi Pasien</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">*Tanggal Masuk:</label>
                                                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk" value="{{ $data['data']->created_at }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Sarana Transportasi Kedatangan:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->sarana_transportasi_kedatangan }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">*Jam Masuk:</label>
                                                <input type="time" class="form-control" placeholder="Jam Masuk" name="jam_masuk" value="{{ $data['data']->jam_masuk }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Kondisi Pasien Tiba:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi_pasien_tiba }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="" class="form-label">Triase</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->triase }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Riwayat Alergi:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->riwayat_alergi }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Keluhan:</label>
                                                <textarea name="keluhan" id="" cols="" rows="5" class="form-control" disabled>{{ $data['data']->keluhan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="berat_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->berat_badan }}" disabled>
                                                <span class="input-group-text" id="basic-addon">KG</span>
                                                <label class="form-label" for="">Berat Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="tinggi_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->tinggi_badan }}" disabled>
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label class="form-label" for="">Tinggi Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="lingkar_perut" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->lingkar_perut }}" disabled>
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label class="form-label" for="">Lingkar Perut:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="IMT" name="imt" value="{{ $data['data']->imt }}" disabled>
                                                <label class="form-label" for="">IMT:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nafas" name="nafas" value="{{ $data['data']->nafas }}" disabled>
                                                <label class="form-label" for="">Nafas:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="sistol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->sistol }}" disabled>
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label class="form-label" for="">Tensi - Sistol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="diastol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->diastol }}" disabled>
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label class="form-label" for="">Tensi - Diastol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="suhu" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->suhu }}" disabled>
                                                <span class="input-group-text" id="basic-addon">C</span>
                                                <label class="form-label" for="">Suhu:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->nadi }}" disabled>
                                                <label class="form-label" for="">Nadi:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Kepala:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kepala) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Mata:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->mata) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">THT:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->tht) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Leher:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->leher) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Thorax:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->thorax) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Abdomen:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->abdomen) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Extemitas:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->extemitas) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Genetalia:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->genetalia) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">ECG:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->ecg) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Ronsen:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->ronsen) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Terapi:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->terapi) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Kie:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kie) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Pemeriksaan Penunjang:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->pemeriksaan_penunjang) }}" disabled>
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
                                                <label class="form-label" for="">Jalur Nafas:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->jalur_nafas }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Pola Nafas:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->pola_nafas }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Gerakan Dada:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->gerakan_dada }}" disabled>
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
                                                <label class="form-label" for="">Kulit:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kulit }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Turgor:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->turgor }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Akral:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->akral }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">SPO:</label>
                                                <div class="input-group">
                                                    <input type="text" name="spo" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->spo }}" disabled>
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
                                                <label class="form-label" for="">Kesadaran:</label>
                                                <input type="text" class="form-control" placeholder="Kesadaran" name="kesadaran" value="{{ ucwords($data['data']->kesadaran) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Mata:</label>
                                                <input type="text" class="form-control" placeholder="Mata" name="mata_neurologi" value="{{ ucwords($data['data']->mata_neurologi) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Motorik:</label>
                                                <input type="text" class="form-control" placeholder="Motorik" name="motorik" value="{{ ucwords($data['data']->motorik) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Verbal:</label>
                                                <input type="text" class="form-control" placeholder="Verbal" name="verbal" value="{{ ucwords($data['data']->verbal) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Kondisi Umum:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi_umum) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Laborat:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->laborat) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Laboratorium / Farmasi:</label>
                                                <img src="{{ asset('/upload/laboratorium_farmasi/' . $data['data']->id . '/' . $data['data']->laboratorium_farmasi) }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Faktor Risiko</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 form-group">
                                            <label class="form-label" for="" class="form-label">Aktifitas Fisik</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->aktivitas_fisik == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="" class="form-label">Konsumsi Alkohol</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->konsumsi_alkohol == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="" class="form-label">Makan Buah & Sayur</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->makan_buah_sayur == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="" class="form-label">Merokok</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->merokok == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="" class="form-label">Riwayat Keluarga</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->riwayat_keluarga == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="" class="form-label">Riwayat Penyakit Terdahulu</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->riwayat_penyakit_terdahulu == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="step-2 row hidden" data-step="2">
                            <div class="card shadow-none col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Data Pemeriksaan</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Nama:</label>
                                                <input type="text" class="form-control" placeholder="Nama" readonly id="nama-readonly" value="{{ $data['data']->pendaftaran->data_pasien->nama_pasien ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">No. RM:</label>
                                                <input type="text" class="form-control" placeholder="No. RM" readonly id="no_rm-readonly" value="{{ $data['data']->pendaftaran->data_pasien->no_rm ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Alamat:</label>
                                                <input type="text" class="form-control" placeholder="Alamat" readonly id="alamat-readonly" value="{{ $data['data']->pendaftaran->data_pasien->alamat_pasien ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Tanggal:</label>
                                                <input type="text" class="form-control" placeholder="Tanggal" readonly id="tanggal-readonly" value="{{ $data['data']->pendaftaran->created_at ?? '-' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Subjective / Keluhan</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="keluhan" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->pemeriksaan->keluhan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Objective</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="number" class="form-control" placeholder="Sistole" name="sistole" value="{{ $data['data']->pemeriksaan->sistole }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label class="form-label" for="">Sistole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Diastole" name="diastole" value="{{ $data['data']->pemeriksaan->diastole }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label class="form-label" for="">Diastole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan" value="{{ $data['data']->pemeriksaan->berat_badan }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">KG</span>
                                                    <label class="form-label" for="">Berat Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan" name="tinggi_badan" value="{{ $data['data']->pemeriksaan->tinggi_badan }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">CM</span>
                                                    <label class="form-label" for="">Tinggi Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Suhu" name="suhu" value="{{ $data['data']->pemeriksaan->suhu }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">C</span>
                                                    <label class="form-label" for="">Suhu:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="SpO2" name="spo02" value="{{ $data['data']->pemeriksaan->spo02 }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">%</span>
                                                    <label class="form-label" for="">SpO2:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Respiration Rate" name="respiration_rate" value="{{ $data['data']->pemeriksaan->respiration_rate }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label class="form-label" for="">Respiration Rate:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->pemeriksaan->nadi }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label class="form-label" for="">Nadi:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Plan</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="plan" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->pemeriksaan->plan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Assesment</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <textarea name="assesment" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->pemeriksaan->assesment }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Layanan</h3>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                        @foreach ($data['data']->layanan as $key => $item)
                                                            <tr>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ $item->layanan->nama_layanan }}</td>
                                                                <td>{{ $item->layanan->tarif_layanan }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">PENGKAJIAN RISIKO JATUH DEWASA (Moerse Fall Scale)</h3>
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
                                                                <input type="radio" name="risiko_riwayat_jatuh" id="" class="form-check-input border-dark" value="25" disabled @checked($data['data']->pengkajianRisiko->riwayat_jatuh == 25)>
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_riwayat_jatuh">{{ $data['data']->pengkajianRisiko->riwayat_jatuh }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_riwayat_jatuh" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->riwayat_jatuh == 0)>
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
                                                                <input type="radio" name="risiko_diagnosa_sekunder" id="" class="form-check-input border-dark" value="15" disabled @checked($data['data']->pengkajianRisiko->diagnostik_sekunder == 15)>
                                                            </td>
                                                            <td class="skor_diagnosa_sekunder">{{ $data['data']->pengkajianRisiko->diagnostik_sekunder }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Tidak</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_diagnosa_sekunder" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->diagnostik_sekunder == 0)>
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
                                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="30" disabled @checked($data['data']->pengkajianRisiko->alat_bantu == 30)>
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_alat_bantu">{{ $data['data']->pengkajianRisiko->alat_bantu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tongkat/alat penopang</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                15
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="15" disabled @checked($data['data']->pengkajianRisiko->alat_bantu == 15)>
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak ada/kursi roda/perawat/tirah baring</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->alat_bantu == 0)>
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
                                                                <input type="radio" name="risiko_terpasang_infuse" id="" class="form-check-input border-dark" value="20" disabled @checked($data['data']->pengkajianRisiko->terpasang_infuse == 20)>
                                                            </td>
                                                            <td class="skor_terpasang_infuse">{{ $data['data']->pengkajianRisiko->terpasang_infuse }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Tidak</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_terpasang_infuse" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->terpasang_infuse == 0)>
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
                                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="20" disabled @checked($data['data']->pengkajianRisiko->gaya_berjalan == 20)>
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark skor_gaya_berjalan">{{ $data['data']->pengkajianRisiko->gaya_berjalan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Lemah</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                10
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="10" disabled @checked($data['data']->pengkajianRisiko->gaya_berjalan == 10)>
                                                            </td>
                                                            <td style="background-color: #E7EEFF"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">Normal/tirah baring/mobilisasi</td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                0
                                                            </td>
                                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->gaya_berjalan == 0)>
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
                                                                <input type="radio" name="risiko_status_mental" id="" class="form-check-input border-dark" value="15" disabled @checked($data['data']->pengkajianRisiko->status_mental == 15)>
                                                            </td>
                                                            <td class="skor_status_mental">{{ $data['data']->pengkajianRisiko->status_mental }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Sadarkan kemampuan diri sendiri</td>
                                                            <td>
                                                                0
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="risiko_status_mental" id="" class="form-check-input border-dark" value="0" disabled @checked($data['data']->pengkajianRisiko->status_mental == 0)>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        @php
                                                            $totalRisiko = $data['data']->pengkajianRisiko->riwayat_jatuh + $data['data']->pengkajianRisiko->diagnostik_sekunder + $data['data']->pengkajianRisiko->alat_bantu + $data['data']->pengkajianRisiko->terpasang_infuse + $data['data']->pengkajianRisiko->gaya_berjalan + $data['data']->pengkajianRisiko->status_mental;
                                                            $keterangan = '';
                                                            if ($totalRisiko < 25) {
                                                                $keterangan = 'Risiko Rendah';
                                                            } else if ($totalRisiko > 24  && $totalRisiko < 51) {
                                                                $keterangan = 'Risiko Sedang';
                                                            } else {
                                                                $keterangan = 'Risiko Tinggi';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td colspan="2" style="background-color: #E7EEFF"  class="text-center text-dark"><b>Total Skor</b></td>
                                                            <td colspan="3" style="background-color: #E7EEFF"  class="text-dark text-center"><b id="total-skor">{{ $totalRisiko }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="background-color: #E7EEFF"  class="text-center text-dark"><b>Keterangan</b></td>
                                                            <td colspan="3" style="background-color: #E7EEFF"  class="text-dark text-center"><b id="keterangan-skor">{{ $keterangan }}</b></td>
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
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">Pengkajian Fungsional (Diisi Oleh Perawat)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Alat Bantu</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->alat_bantu == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Protesa</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->protesa == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Cacat Tubuh</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->cacat_tubuh == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Mandiri</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->mandiri == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Dibantu</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->dibantu == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">ADL</label>
                                                <input type="text" name="" id="" class="form-control mb-3" value="{{ $data['data']->pemeriksaan->adl == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                                <button type="button" class="btn btn-secondary {{ $data['data']->pemeriksaan->adl == 1 ? '' : 'hidden' }}" id="btnADL" class="" data-bs-toggle="modal" data-bs-target="#exampleModalADL">
                                                    <i class="ti ti-plus"></i>
                                                    Tampilkan ADL
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="step-3 row hidden" data-step="3">
                            <div class="card shadow-none col-md-12">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h3 class="mt-3 shadow-none-title">PEMERIKSAAN FISIK (Diisi Oleh Dokter)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">KU dan Kesadaran</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->ku_dan_kesadaran }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Kepala dan Leher</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="kepala_dan_leher" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->kepala_dan_leher }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Dada</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="dada" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->dada }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Perut</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="perut" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->perut }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Ekstrimitas</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="ekstrimitas" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->ekstrimitas }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Status Lokalis</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <img class='img-fluid w-100' src="{{ asset('assets/images/status-lokalis.jpg') }}" alt="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="">Keterangan:</label>
                                                            <textarea name="status_lokalis" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->status_lokalis }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">PENATALAKSAAN / TERAPI (Diisi oleh Dokter)</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea name="penatalaksanaan" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->pemeriksaan->penatalaksanaan }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">DISCHARGE PLANNING (Diisi oleh Perawat)</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="" class="form-label">Umur > 65</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id="" class="form-check-input" disabled @checked($data['data']->pemeriksaan->umur_65)>
                                                            <label class="form-label" for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id="" class="form-check-input" disabled @checked(!$data['data']->pemeriksaan->umur_65)>
                                                            <label class="form-label" for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="" class="form-label">Keterbatasan Mobilitas</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" disabled @checked($data['data']->pemeriksaan->keterbatasan_mobilitas)>
                                                            <label class="form-label" for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" disabled @checked(!$data['data']->pemeriksaan->keterbatasan_mobilitas)>
                                                            <label class="form-label" for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="" class="form-label">Perawatan / Pengobatan Lanjutan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" disabled @checked($data['data']->pemeriksaan->perawatan_lanjutan)>
                                                            <label class="form-label" for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" disabled @checked(!$data['data']->pemeriksaan->perawatan_lanjutan)>
                                                            <label class="form-label" for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="" class="form-label">Bantuan untuk melakukan aktivitas harian</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input" disabled @checked($data['data']->pemeriksaan->bantuan)>
                                                            <label class="form-label" for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input" disabled @checked(!$data['data']->pemeriksaan->bantuan)>
                                                            <label class="form-label" for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="" class="form-label">Tidak masuk kriteria</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" disabled @checked($data['data']->pemeriksaan->masuk_kriteria)>
                                                            <label class="form-label" for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" disabled @checked(!$data['data']->pemeriksaan->masuk_kriteria)>
                                                            <label class="form-label" for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">EDUKASI (Diisi oleh Dokter)</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan" disabled @checked($data['data']->pemeriksaan->hasil_pemeriksaan)>
                                                            <label class="form-check-label" for="hasil_pemeriksaan">
                                                              Hasil Pemeriksaan Fisik
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan_penunjang" disabled @checked($data['data']->pemeriksaan->penunjang)>
                                                            <label class="form-check-label" for="hasil_pemeriksaan_penunjang">
                                                              Hasil Pemeriksaan Penunjang
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_asuhan" disabled @checked($data['data']->pemeriksaan->hasil_asuhan)>
                                                            <label class="form-check-label" for="hasil_asuhan">
                                                              Hasil Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="lain_lain" disabled @checked($data['data']->pemeriksaan->lain_lain)>
                                                            <label class="form-check-label" for="lain_lain">
                                                              Lain-lain
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="diagnosis" disabled @checked($data['data']->pemeriksaan->diagnosis)>
                                                            <label class="form-check-label" for="diagnosis">
                                                              Diagnosis
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rencana_asuhan" disabled @checked($data['data']->pemeriksaan->rencana_asuhan)>
                                                            <label class="form-check-label" for="rencana_asuhan">
                                                              Rencana Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pengobatan" disabled @checked($data['data']->pemeriksaan->hasil_pengobatan)>
                                                            <label class="form-check-label" for="hasil_pengobatan">
                                                              Hasil Pengobatan
                                                            </label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" type="text" value="" name="keterangan_edukasi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">RENCANA TINDAK LANJUT (Diisi oleh Dokter)</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_jalan" disabled @checked($data['data']->pemeriksaan->rawat_jalan != null)>
                                                            <label class="form-check-label" for="rawat_inap">
                                                              Rawat jalan, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rawat_jalan" value="{{ $data['data']->pemeriksaan->rawat_jalan }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_inap1" disabled @checked($data['data']->pemeriksaan->rawat_inap != null)>
                                                            <label class="form-check-label" for="rawat_inap1">
                                                              Rawat inap, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rawat_inap" value="{{ $data['data']->pemeriksaan->rawat_inap }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rujuk" disabled @checked($data['data']->pemeriksaan->rujuk != null)>
                                                            <label class="form-check-label" for="rujuk">
                                                              Rujuk, RS yang dituju:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rujuk" value="{{ $data['data']->pemeriksaan->rujuk }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="aps" disabled @checked($data['data']->pemeriksaan->tanggal_pulang_paksa != null)>
                                                            <label class="form-check-label" for="aps">
                                                              Tanggal Pulang Paksa / APS:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="tanggal_pulang_paksa" value="{{ $data['data']->pemeriksaan->tanggal_pulang_paksa }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="meninggal" disabled @checked($data['data']->pemeriksaan->meninggal != null)>
                                                            <label class="form-check-label" for="meninggal">
                                                              Meninggal:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="meninggal" value="{{ $data['data']->pemeriksaan->meninggal }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">KONDISI SAAT KELUAR (Diisi oleh Dokter)</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="" id="" class="form-control" value="{{ $data['data']->pemeriksaan->kondisi_saat_keluar }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">ICD 9</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyIcd">
                                                                @foreach ($data['data']->icd9 as $item)
                                                                    <tr>
                                                                        <td>{{ $item->icd9->code }} - {{ $item->icd9->display }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">ICD 10</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyIcd">
                                                                @foreach ($data['data']->icd as $item)
                                                                    <tr>
                                                                        <td>{{ $item->icd->code }} - {{ $item->icd->display }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Rincian</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Jumlah</th>
                                                                    <th>Nama Obat</th>
                                                                    <th>Harga Obat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyObat">
                                                                @foreach ($data['data']->obat as $item)
                                                                    <tr>
                                                                        <th>{{ $item->qty }}</th>
                                                                        <th>{{ $item->obat->nama }}</th>
                                                                        <th>{{ $item->obat->harga }}</th>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h3 class="mt-3 shadow-none-title">Rencana Kontrol</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tanggal</th>
                                                                    <th>Alasan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyKontrol">
                                                                @foreach ($data['data']->rencanaKontrol as $item)
                                                                    <td>{{ $item->tanggal }}</td>
                                                                    <td>{{ $item->alasan }}</td>
                                                                @endforeach
                                                            </tbody>
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
                    <div class="card-footer d-flex justify-content-end">
                        <a href="#" class="btn btn-warning hidden" id="btnPrev" data-active="" type="button">Sebelumnya</a>
                        <a href="#" class="btn btn-primary ms-3" id="btnNext" data-active="1" type="button">Selanjutnya</a>
                        <a href="{{ route('print-pdf', $data['data']->id) }}" target="_blank" class="btn btn-success hidden ms-3" id="btnSubmit">Cetak</a>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  {{-- <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/dashboards/dashboard.js') }}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                if(currentStep < 2) {
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
    })
  </script>
  @include('triase.scripts.count-total')
@endsection