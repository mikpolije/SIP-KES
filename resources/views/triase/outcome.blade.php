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
                {{-- <form action="{{ route('triase.store') }}" enctype="multipart/form-data" method="post"> --}}
                    {{-- @csrf --}}
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <div class="card-title">Triase</div>
                                <div class="card-subtitle">Triase / Outcome</div>
                            </div>
                            {{-- <div class="mb-3 mb-sm-0">
                                <div class="form-group">
                                    <button type="button" id="btnCariPasien" class="btn btn-primary hidden" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ti ti-search"></i>
                                        Cari Pasien
                                    </button>
                                </div>
                            </div> --}}
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
                                                <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" value="{{ $data['data']->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Usia Pasien:</label>
                                                <input type="number" class="form-control" placeholder="Usia Pasien" name="usia_pasien" value="{{ $data['data']->usia }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">No. Jamkes:</label>
                                                <input type="text" class="form-control" placeholder="No. Jamkes" name="no_jamkes" value="{{ $data['data']->no_jamkes }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Nama Penanggung Jawab:</label>
                                                <input type="text" class="form-control" placeholder="Nama Penanggung Jawab" name="nama_penanggung_jawab" value="{{ $data['data']->nama_penanggung_jawab }}" disabled>
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
                                                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk" value="{{ $data['data']->kondisi->tanggal_masuk }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Sarana Transportasi Kedatangan:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->sarana_transportasi_kedatangan }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">*Jam Masuk:</label>
                                                <input type="time" class="form-control" placeholder="Jam Masuk" name="jam_masuk" value="{{ $data['data']->kondisi->jam_masuk }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Pasien Tiba:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->kondisi_pasien_tiba }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Triase</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->triase }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Riwayat Alergi:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_alergi }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Keluhan:</label>
                                                <textarea name="keluhan" id="" cols="" rows="5" class="form-control" disabled>{{ $data['data']->kondisi->keluhan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="berat_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->berat_badan }}" disabled>
                                                <span class="input-group-text" id="basic-addon">KG</span>
                                                <label for="">Berat Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="tinggi_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->tinggi_badan }}" disabled>
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Tinggi Badan:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="lingkar_perut" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->lingkar_perut }}" disabled>
                                                <span class="input-group-text" id="basic-addon">CM</span>
                                                <label for="">Lingkar Perut:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="IMT" name="imt" value="{{ $data['data']->kondisi->imt }}" disabled>
                                                <label for="">IMT:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nafas" name="nafas" value="{{ $data['data']->kondisi->nafas }}" disabled>
                                                <label for="">Nafas:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="sistol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->sistol }}" disabled>
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Sistol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="diastol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->diastol }}" disabled>
                                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                                <label for="">Tensi - Diastol:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group form-floating mb-3">
                                                <input type="number" name="suhu" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->suhu }}" disabled>
                                                <span class="input-group-text" id="basic-addon">C</span>
                                                <label for="">Suhu:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->kondisi->nadi }}" disabled>
                                                <label for="">Nadi:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kepala:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kepala) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->mata) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">THT:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->tht) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Leher:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->leher) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Thorax:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->thorax) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Abdomen:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->abdomen) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Extemitas:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->extemitas) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Genetalia:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->genetalia) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">ECG:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->ecg) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Ronsen:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->ronsen) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Terapi:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->terapi) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kie:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kie) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Pemeriksaan Penunjang:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->pemeriksaan_penunjang) }}" disabled>
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
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->jalur_nafas }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Pola Nafas:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->pola_nafas }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Gerakan Dada:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->gerakan_dada }}" disabled>
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
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->kulit }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Turgor:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->turgor }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Akral:</label>
                                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->akral }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">SPO:</label>
                                                <div class="input-group">
                                                    <input type="text" name="spo" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->spo }}" disabled>
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
                                                <input type="text" class="form-control" placeholder="Kesadaran" name="kesadaran" value="{{ ucwords($data['data']->kondisi->kesadaran) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Mata:</label>
                                                <input type="text" class="form-control" placeholder="Mata" name="mata_neurologi" value="{{ ucwords($data['data']->kondisi->mata_neurologi) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Motorik:</label>
                                                <input type="text" class="form-control" placeholder="Motorik" name="motorik" value="{{ ucwords($data['data']->kondisi->motorik) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <label for="">Verbal:</label>
                                                <input type="text" class="form-control" placeholder="Verbal" name="verbal" value="{{ ucwords($data['data']->kondisi->verbal) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Kondisi Umum:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kondisi_umum) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Laborat:</label>
                                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->laborat) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="">Laboratorium / Farmasi:</label>
                                                <img src="{{ asset('/upload/laboratorium_farmasi/' . $data['data']->id . '/' . $data['data']->kondisi->laboratorium_farmasi) }}" class="img-fluid" alt="">
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
                                        <div class="col-md-3 form-group">
                                            <label for="" class="form-label">Aktifitas Fisik</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->aktivitas_fisik == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Konsumsi Alkohol</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->konsumsi_alkohol == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Makan Buah & Sayur</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->makan_buah_sayur == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Merokok</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->merokok == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Keluarga</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_keluarga == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Riwayat Penyakit Terdahulu</label>
                                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_penyakit_terdahulu == 1 ? 'Ya' : 'Tidak' }}" disabled>
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
                                                <input type="text" class="form-control" placeholder="Nama" readonly id="nama-readonly" value="{{ $data['data']->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">No. RM:</label>
                                                <input type="text" class="form-control" placeholder="No. RM" readonly id="no_rm-readonly" value="{{ $data['data']->id }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Alamat:</label>
                                                <input type="text" class="form-control" placeholder="Alamat" readonly id="alamat-readonly" value="-" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="">Tanggal:</label>
                                                <input type="text" class="form-control" placeholder="Tanggal" readonly id="tanggal-readonly" value="{{ $data['data']->kondisi->tanggal_masuk }}" disabled>
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
                                                <textarea name="keluhan" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->detail->keluhan }}</textarea>
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
                                                    <input type="number" class="form-control" placeholder="Sistole" name="sistole" value="{{ $data['data']->detail->sistole }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Sistole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Diastole" name="diastole" value="{{ $data['data']->detail->diastole }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                                    <label for="">Diastole:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan" value="{{ $data['data']->detail->berat_badan }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">KG</span>
                                                    <label for="">Berat Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Tinggi Badan" name="tinggi_badan" value="{{ $data['data']->detail->tinggi_badan }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">CM</span>
                                                    <label for="">Tinggi Badan:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Suhu" name="suhu" value="{{ $data['data']->detail->suhu }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">C</span>
                                                    <label for="">Suhu:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="SpO2" name="spo02" value="{{ $data['data']->detail->spo02 }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">%</span>
                                                    <label for="">SpO2:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Respiration Rate" name="respiration_rate" value="{{ $data['data']->detail->respiration_rate }}" disabled>
                                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                                    <label for="">Respiration Rate:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->detail->nadi }}" disabled>
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
                                                <textarea name="plan" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->detail->plan }}</textarea>
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
                                                <textarea name="assesment" id="" cols="30" rows="5" class="form-control w-100" disabled>{{ $data['data']->detail->assesment }}</textarea>
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
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->alat_bantu == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Protesa</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->protesa == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Cacat Tubuh</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->cacat_tubuh == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Mandiri</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->mandiri == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">Dibantu</label>
                                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->dibantu == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="">ADL</label>
                                                <input type="text" name="" id="" class="form-control mb-3" value="{{ $data['data']->detail->adl == 1 ? 'Ya' : 'Tidak' }}" disabled>
                                                <button type="button" class="btn btn-secondary {{ $data['data']->detail->adl == 1 ? '' : 'hidden' }}" id="btnADL" class="" data-bs-toggle="modal" data-bs-target="#exampleModalADL">
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
                                                            <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->ku_dan_kesadaran }}" disabled>
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
                                                            <textarea name="kepala_dan_leher" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->kepala_dan_leher }}</textarea>
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
                                                            <textarea name="dada" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->dada }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Perut</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <textarea name="perut" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->perut }}</textarea>
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
                                                            <textarea name="ekstrimitas" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->ekstrimitas }}</textarea>
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
                                                            <textarea name="status_lokalis" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->status_lokalis }}</textarea>
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
                                                        <textarea name="penatalaksanaan" id="" cols="30" rows="10" class="form-control" disabled>{{ $data['data']->detail->penatalaksanaan }}</textarea>
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
                                                            <input type="radio" name="umur_65" id="" class="form-check-input" disabled @checked($data['data']->detail->umur_65)>
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="umur_65" id="" class="form-check-input" disabled @checked(!$data['data']->detail->umur_65)>
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Keterbatasan Mobilitas</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" disabled @checked($data['data']->detail->keterbatasan_mobilitas)>
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" disabled @checked(!$data['data']->detail->keterbatasan_mobilitas)>
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Perawatan / Pengobatan Lanjutan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" disabled @checked($data['data']->detail->perawatan_lanjutan)>
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" disabled @checked(!$data['data']->detail->perawatan_lanjutan)>
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Bantuan untuk melakukan aktivitas harian</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input" disabled @checked($data['data']->detail->bantuan)>
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="bantuan" id="" class="form-check-input" disabled @checked(!$data['data']->detail->bantuan)>
                                                            <label for="">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label">Tidak masuk kriteria</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" disabled @checked($data['data']->detail->masuk_kriteria)>
                                                            <label for="">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" disabled @checked(!$data['data']->detail->masuk_kriteria)>
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
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan" disabled @checked($data['data']->detail->hasil_pemeriksaan)>
                                                            <label class="form-check-label" for="hasil_pemeriksaan">
                                                              Hasil Pemeriksaan Fisik
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan_penunjang" disabled @checked($data['data']->detail->penunjang)>
                                                            <label class="form-check-label" for="hasil_pemeriksaan_penunjang">
                                                              Hasil Pemeriksaan Penunjang
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_asuhan" disabled @checked($data['data']->detail->hasil_asuhan)>
                                                            <label class="form-check-label" for="hasil_asuhan">
                                                              Hasil Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="lain_lain" disabled @checked($data['data']->detail->lain_lain)>
                                                            <label class="form-check-label" for="lain_lain">
                                                              Lain-lain
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="diagnosis" disabled @checked($data['data']->detail->diagnosis)>
                                                            <label class="form-check-label" for="diagnosis">
                                                              Diagnosis
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rencana_asuhan" disabled @checked($data['data']->detail->rencana_asuhan)>
                                                            <label class="form-check-label" for="rencana_asuhan">
                                                              Rencana Asuhan
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pengobatan" disabled @checked($data['data']->detail->hasil_pengobatan)>
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
                                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_jalan" disabled @checked($data['data']->detail->rawat_jalan != null)>
                                                            <label class="form-check-label" for="rawat_inap">
                                                              Rawat jalan, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rawat_jalan" value="{{ $data['data']->detail->rawat_jalan }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_inap1" disabled @checked($data['data']->detail->rawat_inap != null)>
                                                            <label class="form-check-label" for="rawat_inap1">
                                                              Rawat inap, kontrol ke:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rawat_inap" value="{{ $data['data']->detail->rawat_inap }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="rujuk" disabled @checked($data['data']->detail->rujuk != null)>
                                                            <label class="form-check-label" for="rujuk">
                                                              Rujuk, RS yang dituju:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="rujuk" value="{{ $data['data']->detail->rujuk }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="aps" disabled @checked($data['data']->detail->tanggal_pulang_paksa != null)>
                                                            <label class="form-check-label" for="aps">
                                                              Tanggal Pulang Paksa / APS:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="tanggal_pulang_paksa" value="{{ $data['data']->detail->tanggal_pulang_paksa }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="" id="meninggal" disabled @checked($data['data']->detail->meninggal != null)>
                                                            <label class="form-check-label" for="meninggal">
                                                              Meninggal:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="meninggal" value="{{ $data['data']->detail->meninggal }}" disabled>
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
                                                        <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->kondisi_saat_keluar }}" disabled>
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
                                                                        <td>{{ $item->icd->kode_diagnosa }} - {{ $item->icd->display }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
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
                                        <div class="card col-md-6">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                                    <div class="mb-3 mb-sm-0">
                                                        <div class="card-title">Rencana Kontrol</div>
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
                    <div class="card-footer">
                        <a href="#" class="btn btn-warning hidden" id="btnPrev" data-active="" type="button">Sebelumnya</a>
                        <a href="#" class="btn btn-primary" id="btnNext" data-active="1" type="button">Selanjutnya</a>
                        <a href="{{ route('print-pdf', $data['data']->id) }}" target="_blank" class="btn btn-success hidden" id="btnSubmit">Cetak</a>
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