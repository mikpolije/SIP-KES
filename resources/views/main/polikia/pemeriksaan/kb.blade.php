{{-- <div class="row justify-content-between align-items-center mt-5">
    <div class="col-md-6">
        <h5 class="subtitle">Data Pemeriksaan</h5>
    </div>
    <div class="col-md-4" id="cari-data-container">
        <input type="search" name="" id="cari_data_pasien" class="form-control" placeholder="Data Pasien">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</div>

<div class="dropdown mt-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Surat Keterangan
    </button>

    <ul class="dropdown-menu">
        @foreach ($certificates as $cert)
            <li style="list-style: none;">
                <a class="dropdown-item" href="#">{{ $cert }}</a>
            </li>
        @endforeach
    </ul>
</div>

<div class="card w-100 mt-3">
    <div class="card-body row">
        <div class="col-md-2">
            <label for="no_antrian" class="form-label">No Antrian</label>
            <input type="text" class="form-control" name="no_antrian" id="no_antrian">
        </div>
        <div class="col-md-2">
            <label for="no_rm" class="form-label">No RM</label>
            <input type="text" class="form-control" name="no_rm" id="no_rm">
        </div>
        <div class="col-md-4">
            <label for="nama_pemeriksaan" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_pemeriksaan" id="nama_pemeriksaan">
        </div>
        <div class="col-md-2">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal">
        </div>
        <div class="col-md-2">
            <label for="jenis_pemeriksaan" class="form-label">Jenis Pemeriksaan</label>
            <select name="jenis_pemeriksaan" id="jenis_pemeriksaan" class="form-control">
                @foreach ($inspectionTypes as $key => $value)
                    <option value="{{ $key }}" @selected($key == 'Anak')>{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div> --}}

<div class="card w-100 mt-3">
    <div class="card-body">
        <h6 class="section-title">A. IDENTITAS</h6>
        <div class="row px-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" name="umur" id="umur" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($employments as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select name="agama" id="agama" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($religions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($educations as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_anak" class="form-label">Jumlah Anak Hidup</label>
                    <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" required>
                </div>
                <div class="mb-3 d-flex flex-wrap gap-3">
                    <p for="" class="form-label">Status Peserta KB</p>

                    <div class="form-check">
                        <input type="radio" name="kb" id="kb_pernah" class="form-check-input" value="Pernah">
                        <label for="kb_pernah" class="form-check-label">Pernah</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="kb" id="kb_tidakpernah" class="form-check-input" value="Tidak Pernah">
                        <label for="kb_tidakpernah" class="form-check-label">Tidak Pernah</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_suami" class="form-label">Nama Suami</label>
                    <input type="text" class="form-control" name="nama_suami" id="nama_suami" required>
                </div>
                <div class="mb-3">
                    <label for="umur_suami" class="form-label">Umur Suami</label>
                    <input type="number" class="form-control" name="umur_suami" id="umur_suami" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_suami" class="form-label">Pekerjaan Suami</label>
                    <select name="pekerjaan_suami" id="pekerjaan_suami" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($employments as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama_suami" class="form-label">Agama Suami</label>
                    <select name="agama_suami" id="agama_suami" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($religions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan_suami" class="form-label">Pendidikan Suami</label>
                    <select name="pendidikan_suami" id="pendidikan_suami" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($educations as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telp</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                </div>
                <div class="mb-3">
                    <label for="umur_anak" class="form-label">Umur Anak Terkecil</label>
                    <input type="number" class="form-control" name="umur_anak" id="umur_anak" required>
                </div>
            </div>
        </div>

        <h6 class="section-title mt-3">B. ANAMNESE</h6>

        <div class="row px-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="hpht" class="form-label">HPHT</label>
                    <input type="text" class="form-control" name="hpht" id="hpht" required>
                </div>
                <div class="mb-3">
                    <label for="gpa" class="form-label">Jumlah GPA</label>
                    <input type="number" class="form-control" name="gpa" id="gpa" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="menyusui" class="form-label">Menyusui</label>
                    <input type="text" class="form-control" name="menyusui" id="menyusui">
                </div>
                <div class="mb-3">
                    <label for="manarche" class="form-label">Manarche</label>
                    <input type="text" class="form-control" name="manarche" id="manarche">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <h6 class="section-title">C. PEMERIKSAAN FISIK</h6>

                <div class="row px-3">
                    <div class="mb-3">
                        <label for="keadaan_umum" class="form-label">Keadaan Umum</label>
                        <input type="text" class="form-control" name="keadaan_umum" id="keadaan_umum">
                    </div>
                    <div class="mb-3">
                        <label for="kesadaran" class="form-label">Kesadaran</label>
                        <input type="text" class="form-control" name="kesadaran" id="kesadaran">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sistole" class="form-label">Sistole</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="sistole" name="sistole">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="beratbadan" class="form-label">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="beratbadan" name="berat_badan">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="suhu" class="form-label">Suhu</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="suhu" name="suhu">
                                    <span class="input-group-text">°C</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="respirasi" class="form-label">Respiration Rate</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="respirasi" name="respirasi">
                                    <span class="input-group-text">/mnt</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="diastole" class="form-label">Diastole</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="diastole" name="diastole">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tinggibadan" class="form-label">Tinggi Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tinggibadan" name="tinggi_badan">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="spo2" class="form-label">SPO2</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="spo2" name="spo2">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nadi" class="form-label">Nadi</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="nadi" name="nadi">
                                    <span class="input-group-text">/mnt</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h6 class="section-title">D. KONTRASEPSI</h6>

                <div class="row px-3">
                    <div class="col-12 mb-3 d-flex flex-wrap gap-2 justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" name="kontrasepsi[]" id="kb_kontrasepsi" class="form-check-input" value="IUD">
                            <label for="kb_kontrasepsi" class="form-check-label">IUD</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="kontrasepsi[]" id="kb_suntik" class="form-check-input" value="Suntik">
                            <label for="kb_suntik" class="form-check-label">Suntik</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="kontrasepsi[]" id="kb_kondom" class="form-check-input" value="Kondom">
                            <label for="kb_kondom" class="form-check-label">Kondom</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="kontrasepsi[]" id="kb_implant" class="form-check-input" value="Implant">
                            <label for="kb_implant" class="form-check-label">Implant</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="kontrasepsi[]" id="kb_pil" class="form-check-input" value="Pil">
                            <label for="kb_pil" class="form-check-label">Pil</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dilayani" class="form-label">Tanggal Dilayani</label>
                        <input type="date" class="form-control" name="dilayani" id="dilayani">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dicabut" class="form-label">Tanggal Dicabut</label>
                        <input type="date" class="form-control" name="dicabut" id="dicabut">
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="dipasang" class="form-label">Tanggal Dipasang Kembali</label>
                        <input type="date" class="form-control" name="dipasang" id="dipasang">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="tipe_pasien" class="form-label">Tipe Pasien</label>
                        <input type="text" class="form-control" name="tipe_pasien" id="tipe_pasien" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="tindakan" class="form-label">Tindakan</label>
                        <input type="date" class="form-control" name="tindakan" id="tindakan" required>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="tindakan" class="form-label">ICD 9 - CM</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kode_tindakan" id="kode_tindakan" placeholder="Ketik Kode Tindakan" required>
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="icd-container rounded">
                            <div class="icd-title">
                                <p>Nama ICD 9 - CM</p>
                            </div>
                            <div class="icd-content">
                                <p>Tidak Ada Data</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-end mt-3">
                <button type="button" class="btn btn-secondary previous-step me-2">Sebelumnya</button>
                <button type="button" class="btn btn-primary" id="submit_pemeriksaan_kb"><i class="fas fa-save me-2"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
