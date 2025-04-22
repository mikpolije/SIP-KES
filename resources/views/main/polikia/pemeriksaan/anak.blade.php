@php
    $conditions = [
        'Compos Mentis' => 'Compos Mentis',
        'Apatis' => 'Apatis',
        'Delirium' => 'Delirium',
        'Somnolen' => 'Somnolen',
        'Stupor' => 'Stupor',
        'Semi Koma' => 'Semi Koma',
        'Koma' => 'Koma',
    ];
@endphp

<div class="card w-100 mt-3">
    <div class="card-body">
        <h6 class="section-title">A. IDENTITAS</h6>
        <div class="row px-3 justify-content-between">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-4">
                    <label class="form-label required-label">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="genderP" name="jenis_kelamin" value="P" required>
                        <label class="form-check-label" for="genderP">P</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="genderL" name="jenis_kelamin" value="L">
                        <label class="form-check-label" for="genderL">L</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" name="umur" id="umur" required>
                </div>
            </div>
        </div>

        <h6 class="section-title mt-3">B. IDENTITAS ORANG TUA</h6>
        <div class="row justify-content-between px-3">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required>
                </div>
                <div class="mb-3">
                    <label for="umur_ibu" class="form-label">Umur</label>
                    <input type="number" class="form-control" name="umur_ibu" id="umur_ibu" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                    <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($employments as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama_ibu" class="form-label">Agama</label>
                    <select name="agama_ibu" id="agama_ibu" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($religions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan_ibu" class="form-label">Pendidikan</label>
                    <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($educations as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat_ibu" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat_ibu" id="alamat_ibu" required>
                </div>
                <div class="mb-3">
                    <label for="notelp_ibu" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" name="notelp_ibu" id="notelp_ibu" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required>
                </div>
                <div class="mb-3">
                    <label for="umur_ayah" class="form-label">Umur</label>
                    <input type="number" class="form-control" name="umur_ayah" id="umur_ayah" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                    <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($employments as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="agama_ayah" class="form-label">Agama</label>
                    <select name="agama_ayah" id="agama_ayah" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($religions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan_ayah" class="form-label">Pendidikan</label>
                    <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control" required>
                        <option value="">-</option>
                        @foreach ($educations as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat_ayah" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat_ayah" id="alamat_ayah" required>
                </div>
                <div class="mb-3">
                    <label for="notelp_ayah" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" name="notelp_ayah" id="notelp_ayah" required>
                </div>
            </div>
        </div>

        <h6 class="section-title mt-3">C. ANAMNESE</h6>
        <div class="row px-3">
            <div class="col-md-4 mb-3">
                <label for="keadaan_umum" class="form-label">Keadaan Umum</label>
                <input type="text" class="form-control" id="keadaan_umum" name="keadaan_umum" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="kesadaran" class="form-label">Kesadaran</label>
                <select name="kesadaran" id="kesadaran" class="form-control" required>
                    <option value="">-</option>
                    @foreach ($conditions as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <input type="text" class="form-control" id="keluhan" name="keluhan" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="tensi" class="form-label">Tensi</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="tensi" name="tensi" required>
                    <span class="input-group-text">mmHg</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="tb" class="form-label">TB</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="tb" name="tinggi_badan" required>
                    <span class="input-group-text">cm</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="ld" class="form-label">LD</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="ld" name="lingkar_dada" required>
                    <span class="input-group-text">cm</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="rr" class="form-label">RR</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="rr" name="respirasi" required>
                    <span class="input-group-text">x/mnt</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nadi" class="form-label">Nadi</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nadi" name="nadi" required>
                    <span class="input-group-text">x/mnt</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="bb" class="form-label">BB</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="bb" name="berat_badan" required>
                    <span class="input-group-text">kg</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="lk" class="form-label">LK</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="lk" name="lingkar_kepala" required>
                    <span class="input-group-text">cm</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="goldarah" class="form-label">Golongan Darah</label>
                <select name="goldarah" id="goldarah" class="form-control" required>
                    <option value="">-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                    <option value="">Tidak Diketahui</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="suhu" class="form-label">Suhu</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="suhu" name="suhu" required>
                    <span class="input-group-text">°C</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="lp" class="form-label">LP</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="lp" name="lingkar_perut" required>
                    <span class="input-group-text">cm</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="lila" class="form-label">LILA</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="lila" name="lila" required>
                    <span class="input-group-text">cm</span>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body row justify-content-between">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="tipe_pasien" class="form-label">Tipe Pasien</label>
                        <input type="text" class="form-control" name="tipe_pasien" id="tipe_pasien" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_layanan" class="form-label">Unit Layanan</label>
                        <input type="text" class="form-control" name="unit_layanan" id="unit_layanan" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label required-label">Kunjungan Sakit</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sakitY" name="kunjungan" value="Y" required>
                            <label class="form-check-label" for="sakitY">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sakitN" name="kunjungan" value="T">
                            <label class="form-check-label" for="sakitN">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="obat" class="form-label">Obat</label>
                        <input type="text" class="form-control" name="obat" id="obat" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="bidan" class="form-label">Bidan</label>
                        <select name="bidan" id="bidan" class="form-control" required>
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="diagnosa" class="form-label">Diagnosa</label>
                        <input type="text" class="form-control" name="diagnosa" id="diagnosa" required>
                    </div>
                    <div class="mb-2">
                        <label for="tindakan" class="form-label">ICD 10</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kode_tindakan" id="kode_tindakan" placeholder="Ketik Kode Tindakan" required>
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="icd-container rounded">
                            <div class="icd-title">
                                <p>Nama ICD 10</p>
                            </div>
                            <div class="icd-content">
                                <p>Tidak Ada Data</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-end mt-3">
            <button type="button" class="btn btn-secondary previous-step me-2">Sebelumnya</button>
            <button type="button" class="btn btn-primary" id="submit_pemeriksaan_anak"><i class="fas fa-save me-2"></i>Simpan</button>
        </div>
    </div>
</div>
