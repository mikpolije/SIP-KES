@extends('layouts.master')

@section('title', 'SIP-Kes | Pendaftaran')
<style>
    body {
        background-color: #B4AEAE;
    }
</style>

<style>
    /* CSS untuk kelas danger */
    .danger {
        color: red;
    }
</style>

<style>
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #17a2b8;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: none;
        animation: slideIn 0.5s ease-out;
    }

    /* Animasi slide-in */
    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(0);
        }
    }
</style>

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 id="wizard-title" class="wizard-title">Pendaftaran</h1>
                <style>
                    .wizard-title {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 3rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        margin-bottom: 20px;
                    }
                </style>
                <form action="{{ route('poliumum.pemeriksaanAkhir.store', $pemeriksaan->id_pemeriksaan) }}" method="POST"
                    class="validation-wizard wizard-circle mt-5" enctype="multipart/form-data">
                    @csrf
                    <!-- Step 1 -->
                    <h6>Pendaftaran</h6>
                    <section>
                    </section>

                    <!-- Step 2 -->
                    <h6>Pemeriksaan Awal</h6>
                    <section>
                    </section>

                    <!-- Step 3 -->
                    <h6 class="fw-bold mt-4">Pemeriksaan</h6>
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="ti ti-circle-check fs-5"></i>
                            <div class="ms-3">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger d-flex align-items-start" role="alert">
                            <i class="ti ti-alert-circle fs-5 me-2"></i>
                            <div>
                                <strong>Terjadi kesalahan!</strong>
                                <ul class="mb-0 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <section>
                        <h4 class="section-title mb-3">Data Pemeriksaan</h4>
                        {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-warning me-2">Rujuk Rawat Inap</button>
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="suratKeteranganDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Surat Keterangan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="suratKeteranganDropdown">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalSehat">Surat Keterangan Sehat</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalSakit">Surat Keterangan Sakit</a></li>
                                        <li><a class="dropdown-item" href="#">General Consent</a></li>
                                        <li><a class="dropdown-item" href="#">Informed Consent</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Antrian - Identitas Pasien -->
                        <div class="card p-3 mb-3 shadow-sm">
                            <div class="row">
                                {{-- <div class="col-md-2">
                                    <label class="form-label" for="noantian">No Antrian</label>
                                    <input type="text" class="form-control" id="noantian" name="noantian">
                                </div> --}}
                                <input type="hidden" name="id_pendaftaran" value="{{ $pemeriksaan->id_pendaftaran }}">
                                <div class="col-md-4">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $pemeriksaan->pendaftaran->data_pasien->nama_pasien }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="no.rm">No. RM</label>
                                    <input type="text" class="form-control" id="no.rm" name="no_rm"
                                        value="{{ $pemeriksaan->pendaftaran->data_pasien->no_rm }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ date('d-m-Y', strtotime($pemeriksaan->tanggal_periksa_pasien)) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Diagnosis dan ICD 10 -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm h-100">
                                    <label class="form-label" for="diagnosis">Diagnosis</label>
                                    <textarea id="diagnosis" name="diagnosa" rows="5" class="form-control" placeholder="Ketik diagnosis"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm h-100">
                                    <label class="form-label" for="icd10">ICD 10</label>
                                    <div class="position-relative">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="icd10Search" name="id_icd10"
                                                placeholder="Ketik Kode atau Diagnosa" autocomplete="off">
                                        </div>
                                        <ul class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-sm z-50 hidden"
                                            id="icd10List">
                                        </ul>
                                        {{-- <input type="hidden" name="id_icd10_list[]" value=""> --}}
                                        <style>
                                            #icd10List li {
                                                cursor: pointer;
                                                padding: 10px 15px;
                                                transition: background 0.2s ease;
                                            }

                                            #icd10List li:hover {
                                                background-color: #f0f4f8;
                                                font-weight: 500;
                                            }

                                            #icd10List li span.code {
                                                font-weight: bold;
                                                color: #0d6efd;
                                            }

                                            #icd10List li span.display {
                                                color: #6c757d;
                                                font-size: 0.9em;
                                            }
                                        </style>
                                        <div id="selectedIcd10List" class="mb-2 flex flex-wrap gap-2"></div>
                                        <style>
                                            .badge {
                                                background-color: #0d6efd;
                                                color: white;
                                                padding: 6px 10px;
                                                border-radius: 20px;
                                            }

                                            .btn-close {
                                                background: transparent;
                                                border: none;
                                                color: white;
                                                margin-left: 5px;
                                                cursor: pointer;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Subjective dan Objective -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="subjective">Subjective</label>
                                    <textarea id="subjective" name="subjektif" rows="5" class="form-control" placeholder="Ketik Subjective"
                                        readonly>{{ $pemeriksaan->subjektif }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 shadow-sm">
                                <div class="card">
                                    <label class="form-label" for="objective">Objective</label>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Left Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sistole</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input"
                                                            id="sistole-mask" name="sistole" pattern="[0-9]*" readonly
                                                            inputmode="numeric" value="{{ $pemeriksaan->sistole }}">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Berat Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input"
                                                            id="berat-mask" name="bb_pasien" pattern="[0-9.,]*" readonly
                                                            inputmode="decimal" value="{{ $pemeriksaan->bb_pasien }}">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Suhu</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input"
                                                            id="suhu-mask" name="suhu-mask" pattern="[0-9.,]*" readonly
                                                            inputmode="decimal" value="{{ $pemeriksaan->suhu }}">
                                                        <span class="input-group-text">°C</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Respiratory Rate</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input" readonly
                                                            id="resprate-mask" pattern="[0-9]*" inputmode="numeric"
                                                            value="{{ $pemeriksaan->rr_pasien }}">
                                                        <span class="input-group-text">/mnt</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Diastole</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input" readonly
                                                            id="diastole-mask" pattern="[0-9]*" inputmode="numeric"
                                                            value="{{ $pemeriksaan->diastole }}">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tinggi Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input" readonly
                                                            id="tinggi-mask" pattern="[0-9.,]*" inputmode="decimal"
                                                            value="{{ $pemeriksaan->tb_pasien }}">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">SpO2</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input" readonly
                                                            id="spo2-mask" pattern="[0-9]*" inputmode="numeric"
                                                            value="{{ $pemeriksaan->spo2 }}">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Assessment dan Plan -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="assesment">Assessment</label>
                                    <textarea id="assesment" name="assesment" rows="5" class="form-control" placeholder="Ketik Assessment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="plan">Plan</label>
                                    <textarea id="plan" name="plan" rows="5" class="form-control" placeholder="Ketik Plan"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Pemeriksaan Fisik dan ICD 9 -->
                        <div class="row mb-3">
                            <!-- Pemeriksaan Fisik (Left Column) -->
                                <style>
                                    .custom-table {
                                        border-radius: 10px;
                                        overflow: hidden;
                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                                    }

                                    .custom-table th,
                                    .custom-table td {
                                        padding: 10px 14px;
                                        vertical-align: middle;
                                    }

                                    .custom-table .text-center {
                                        text-align: center;
                                    }

                                    .canvas-wrapper {
                                        border: 1px solid #ccc;
                                        display: inline-block;
                                    }

                                    .toolbar button {
                                        margin-right: 4px;
                                    }
                                </style>

                                <div class="col-md-6">
                                    <div class="card p-3 h-100">
                                        <!-- Header -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label class="form-label mb-0 fw-semibold" for="pemeriksaanfisik">Pemeriksaan Fisik</label>
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#statusLokalisModal">
                                                Tambah +
                                            </button>
                                        </div>

                                        <!-- Form Input -->
                                        <div class="mb-3">
                                            <input type="text" class="form-control mb-2" placeholder="Masukkan nama bagian" name="bagian_diperiksa" id="bagianDiperiksa">
                                            <textarea class="form-control" placeholder="Masukkan keterangan" name="keterangan" id="keteranganFisik" rows="4"></textarea>
                                        </div>

                                        <!-- Canvas + Toolbar -->
                                        <div class="text-center">
                                            <div class="toolbar mb-2">
                                                <button type="button" class="btn btn-outline-dark btn-sm" id="btnDrawToggle" onclick="toggleDrawMode()">✏️</button>
                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="undoCanvas()">↩️</button>
                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="redoCanvas()">↪️</button>
                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="clearCanvas()">❌</button>
                                            </div>

                                            <div class="canvas-wrapper">
                                                <canvas id="bodyCanvas" width="450" height="500"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm h-100">
                                    <label class="form-label" for="icd9Search">ICD 9 - CM</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control mb-2" id="icd9Search"
                                            placeholder="Ketik Kode atau Tindakan ICD 9" autocomplete="off">
                                        <ul class="position-absolute bg-white shadow w-100 rounded mt-1 list-unstyled d-none z-50"
                                            id="icd9List" style="max-height: 200px; overflow-y: auto;"></ul>
                                        <div id="selectedIcd9List" class="mt-3 d-flex flex-wrap gap-2"></div>

                                        <style>
                                            #icd9List li {
                                                cursor: pointer;
                                                padding: 10px 15px;
                                                transition: background 0.2s ease;
                                                border-bottom: 1px solid #ddd;
                                            }

                                            #icd9List li:hover {
                                                background-color: #f8f9fa;
                                            }

                                            #icd9List li .code {
                                                font-weight: bold;
                                                color: #0d6efd;
                                            }

                                            #icd9List li .display {
                                                font-size: 0.9em;
                                                color: #6c757d;
                                            }

                                            .badge-icd9 {
                                                background-color: #0d6efd;
                                                color: white;
                                                padding: 6px 10px;
                                                border-radius: 20px;
                                                display: inline-flex;
                                                align-items: center;
                                                font-size: 0.9em;
                                            }

                                            .remove-icd9 {
                                                margin-left: 8px;
                                                color: #fff;
                                                cursor: pointer;
                                                font-weight: bold;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal for Pemeriksaan Fisik Details -->
                        <!-- <div class="modal fade" id="physicalExamModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Rincian Pemeriksaan Fisik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="physicalExamModalBody">
                                        <div id="physicalExamDetails">
                                            //Detail content will be inserted here 
                                            <p><strong>Nama Pemeriksaan:</strong> Kepala</p>
                                            <p><strong>Keterangan:</strong> Kelainan pada pembuluh darah</p>
                                            <p><strong>Detail:</strong></p>
                                            <ul>
                                                <li>Jenis Kelainan: Varises pembuluh darah</li>
                                                <li>Tingkat Keparahan: Sedang</li>
                                                <li>Catatan Tambahan: Diperlukan pemeriksaan lanjutan dengan USG Doppler
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Layanan and Obat -->
                        <div class="row-container">
                            <div class="row mb-3 mt-4">
                                <div class="col-md-6">
                                    <div class="card p-3 shadow-sm h-100">
                                        <label class="form-label" for="layananSearch">Cari Layanan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control mb-2" id="layananSearch"
                                                placeholder="Ketik nama layanan atau tarif" autocomplete="off">
                                            <ul class="position-absolute bg-white shadow w-100 rounded mt-1 list-unstyled d-none z-50"
                                                id="layananList" style="max-height: 200px; overflow-y: auto;"></ul>
                                            <div id="selectedLayananList" class="mt-3 d-flex flex-wrap gap-2"></div>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    #layananList li {
                                        cursor: pointer;
                                        padding: 10px 15px;
                                        transition: background 0.2s ease;
                                        border-bottom: 1px solid #ddd;
                                    }

                                    #layananList li:hover {
                                        background-color: #f8f9fa;
                                    }

                                    #layananList li .nama {
                                        font-weight: bold;
                                        color: #0d6efd;
                                    }

                                    #layananList li .tarif {
                                        font-size: 0.9em;
                                        color: #6c757d;
                                    }

                                    .badge-layanan {
                                        background-color: #0d6efd;
                                        color: white;
                                        padding: 6px 10px;
                                        border-radius: 20px;
                                        display: inline-flex;
                                        align-items: center;
                                    }

                                    .remove-layanan {
                                        margin-left: 8px;
                                        color: #fff;
                                        cursor: pointer;
                                        font-weight: bold;
                                    }
                                </style>

                                <div class="col-md-6">
                                    <div class="card p-3 shadow-sm h-100">
                                        <label class="form-label" for="obatSearch">Cari Obat</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control mb-2" id="obatSearch"
                                                placeholder="Ketik nama obat atau harga" autocomplete="off">
                                            <ul class="position-absolute bg-white shadow w-100 rounded mt-1 list-unstyled d-none z-50"
                                                id="obatList" style="max-height: 200px; overflow-y: auto;"></ul>
                                            <div id="selectedObatList" class="mt-3 d-flex flex-wrap gap-2"></div>
                                            <style>
                                                #obatList li {
                                                    cursor: pointer;
                                                    padding: 10px 15px;
                                                    transition: background 0.2s ease;
                                                    border-bottom: 1px solid #ddd;
                                                }

                                                #obatList li:hover {
                                                    background-color: #f8f9fa;
                                                }

                                                #obatList li .nama {
                                                    font-weight: bold;
                                                    color: #0d6efd;
                                                }

                                                #obatList li .harga {
                                                    font-size: 0.9em;
                                                    color: #6c757d;
                                                }

                                                .badge-obat {
                                                    background-color: #0d6efd;
                                                    color: white;
                                                    padding: 6px 10px;
                                                    border-radius: 20px;
                                                    display: inline-flex;
                                                    align-items: center;
                                                }

                                                .badge-obat input[type="number"] {
                                                    width: 60px;
                                                    margin: 0 5px;
                                                    border-radius: 5px;
                                                    border: none;
                                                    padding: 2px 6px;
                                                    font-size: 0.9em;
                                                }

                                                .remove-obat {
                                                    margin-left: 8px;
                                                    color: #fff;
                                                    cursor: pointer;
                                                    font-weight: bold;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Rencana Kontrol dan Catatan -->
                        <div class="row-container">
                            <div class="row mb-3 mt-4">
                                <div class="col-md-6 d-flex flex-column">
                                    <div class="card p-3 flex-fill h-100 w-100">
                                        <label class="form-label fw-bold">Rencana Kontrol</label>
                                        <div class="input-group mb-2">
                                            <input type="date" class="form-control" name="rencana_kontrol">
                                            <input type="text" class="form-control" placeholder="Alasan Kontrol"
                                                name="alasan_kontrol">
                                            {{-- <button type="button"
                                                    class="btn btn-sm btn-secondary d-flex align-items-center">Tambah
                                                    +</button> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 flex-fill h-100">
                                    <div class="card p-3 h-100">
                                        <label class="form-label fw-bold">Catatan</label>
                                        <textarea class="form-control" name="catatan_obat" rows="5" placeholder="Tambah catatan di sini"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary d-flex align-items-center justify-content-center w-100"
                            type="submit">
                            Simpan
                        </button>
                    </section>

                    <!-- Step 4 -->
                    <h6>Farmasi</h6>
                    <section>
                    </section>

                    <!-- Step 5 -->
                    <h6>Pembayaran</h6>
                    <section>
                    </section>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pemeriksaan Fisik dengan Canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
    {{-- <div class="modal fade" id="statusLokalisModal" tabindex="-1" aria-labelledby="statusLokalisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="statusLokalisModalLabel">Pemeriksaan Fisik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action=""></form>
                <div class="modal-body">
                    <div class="row">
                        <!-- CANVAS -->
                        <div class="col-md-7 text-center">
                            <!-- Toolbar -->
                            <div class="mb-2">
                                <button type="button" class="btn btn-outline-dark btn-sm" id="btnDrawToggle"
                                    onclick="toggleDrawMode()">
                                    ✏️
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="undoCanvas()">
                                    ↩️
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="redoCanvas()">
                                    ↪️
                                </button>
                                <button type="button "class="btn btn-outline-dark btn-sm" onclick="clearCanvas()">
                                    ❌
                                </button>

                                <!-- Canvas -->
                                <div style="border: 1px solid #ccc; display: inline-block;">
                                    <canvas id="bodyCanvas" width="500" height="500"></canvas>
                                </div>
                            </div>

                            <!-- Form Input -->
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Bagian yang Diperiksa</label>
                                    <input type="text" class="form-control" id="bagianDiperiksa"
                                        name="bagian_diperiksa" placeholder="Ketik di sini">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keteranganFisik" rows="5" placeholder="Ketik di sini"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol "Simpan" -->
                    <div class="container mt-5 text-center">
                        <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
                    </div>

                    <!-- Elemen Notifikasi -->
                    <div class="notification" id="notification">
                        <i class="bi bi-info-circle"></i>
                        <strong>Data Pasien Tersimpan ke Antrian</strong>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .input-with-unit {
                display: flex;
                align-items: center;
                gap: 10px;
                /* jarak antara input dan unit */
            }

            .input-with-unit .form-control {
                flex: 1;
                /* agar input mengambil ruang yang tersisa */
                width: 100%;
                /* pastikan input penuh di dalam kotak */
                max-width: 200px;
                /* ubah sesuai kebutuhan tampilan */
            }

            .unit-label {
                white-space: nowrap;
                font-size: 0.95rem;
                color: #666;
            }
        </style>

        <style>
            /* Styling khusus untuk modal Surat Keterangan Sehat */
            #modalSehat .modal-content {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
                border: none;
            }

            #modalSehat .modal-header {
                border-bottom: none;
            }

            #modalSehat .modal-title {
                font-size: 32px;
                font-weight: 800;
                color: #0a0f5c;
                /* Biru tua */
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            }

            #modalSehat label.form-label {
                font-weight: 600;
            }

            #modalSehat input.form-control,
            #modalSehat select.form-select,
            #modalSehat textarea.form-control {
                border-radius: 10px;
                background-color: #f9f9f9;
                border: 1px solid #dcdcdc;
            }

            #modalSehat input::placeholder,
            #modalSehat textarea::placeholder {
                color: #c0c0c0;
                font-style: italic;
            }

            #modalSehat .btn-primary {
                background-color: #2959f7;
                font-weight: 600;
                font-size: 16px;
                padding: 10px 0;
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(41, 89, 247, 0.4);
                border: none;
            }

            #modalSehat .btn-primary:hover {
                background-color: #1834a7;
            }

            #modalSehat .btn-close {
                font-size: 1.2rem;
            }

            /* Responsive kecil: padding lebih kecil */
            @media (max-width: 576px) {
                #modalSehat .modal-content {
                    padding: 20px;
                }

                #modalSehat .modal-title {
                    font-size: 26px;
                }
            }

            /* Tambahkan ke stylesheet Anda */
            #signature-pad {
                touch-action: none;
                /* Penting untuk perangkat touch */
                cursor: crosshair;
            }

            .signature-instruction {
                position: absolute;
                bottom: 5px;
                left: 10px;
                color: #6c757d;
                font-size: 0.8rem;
            }

            .icd-item:hover {
                background-color: #B3B9F9;
            }

            #selected-icds-icd10 {
                max-height: 200px;
                overflow-y: auto;
            }

            .table thead th {
                background-color: #B3B9F9 !important;
            }

            .table thead th {
                color: #000000;
            }

            .table tbody td {
                vertical-align: middle;
            }

            .table {
                margin-bottom: 0;
                border-color: #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }

            .table tbody tr:hover {
                background-color: rgba(179, 185, 249, 0.1);
            }

            .view-details {
                padding: 0.25rem 0.5rem;
            }
        </style>

        <style>
            /* Styling khusus untuk modal Surat Keterangan Sakit */
            #modalSakit .modal-content {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
                border: none;
            }

            #modalSakit .modal-header {
                border-bottom: none;
            }

            #modalSakit .modal-title {
                font-size: 32px;
                font-weight: 800;
                color: #0a0f5c;
                /* Biru tua */
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            }

            #modalSakit label.form-label {
                font-weight: 600;
            }

            #modalSakit input.form-control,
            #modalSakit select.form-select,
            #modalSakit textarea.form-control {
                border-radius: 10px;
                background-color: #f9f9f9;
                border: 1px solid #dcdcdc;
            }

            #modalSakit input::placeholder,
            #modalSakit textarea::placeholder {
                color: #c0c0c0;
                font-style: italic;
            }

            #modalSakit .btn-primary {
                background-color: #2959f7;
                font-weight: 600;
                font-size: 16px;
                padding: 10px 0;
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(41, 89, 247, 0.4);
                border: none;
            }

            #modalSakit .btn-primary:hover {
                background-color: #1834a7;
            }

            #modalSakit .btn-close {
                font-size: 1.2rem;
            }

            /* Responsive kecil: padding lebih kecil */
            @media (max-width: 576px) {
                #modalSakit .modal-content {
                    padding: 20px;
                }

                #modalSakit .modal-title {
                    font-size: 26px;
                }
            }

            /* Tambahkan ke stylesheet Anda */
            #signature-pad-sakit {
                touch-action: none;
                /* Penting untuk perangkat touch */
                cursor: crosshair;
            }

            .signature-instruction {
                position: absolute;
                bottom: 5px;
                left: 10px;
                color: #6c757d;
                font-size: 0.8rem;
            }
        </style>
    </div> --}}
@endsection
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
    <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>

    {{-- ICD-9 --}}
    <script>
        $(document).ready(function() {
            let selectedICD9Ids = new Set();

            $('#icd9Search').on('keyup', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('search.icd9') }}",
                        type: "GET",
                        data: {
                            term: query
                        },
                        success: function(data) {
                            let dropdown = $('#icd9List');
                            dropdown.empty();

                            if (data.length > 0) {
                                data.forEach(item => {
                                    dropdown.append(`
                                    <li data-id="${item.id}" data-kode="${item.code}" data-diagnosa="${item.display}">
                                        <span class="code">${item.code}</span><br>
                                        <span class="display">${item.display}</span>
                                    </li>
                                `);
                                });
                                dropdown.removeClass('d-none');
                            } else {
                                dropdown.html(
                                        '<li class="text-muted px-3 py-2">Tidak ditemukan</li>')
                                    .removeClass('d-none');
                            }
                        }
                    });
                } else {
                    $('#icd9List').addClass('d-none');
                }
            });

            // Klik ICD-9
            $(document).on('click', '#icd9List li', function() {
                let id = $(this).data('id');
                let code = $(this).data('kode');
                let diagnosa = $(this).data('diagnosa');

                if (selectedICD9Ids.has(id)) {
                    $('#icd9Search').val('');
                    $('#icd9List').addClass('d-none');
                    return;
                }

                selectedICD9Ids.add(id);

                $('#selectedIcd9List').append(`
                <span class="badge-icd9 me-2 mb-2" data-id="${id}">
                    ${code} - ${diagnosa}
                    <span class="remove-icd9">&times;</span>
                    <input type="hidden" name="id_icd9_list[]" value="${id}">
                </span>
            `);

                $('#icd9Search').val('');
                $('#icd9List').addClass('d-none');
            });

            // Hapus ICD-9
            $(document).on('click', '.remove-icd9', function() {
                let parent = $(this).closest('span[data-id]');
                let id = parent.data('id');
                selectedICD9Ids.delete(id);
                parent.remove();
            });

            // Tutup dropdown saat klik di luar
            $(document).click(function(e) {
                if (!$(e.target).closest('#icd9Search, #icd9List').length) {
                    $('#icd9List').addClass('d-none');
                }
            });
        });
    </script>

    {{-- ICD-10 --}}
    <script>
        $(document).ready(function() {
            $('#icd10Search').on('keyup', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('search.icd10') }}",
                        type: "GET",
                        data: {
                            term: query
                        },
                        success: function(data) {
                            let dropdown = $('#icd10List');
                            dropdown.empty();

                            if (data.length > 0) {
                                data.forEach(item => {
                                    $('#icd10List').append(`
                                            <li class="hover:bg-gray-100 px-4 py-2 cursor-pointer border-b" data-id="${item.id}" data-kode="${item.code}" data-diagnosa="${item.display}">
                                                <span class="code">${item.code}</span><br>
                                                <span class="display">${item.display}</span>
                                            </li>
                                        `);
                                });

                                $('#icd10List li').on('click', function() {
                                    console.log($(this).data('id'));
                                });
                            } else {
                                dropdown.append(
                                    '<li class="list-group-item text-muted">Tidak ditemukan</li>'
                                );
                            }
                            dropdown.show();
                        }
                    });
                } else {
                    $('#icd10List').hide();
                }
            });

            // Klik salah satu pilihan
            $(document).on('click', '#icd10List li', function() {
                let selectedText = $(this).data('code') + ' - ' + $(this).data('display');
                $('#icd10Search').val(selectedText);
                $('#icd10List').hide();
            });

            // Klik di luar dropdown untuk menutup
            $(document).click(function(e) {
                if (!$(e.target).closest('#icd10Search, #icd10List').length) {
                    $('#icd10List').hide();
                }
            });

            // value icd 10
            let selectedICDIds = new Set(); // untuk mencegah duplikat
            $(document).on('click', '#icd10List li', function() {
                let code = $(this).data('kode');
                let diagnosa = $(this).data('diagnosa');
                let id = $(this).data('id');

                // Cek duplikat
                if (selectedICDIds.has(id)) {
                    $('#icd10Search').val('');
                    $('#icd10List').addClass('hidden');
                    return;
                }

                selectedICDIds.add(id);

                // Tambahkan badge/tag
                $('#selectedIcd10List').append(`
                        <span class="badge d-inline-flex align-items-center me-2 mb-2" data-id="${id}">
                            ${code} - ${diagnosa}
                            <span class="ms-2 remove-icd" style="cursor:pointer;">&times;</span>
                            <input type="hidden" name="id_icd10_list[]" value="${id}">
                        </span>
                    `);

                // Bersihkan input dan sembunyikan dropdown
                $('#icd10Search').val('');
                $('#icd10List').addClass('hidden');
            });

            $(document).on('click', '.remove-icd', function() {
                let parent = $(this).closest('span[data-id]');
                let id = parent.data('id');

                selectedICDIds.delete(id);
                parent.remove();
            });

        });
    </script>

    {{-- Seacrh layanan --}}
    <script>
        $(document).ready(function() {
            let selectedLayananIds = new Set();

            $('#layananSearch').on('keyup', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('search.layanan') }}",
                        type: "GET",
                        data: {
                            term: query
                        },
                        success: function(data) {
                            let dropdown = $('#layananList');
                            dropdown.empty();

                            if (data.length > 0) {
                                data.forEach(item => {
                                    dropdown.append(`
                                    <li data-id="${item.id}" data-nama="${item.nama_layanan}" data-tarif="${item.tarif_layanan}" data-stok="${item.stok}">
                                        <span class="nama">${item.nama_layanan}</span><br>
                                        <span class="tarif">Rp${item.tarif_layanan}.00</span>
                                    </li>
                                `);
                                });
                                dropdown.removeClass('d-none');
                            } else {
                                dropdown.html(
                                        '<li class="text-muted px-3 py-2">Tidak ditemukan</li>')
                                    .removeClass('d-none');
                            }
                        }
                    });
                } else {
                    $('#layananList').addClass('d-none');
                }
            });

            $(document).on('click', '#layananList li', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let tarif = $(this).data('tarif');

                if (selectedLayananIds.has(id)) {
                    $('#layananSearch').val('');
                    $('#layananList').addClass('d-none');
                    return;
                }

                selectedLayananIds.add(id);

                $('#selectedLayananList').append(`
                <span class="badge-layanan me-2 mb-2" data-id="${id}">
                    ${nama} - Rp${tarif}.00
                    <span class="remove-layanan">&times;</span>
                    <input type="hidden" name="id_layanan_list[]" value="${id}">
                </span>
            `);

                $('#layananSearch').val('');
                $('#layananList').addClass('d-none');
            });

            $(document).on('click', '.remove-layanan', function() {
                let parent = $(this).closest('span[data-id]');
                let id = parent.data('id');
                selectedLayananIds.delete(id);
                parent.remove();
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#layananSearch, #layananList').length) {
                    $('#layananList').addClass('d-none');
                }
            });
        });
    </script>

    {{-- Search Obat --}}
    <script>
        $(document).ready(function() {
            let selectedObatIds = new Set();

            $('#obatSearch').on('keyup', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('search.obat') }}",
                        type: "GET",
                        data: {
                            term: query
                        },
                        success: function(data) {
                            let dropdown = $('#obatList');
                            dropdown.empty();

                            if (data.length > 0) {
                                data.forEach(item => {
                                    dropdown.append(`
                                    <li data-id="${item.id_obat}" data-nama="${item.nama}" data-harga="${item.harga}">
                                        <span class="nama">${item.nama}</span> -
                                        <span class="nama">stok: ${item.stok}</span>
                                        <br>
                                        <span class="harga">Rp${item.harga}</span>
                                    </li>
                                `);
                                });
                                dropdown.removeClass('d-none');
                            } else {
                                dropdown.html(
                                        '<li class="text-muted px-3 py-2">Tidak ditemukan</li>')
                                    .removeClass('d-none');
                            }
                        }
                    });
                } else {
                    $('#obatList').addClass('d-none');
                }
            });

            // Klik obat
            $(document).on('click', '#obatList li', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let harga = $(this).data('harga');

                if (selectedObatIds.has(id)) {
                    $('#obatSearch').val('');
                    $('#obatList').addClass('d-none');
                    return;
                }

                selectedObatIds.add(id);

                $('#selectedObatList').append(`
                <span class="badge-obat me-2 mb-2" data-id="${id}">
                    ${nama} - Rp${harga}
                    <input type="number" name="qty_obat_list[]" value="1" min="1" required>
                    <span class="remove-obat">&times;</span>
                    <input type="hidden" name="id_obat_list[]" value="${id}">
                </span>
            `);

                $('#obatSearch').val('');
                $('#obatList').addClass('d-none');
            });

            // Hapus badge
            $(document).on('click', '.remove-obat', function() {
                let parent = $(this).closest('span[data-id]');
                let id = parent.data('id');
                selectedObatIds.delete(id);
                parent.remove();
            });

            // Tutup dropdown saat klik di luar
            $(document).click(function(e) {
                if (!$(e.target).closest('#obatSearch, #obatList').length) {
                    $('#obatList').addClass('d-none');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi canvas ketika modal ditampilkan
            $('#modalSehat').on('shown.bs.modal', function() {
                initSignaturePad('signature-pad', 'clear-signature');
            });
            // Untuk modal surat sakit
            $('#modalSakit').on('shown.bs.modal', function() {
                initSignaturePad('signature-pad-sakit', 'clear-signature-sakit');
            });

            function initSignaturePad(canvasId, clearButtonId) {
                const canvas = document.getElementById(canvasId);
                const ctx = canvas.getContext('2d');

                // Atur ukuran canvas yang tepat
                function resizeCanvas() {
                    const container = canvas.parentElement;
                    canvas.width = container.offsetWidth;
                    canvas.height = container.offsetHeight;
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.strokeStyle = '#000000';
                }

                resizeCanvas();

                // Variabel untuk tracking
                let isDrawing = false;
                let lastX = 0;
                let lastY = 0;

                // Fungsi untuk mendapatkan posisi mouse/touch
                function getPosition(e) {
                    let posX, posY;
                    if (e.type.includes('touch')) {
                        const touch = e.touches[0] || e.changedTouches[0];
                        const rect = canvas.getBoundingClientRect();
                        posX = touch.clientX - rect.left;
                        posY = touch.clientY - rect.top;
                    } else {
                        const rect = canvas.getBoundingClientRect();
                        posX = e.clientX - rect.left;
                        posY = e.clientY - rect.top;
                    }
                    return {
                        x: posX,
                        y: posY
                    };
                }

                // Event listeners untuk mouse
                canvas.addEventListener('mousedown', (e) => {
                    const pos = getPosition(e);
                    isDrawing = true;
                    [lastX, lastY] = [pos.x, pos.y];
                    e.preventDefault();
                });

                canvas.addEventListener('mousemove', (e) => {
                    if (!isDrawing) return;
                    const pos = getPosition(e);
                    draw(pos.x, pos.y);
                    e.preventDefault();
                });

                canvas.addEventListener('mouseup', () => {
                    isDrawing = false;
                });

                canvas.addEventListener('mouseout', () => {
                    isDrawing = false;
                });

                // Event listeners untuk touch
                canvas.addEventListener('touchstart', (e) => {
                    const pos = getPosition(e);
                    isDrawing = true;
                    [lastX, lastY] = [pos.x, pos.y];
                    e.preventDefault();
                });

                canvas.addEventListener('touchmove', (e) => {
                    if (!isDrawing) return;
                    const pos = getPosition(e);
                    draw(pos.x, pos.y);
                    e.preventDefault();
                });

                canvas.addEventListener('touchend', () => {
                    isDrawing = false;
                });

                // Fungsi menggambar
                function draw(x, y) {
                    ctx.beginPath();
                    ctx.moveTo(lastX, lastY);
                    ctx.lineTo(x, y);
                    ctx.stroke();
                    [lastX, lastY] = [x, y];
                }

                // Tombol hapus
                document.getElementById('clear-signature').addEventListener('click', () => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                });

                // Handle resize window
                window.addEventListener('resize', () => {
                    resizeCanvas();
                });
            }
        });
    </script>

    <script>
        // Add delete functionality
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.closest('tr').remove();
            });
        });

        // Add search functionality (example)
        document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
            const searchTerm = document.getElementById('icd10Search').value;
            // Here you would typically call an API to search ICD-10 codes
            console.log('Searching for:', searchTerm);
        });
    </script>

    <script>
        // Add click event for view details button
        document.querySelector('.view-details').addEventListener('click', function() {
            // Set modal content based on the row data
            const modalContent = `
                <p><strong>Nama:</strong> Kepala</p>
                <p><strong>Keterangan:</strong> Kelainan pada pembuluh darah</p>
                <p><strong>Detail Tambahan:</strong></p>
                <ul>
                    <li>Jenis Kelainan: Varises pembuluh darah</li>
                    <li>Tingkat Keparahan: Sedang</li>
                    <li>Tanggal Pemeriksaan: 15-06-2023</li>
                </ul>
            `;

            document.getElementById('modalBodyContent').innerHTML = modalContent;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daftar judul per step
            const titles = [
                'Pendaftaran', // Step 1
                'Pemeriksaan Awal', // Step 2
                'Pemeriksaan Poli Umum', // Step 3
                'Farmasi', // Step 4
                'Pembayaran' // Step 5
            ];

            const titleElement = document.getElementById('wizard-title');
            const wizard = document.querySelector('.validation-wizard');

            if (wizard) {
                $(wizard).on('stepChanged', function(event, currentIndex) {
                    titleElement.innerText = titles[currentIndex] || 'Pendaftaran Rawat Jalan';
                });
            }
        });
    </script>

    <script>
        // Function to validate NIK (16 digits)
        function validateNIK(input) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length
            if (value.length > 16) {
                value = value.slice(0, 16);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const errorElement = document.getElementById('nik-error');
            if (value.length > 0 && value.length !== 16) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        }

        // Function to validate numeric inputs with specific length
        function validateNumeric(input, maxLength) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length if specified
            if (maxLength && value.length > maxLength) {
                value = value.slice(0, maxLength);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && maxLength && value.length !== maxLength) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }

        // Function to validate phone numbers (10-13 digits)
        function validateTelepon(input) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length
            if (value.length > 13) {
                value = value.slice(0, 13);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && (value.length < 10 || value.length > 13)) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }

        // Fix for input type="number" with maxlength attribute (since maxlength doesn't work on number inputs)
        document.addEventListener('DOMContentLoaded', function() {
            // Apply to all numeric inputs
            const numericInputs = document.querySelectorAll('input[type="number"]');
            numericInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    const maxLength = this.getAttribute('maxlength');
                    if (maxLength && this.value.length > maxLength) {
                        this.value = this.value.slice(0, maxLength);
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to process decimal input (accepts both . and , as decimal separators)
            function processDecimalInput(input, value) {
                // Replace comma with dot for consistency
                let newValue = value.replace(/,/g, '.');

                // Remove any characters that aren't numbers or dots
                newValue = newValue.replace(/[^0-9.]/g, '');

                // Ensure only one decimal point
                const parts = newValue.split('.');
                if (parts.length > 2) {
                    newValue = parts[0] + '.' + parts.slice(1).join('');
                }

                // If starts with dot, add 0 before
                if (newValue.startsWith('.')) {
                    newValue = '0' + newValue;
                }

                return newValue;
            }

            // Number inputs (whole numbers only)
            const numberInputs = document.querySelectorAll('.number-input');
            numberInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });

                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text/plain');
                    const numbers = pasteData.replace(/[^0-9]/g, '');
                    document.execCommand('insertText', false, numbers);
                });
            });

            // Decimal inputs (accepts numbers and decimal points)
            const decimalInputs = document.querySelectorAll('.decimal-input');
            decimalInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = processDecimalInput(this, this.value);
                });

                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text/plain');
                    const processedValue = processDecimalInput(this, pasteData);
                    document.execCommand('insertText', false, processedValue);
                });

                // Remove trailing decimal point when losing focus
                input.addEventListener('blur', function() {
                    if (this.value.endsWith('.')) {
                        this.value = this.value.slice(0, -1);
                    }
                });
            });
        });
    </script>

    <script>
        function validateNumeric(input, maxLength) {
            // Hapus karakter non-angka
            let value = input.value.replace(/\D/g, '');

            // Batasi panjang maksimal jika ditentukan
            if (maxLength && value.length > maxLength) {
                value = value.slice(0, maxLength);
            }

            // Update nilai input
            input.value = value;

            // Tampilkan atau sembunyikan pesan error
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && maxLength && value.length !== maxLength) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons @1.10.5/font/bootstrap-icons.min.js"></script>

    <script>
        // Fungsi untuk menampilkan notifikasi
        function showNotification() {
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Sembunyikan notifikasi setelah 3 detik
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }

        // Event listener untuk tombol "Simpan"
        document.getElementById('saveButton').addEventListener('click', () => {
            console.log('Data pasien berhasil disimpan.');
            showNotification();
        });
    </script>

    <!-- Script untuk menggambar di canvas -->
    <script>
        const canvas = document.getElementById('bodyCanvas');
        const ctx = canvas.getContext('2d');
        const image = new Image();
        let isDrawing = false;
        let drawEnabled = false;
        let initialized = false;
        let undoStack = [];
        let redoStack = [];
        let currentColor = 'red'; // Warna default

        function toggleDrawMode() {
            drawEnabled = !drawEnabled;
            const button = document.getElementById('btnDrawToggle');
            if (drawEnabled) {
                button.classList.add('active');
                button.innerHTML = '🛑'; // misalnya ganti ikon saat aktif
            } else {
                button.classList.remove('active');
                button.innerHTML = '✏️'; // ikon default
            }
        }

        function undoCanvas() {
            if (undoStack.length > 0) {
                const lastState = undoStack.pop();
                redoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height)); // simpan state saat ini ke redo
                ctx.putImageData(lastState, 0, 0);
            }
        }

        function redoCanvas() {
            if (redoStack.length > 0) {
                const nextState = redoStack.pop();
                undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height)); // simpan state saat ini ke undo
                ctx.putImageData(nextState, 0, 0);
            }
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height); // redraw the body image
        }

        function saveCanvas() {
            if (event) event.preventDefault(); // penting agar tidak reload

            const imageData = canvas.toDataURL();
            console.log("Saved image data:", imageData);
            alert("Gambar disimpan!");
            // Kirim imageData via AJAX atau simpan sesuai kebutuhan
        }

        canvas.addEventListener('mousedown', (e) => {
            if (!drawEnabled) return;
            isDrawing = true;
            // Simpan state sebelum menggambar
            undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
            // Kosongkan redoStack karena ada aksi baru
            redoStack = [];
            ctx.strokeStyle = currentColor;
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (!isDrawing || !drawEnabled) return;
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
        });

        canvas.addEventListener('mouseup', () => {
            if (!drawEnabled) return;
            isDrawing = false;
        });

        // Load gambar saat modal dibuka pertama kali
        $('#statusLokalisModal').on('shown.bs.modal', function() {
            if (!initialized) {
                image.onload = function() {
                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                };
                image.src =
                    '/assets/images/Anatomi.jpg'; // Ganti path sesuai lokasi file gambar Anda
                initialized = true;
            } else {
                // setiap buka ulang, redraw image (jika dibutuhkan)
                clearCanvas();
            }
        });

        function editPemeriksaan(bagian, keterangan, imageDataUrl = null) {
            document.getElementById('bagianDiperiksa').value = bagian;
            document.getElementById('keteranganFisik').value = keterangan;

            const modal = new bootstrap.Modal(document.getElementById('statusLokalisModal'));
            modal.show();

            $('#statusLokalisModal').off('shown.bs.modal').on('shown.bs.modal', function() {
                const ctx = canvas.getContext('2d');
                const background = new Image();
                background.onload = () => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(background, 0, 0, canvas.width, canvas.height);

                    if (imageDataUrl) {
                        const overlay = new Image();
                        overlay.onload = () => {
                            ctx.drawImage(overlay, 0, 0, canvas.width, canvas.height);
                        };
                        overlay.src = imageDataUrl;
                    }
                };
                background.src = '/assets/images/Anatomi.jpg';
            });
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const previousBtn = document.querySelector('a[href="#previous"]');
            if (previousBtn) {
                previousBtn.textContent = "Sebelumnya";
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nextBtn = document.querySelector('a[href="#next"]');
            if (nextBtn) {
                nextBtn.textContent = "Simpan";
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi dropdown menggunakan Bootstrap
            const dropdownElement = document.getElementById('suratKeteranganDropdown');
            if (dropdownElement) {
                const dropdown = new bootstrap.Dropdown(dropdownElement);
            }

            // Event listener untuk item dropdown
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const targetModal = this.getAttribute('data-bs-target');
                    if (targetModal) {
                        const modal = new bootstrap.Modal(document.querySelector(targetModal));
                        modal.show();
                    }
                });
            });
        });
    </script>

@endsection
