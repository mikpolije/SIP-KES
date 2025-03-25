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
                        <div class="card w-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="jeniskelamin">Jenis Kelamin: <span class="danger">*</span></label>
                                        <select class="form-select required" id="jeniskelamin" name="jeniskelamin">
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="agama">Agama:</label>
                                        <select class="form-select required" id="agama" name="agama">
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen (Protestan)</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                            <option value="7">Penghayat</option>
                                            <option value="8">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="pendidikan">Pendidikan:</label>
                                        <select class="form-select required" id="pendidikan" name="pendidikan">
                                            <option value="1">Tidak Sekolah</option>
                                            <option value="2">SD</option>
                                            <option value="3">SLTP Sederajat</option>
                                            <option value="4">SLTA Sederajat</option>
                                            <option value="5">D1-D3 Sederajat</option>
                                            <option value="6">D4</option>
                                            <option value="7">S1</option>
                                            <option value="8">S2</option>
                                            <option value="9">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="pekerjaan">Pekerjaan:</label>
                                        <select class="form-select required" id="pekerjaan" name="pekerjaan">
                                            <option value="1">Tidak Bekerja</option>
                                            <option value="2">PNS</option>
                                            <option value="3">TNI/Polri</option>
                                            <option value="4">BUMN</option>
                                            <option value="5">Pegawai Swasta/Wirausaha</option>
                                            <option value="6">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Next</button>
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
                            <label class="form-label">Sistol <small class="text-muted ms-2">mmHg</small></label>
                            <input type="text" class="form-control mmhg-sistol-inputmask" id="sistol-mask"
                              placeholder="Enter Value in mmHg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Diastol <small class="text-muted ms-2">mmHg</small></label>
                            <input type="text" class="form-control mmhg-diastol-inputmask" id="diastol-mask"
                              placeholder="Enter Value in mmHg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Berat Badan <small class="text-muted ms-2">kg</small></label>
                            <input type="text" class="form-control kg-inputmask" id="berat-mask"
                              placeholder="Enter Value in kg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Tinggi Badan <small class="text-muted ms-2">cm</small></label>
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
                            <label class="form-label">Respiratory Rate <small class="text-muted ms-2">/mnt</small></label>
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
                    <div class="row">
                        <!-- Kolom Diagnosis -->
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis</label>
                            <textarea name="diagnosis" id="diagnosis" rows="6" class="form-control" placeholder="Ketik diagnosis"></textarea>
                          </div>
                        </div>
                        <!-- Kolom ICD 10 -->
                        <div class="col-md-6">
                          <div class="card mb-3">
                            <div class="card-body">
                              <label class="form-label fw-medium">ICD 10</label>
                              <div class="position-relative">
                                <div class="input-group">
                                  <input type="text" class="form-control" id="search-icd" placeholder="Ketik ICD 10" autocomplete="off">
                                  <button class="btn btn-secondary" type="button" id="search-btn">Cari</button>
                                </div>
                                <!-- Dropdown hasil pencarian -->
                                <div id="search-results" class="position-absolute w-100 bg-white border rounded shadow-sm mt-1 z-index-dropdown" style="display: none; max-height: 300px; overflow-y: auto;">
                                  <!-- Hasil pencarian akan ditampilkan di sini -->
                                </div>
                              </div>
                              <div class="mt-3">
                                <label class="form-label fw-medium">Diagnosa Terpilih</label>
                                <div id="selected-icds" class="p-2 rounded border min-height-80">
                                  <p class="text-muted text-center mb-0" id="no-icd-selected">Belum ada diagnosa yang dipilih</p>
                                  <!-- ICD terpilih akan ditampilkan di sini -->
                                </div>
                              </div>
                            </div>
                          </div>
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
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Sistol <small class="text-muted ms-2">mmHg</small></label>
                            <input type="text" class="form-control mmhg-sistol-inputmask" id="sistol-mask"
                              placeholder="Enter Value in mmHg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Diastol <small class="text-muted ms-2">mmHg</small></label>
                            <input type="text" class="form-control mmhg-diastol-inputmask" id="diastol-mask"
                              placeholder="Enter Value in mmHg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Berat Badan <small class="text-muted ms-2">kg</small></label>
                            <input type="text" class="form-control kg-inputmask" id="berat-mask"
                              placeholder="Enter Value in kg" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Tinggi Badan <small class="text-muted ms-2">cm</small></label>
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
                            <label class="form-label">Respiratory Rate <small class="text-muted ms-2">/mnt</small></label>
                            <input type="text" class="form-control resp-rate-inputmask" id="resprate-mask"
                              placeholder="Enter Value in /mnt" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <!-- Kolom kosong atau parameter vital tambahan bisa ditambahkan di sini -->
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
    <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
    
    <!-- ICD-10 Search Script -->
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
                url: '{{ url("search_icd.php") }}',
                data: { term: searchTerm },
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
                    $('#search-results').html('<div class="p-2 text-danger">Error searching: ' + error + '</div>');
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
                selectedICDs.push({ id, name });
                
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
                container.html('<p class="text-muted text-center mb-0" id="no-icd-selected">Belum ada diagnosa yang dipilih</p>');
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
    </style>
@endsection