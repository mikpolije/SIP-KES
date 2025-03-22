@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
        <div class="container-fluid">
            <div class="card w-100">
                <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Pendaftaran Rawat Jalan</h1>
                    <style>
                        .title{
                            font-family: 'Montserrat', sans-serif;
                            font-size: 3rem;
                            font-weight: bold;
                            text-align: left;
                            color: #111754;
                            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
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
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="norm"> No RM : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required" id="norm" name="norm" placeholder="Masukkan No. RM"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="alamatlengkap"> Alamat Lengkap : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required" id="alamatlengkap" name="alamatlengkap" placeholder="Nama Jalan/Blok/Nomor Rumah"/>
                        </div>
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama Lengkap: <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="nama" name="nama" placeholder="Masukkan nama"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="provinsi">Provinsi:</label>
                                <input type="text" class="form-control required" id="provinsi" name="provinsi" />
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
                                <input type="text" class="form-control required" id="nik" name="nik" placeholder="16 digit"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="kecamatan">Kecamatan:</label>
                                <input type="text" class="form-control required" id="kecamatan" name="kecamatan" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="kelurahan">Kelurahan/Desa: </label>
                                <input type="text" class="form-control required" id="kelurahan" name="kelurahan" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="tempatlahir">Tempat Lahir: <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="tempatlahir" name="tempatlahir"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="kodepos">Kode Pos:</label>
                                <input type="text" class="form-control required" id="kodepos" name="kodepos" />
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label class="form-label" for="rt">RT:</label>
                                <input type="text" class="form-control required" id="rt" name="rt" />
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label class="form-label" for="rt">RW:</label>
                                <input type="text" class="form-control required" id="rw" name="rw" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="tanggallahir">Tanggal Lahir: <span class="danger">*</span></label>
                                <input type="date" class="form-control required" id="tanggallahir" name="tanggallahir"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="jeniskelamin">Jenis Kelamin: <span class="danger">*</span>
                                </label>
                                <select class="form-select required" id="jeniskelamin" name="jeniskelamin">
                                <option value="">Jenis Kelamin</option>
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
                                <label for="telepon">Nomor Telepon:</label>
                                <input type="text" class="form-control required" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="ibukandung">Nama Ibu Kandung:</label>
                                <input type="text" class="form-control required" id="ibukandung" name="ibukandung" />
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
                                <input type="text" class="form-control required" id="namawali" name="namawali" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="tlwali">Tanggal Lahir Wali :</label>
                                <input type="date" class="form-control required" id="tlwali" name="tlwali" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="notelpwali">Nomor Telepon Wali:</label>
                            <input type="texr" class="form-control required" id="notelpwali" name="notelpwali" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="alamatwali">Alamat Wali</label>
                            <input type="text" class="form-control required" id="alamatwali" name="alamatwali" />
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
                                <input type="text" class="form-control required" id="dokter" name="dokter" />
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
                    <h6>Layanan</h6>
                    <section>
                    <h4 class="section-title">Data Pendaftaran</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="searchNoRM" placeholder="Cari berdasarkan No. RM">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="searchRM()">Cari</button>
                        </div>
                    </div>
                    <script>
                    function searchRM() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("searchNoRM");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("yourTableID"); // Ganti dengan ID tabel Anda
                        tr = table.getElementsByTagName("tr");

                        for (i = 1; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1]; // Ubah index sesuai posisi No. RM
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                    </script>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="noantrian">No. Antrian</label>
                                <input type="text" class="form-control required" id="noantrian" name="noantrian"/>
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
                            <input type="date" class="form-control required" id="tanggalperiksa" name="tanggalperiksa" />
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
                            <textarea name="shortDescription" id="subjek" name="subjek" rows="6"
                            class="form-control required"></textarea>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="sistole">Sistole</label>
                                <input type="text" class="form-control required" id="sistole" name="sistole"/>mmHg
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="diastole">Diastole</label>
                                <input type="text" class="form-control required" id="diastole" name="diastole" />mmHg
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="beratbadan">Berat Badan</label>
                                <input type="text" class="form-control required" id="beratbadadn" name="beratbadan"/>Kg
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="tinggibadan">Tinggi Badan</label>
                                <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan"/>Cm
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                         <div class="mb-3">
                            <label class="form-label" for="suhu">Suhu</label>
                            <input type="text" class="form-control required" id="suhu" name="suhu"/>°C
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="spo2">SpO2</label>
                            <input type="text" class="form-control required" id="spo2" name="spo2"/>%
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="respiratory_rate">Respiratory Rate</label>
                            <input type="text" class="form-control required" id="respiratory_rate" name="respiratory_rate"/>/mnt
                        </div>
                    </div>
                </div>
                </section>

                    <!-- Step 3 -->
                    <h6>Pemeriksaan</h6>
                    <section>
                    <h4 class="section-title">Data Pemeriksaan</h4>
                    <div class="row mb-3">
    <div class="col-md-12">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center me-3">
                <button class="btn btn-warning me-2">Rujuk Rawat Inap</button>
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="suratKeteranganDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Surat Keterangan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="suratKeteranganDropdown">
                        <li><a class="dropdown-item" href="#" value="suratketerangansehat">Surat Keterangan Sehat</a></li>
                        <li><a class="dropdown-item" href="#" value="suratketerangansakit">Surat Keterangan Sakit</a></li>
                        <li><a class="dropdown-item" href="#" value="generalconsent">General Consent</a></li>
                        <li><a class="dropdown-item" href="#" value="informedconsent">Informed Consent</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="searchNoRM" placeholder="Cari berdasarkan No. RM">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" onclick="searchRM()">Cari</button>
                        </div>
                    </div>

                    <script>
                    function searchRM() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("searchNoRM");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("yourTableID"); // Ganti dengan ID tabel Anda
                        tr = table.getElementsByTagName("tr");

                        for (i = 1; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1]; // Ubah index sesuai posisi No. RM
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                    </script>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label" for="noantian">No Antrian <span class="danger"></span></label>
                        <input type="text" class="form-control required" id="noantian" name="noantian"/>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" />
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label" for="no.rm">No. RM</label>
                        <input type="text" class="form-control" id="no.rm" name="no.rm" />
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label" for="tanggal">Tanggal</label>
                        <input type="date" class="form-control required" id="tanggal" name="tanggal"/>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label" for="jenispemeriksaan">Jenis Pemeriksaan</label>
                        <select class="form-select required" id="jenispemeriksaan" data-placeholder="Type to search cities" name="jenispemeriksaan">
                            <option value="poliumum">Poli Umum</option>
                            <option value="poligigi">Poli Gigi</option>
                            <option value="kia">KIA</option>
                            <option value="circum">Circum</option>
                            <option value="vaksininternasional">Vaksin Internasional</option>
                    </select>
                    </div>
                    </div>
                    </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis </label>
                            <textarea name="diagnosis" id="diagnosis" rows="6" class="form-control" placeholder="Ketik diagnosis"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="icd10">ICD 10 </label>
                            <textarea name="icd10" id="icd10" rows="6" placeholder="Ketik kode diagnosis"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="subjective/keluhan">Subjective / Keluhan </label>
                            <textarea name="subjective/keluhan" id="subjective/keluhan" rows="6"
                            class="form-control"></textarea>
                        </div>
                        </div>
                    <div class="row">
                    <h4 class="section-title">Data Pemeriksaan</h4>
                    <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="sistole">Sistole</label>
                                <input type="text" class="form-control required" id="Sistole" name="Sistole"/>mmHg</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="Diastole">Diastole</label>
                                <input type="text" class="form-control" id="Diastole" name="Diastole" />mmHg</label>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="Berat Badan">Berat Badan</label>
                                <input type="text" class="form-control required" id="Berat Badadn" name="Berat Badan"/>Kg</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="Tinggi Badan">Tinggi Badan</label>
                                <input type="text" class="form-control required" id="Tinggi Badan" name="Tinggi Badan"/>Cm</label>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                         <div class="mb-3">
                            <label class="form-label" for="suhu">Suhu</label>
                            <input type="text" class="form-control required" id="suhu" name="suhu"/>°C
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="spo2">SpO2</label>
                            <input type="text" class="form-control required" id="spo2" name="spo2"/>%
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="respiratory_rate">Respiratory Rate</label>
                            <input type="text" class="form-control required" id="respiratory_rate" name="respiratory_rate"/>/mnt
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="assesment">Assesment </label>
                            <textarea name="assesment" id="assesment" rows="6" class="form-control" placeholder="Ketik Assesment"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="plan">Plan </label>
                            <textarea name="plan" id="plan" rows="6" class="form-control" placeholder="Ketik Plan"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="pemeriksaanfisik">Pemeriksaan Fisik </label>
                            <textarea name="pemeriksaanfisik" id="pemeriksaanfisik" rows="6"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="icd9-cm">ICD 9-CM </label>
                            <textarea name="icd9-cm" id="icd9-cm" rows="6"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="layanan">Layanan </label>
                            <textarea name="layanan" id="layanan" rows="6" placeholder="Ketikkan Layanan"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="rincianobat">Rincian Obat </label>
                            <textarea name="rincianobat" id="rincianobat" rows="6" placeholder="Ketik Obat"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="rencanakontrol">Rencana Kontrol </label>
                            <textarea name="rencanakontrol" id="rencanakontrol" rows="6"
                            class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="catatan">Catatan </label>
                            <textarea name="catatan" id="catatan" rows="6" class="form-control" placeholder="Tambah Catatan Disini"></textarea>
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
                                <input type="radio" id="customRadio11" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio11">1 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio12" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio12">2 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio13" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio13">3 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio14" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio14">4 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio15" name="customRadio" class="form-check-input" />
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
                                <input type="number" class="form-control required" id="totalAmount" name="totalAmount" />
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
                            <input type="date" class="form-control required" id="paymentDate" name="paymentDate" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="paymentNotes">Catatan Pembayaran :</label>
                            <textarea name="paymentNotes" id="paymentNotes" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran :</label>
                            <div class="c-inputs-stacked">
                            <div class="form-check">
                                <input type="radio" id="paidFull" name="paymentStatus" class="form-check-input" value="paidFull" />
                                <label class="form-check-label" for="paidFull">Lunas</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="paidPartial" name="paymentStatus" class="form-check-input" value="paidPartial" />
                                <label class="form-check-label" for="paidPartial">Bayar Sebagian</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="pending" name="paymentStatus" class="form-check-input" value="pending" />
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
@endsection
