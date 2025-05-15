@extends('layouts.master')

@section('title', 'SIP-Kes | Poli Umum')
<style>
    body {
        background-color: #B4AEAE;
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
                <form action="#" class="validation-wizard wizard-circle mt-5">
                    <!-- Step 1 -->
                    <h6>Pendaftaran</h6>
                    <section>
                        <h5 class="section-title">Data Identitas Pasien</h5>
                        <style>
                            .section-title {
                                font-family: 'Poppins', sans-serif;
                                font-size: 2rem;
                                font-weight: bold;
                                text-align: left;
                                color: #1A1A1A;
                                padding: 9px 0;
                            }

                            /* Added style for error message */
                            .error-message {
                                color: red;
                                font-size: 0.8rem;
                                display: none;
                            }
                        </style>

                        <div class="row mb-4 align-items-end">
                            <div class="col-md-10">
                                <label for="searchNoRM" class="form-label">Cari Data Pasien</label>
                                <input class="form-control" list="noRMList" id="searchNoRM" placeholder="Cari Data Pasien">
                                <datalist id="noRMList">
                                    <option value="RM001 - Budi">
                                    <option value="RM002 - Siti">
                                    <option value="RM003 - Agus">
                                </datalist>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100">Cari</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="norm"> No RM : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="norm" name="norm"
                                        placeholder="Masukkan No. RM" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="alamatlengkap"> Alamat Lengkap : <span
                                            class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="alamatlengkap"
                                        name="alamatlengkap" placeholder="Nama Jalan/Blok/Nomor Rumah" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Lengkap: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="nama" name="nama"
                                        placeholder="Masukkan Nama" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="provinsi">Provinsi: <span class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="provinsi" name="provinsi" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="kota">Kota/Kabupaten: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="kota" name="kota" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nik">NIK: <span class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="nik" name="nik"
                                        placeholder="16 digit" oninput="validateNIK(this)" maxlength="16" />
                                    <small class="error-message" id="nik-error">NIK harus berupa 16 digit angka</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="kecamatan">Kecamatan: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="kecamatan" name="kecamatan" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="kelurahan">Kelurahan/Desa: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="kelurahan"
                                        name="kelurahan" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="tempatlahir">Tempat Lahir: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="tempatlahir"
                                        name="tempatlahir" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="kodepos">Kode Pos: <span
                                            class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="kodepos" name="kodepos"
                                        oninput="validateNumeric(this, 5)" maxlength="5" />
                                    <small class="error-message" id="kodepos-error">Kode Pos harus berupa 5 digit
                                        angka</small>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label" for="rt">RT: <span class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="rt" name="rt"
                                        oninput="validateNumeric(this, 3)" maxlength="3" />
                                    <small class="error-message" id="rt-error">RT harus berupa angka</small>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label" for="rw">RW: <span class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="rw" name="rw"
                                        oninput="validateNumeric(this, 3)" maxlength="3" />
                                    <small class="error-message" id="rw-error">RW harus berupa angka</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggallahir">Tanggal Lahir: <span
                                            class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tanggallahir"
                                        name="tanggallahir" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="jeniskelamin">Jenis Kelamin: <span
                                            class="danger">*</span>
                                    </label>
                                    <select class="form-select required" id="jeniskelamin" name="jeniskelamin">
                                        <option value="tidakdiketahui">Tidak Diketahui</option>
                                        <option value="lakilaki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                        <option value="tidakdapatditentukan">Tidak dapat ditentukan</option>
                                        <option value="tidakmengisi">Tidak mengisi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="agama">Agama: <span class="danger">*</span></label>
                                    <select class="form-select required" id="agama" name="agama">
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen (Protestan)</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghucu">Konghucu</option>
                                        <option value="penghayat">Penghayat</option>
                                        <option value="lainlain">Lain-Lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="perkawinan">Status Perkawinan: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="perkawinan" name="perkawinan">
                                        <option value="belumkawin">Belum Kawin</option>
                                        <option value="kawin">Kawin</option>
                                        <option value="ceraihidup">Cerai Hidup</option>
                                        <option value="ceraimati">Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="pendidikan">Pendidikan: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="pendidikan" name="pendidikan">
                                        <option value="tidaksekolah">Tidak Sekolah</option>
                                        <option value="sd">SD</option>
                                        <option value="sltpsederajat">SLTP Sederajat</option>
                                        <option value="sltasederajat">SLTA Sederajat</option>
                                        <option value="d1d3">D1-D3 Sederajat</option>
                                        <option value="d4">D4</option>
                                        <option value="s1">S1</option>
                                        <option value="s2">S2</option>
                                        <option value="s3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="pekerjaan">Pekerjaan: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="pekerjaan" name="pekerjaan">
                                        <option value="tidakbekerja">Tidak bekerja</option>
                                        <option value="pns">PNS</option>
                                        <option value="tnipolri">TNI/Polri</option>
                                        <option value="bumn">BUMN</option>
                                        <option value="pegawaiswasta">Pegawai Swasta/Wirausaha</option>
                                        <option value="lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="kewarganegaraan">Kewarganegaraan: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="kewarganegaraan" name="kewarganegaraan">
                                        <option value="wni">WNI</option>
                                        <option value="wna">WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="telepon">Nomor Telepon: <span
                                            class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="telepon" name="telepon"
                                        placeholder="08xxxxxxxxxx" oninput="validateTelepon(this)" maxlength="13"
                                        required>
                                    <small class="error-message" id="telepon-error">Nomor telepon harus berupa 10-13 digit
                                        angka</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="ibukandung">Nama Ibu Kandung: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="ibukandung"
                                        name="ibukandung" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="goldar">Golongan Darah: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="goldar" name="goldar">
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="ab">AB</option>
                                        <option value="o">O</option>
                                        <option value="tidakdiketahui">Tidak Diketahui</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h4 class="section-title">Identitas Wali</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="hubungan">Hubungan dengan Pasien: <span
                                            class="danger">*</span></label>
                                    <select class="form-select required" id="hubungan" name="hubungan">
                                        <option value="dirisendiri">Diri Sendiri</option>
                                        <option value="ortu">Orang Tua</option>
                                        <option value="anak">Anak</option>
                                        <option value="suamiistri">Suami/Istri</option>
                                        <option value="kerabat">Kerabat/Saudara</option>
                                        <option value="lainlain">Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="namawali">Nama Wali: <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="namawali"
                                        name="namawali" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="tlwali">Tanggal Lahir Wali: <span
                                            class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tlwali" name="tlwali" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="notelpwali">Nomor Telepon Wali: <span
                                            class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="notelpwali"
                                        name="notelpwali" placeholder="08xxxxxxxxxx" oninput="validateTelepon(this)"
                                        maxlength="13" required>
                                    <small class="error-message" id="notelpwali-error">Nomor telepon wali harus berupa
                                        10-13 digit angka</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="alamatwali">Alamat Wali <span
                                            class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="alamatwali"
                                        name="alamatwali" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="layanan">Layanan <span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="layanan" name="layanan">
                                            <option value="poliumum">Poli Umum</option>
                                            <option value="poligigi">Poli Gigi</option>
                                            <option value="kia">KIA</option>
                                            <option value="circum">Circum</option>
                                            <option value="vaksin">Vaksin Internasional</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="dokter">Dokter <span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="dokter" name="dokter">
                                            <option value="dr1">dr. Ida Lailatul Hasanah</option>
                                            <option value="dr2">dr. Dewi Wahyu Wulandari</option>
                                            <option value="dr3">dr. Nina Raditya Septiana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="bayar">Cara Pembayaran <span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="bayar" name="bayar">
                                            <option value="umum">Umum</option>
                                            <option value="bpjs">BPJS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </section>

                    <!-- Step 2 -->
                    <h1 class="card-title"></h1>
                    <h1 class="title">Pemeriksaan Awal</h1>
                    <h6>Pemeriksaan Awal</h6>
                    <section>
                        <h4 class="section-title">Data Pemeriksaan Awal</h4>

                        <!-- Card 1: Data Pendaftaran -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="noantrian">No. Antrian</label>
                                            <input type="text" class="form-control required" id="noantrian"
                                                name="noantrian" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="norm">No. RM</label>
                                            <input type="text" class="form-control required" id="norm"
                                                name="norm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" class="form-control required" id="nama"
                                                name="nama" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="tanggalperiksa">Tanggal Pemeriksaan</label>
                                            <input type="date" class="form-control required" id="tanggalperiksa"
                                                name="tanggalperiksa" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="kunjungansakit">Kunjungan Sakit</label>
                                            <select class="form-select required" id="kunjungansakit"
                                                name="kunjungansakit">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Card 2: Subjective section -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Subjek/Keluhan</label>
                                        <div class="mb-3">
                                            <textarea name="shortDescription" id="subjek" name="subjek" rows="12" class="form-control required"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Objective section -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Objective</label>
                                        <div class="row">
                                            <!-- Left Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sistole</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control required number-input"
                                                            id="sistole-mask" name="sistole" pattern="[0-9]*" inputmode="numeric">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Berat Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control required decimal-input" 
                                                               id="berat-mask" name="berat-badan" pattern="[0-9.,]*" inputmode="decimal"
                                                               >
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                    <div class="invalid-feedback">Berat badan harus diisi</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Suhu</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required decimal-input"
                                                            id="suhu-mask" name="suhu" pattern="[0-9.,]*" inputmode="decimal"
                                                            required>
                                                        <span class="input-group-text">°C</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Respiratory Rate</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="resprate-mask" name="respiratory"  pattern="[0-9]*" inputmode="numeric"
                                                            required>
                                                        <span class="input-group-text">/mnt</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Diastole</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="diastole-mask" name="diastole" pattern="[0-9]*" inputmode="numeric"
                                                            required>
                                                        <span class="input-group-text">mmHg</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tinggi Badan</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required decimal-input"
                                                            id="tinggi-mask" name="tinggi-badan" pattern="[0-9.,]*" inputmode="decimal"
                                                            required>
                                                        <span class="input-group-text">cm</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">SpO2</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="spo2-mask" name="spo2" pattern="[0-9]*" inputmode="numeric" required>
                                                        <span class="input-group-text">%</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 3 -->
                    <h6 class="fw-bold mt-4">Pemeriksaan</h6>
                    <section>
                        <h4 class="section-title mb-3">Data Pemeriksaan</h4>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-warning me-2">Rujuk Rawat Inap</button>
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button"
                                        id="suratKeteranganDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                        </div>


                        <!-- Antrian - Identitas Pasien -->
                        <div class="card p-3 mb-3 shadow-sm">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label" for="noantian">No Antrian</label>
                                    <input type="text" class="form-control" id="noantian" name="noantian">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="no.rm">No. RM</label>
                                    <input type="text" class="form-control" id="no.rm" name="no.rm">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>
                        </div>

                        <!-- Diagnosis dan ICD 10 -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm h-100">
                                    <label class="form-label" for="diagnosis">Diagnosis</label>
                                    <textarea id="diagnosis" name="diagnosis" rows="5" class="form-control" placeholder="Ketik diagnosis"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm h-100">
                                    <label class="form-label" for="icd10">ICD 10</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" id="icd10Search"
                                            placeholder="Ketik Kode atau Diagnosa">
                                        <button data-bs-toggle="modal" data-bs-target="#icdModal"
                                            class="btn btn-outline-secondary " type="button">
                                            <i class="bi bi-search"></i>
                                        </button>


                                    </div>
                                    <div class="modal fade" id="icdModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Data ICD 10</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="icdTable" class="display">
                                                        <div class="mb-3 d-flex justify-content-between align-items-center">
                                                            <label>
                                                                Tampilkan
                                                                <select class="form-select d-inline w-auto mx-1">
                                                                    <option>10</option>
                                                                    <option>25</option>
                                                                    <option>50</option>
                                                                </select>
                                                                entri
                                                            </label>
                                                            <label>
                                                                Cari :
                                                                <input type="text" class="form-control d-inline w-auto"
                                                                    placeholder="Cari...">
                                                            </label>
                                                        </div>
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Kode</th>
                                                                    <th>Nama</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A00</td>
                                                                    <td>Cholera</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A00.0</td>
                                                                    <td>Cholera due to Vibrio cholerae 01, biovar cholerae
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A00.1</td>
                                                                    <td>Cholera due to Vibrio cholerae 01, biovar eltor</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A00.9</td>
                                                                    <td>Cholera, unspecified</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01</td>
                                                                    <td>Typhoid and paratyphoid fevers</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01.0</td>
                                                                    <td>Typhoid fever</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01.1</td>
                                                                    <td>Paratyphoid fever a</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01.2</td>
                                                                    <td>Paratyphoid fever b</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01.3</td>
                                                                    <td>Paratyphoid fever c</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A01.4</td>
                                                                    <td>Paratyphoid fever, unspecified</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02</td>
                                                                    <td>Other salmonella infections</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02.0</td>
                                                                    <td>Salmonella enteritis</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02.1</td>
                                                                    <td>Salmonella septicaemia</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02.2</td>
                                                                    <td>Localized salmonella infections</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02.8</td>
                                                                    <td>Other specified salmonella infections</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A02.9</td>
                                                                    <td>Salmonella infection, unspecified</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A03</td>
                                                                    <td>Shigellosis</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A03.0</td>
                                                                    <td>Shigellosis due to shigella dysenteriae</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A03.1</td>
                                                                    <td>Shigellosis due to shigella flexneri</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A03.2</td>
                                                                    <td>Shigellosis due to shigella boydii</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>A03.3</td>
                                                                    <td>Shigellosis due to shigella sonnei</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div style="margin-top: 15px;">
                                                            <div>
                                                                Menampilkan 1 sampai 10 dari 155 entri
                                                            </div>
                                                            <div style="margin-top: 10px; text-align: right;">
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Sebelumnya</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: #0d6efd; color: white; padding: 6px 12px;">1</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">2</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">3</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">4</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">...</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">10</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Selanjutnya</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="table-responsive"> -->
                                        <table id="rincian-icd10" class="table text-center shadow-table">
                                            <thead style="background-color: #676981; color: white;">
                                                <style>
                                                #rincian-icd10, 
                                                #rincian-icd10 th, 
                                                #rincian-icd10 td {
                                                    border: none !important;
                                                    border-collapse: collapse;
                                                }

                                                #rincian-icd10 tr {
                                                    border-bottom: none !important;
                                                }

                                                .shadow-table {
                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                    border-radius: 8px;
                                                    overflow: hidden;
                                                }
                                            </style>
                                                <tr>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Nama ICD 10</th>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected-icds-icd10">
                                                <tr>
                                                <td style="text-align: left; font-weight: normal; font-size: 0.9rem;">H49.4 Progressive external ophthalmoplegia</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                                <tr>
                                                <td style="text-align: left; font-weight: normal; font-size: 0.9rem;">R51. Headache</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- Subjective dan Objective -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="subjective">Subjective</label>
                                    <textarea id="subjective" name="subjective" rows="5" class="form-control" placeholder="Ketik Subjective"></textarea>
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
                                                        id="sistole-mask" name="sistoled" pattern="[0-9]*" inputmode="numeric">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Berat Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input"
                                                            id="berat-mask" name="berat-badand" pattern="[0-9.,]*" inputmode="decimal">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Suhu</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input"
                                                            id="suhu-mask"  name="suhu-mask" pattern="[0-9.,]*" inputmode="decimal">
                                                        <span class="input-group-text">°C</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Respiratory Rate</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input"
                                                            id="resprate-mask" pattern="[0-9]*" inputmode="numeric">
                                                        <span class="input-group-text">/mnt</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Diastole</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input"
                                                            id="diastole-mask" pattern="[0-9]*" inputmode="numeric">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tinggi Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control decimal-input"
                                                            id="tinggi-mask" pattern="[0-9.,]*" inputmode="decimal">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">SpO2</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control number-input"
                                                            id="spo2-mask" pattern="[0-9]*" inputmode="numeric">
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
                            </style>
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label" for="pemeriksaanfisik">Pemeriksaan Fisik</label>
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#statusLokalisModal">Tambah +</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table custom-table">
                                            <thead style="background-color: #B3B9F9;">
                                                <tr>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Nama</th>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Keterangan</th>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pemeriksaanFisikTable">
                                            <tr class="no-data">
                                                <td colspan="3" class="text-center text-muted fst-italic">Tidak ada data</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label" for="icd9">ICD 9 - CM</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" id="icd9Search"
                                            placeholder="Ketik Kode atau Tindakan ICD 9">
                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#icdModal9">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>

                                    <!-- <div class="table-responsive">  -->
                                        <table id="rincian-icd9" class="table text-center shadow-table">
                                            <thead style="background-color: #676981; color: white;">
                                                <style>
                                                #rincian-icd9, 
                                                #rincian-icd9 th, 
                                                #rincian-icd9 td {
                                                    border: none !important;
                                                    border-collapse: collapse;
                                                }

                                                #rincian-icd9 tr {
                                                    border-bottom: none !important;
                                                }

                                                .shadow-table {
                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                    border-radius: 8px;
                                                    overflow: hidden;
                                                }
                                            </style>
                                                <tr>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Nama ICD 9</th>
                                                    <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected-icds-icd9">
                                                <tr>
                                                <td style="text-align: left; font-weight: normal; font-size: 0.9rem;">16.99 other operations on eyeball</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                                <tr>
                                                <td style="text-align: left; font-weight: normal; font-size: 0.9rem;">90.5 microscopic examinations of blood</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>

                        <div class="modal fade" id="icdModal9" tabindex="-1" aria-labelledby="icdModal9Label"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="icdModal9Label">Data ICD 9</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3 d-flex justify-content-between align-items-center">
                                            <label>
                                                Tampilkan
                                                <select class="form-select d-inline w-auto mx-1">
                                                    <option>10</option>
                                                    <option>25</option>
                                                    <option>50</option>
                                                </select>
                                                entri
                                            </label>
                                            <label>
                                                Cari :
                                                <input type="text" class="form-control d-inline w-auto"
                                                    placeholder="Cari...">
                                            </label>
                                        </div>

                                            <table>
                                            <thead>
                                                <tr>
                                                <th class="text-start"></th>
                                                <th class="text-start">Kode</th>
                                                <th class="text-start">Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0001</td>
                                                    <td>Therapeutic ultrasound of vessels of head and neck</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0002</td>
                                                    <td>Therapeutic ultrasound of heart</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0003</td>
                                                    <td>Therapeutic ultrasound of peripheral vascular vessels</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0009</td>
                                                    <td>Other therapeutic ultrasound</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0010</td>
                                                    <td>Implantation of chemotherapeutic agent</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0011</td>
                                                    <td>Infusion of drotrecogin alfa (activated)</td>
                                                </tr>
                                                <tr>
                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                    <td>0012</td>
                                                    <td>Administration of inhaled nitric oxide</td>
                                                </tr>
                                                <!-- Tambahan baris lainnya -->
                                            </tbody>
                                        </table>
                                        <div style="margin-top: 15px;">
                                            <div>
                                                Menampilkan 1 sampai 10 dari 155 entri
                                            </div>
                                            <div style="margin-top: 10px; text-align: right;">
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Sebelumnya</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: #0d6efd; color: white; padding: 6px 12px;">1</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">2</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">3</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">4</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">...</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">10</button>
                                                <button
                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Selanjutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CSS Styling -->
                        <style>
                            .btn-pilih {
                                background-color: #2196F3;
                                color: white;
                                border: none;
                                padding: 5px 12px;
                                border-radius: 4px;
                                font-weight: bold;
                                cursor: pointer;
                                transition: background-color 0.2s;
                            }

                            .btn-pilih:hover {
                                background-color: #1976D2;
                            }

                            .icd-table tbody tr {
                                background-color: #f0f7ff;
                                /* Warna biru muda */
                            }

                            .icd-table tbody tr:hover {
                                background-color: #dbeeff;
                                /* Biru lebih gelap saat hover */
                            }

                            .icd-table thead th {
                                background-color: #e0e0e0;
                                font-weight: bold;
                                text-align: center;
                            }

                            /* Tambahan padding untuk konsistensi */
                            .modal-body {
                                padding: 1.5rem;
                            }

                            .modal-header {
                                background-color: #f8f9fa;
                                border-bottom: 1px solid #dee2e6;
                            }


                            /* Garis horizontal di bawah judul */
                            h2::after {
                                            content: "";
                                            display: block;
                                            width: 100%;
                                            height: 2px;
                                            background-color: #ccc;
                                            margin-top: 8px;
                            }

                            </style>
                            
                        <!-- Modal for Pemeriksaan Fisik Details -->
                        <div class="modal fade" id="physicalExamModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Rincian Pemeriksaan Fisik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="physicalExamModalBody">
                                        <div id="physicalExamDetails">
                                            <!-- Detail content will be inserted here -->
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
                        </div>


                        
                        <!-- Layanan dan Rincian Obat -->
                    <div class="row-container">
                        <div class="row mb-3 mt-4" >
                            <div class="col-md-6" >
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Layanan</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Ketik Layanan">
                                        <button data-bs-toggle="modal" data-bs-target="#layananModal"
                                            class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <table id="rincian-layanan" class="table text-center shadow-table">
                                        <thead style="background-color: #676981; color: white;">
                                            <style>
                                                #rincian-layanan, 
                                                #rincian-layanan th, 
                                                #rincian-layanan td {
                                                    border: none !important;
                                                    border-collapse: collapse;
                                                }

                                                #rincian-obat tr {
                                                    border-bottom: none !important;
                                                }

                                                .shadow-table {
                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                    border-radius: 8px;
                                                    overflow: hidden;
                                                }
                                            </style>
                                            <tr>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Jumlah</th>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Nama Layanan</th>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Harga Layanan</th>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">Jasa Perawat</td>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">Rp.10.000,-</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">Jasa Pasang Infus</td>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">Rp.60.000,-</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Layanan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table id="layananTable" class="display">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                            <label>
                                                Tampilkan
                                                <select class="form-select d-inline w-auto mx-1">
                                                    <option>10</option>
                                                    <option>25</option>
                                                    <option>50</option>
                                                </select>
                                                entri
                                            </label>
                                            <label>
                                                Cari :
                                                <input type="text" class="form-control d-inline w-auto"
                                                    placeholder="Cari...">
                                            </label>
                                        </div>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Nama Layanan</th>
                                                            <th>Tarif</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Jasa Perawat</td>
                                                            <td>Rp 10.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Jasa Pasang Infus</td>
                                                            <td>Rp 30.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Bekam</td>
                                                            <td>Rp 50.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Perawatan Luka Ringan</td>
                                                            <td>Rp 30.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Perawatan Luka Infeksi</td>
                                                            <td>Rp 70.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Administrasi</td>
                                                            <td>Rp 5.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Injeksi Vitamin</td>
                                                            <td>Rp 50.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Nebulizer</td>
                                                            <td>Rp 25.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Tensi</td>
                                                            <td>Rp 10.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Cek Gula Darah</td>
                                                            <td>Rp 10.000,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn-pilih">Pilih</button></td>
                                                            <td>Injeksi Vitamin A</td>
                                                            <td>Rp 80.000,-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                        <div style="margin-top: 15px;">
                                                            <div>
                                                                Menampilkan 1 sampai 10 dari 155 entri
                                                            </div>
                                                            <div style="margin-top: 10px; text-align: right;">
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Sebelumnya</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: #0d6efd; color: white; padding: 6px 12px;">1</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">2</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">3</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">4</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">...</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">10</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Selanjutnya</button>
                                                            </div>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Rincian Obat</label>
                                    <style>
                                        /* Membuat backdrop modal transparan */
                                        .modal-backdrop.show {
                                            background-color: rgba(128, 128, 128, 0.5) !important;
                                        }

                                        /* Opsional: ubah modal agar tidak punya bayangan hitam */
                                        .modal-content {
                                            box-shadow: none;
                                        }

                                        .bi bi-search {
                                            background-color: transparent;
                                            border: none;
                                            color: #333;
                                        }

                                        table {
                                            width: 100%;
                                            border-collapse: collapse;
                                            margin-top: 20px;
                                            font-family: sans-serif;
                                        }

                                        thead {
                                            background-color: #f3f3f3;
                                            border-bottom: 2px solid #ccc;
                                        }

                                        h2 {
                                            font-size: 24px;
                                            color: #1a237e;
                                            margin-bottom: 5px;
                                            position: relative;
                                        }

                                        /* Garis horizontal di bawah judul */
                                        h2::after {
                                            content: "";
                                            display: block;
                                            width: 100%;
                                            height: 2px;
                                            background-color: #ccc;
                                            margin-top: 8px;
                                        }

                                        th,
                                        td {
                                            text-align: left;
                                            padding: 10px;
                                            border-bottom: 1px solid #ccc;
                                        }

                                        tr:nth-child(even) {
                                            background-color: #f0f4ff;
                                            /* biru muda */
                                        }

                                        th {
                                            background-color: #f4f4f4;
                                        }

                                        .btn-pilih {
                                            background-color: #2196F3;
                                            color: white;
                                            border: none;
                                            padding: 5px 10px;
                                            cursor: pointer;
                                        }

                                        .stok-kosong {
                                            color: red;
                                            font-size: 12px;
                                            padding: 5px 10px;
                                            cursor: pointer;
                                        }

                                        button:disabled {
                                            background-color: #aaa;
                                        }
                                    </style>
                                    <div class="input-group mb-2">
                                        <input type="text" id="searchInput" class="form-control"
                                            placeholder="Cari Obat">
                                        <button data-bs-toggle="modal" data-bs-target="#cariObat"
                                            class="btn btn-outline-secondary " type="button">
                                            <i class="bi bi-search"></i>
                                    </div>
                                    <div class="modal fade" id="cariObat" tabindex="-1"
                                        aria-labelledby="bs-example-modal-lg" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Anda bisa tambahkan tabel atau elemen lainnya di sini -->
                                                    <div class="popup">
                                                        <h2>Data Obat</h2>
                                                        <label style="color: #2c2c6c; font-weight: bold;">
                                                            Tampilkan
                                                            <select
                                                                style="margin: 0 5px; padding: 3px 6px; border-radius: 4px; border: 1px solid #ccc;">
                                                                <option>10</option>
                                                                <option>25</option>
                                                                <option>50</option>
                                                            </select>
                                                            entri
                                                        </label>
                                                        <div style="display: flex; justify-content: flex-end; gap: 8px;">
                                                            <label for="searchInput"
                                                                style="color: #2c2c6c; font-weight: bold;">Cari :</label>
                                                            <input id="searchInput" type="text" placeholder=""
                                                                style="padding: 5px 10px; border: 1px solid #999; border-radius: 5px;
                                                                    box-shadow: 1px 1px 4px #aaa; outline: none;">
                                                        </div>
                                                        <table id="data-obat">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Nama Obat</th>
                                                                    <th>Harga Jual</th>
                                                                    <th>Stok Obat</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><button type="button"
                                                                            onclick="tambahObat('Acyclovir', Rp. 1.000-,)"
                                                                            class="btn-pilih">Pilih</button></td>
                                                                    <td>Acyclovir</td>
                                                                    <td>Rp 1.000,-</td>
                                                                    <td>64</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>Acyclovir salep</td>
                                                                    <td>Rp 9.000,-</td>
                                                                    <td>3</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="stok-kosong">Stok Kosong</span></td>
                                                                    <td>ALLOPURINOL TAB 300 mg</td>
                                                                    </td>
                                                                    <td>Rp 833,-</td>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>ALPARA</td>
                                                                    <td>Rp 1.776,-</td>
                                                                    <td>10</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button class="btn-pilih">Pilih</button></td>
                                                                    <td>Ambroxol</td>
                                                                    <td>Rp 416,-</td>
                                                                    <td>170</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div style="margin-top: 15px;">
                                                            <div>
                                                                Menampilkan 1 sampai 10 dari 155 entri
                                                            </div>
                                                            <div style="margin-top: 10px; text-align: right;">
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Sebelumnya</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: #0d6efd; color: white; padding: 6px 12px;">1</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">2</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">3</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">4</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">...</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">10</button>
                                                                <button
                                                                    style="border: 1px solid #ccc; background-color: white; padding: 6px 12px;">Selanjutnya</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap JS Bundle (wajib agar modal bisa jalan) -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                            
                                <div class="table-container">
                                    <table id="rincian-obat" class="table text-center shadow-table" >
                                        <thead style="background-color:rgb(252, 252, 254); color: white;">
                                            <head>
                                                <style>
                                                    /* Container tabel */
                                                    .table-container {
                                                        border-radius: 8px;
                                                        overflow: hidden;
                                                        box-shadow: 0 4px 12px rgba(253, 249, 249, 0.15);
                                                    }
                                                    
                                                    /* Header yang tetap/tidak bergerak */
                                                    .table-header {
                                                        background-color: #676981;
                                                        color: white;
                                                        border-top-left-radius: 8px;
                                                        border-top-right-radius: 8px;
                                                    }
                                                    
                                                    .table-header table {
                                                        width: 100%;
                                                        margin-bottom: 0;
                                                    }
                                                    
                                                    /* Bagian tbody yang dapat di-scroll */
                                                    .table-body-scroll {
                                                        max-height: 215px; /* Sesuaikan dengan kebutuhan */
                                                        overflow-y: auto; 
                                                        border-bottom-left-radius: 8px;
                                                        border-bottom-right-radius: 8px;
                                                        background-color: white;                                                    }
                                                    
                                                    /* Style umum untuk semua tabel */
                                                    .table-header table,
                                                    .table-body-scroll table {
                                                        border-collapse: separate;
                                                        width: 100%;
                                                        margin: 0;
                                                        background-color: white;
                                                    }
                                                    
                                                    /* Menghapus border pada tabel */
                                                    .table-header th,
                                                    .table-body-scroll td {
                                                        border: none !important;
                                                        text-align: center;
                                                        font-weight: normal;
                                                        font-size: 0.9rem;
                                                        padding: 8px;
                                                        border: none;
                                                    }

                                                    /* Hilangkan pewarnaan selang-seling jika ada */
                                                    .table-body-scroll tr {
                                                        background-color: white !important;
                                                    }

                                                    /* Scrollbar kustom untuk peningkatan UX */
                                                    .table-body-scroll::-webkit-scrollbar {
                                                        width: 8px;
                                                    }

                                                    .table-body-scroll::-webkit-scrollbar-track {
                                                        background: #f1f1f1;
                                                        border-radius: 4px;
                                                    }

                                                    .table-body-scroll::-webkit-scrollbar-thumb {
                                                        background: #aaa;
                                                        border-radius: 4px;
                                                    }

                                                    .table-body-scroll::-webkit-scrollbar-thumb:hover {
                                                        background: #888;
                                                    }

                                                </style>
                                            </head>
                                            <div class="table-header">
                                                <tabel>
                                                    <tr>
                                                        <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Jumlah</th>
                                                        <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Nama Obat</th>
                                                        <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Harga Obat</th>
                                                        <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                                    </tr>
                                                </table>
                                            </div>
                                    <div class="table-body-scroll">
                                        <table>
                                            <tr>
                                                <td style="text-align: right; padding-right: 14px; width: 80px;" font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Acyclorovil</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.1000,-</td>
                                                <td class="text-right">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">1</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Ambroxol</td>
                                                <td style="text-align: right; font-weight: normal; font-size: 0.9rem;">Rp.416,-</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                         </table>
                                        <!-- </tbody> -->
                                        </thead>
                                    </div>
                                    </table>
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
                                         <input type="date" class="form-control">
                                         <input type="text" class="form-control" placeholder="Alasan Kontrol">
                                         <button type="button" class="btn btn-sm btn-secondary d-flex align-items-center">Tambah +</button>
                                    </div>
                                    <table id="rencana-kontrol" class="table text-center shadow-table">
                                        <thead style="background-color: #676981; color: white;">
                                            <style>
                                                #rencana-kontrol, 
                                                #rencana-kontrol th, 
                                                #rencana-kontrol td {
                                                    border: none !important;
                                                    border-collapse: collapse;
                                                }

                                                #rencana-kontrol tr {
                                                    border-bottom: none !important;
                                                }

                                                .shadow-table {
                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                    border-radius: 8px;
                                                    overflow: hidden;
                                                }
                                            </style>
                                            <tr>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Tanggal Kontrol</th>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Alasan Kontrol</th>
                                                <th style="text-align: center; font-weight: normal; font-size: 0.9rem;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">05/08/2025</td>
                                                <td style="text-align: center; font-weight: normal; font-size: 0.9rem;">Pemantauan Lebih Lanjut</td>
                                                <td class="text-center">
                                                        <button class="btn btn-sm btn-danger delete-btn">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 flex-fill h-100">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Catatan</label>
                                    <textarea class="form-control" rows="5" placeholder="Tambah catatan di sini"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <!-- Step 4 -->
                    <h6>Farmasi</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="behName2">Behaviour :</label>
                                    <input type="text" class="form-control required" id="behName2" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="participants3">Confidance</label>
                                    <input type="text" class="form-control required" id="participants3" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="participants4">Result</label>
                                    <select class="form-select required" id="participants4" name="location">
                                        <option value="">Select Result</option>
                                        <option value="Selected">Selected</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Call Second-time"> Call Second-time </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="decisions3">Comments</label>
                                    <textarea name="decisions" id="decisions3" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="customRadio11" class="form-label">Rate Interviwer :</label>
                                    <div class="c-inputs-stacked">
                                        <div class="form-check">
                                            <input type="radio" id="customRadio11" name="customRadio"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="customRadio11">1 star</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio12" name="customRadio"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="customRadio12">2 star</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio13" name="customRadio"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="customRadio13">3 star</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio14" name="customRadio"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="customRadio14">4 star</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio15" name="customRadio"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="customRadio15">5 star</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 5 -->
                    <h6>Pembayaran</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="paymentMethod">Metode Pembayaran :</label>
                                    <select class="form-select required" id="paymentMethod" name="paymentMethod">
                                        <option value="">Pilih Metode</option>
                                        <option value="Cash">Tunai</option>
                                        <option value="Credit">Kartu Kredit</option>
                                        <option value="Debit">Kartu Debit</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="Insurance">Asuransi</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="totalAmount">Total Biaya :</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control required" id="totalAmount"
                                            name="totalAmount" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="discountCode">Kode Diskon (Opsional) :</label>
                                    <input type="text" class="form-control" id="discountCode"
                                        name="discountCode" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="paymentDate">Tanggal Pembayaran :</label>
                                    <input type="date" class="form-control required" id="paymentDate"
                                        name="paymentDate" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="paymentNotes">Catatan Pembayaran :</label>
                                    <textarea name="paymentNotes" id="paymentNotes" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status Pembayaran :</label>
                                    <div class="c-inputs-stacked">
                                        <div class="form-check">
                                            <input type="radio" id="paidFull" name="paymentStatus"
                                                class="form-check-input" value="paidFull" />
                                            <label class="form-check-label" for="paidFull">Lunas</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="paidPartial" name="paymentStatus"
                                                class="form-check-input" value="paidPartial" />
                                            <label class="form-check-label" for="paidPartial">Bayar Sebagian</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="pending" name="paymentStatus"
                                                class="form-check-input" value="pending" />
                                            <label class="form-check-label" for="pending">Tertunda</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
    </div>

   <!-- Modal Pemeriksaan Fisik dengan Canvas -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
   
    <div class="modal fade" id="statusLokalisModal" tabindex="-1" aria-labelledby="statusLokalisModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="statusLokalisModalLabel">Pemeriksaan Fisik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom CANVAS -->
                        <div class="col-md-7 text-center">
                            <!-- Toolbar -->
                            <div class="mb-1">
                                <button type="button" class="btn btn-outline-dark btn-sm" id="btnDrawToggle" onclick="toggleDrawMode()">✏️</button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="undoCanvas()">↩️</button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="redoCanvas()">↪️</button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="clearCanvas()">❌</button>
                            </div>

                            <!-- Canvas -->
                            <div style="border: 1px solid #ccc; display: inline-block;">
                                <canvas id="bodyCanvas" width="500" height="500"></canvas>
                            </div>
                        </div> <!-- Penutup col-md-7 -->

                        <!-- Kolom FORM -->
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Bagian yang Diperiksa</label>
                                <input type="text" class="form-control" id="bagianDiperiksa" placeholder="Ketik di sini">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <textarea class="form-control" id="keteranganFisik" rows="5" placeholder="Ketik di sini"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-primary" onclick="saveCanvas()">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Surat Keterangan Sehat-->
    <div class="modal fade" id="modalSehat" tabindex="-1" aria-labelledby="modalSehatLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4 rounded-4 shadow-lg">
                <div class="modal-header border-0">
                    <h2 class="modal-title fw-bold text-primary" id="modalSehatLabel">Surat
                        Keterangan Sehat</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nomorSurat" class="form-label">Nomor</label>
                            <input type="text" class="form-control" id="nomorSurat" placeholder="000000">
                        </div>

                        <p>Yang bertanda tangan di bawah ini, dr. Trik Hujan Dokter KLINIK
                            PRATAMA INSAN MEDIKA, menerangkan bahwa :</p>

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="namaPasien" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="namaPasien" placeholder="Ketik nama">
                            </div>
                            <div class="col-md-4">
                                <label for="jenisKelamin" class="form-label">Jenis
                                    Kelamin</label>
                                <select class="form-select" id="jenisKelamin">
                                    <option selected>Tidak diketahui</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                    <option>Tidak dapat ditentukan</option>
                                    <option>Tidak mengisi</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggalLahir" class="form-label">Tanggal
                                    Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir">
                            </div>

                            <div class="col-md-6">
                                <label for="alamatPasien" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamatPasien"
                                    placeholder="Jl. Mangga Putih Nomor 6">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="form-label">Telah menjalani pemeriksaan kesehatan
                                jasmani pada tanggal</label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="tanggalPemeriksaan">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="hasilPemeriksaan"
                                        placeholder="Hasil pemeriksaan">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="untukKeperluan" class="form-label">Surat keterangan ini
                                dipergunakan untuk :</label>
                            <textarea class="form-control" id="untukKeperluan" rows="2" placeholder="Untuk..."></textarea>
                        </div>

                        <div class="mt-4">
                            <label class="form-label">Keterangan:</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="beratBadan" class="form-label">Berat
                                        Badan</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="beratBadan" placeholder="0">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="tinggiBadan" class="form-label">Tinggi
                                        Badan</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="tinggiBadan" placeholder="0">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="golDarah" class="form-label">Golongan
                                        Darah</label>
                                    <select class="form-select" id="golDarah">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>AB</option>
                                        <option>O</option>
                                        <option>Tidak diketahui</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label for="tekananDarah" class="form-label">Tekanan
                                    Darah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tekananDarah" placeholder="0">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <p>Jember,</p>
                            <p>Dokter yang memeriksa:</p>

                            Canvas untuk tanda tangan
                            <div style="border: 1px solid #ccc; border-radius: 10px; position: relative;">
                                <canvas id="signature-pad" width="100%" height="150px"
                                    style="display: block; background-color: #f8f9fa;"></canvas>
                                <small class="text-muted" style="position: absolute; bottom: 5px; left: 10px;">
                                    Tanda tangan di area ini
                                </small>
                            </div>

                            <!-- Tombol untuk reset tanda tangan -->
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" id="clear-signature">
                                <i class="bi bi-eraser"></i> Hapus Tanda Tangan
                            </button>

                            <p class="mt-3">(Nama Dokter)</p>
                            <p>SIP</p>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                        </div>
                    </form>
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

    <!-- Modal Surat Keterangan Sakit-->
    <div class="modal fade" id="modalSakit" tabindex="-1" aria-labelledby="modalSakitLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4 rounded-4 shadow-lg">
                <div class="modal-header border-0">
                    <h2 class="modal-title fw-bold text-primary" id="modalSakitLabel">Surat Keterangan Sakit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <label for="nomorSurat" class="col-form-label">Nomor</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" id="nomorSurat" placeholder="000000">
                            </div>
                        </div>

                        <label class="form-label">Yang bertanda tangan di bawah ini, dr. Trik Hujan Dokter KLINIK PRATAMA
                            INSAN MEDIKA, menerangkan
                            bahwa:</label>

                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="namaPasien" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="namaPasien" placeholder="Ketik nama">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="tanggalLahir" class="col-form-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="tanggalLahir">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="jenisKelamin" class="col-form-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-select" id="jenisKelamin">
                                    <option selected>Tidak diketahui</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                    <option>Tidak dapat ditentukan</option>
                                    <option>Tidak mengisi</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="alamatPasien" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="alamatPasien"
                                    placeholder="Jl. Mangga Putih Nomor 6">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="form-label">Pada pemeriksaan saat ini ternyata dalam keadaan sakit, sehingga
                                perlu istirahat selama</label>
                            <div style="display: inline-block; margin-left: 10px;">
                                <input type="text" class="form-control" id="banyakHari" placeholder=""
                                    style="width: 50px; display: inline;">
                            </div>
                            <label class="form-label" style="margin-left: 10px;">hari</label>
                        </div>

                        <div class="mt-3" style="display: flex; align-items: center;">
                            <label class="form-label" style="margin-right: 10px; white-space: nowrap;">mulai
                                tanggal</label>
                            <input type="text" id="rangeCalendar" class="form-control" style="width: 300px;"
                                placeholder="DD/MM/YYYY sampai DD/MM/YYYY">
                        </div>

                        <!-- Tambahkan ini di bawah sebelum </body> -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                        <script>
                            flatpickr("#rangeCalendar", {
                                mode: "range",
                                dateFormat: "d/m/Y",
                                locale: {
                                    rangeSeparator: " s/d "
                                }
                            });
                        </script>

                        <div>
                            <label class="form-label">Demikian agar digunakan sebagaimana mestinya.</label>

                            <div class="mt-4 text-end">
                                <p>Jember,</p>
                                <p>Dokter yang memeriksa:</p>

                                Canvas untuk tanda tangan
                                <div style="border: 1px solid #ccc; border-radius: 10px; position: relative;">
                                    <canvas id="signature-pad-sakit" width="100%" height="150px"
                                        style="display: block; background-color: #f8f9fa;"></canvas>
                                    <small class="text-muted" style="position: absolute; bottom: 5px; left: 10px;">
                                        Tanda tangan di area ini
                                    </small>
                                </div>

                                <!-- Tombol untuk reset tanda tangan -->
                                <button type="button" class="btn btn-outline-secondary btn-sm mt-2"
                                    id="clear-signature-sakit">
                                    <i class="bi bi-eraser"></i> Hapus Tanda Tangan
                                </button>

                                <p class="mt-3">(Nama Dokter)</p>
                                <p>SIP</p>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

    {{-- <!-- ICD-10 Search Script -->
    <script>
        $(document).ready(function() {
            // Variables to track selected ICDs
            let selectedICDs = [];

            // Handle search input
            $('#search-icd').on('input', function() {
                const searchTerm = $(this).val();

                if (searchTerm.length < 2) {
                    $('#search-results').hide();
                    return;
                }

                // Make AJAX request to search endpoint
                $.ajax({
                    url: '{{ url('search_icd.php') }}',
data: {
term: searchTerm
},
dataType: 'json',
success: function(data) {
// Clear previous results
$('#search-results').empty();

if (data.length > 0) {
// Add each result to dropdown
data.forEach(function(item) {
$('#search-results').append(
`<div class="search-item p-2 border-bottom hover-bg" data-id="${item.id}" data-name="${item.name}">
    <strong>${item.id}</strong> - ${item.name}
</div>`
);
});

// Show results dropdown
$('#search-results').show();
} else {
$('#search-results').append(
`<div class="p-2 text-muted">Tidak ada hasil ditemukan</div>`
);
$('#search-results').show();
}
},
error: function(xhr, status, error) {
console.error('Error searching ICD:', error);
$('#search-results').html(
'<div class="p-2 text-danger">Error searching: ' + error +
    '</div>');
$('#search-results').show();
}
});
});

// Handle search button click
$('#search-btn').click(function() {
const searchTerm = $('#search-icd').val();
if (searchTerm.length >= 2) {
// Trigger the same search process
$('#search-icd').trigger('input');
}
});

// Handle selecting an ICD from the results
$(document).on('click', '.search-item', function() {
const id = $(this).data('id');
const name = $(this).data('name');

// Check if already selected
if (!selectedICDs.some(item => item.id === id)) {
// Add to selected ICDs
selectedICDs.push({
id,
name
});

// Update the display of selected ICDs
updateSelectedICDs();
}

// Clear search and hide results
$('#search-icd').val('');
$('#search-results').hide();
});

// Function to update display of selected ICDs
function updateSelectedICDs() {
const container = $('#selected-icds');

if (selectedICDs.length === 0) {
container.html(
'<p class="text-muted text-center mb-0" id="no-icd-selected">Belum ada diagnosa yang dipilih</p>'
);
} else {
container.empty();

selectedICDs.forEach(function(item, index) {
container.append(
`<div class="selected-icd-item mb-1 d-flex align-items-center">
    <span class="me-auto"><strong>${item.id}</strong> - ${item.name}</span>
    <button type="button" class="btn btn-sm btn-outline-danger remove-icd" data-index="${index}">
        <i class="fas fa-times"></i>
    </button>
</div>`
);
});
}
}

// Handle removing a selected ICD
$(document).on('click', '.remove-icd', function() {
const index = $(this).data('index');
selectedICDs.splice(index, 1);
updateSelectedICDs();
});

// Close dropdown when clicking outside
$(document).on('click', function(event) {
if (!$(event.target).closest('#search-icd, #search-results, #search-btn').length) {
$('#search-results').hide();
}
});
});
</script>

<!-- Tambahkan CSS untuk fitur ICD-10 -->
<style>
.search-item {
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-item:hover {
    background-color: #f8f9fa;
}

.selected-icd-item {
    background-color: #e9f7fe;
    padding: 5px 10px;
    border-radius: 4px;
}

#search-results {
    border: 1px solid #ced4da;
    border-radius: 0 0 5px 5px;
}

.hover-bg:hover {
    background-color: #f0f0f0;
    cursor: pointer;
}

.z-index-dropdown {
    z-index: 1000;
}

.min-height-80 {
    min-height: 80px;
}
</style> --}}

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
        let handleShown = null;

        const statusLokalisModal = new bootstrap.Modal(document.getElementById('statusLokalisModal'));

        function hapusBaris(button) {
            const row = button.closest('tr');
            row.remove();

            const tbody = document.getElementById('pemeriksaanFisikTable');
            if (tbody.children.length === 0) {
                const emptyRow = document.createElement('tr');
                emptyRow.classList.add('no-data');
                emptyRow.innerHTML = `<td colspan="3" class="text-center text-muted fst-italic">Tidak ada data</td>`;
                tbody.appendChild(emptyRow);
            }
        }

        function toggleDrawMode() {
            drawEnabled = !drawEnabled;
            const button = document.getElementById('btnDrawToggle');
            button.classList.toggle('active', drawEnabled);
            button.innerHTML = drawEnabled ? '🛑' : '✏️';
        }

        function undoCanvas() {
            if (undoStack.length > 0) {
                const lastState = undoStack.pop();
                redoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
                ctx.putImageData(lastState, 0, 0);
            }
        }

        function redoCanvas() {
            if (redoStack.length > 0) {
                const nextState = redoStack.pop();
                undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
                ctx.putImageData(nextState, 0, 0);
            }
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
        }

        function saveCanvas() {
            const bagian = document.getElementById('bagianDiperiksa').value.trim();
            const keterangan = document.getElementById('keteranganFisik').value.trim();

            if (!bagian || !keterangan) {
                alert("Harap isi semua kolom terlebih dahulu.");
                return;
            }

            const imageData = canvas.toDataURL("image/png");
            const tbody = document.getElementById('pemeriksaanFisikTable');

            const noDataRow = tbody.querySelector(".no-data");
            if (noDataRow) noDataRow.remove();

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${bagian}</td>
                <td>${keterangan}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info view-details"
                        data-bs-toggle="modal"
                        data-bs-target="#statusLokalisModal"
                        data-bagian="${bagian}"
                        data-keterangan="${keterangan}"
                        data-image="${imageData}"
                        title="Lihat Rincian">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="hapusBaris(this)" title="Hapus">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);

            document.getElementById('bagianDiperiksa').value = '';
            document.getElementById('keteranganFisik').value = '';
            clearCanvas();
            statusLokalisModal.hide();
        }

        function loadDummyData(dummy) {
            document.getElementById('bagianDiperiksa').value = dummy.bagian;
            document.getElementById('keteranganFisik').value = dummy.keterangan;

            const img = new Image();
            img.onload = () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
            img.src = dummy.imageData;
        }

        // Gambar manual
        canvas.addEventListener('mousedown', (e) => {
            if (!drawEnabled) return;
            isDrawing = true;
            undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
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

        // Saat modal dibuka pertama kali
        document.getElementById('statusLokalisModal').addEventListener('shown.bs.modal', () => {
            if (!initialized) {
                image.onload = () => {
                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                };
                image.src = '/build/images/gambarmedis/Status-lokalis.jpg';
                initialized = true;
            } else {
                clearCanvas();
            }
        });

        // Reset modal saat ditutup
        document.getElementById('statusLokalisModal').addEventListener('hidden.bs.modal', () => {
            document.getElementById('bagianDiperiksa').value = '';
            document.getElementById('keteranganFisik').value = '';
            clearCanvas();
            undoStack = [];
            redoStack = [];
            drawEnabled = false;
            isDrawing = false;
        });

        // Fungsi edit aman
        function editPemeriksaan(bagian, keterangan, imageDataUrl = null) {
            const modalEl = document.getElementById('statusLokalisModal');

            // Hapus handler lama jika ada
            if (handleShown) {
                modalEl.removeEventListener('shown.bs.modal', handleShown);
            }

            // Buat handler baru
            handleShown = function () {
                modalEl.removeEventListener('shown.bs.modal', handleShown);

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
                background.src = '/build/images/gambarmedis/Status-lokalis.jpg';
            };

            modalEl.addEventListener('shown.bs.modal', handleShown);

            // Set form
            document.getElementById('bagianDiperiksa').value = bagian;
            document.getElementById('keteranganFisik').value = keterangan;

            // Tampilkan modal
            statusLokalisModal.show();
        }
    </script>
    <!-- Script untuk menggambar di canvas -->


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

    <script>
        const tableIcd = new DataTable('#icdTable', {
            responsive: true,
            paging: true,
            searching: true,
            info: true,
            pageLength: 10, // Default: tampilkan 10 entri
            lengthMenu: [5, 10, 25, 50, 100]
        });
        const tableLayanan = new DataTable('#layananTable', {
            responsive: true,
            paging: true,
            searching: true,
            info: true,
            pageLength: 10, // Default: tampilkan 10 entri
            lengthMenu: [5, 10, 25, 50, 100]
        });
    </script>

@endsection
