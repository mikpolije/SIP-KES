@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body">
                <h1 class="card-title"></h1>
                <h1 class="title">General Consent</h1>
                <style>
                    .title {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 3rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
                    }
                </style>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="formGeneralConsent" method="POST" action="{{ route('general-consent.store') }}">
                    @csrf
                    <!-- Step 1 -->
                    <h5 class="section-title">Data Pasien</h5>
                    <input type="hidden" name="action" id="formAction" value="simpan">
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
                    <div class="w-100">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="noRm"> No RM : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="noRm" name="noRm"
                                        placeholder="Masukkan No. RM" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="nik"> NIK : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="nik" name="nik"
                                        placeholder="16 digit" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="jenisKelamin">Jenis Kelamin: <span
                                            class="danger">*</span>
                                    </label>
                                    <select class="form-select required" id="jenisKelamin" name="jenisKelamin">
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="namaPasien">Nama: <span class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="namaPasien" name="namaPasien"
                                        placeholder="Masukkan nama" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggalLahir">Tanggal Lahir: <span
                                            class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tanggalLahir"
                                        name="tanggalLahir" />
                                </div>
                            </div>
                        </div>
                        <p>Pasien atau wali di minta membaca, memahami dan mengisi informasi berikut:</p>
                        <p>Yang bertanda tangan dibawah ini:</p>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="namaWali">Nama: <span class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="namaWali" name="namaWali"
                                        placeholder="Masukkan nama" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggalLahirWali">Tanggal Lahir: <span
                                            class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tanggalLahirWali"
                                        name="tanggalLahirWali" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="hubungan">Hubungan dengan pasien: <span
                                            class="danger">*</span>
                                    </label>
                                    <select class="form-select required" id="hubungan" name="hubungan">
                                        <option value="Saya sendiri">Saya sendiri</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Suami">Suami</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="7">Lain - Lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="alamat"> Alamat : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="notelp"> No. Telepon : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="notelp" name="notelp"
                                        placeholder="Masukan No. Telpon" />
                                </div>
                            </div>
                            <div class="col-md-2" id="lain-wrapper" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label" for="hubunganpasien">Hubungan dengan pasien: <span
                                            class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="lain" id="lain">
                                </div>
                            </div>
                        </div>
                        <p>Selaku wali/pasien Klinik Pratama "Insan Medika", dengan ini menyatakan:</p>
                        <p>informasi tentang Hak dan Kewajiban pasien</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="menandatangani" name="menandatangani"
                                autocomplete="off">
                            <label for="menandatangani">Dengan menandatangani dokumen ini saya mengakui bahwa pada proses
                                pendaftaran untuk mendapatkan PELAYANAN di Klinik Pratama "Insan Medika", saya telah
                                mendapatkan informasi tentang hak-hak dan kewajiban saya sebagai pasien.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="menerimainformasi" name="menerimainformasi"
                                autocomplete="off">
                            <label for="menerimainformasi">Saya telah menerima informasi tentang peraturan yang
                                diberlakukan oleh Klinik Pratama "Insan Medika", dan saya beserta keluarga bersedia untuk
                                mematuhinya.</label>
                        </div>
                        <p class="mb-2">Persetujuan perawatan dan pengobatan</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="kondisi" name="kondisi" autocomplete="off">
                            <label for="kondisi">Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan
                                medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur
                                diagnostik, memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional
                                mereka meliputi; Pemerikasaan fisik yang dilakukan oleh perawat dan dokter, Pemasangan alat
                                kesehatan (kecuali yang membutuhkan persetujuan khusus), Asuhan keperawatan, Pemeriksaan
                                laboratorium, Pemeriksaan Radiologi.</label>
                        </div>
                        <p class="mb-2">Persetujuan pelepasan informasi</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="diagnosis" name="diagnosis" autocomplete="off">
                            <label for="diagnosis">Saya memahami informasi yang ada dalam diri saya termasuk diagnosis,
                                hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis di
                                Klinik Pratama "Insan Medika" akan dijamin kerahasiaannya.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="wewenang" name="wewenang" autocomplete="off">
                            <label for="wewenang">Saya memberikan wewenang kepada Klinik Pratama "Insan Medika" untuk
                                memberikan informasi tentang dignosis hasil pelayanan dan pengobatan bila diperlukan untuk
                                memproses klaim ansuransi/BPJS dan perusahaan kerjasama.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="memberikanwewenang" name="memberikanwewenang"
                                autocomplete="off">
                            <label for="memberikanwewenang">Saya </label>
                            <div class="col-md-2">
                                <select class="form-select form-select-sm required" id="memberikan" name="beri">
                                    <option value="memberikan">Memberikan</option>
                                    <option value="tidakmemberikan">Tidak Memberikan</option>
                                </select>
                            </div>
                            <label for="memberikanwewenang"> wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan
                                informasi tentang diagnosis hasil pemeriksaan dan pengobatan saya kepada:</label>
                        </div>
                        <div class="row ms-3">
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab1"
                                    name="penanggungJawab1" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab2"
                                    name="penanggungJawab2" />
                            </div>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="mengijinkanwewenang" name="mengizinkanwewenang"
                                autocomplete="off">
                            <label for="mengizinkanwewenang">Saya </label>
                            <div class="col-md-2">
                                <select class="form-select form-select-sm required" id="mengijinkan" name="ijin">
                                    <option value="mengijinkan">Mengijinkan</option>
                                    <option value="tidakmengijinkan">Tidak Mengijinkan</option>
                                </select>
                            </div>
                            <label for="mengijinkanwewenang"> Klinik Pratama "Insan Medika" memberi akses bagi keluarga dan
                                saudara serta orang-orang yang menerima pengobatan dan pemeriksaan (sebutkan nama bila ada
                                permintaan khusus yang tidak diijinkan)</label>
                        </div>
                        <div class="row ms-3">
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab3"
                                    name="penanggungJawab3" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab4"
                                    name="penanggungJawab4" />
                            </div>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="persetujuan" name="persetujuan"
                                autocomplete="off">
                            <label for="persetujuan">Saya mengerti dan memahami tentang bahwa saya memiliki hak untuk
                                persetujuan atau menolak persetujuan untuk setiap prosedur/terapi</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="prosesperawatan" name="prosesperawatan"
                                autocomplete="off">
                            <label for="prosesperawatan">Klinik Pratama "Insan Medika" telah memberikan informasi kepada
                                saya terkait kemungkinana keterlibatan peserta didik dan/mahasiswa yang turut berpartisipasi
                                dalam proses perawatan.</label>
                        </div>
                        <p class="mb-2">Pengajuan Keluhan</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="pengajuankeluhan" name="pengajuankeluhan"
                                autocomplete="off">
                            <label for="pengajuankeluhan">Saya menyatakan bahwa saya telah menerima informasi tentang
                                adanya tata cara mengajukan dan mengatasi keluhan terkait melayanan medik ataupun
                                administrasi yang diberikan terhadap diri saya. Saya setuju mengikuti tata cara mengajukan
                                kelihan sesuai prosedur yang ada.</label>
                        </div>
                        <p>Dengan tanda tangan saya dibawah ini, saya menyatakan bahwa saya telah membaca dan sepenuhnya
                            setuju dengan setiap pernyataan yang terdapat pada formulir ini dan menandatangani tanpa paksaan
                            dan dengan kesadaran penuh seluruh kriteria yang terdapat pada persetujuan umum (General
                            Consent).</p>
                        <p class="mt-5 text-end me-5">Jember, {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d/m/Y') }},
                            Jam {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB</p>
                        <div class="row mt-5">
                            <div class="col-md-6 mb-3">
                                <p class="text-center">Pasien/Keluarga/Penanggung jawab</p>
                                <div class="col-md-6 mx-auto text-center">
                                    <input type="text" onclick="showQRModal()" class="form-control mb-2 text-center"
                                        id="namaPenanggungJawab" name="namaPenanggungJawab"
                                        placeholder="Klik untuk menandatangani" readonly
                                        style="cursor: pointer; background-color: #f9f9f9;" />

                                    <input type="hidden" id="ttdPenanggungJawab" name="ttdPenanggungJawab">

                                    <img id="ttdPreview" src="" alt="Tanda Tangan"
                                        style="max-width: 100%; height: auto; border: 1px solid #ccc; border-radius: 6px; display: none; margin-top: 8px;" />
                                </div>


                           