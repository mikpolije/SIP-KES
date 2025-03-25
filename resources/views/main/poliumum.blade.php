@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
              <p class="mb-0">This is a sample page</p>
            </div>
          </div>
          <h6>Pemeriksaan</h6>
          <section>
          <h4 class="section-title">Data Pemeriksaan</h4>
          <div class="row mb-3">
<div class="col-md-12">
<div class="d-flex align-items-center justify-content-between">
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

@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
@endsection
