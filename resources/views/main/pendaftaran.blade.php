@extends('layouts.master')

@section('title', 'SIP-Kes')
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
                <h1 id="wizard-title" class="wizard-title">Pendaftaran Rawat Jalan</h1>
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
                        </style>
                        <div class="card w-100">
                            <div class="row mb-4 align-items-end">
                                <div class="col-md-10">
                                    <label for="searchNoRM" class="form-label">No. RM</label>
                                    <input class="form-control" list="noRMList" id="searchNoRM"
                                        placeholder="Cari Data Pasien">
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
                                            placeholder="Masukkan nama" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="provinsi">Provinsi:</label>
                                        <input type="text" class="form-control required" id="provinsi"
                                            name="provinsi" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kota">Kota/Kabupaten:</label>
                                        <input type="text" class="form-control required" id="kota" name="kota" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK: <span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nik" name="nik"
                                            placeholder="16 digit" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kecamatan">Kecamatan:</label>
                                        <input type="text" class="form-control required" id="kecamatan"
                                            name="kecamatan" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kelurahan">Kelurahan/Desa: </label>
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
                                        <label class="form-label" for="kodepos">Kode Pos:</label>
                                        <input type="text" class="form-control required" id="kodepos"
                                            name="kodepos" />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="rt">RT:</label>
                                        <input type="text" class="form-control required" id="rt"
                                            name="rt" />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="rt">RW:</label>
                                        <input type="text" class="form-control required" id="rw"
                                            name="rw" />
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
                                        <label class="form-label" for="agama">Agama:</label>
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
                                        <label class="form-label" for="perkawinan">Status Perkawinan:</label>
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
                                        <label class="form-label" for="pendidikan">Pendidikan:</label>
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
                                        <label class="form-label" for="pekerjaan">Pekerjaan:</label>
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
                                        <label class="form-label" for="kewarganegaraan">Kewarganegaraan:</label>
                                        <select class="form-select required" id="kewarganegaraan" name="kewarganegaraan">
                                            <option value="wni">WNI</option>
                                            <option value="wna">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="telepon">Nomor Telepon:</label>
                                        <input type="text" class="form-control required" id="telepon"
                                            name="telepon" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="ibukandung">Nama Ibu Kandung:</label>
                                        <input type="text" class="form-control required" id="ibukandung"
                                            name="ibukandung" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="goldar">Golongan Darah:</label>
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
                                        <label class="form-label" for="hubungan">Hubungan dengan pasien:</label>
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
                                        <label class="form-label" for="namawali">Nama Wali:</label>
                                        <input type="text" class="form-control required" id="namawali"
                                            name="namawali" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tlwali">Tanggal Lahir Wali :</label>
                                        <input type="date" class="form-control required" id="tlwali"
                                            name="tlwali" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="notelpwali">Nomor Telepon Wali:</label>
                                        <input type="texr" class="form-control required" id="notelpwali"
                                            name="notelpwali" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="alamatwali">Alamat Wali</label>
                                        <input type="text" class="form-control required" id="alamatwali"
                                            name="alamatwali" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="layanan">Layanan</label>
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
                                            <label class="form-label" for="dokter">Dokter</label>
                                            <select class="form-select required" id="dokter" name="dokter">
                                                <option value="dr1">dr jaemin</option>
                                                <option value="dr2">dr joshua</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="bayar">Cara Pembayaran</label>
                                            <select class="form-select required" id="bayar" name="bayar">
                                                <option value="umum">Umum</option>
                                                <option value="bpjs">BPJS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                    </section>

                    <!-- Step 2 -->
                    <h6>Pemeriksaan Awal</h6>
                    <section>
                        <h4 class="section-title">Data Pendaftaran</h4>
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
                                    <input type="text" class="form-control required" id="norm" name="norm" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" class="form-control required" id="nama" name="nama" />
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
                                    <label class="form-label" for="kunjunganasakit"> Kunjungan Sakit</label>
                                    <select class="form-select required" id="kunjungansakit" name="kunjungansakit">
                                        <option value="Tidak">Tidak</option>
                                        <option value="Ya">Ya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="subjek">Subjek/Keluhan</label>
                                    <textarea name="shortDescription" id="subjek" name="subjek" rows="6" class="form-control required"></textarea>
                                </div>
                            </div>
                            <h4 class="section-title">Objective</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Sistol <small
                                                class="text-muted ms-2">mmHg</small></label>
                                        <input type="text" class="form-control mmhg-sistol-inputmask" id="sistol-mask"
                                            placeholder="Enter Value in mmHg" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Diastol <small
                                                class="text-muted ms-2">mmHg</small></label>
                                        <input type="text" class="form-control mmhg-diastol-inputmask"
                                            id="diastol-mask" placeholder="Enter Value in mmHg" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Berat Badan <small
                                                class="text-muted ms-2">kg</small></label>
                                        <input type="text" class="form-control kg-inputmask" id="berat-mask"
                                            placeholder="Enter Value in kg" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tinggi Badan <small
                                                class="text-muted ms-2">cm</small></label>
                                        <input type="text" class="form-control cm-inputmask" id="tinggi-mask"
                                            placeholder="Enter Value in cm" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Suhu <small class="text-muted ms-2">°C</small></label>
                                        <input type="text" class="form-control celcius-inputmask" id="suhu-mask"
                                            placeholder="Enter Value in °C" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">SpO2 <small class="text-muted ms-2">%</small></label>
                                        <input type="text" class="form-control spo2-inputmask" id="spo2-mask"
                                            placeholder="Enter Value in %" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Respiratory Rate <small
                                                class="text-muted ms-2">/mnt</small></label>
                                        <input type="text" class="form-control resp-rate-inputmask" id="resprate-mask"
                                            placeholder="Enter Value in /mnt" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- Kolom kosong atau parameter vital tambahan bisa ditambahkan di sini -->
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
                                        <li><a class="dropdown-item" href="#">Surat Keterangan Sehat</a></li>
                                        <li><a class="dropdown-item" href="#">Surat Keterangan Sakit</a></li>
                                        <li><a class="dropdown-item" href="#">General Consent</a></li>
                                        <li><a class="dropdown-item" href="#">Informed Consent</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex">
                                <input type="text" class="form-control me-2" id="searchNoRM"
                                    placeholder="Cari No. RM">
                                <button class="btn btn-primary" onclick="searchRM()">Cari</button>
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
                                <div class="col-md-2">
                                    <label class="form-label" for="no.rm">No. RM</label>
                                    <input type="text" class="form-control" id="no.rm" name="no.rm">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="jenispemeriksaan">Jenis Pemeriksaan</label>
                                    <select class="form-select" id="jenispemeriksaan" name="jenispemeriksaan">
                                        <option value="poliumum">Poli Umum</option>
                                        <option value="poligigi">Poli Gigi</option>
                                        <option value="kia">KIA</option>
                                        <option value="circum">Circum</option>
                                        <option value="vaksininternasional">Vaksin Internasional</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Diagnosis dan ICD 10 -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Diagnosis</h5>
                                    <textarea id="diagnosis" name="diagnosis" rows="5" class="form-control" placeholder="Ketik diagnosis"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">ICD 10</h5>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Kode atau Diagnosa">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <div id="selected-icds-icd10" class="border p-2 rounded bg-light mt-2">
                                        <p class="text-muted text-center mb-0" id="no-icd-selected-icd10">Belum ada
                                            diagnosa yang dipilih</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Subjective dan Objective -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Subjective</h5>
                                    <label class="form-label" for="subjective">Keluhan</label>
                                    <textarea id="subjective" name="subjective" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Objective</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Sistol (mmHg)</label>
                                            <input type="text" class="form-control" id="sistol-mask">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Diastol (mmHg)</label>
                                            <input type="text" class="form-control" id="diastol-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Berat Badan (kg)</label>
                                            <input type="text" class="form-control" id="berat-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Tinggi Badan (cm)</label>
                                            <input type="text" class="form-control" id="tinggi-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Suhu (°C)</label>
                                            <input type="text" class="form-control" id="suhu-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">SpO2 (%)</label>
                                            <input type="text" class="form-control" id="spo2-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Respiration Rate (/mnt)</label>
                                            <input type="text" class="form-control" id="resprate-mask">
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
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0">Pemeriksaan Fisik</h6>
                                        <button class="btn btn-sm btn-secondary">Tambah +</button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">ICD 9</h5>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Kode atau Tindakan">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <div id="selected-icds-icd9" class="border p-2 rounded bg-light mt-2">
                                        <p class="text-muted text-center mb-0" id="no-icd-selected-icd9">Belum ada
                                            Tindakan yang dipilih</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Layanan dan Rincian Obat -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Layanan</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Ketik Layanan">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Nama Layanan</th>
                                                <th>Harga Layanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Rincian Obat</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Ketik Obat">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Nama Obat</th>
                                                <th>Harga Obat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Rencana Kontrol dan Catatan -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Rencana Kontrol</label>
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-5">
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Alasan Kontrol">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-secondary w-100">Tambah +</button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Tanggal Kontrol</th>
                                                <th>Alasan Kontrol</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Catatan</label>
                                    <textarea class="form-control" rows="5" placeholder="Tambah catatan di sini"></textarea>
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
                                    <input type="text" class="form-control" id="discountCode" name="discountCode" />
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
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
    <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daftar judul per step
            const titles = [
                'Pendaftaran Rawat Jalan', // Step 1
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
@endsection
