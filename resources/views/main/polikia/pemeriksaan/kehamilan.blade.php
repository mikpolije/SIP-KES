@php
    $questions = [
        ['id' => 'hipertensi', 'label' => 'Memiliki riwayat hipertensi?'],
        ['id' => 'hipertiroid', 'label' => 'Memiliki riwayat hipertiroid?'],
        ['id' => 'diabetes', 'label' => 'Memiliki riwayat diabetes?'],
        ['id' => 'penyakit_jantung', 'label' => 'Memiliki riwayat penyakit jantung?'],
        ['id' => 'tuberculosis', 'label' => 'Memiliki riwayat penyakit tuberculosis?'],
        ['id' => 'asap_rokok', 'label' => 'Apakah ibu hamil terpapar asap rokok?'],
        ['id' => 'penyuluhan_kie', 'label' => 'Penyuluhan/KIE kepada ibu hamil?'],
        ['id' => 'penambah_darah', 'label' => 'Suplemen penambah darah?'],
        ['id' => 'suplemen_makanan', 'label' => 'Suplemen makanan untuk ibu hamil?'],
        ['id' => 'rujukan_pelayanan', 'label' => 'Rujukan pelayanan pada ibu hamil?'],
    ];
@endphp

<div class="card w-100 mt-3">
    <div class="card-body">
        <h6 class="section-title" style="font-weight: bold">PENDAMPINGAN IBU HAMIL KE-</h6>
        <div class="d-flex flex-wrap" id="pendampingan">
            @foreach (range(1, 10) as $item)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="pendampingan{{ $item }}" name="pendampingan" value="{{ $item }}" required>
                <label class="form-check-label" for="pendampingan{{ $item }}">{{ $item }}</label>
            </div>
            @endforeach
        </div>

        <div class="row justify-content-between mt-5">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="keluhan_utama" class="form-label">Keluhan Utama</label>
                    <input type="text" class="form-control" name="keluhan_utama" id="keluhan_utama" required>
                </div>
                <div class="mb-3">
                    <label for="pertama_haid" class="form-label">Tanggal Pertama Haid Terakhir</label>
                    <input type="date" class="form-control" name="pertama_haid" id="pertama_haid" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_anak" class="form-label">Jumlah Anak Saat Ini</label>
                    <input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" required>
                </div>
                <div class="mb-3">
                    <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                    <input type="text" class="form-control" name="usia_kehamilan" id="usia_kehamilan" required>
                </div>
                <div class="mb-3">
                    <label for="menarche" class="form-label">Menarche</label>
                    <input type="text" class="form-control" name="menarche" id="menarche" required>
                </div>
                <div class="mb-3">
                    <label for="lama_haid" class="form-label">Lama Haid</label>
                    <input type="text" class="form-control" name="lama_haid" id="lama_haid" required>
                </div>
                <div class="mb-3">
                    <label for="banyak_haid" class="form-label">Banyak Haid</label>
                    <input type="text" class="form-control" name="banyak_haid" id="banyak_haid" required>
                </div>
                <div class="mb-3">
                    <label for="warna_haid" class="form-label">Warna/bau Menstruasi</label>
                    <input type="text" class="form-control" name="warna_haid" id="warna_haid" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="diagnosa_kebidanan" class="form-label">Diagnosa Kebidanan</label>
                    <input type="text" class="form-control" name="diagnosa_kebidanan" id="diagnosa_kebidanan" required>
                </div>
                <div class="mb-2">
                    <label for="kode_tindakan_kehamilan" class="form-label">ICD 10</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="kode_tindakan_kehamilan" id="kode_tindakan_kehamilan" placeholder="Ketik Kode Tindakan">
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan" required>
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="penambahan_bb" class="form-label">Penambahan BB</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="penambahan_bb" id="penambahan_bb" required>
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="berat_janin" class="form-label">Berat Janin</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="berat_janin" id="berat_janin" required>
                            <span class="input-group-text">gram</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tinggi_fundus" class="form-label">Tinggi Fundus</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="tinggi_fundus" id="tinggi_fundus" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lingkar_perut" class="form-label">Lingkar Perut</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="lingkar_perut" id="lingkar_perut" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lila" class="form-label">LILA</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="lila" id="lila" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hb_level" class="form-label">HB Level</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="hb_level" id="hb_level" required>
                            <span class="input-group-text">g/dL</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex gap-2 mb-3">
                        <label class="form-label me-5">Siklus Haid</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="siklus_teratur" name="siklus_haid" value="Teratur" required>
                            <label class="form-check-label" for="siklus_teratur">Teratur</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="siklus_tidak" name="siklus_haid" value="Tidak">
                            <label class="form-check-label" for="siklus_tidak">Tidak</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex gap-2 mb-3">
                        <label class="form-label me-5">Dismenore</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="disemnoreY" name="dismenore" value="Teratur" required>
                            <label class="form-check-label" for="disemnoreY">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="dismenoreT" name="dismenore" value="Tidak">
                            <label class="form-check-label" for="dismenoreT">Tidak</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex gap-2 mb-3">
                        <label class="form-label me-5">Flour albus</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="flourY" name="flour_albus" value="Teratur" required>
                            <label class="form-check-label" for="flourY">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="flourT" name="flour_albus" value="Tidak">
                            <label class="form-check-label" for="flourT">Tidak</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body row justify-content-between">
                @php
                    $i = 1;
                @endphp

                @foreach (array_chunk($questions, 5) as $item)
                    <div class="col-md-5 mb-3">
                    @foreach ($item as $q)
                        <div class="mb-3">
                            <div class="form-label">{{ $i++ }}. {{ $q['label'] }}</div>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="{{ $q['id'] }}Y" name="{{ $q['id'] }}" value="1" required>
                                    <label class="form-check-label" for="{{ $q['label'] }}Y">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="{{ $q['id'] }}T" name="{{ $q['id'] }}" value="0">
                                    <label class="form-check-label" for="{{ $q['label'] }}T">Tidak</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row justify-content-between mt-5">
            <div class="col-md-5 row">
                <div class="col-12">
                    <h6 class="section-title" style="font-weight: bold; text-align: center;">ANAMNESA (S)</h6>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="hpht" class="form-label">HPHT</label>
                    <input type="date" class="form-control" name="hpht" id="hpht">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="hpl" class="form-label">HPL</label>
                    <input type="date" class="form-control" name="hpl" id="hpl">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="his" class="form-label">HIS Mulai</label>
                    <input type="date" class="form-control" name="his" id="his">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" class="form-control" name="jam" id="jam">
                </div>

                <div class="col-12 d-flex gap-2 mb-3">
                    <label class="form-label me-5">Lendir</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="lendirY" name="lendir" value="Ya" required>
                        <label class="form-check-label" for="lendirY">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="lendirT" name="lendir" value="Tidak">
                        <label class="form-check-label" for="lendirT">Tidak</label>
                    </div>
                </div>
                <div class="col-12 d-flex gap-2 mb-3">
                    <label class="form-label me-5">Darah</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="darahY" name="darah" value="Ya" required>
                        <label class="form-check-label" for="darahY">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="darahT" name="darah" value="Tidak">
                        <label class="form-check-label" for="darahT">Tidak</label>
                    </div>
                </div>
                <div class="col-12 d-flex gap-2 mb-3">
                    <label class="form-label me-5">Cairan Ketuban</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ketubanY" name="ketuban" value="Ya" required>
                        <label class="form-check-label" for="ketubanY">Pecah</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ketubanT" name="ketuban" value="Belum">
                        <label class="form-check-label" for="ketubanT">Belum</label>
                    </div>
                </div>

                <div class="col-12 mb-3 mt-4">
                    <label for="keluhan" class="form-label">Keluhan Saat Ini</label>
                    <textarea name="keluhan" id="keluhan" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="riwayat_persalinan" class="form-label">Riwayat Persalinan yang Lalu</label>
                    <textarea name="riwayat_persalinan" id="riwayat_persalinan" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="riwayat_alergi" class="form-label">Riwayat Alergi obat-obatan</label>
                    <textarea name="riwayat_alergi" id="riwayat_alergi" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-5 row">
                <div class="col-12">
                    <h6 class="section-title" style="font-weight: bold; text-align: center;">KEADAAN UMUM (0)</h6>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="tekanan_darah" id="tekanan_darah">
                        <span class="input-group-text">mmHg</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="suhu" class="form-label">Suhu</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="suhu" id="suhu">
                        <span class="input-group-text">C</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nadi" class="form-label">Nadi</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="nadi" id="nadi">
                        <span class="input-group-text">x/mnt</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="oedema" class="form-label">Oedema</label>
                    <input type="text" class="form-control" name="oedema" id="oedema">
                </div>
                <div class="col-12">
                    <label for="palpasi" class="form-label">Pemeriksaan Palpasi</label>
                    <input type="text" class="form-control" name="palpasi" id="palpasi">
                </div>
                <div class="col-12">
                    <label for="teraba" class="form-label">Penurunan Kepala (Teraba)</label>
                    <input type="text" class="form-control" name="teraba" id="teraba">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="djj" class="form-label">DJJ</label>
                    <input type="text" class="form-control" name="djj" id="djj">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kontrakssi" class="form-label">Kontrakssi</label>
                    <input type="text" class="form-control" name="kontrakssi" id="kontrakssi">
                </div>
                <div class="col-12 mb-3">
                    <label for="pemeriksaan_dalam" class="form-label">Pemeriksaan Dalam (VT)</label>
                    <input type="text" class="form-control" name="pemeriksaan_dalam" id="pemeriksaan_dalam">
                </div>
                <div class="col-12 mb-3">
                    <label for="hasil_vt" class="form-label">Hasil VT</label>
                    <textarea name="hasil_vt" id="hasil_vt" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="row justify-content-between mt-5">
            <div class="col-md-5">
                <h6 class="section-title text-center" style="font-weight: bold">PENILAIAN (A)</h6>
                <textarea name="penilaian" id="penilaian" cols="30" rows="8" class="form-control"></textarea>
            </div>
            <div class="col-md-5">
                <h6 class="section-title text-center" style="font-weight: bold">OBSERVASI (P)</h6>
                <textarea name="observasi" id="observasi" cols="30" rows="8" class="form-control"></textarea>
            </div>
        </div>


        <div class="col-12 text-end mt-3">
            <button type="button" class="btn btn-secondary previous-step me-2">Sebelumnya</button>
            <button type="button" class="btn btn-primary" id="submit_pemeriksaan_kehamilan"><i class="fas fa-save me-2"></i>Simpan</button>
        </div>
    </div>
</div>
