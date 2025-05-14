<?php

use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
    }
}; ?>

<div>
    <div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-2 col-form-label">Nama</label>
                            <div class="col-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-2 col-form-label">No. RM</label>
                            <div class="col-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row: Age and Date -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-2 col-form-label">Umur</label>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-1">
                                        <span class="form-text">Thn</span>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-1">
                                        <span class="form-text">Bln</span>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-1">
                                        <span class="form-text">Hr</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-2 col-form-label">Tanggal</label>
                            <div class="col-10">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content in Two Columns -->
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Section I: Basic Patient Needs -->
                        <div class="mb-4">
                            <h6 class="fw-bold">I. KEBUTUHAN DASAR PASIEN</h6>
                            <div class="row mb-2">
                                <label class="col-3 col-form-label">Alasan Masuk</label>
                                <div class="col-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-3 col-form-label">Diagnosa Medis</label>
                                <div class="col-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-3 col-form-label">Riwayat Penyakit</label>
                                <div class="col-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Section II: Basic Patient Needs -->
                        <div class="mb-4">
                            <h6 class="fw-bold">II. KEBUTUHAN DASAR PASIEN</h6>

                            <!-- A. Circulation -->
                            <div class="mb-3">
                                <h6 class="ms-3">A. SIRKULASI</h6>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-4">1. Tekanan Darah</div>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <span class="form-text">Sistole</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="form-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-3">
                                                        <span class="form-text">Distole</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="form-text">mmHg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-4">2. Suhu</div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-4">3. Nadi</div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-4">4. Pernapasan</div>
                                            <div class="col-4">
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-4">
                                                <span class="form-text">x/mnt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-5">Sianosis</div>
                                            <div class="col-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sianosis"
                                                        id="sianosis-ada">
                                                    <label class="form-check-label" for="sianosis-ada">Ada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sianosis"
                                                        id="sianosis-tidak-ada">
                                                    <label class="form-check-label" for="sianosis-tidak-ada">Tidak
                                                        Ada</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-5">Lain-lain</div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 ps-4">5. Nyeri Dada</div>
                                            <div class="col-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nyeri-dada"
                                                        id="nyeri-dada-ada">
                                                    <label class="form-check-label" for="nyeri-dada-ada">Ada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nyeri-dada"
                                                        id="nyeri-dada-tidak">
                                                    <label class="form-check-label" for="nyeri-dada-tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Emotional Needs Section -->
                        <div class="mb-4">
                            <h6 class="fw-bold">G. KEBUTUHAN EMOSIONAL</h6>

                            <div class="row mb-2">
                                <div class="col-7">1. Wajah Tegang</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wajah-tegang"
                                            id="wajah-tegang-ya">
                                        <label class="form-check-label" for="wajah-tegang-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wajah-tegang"
                                            id="wajah-tegang-tidak">
                                        <label class="form-check-label" for="wajah-tegang-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">2. Kontak Mata</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontak-mata"
                                            id="kontak-mata-bisa">
                                        <label class="form-check-label" for="kontak-mata-bisa">Bisa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kontak-mata"
                                            id="kontak-mata-tidak">
                                        <label class="form-check-label" for="kontak-mata-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">3. Bingung</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bingung" id="bingung-ya">
                                        <label class="form-check-label" for="bingung-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bingung" id="bingung-tidak">
                                        <label class="form-check-label" for="bingung-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">4. Perasaan Tidak Mampu</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perasaan-tidak-mampu"
                                            id="perasaan-tidak-mampu-ya">
                                        <label class="form-check-label" for="perasaan-tidak-mampu-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perasaan-tidak-mampu"
                                            id="perasaan-tidak-mampu-tidak">
                                        <label class="form-check-label" for="perasaan-tidak-mampu-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">5. Perasaan Tidak Berharga</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perasaan-tidak-berharga"
                                            id="perasaan-tidak-berharga-ya">
                                        <label class="form-check-label" for="perasaan-tidak-berharga-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perasaan-tidak-berharga"
                                            id="perasaan-tidak-berharga-tidak">
                                        <label class="form-check-label"
                                            for="perasaan-tidak-berharga-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">6. Mengkritik Diri Sendiri</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mengkritik-diri"
                                            id="mengkritik-diri-ya">
                                        <label class="form-check-label" for="mengkritik-diri-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mengkritik-diri"
                                            id="mengkritik-diri-tidak">
                                        <label class="form-check-label" for="mengkritik-diri-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3">7. Lain - lain :</div>
                                <div class="col-9">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Educational Needs Section -->
                        <div class="mb-4">
                            <h6 class="fw-bold">H. KEBUTUHAN PENYULUHAN</h6>

                            <div class="row mb-2">
                                <div class="col-7">1. Pengetahuan tentang penyakit</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-penyakit"
                                            id="pengetahuan-penyakit-tahu">
                                        <label class="form-check-label" for="pengetahuan-penyakit-tahu">Tahu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-penyakit"
                                            id="pengetahuan-penyakit-tidak">
                                        <label class="form-check-label" for="pengetahuan-penyakit-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">2. Pengetahuan tentang makanan</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-makanan"
                                            id="pengetahuan-makanan-tahu">
                                        <label class="form-check-label" for="pengetahuan-makanan-tahu">Tahu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-makanan"
                                            id="pengetahuan-makanan-tidak">
                                        <label class="form-check-label" for="pengetahuan-makanan-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">3. Pengetahuan tentang obat</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-obat"
                                            id="pengetahuan-obat-tahu">
                                        <label class="form-check-label" for="pengetahuan-obat-tahu">Tahu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengetahuan-obat"
                                            id="pengetahuan-obat-tidak">
                                        <label class="form-check-label" for="pengetahuan-obat-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3">4. Lain - lain :</div>
                                <div class="col-9">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Sensory Perception Section -->
                        <div class="mb-4">
                            <h6 class="fw-bold">I. KEBUTUHAN PERSEPSI SENSORI</h6>

                            <div class="row mb-2">
                                <div class="col-7">1. Penglihatan</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penglihatan"
                                            id="penglihatan-baik">
                                        <label class="form-check-label" for="penglihatan-baik">Baik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penglihatan"
                                            id="penglihatan-tidak">
                                        <label class="form-check-label" for="penglihatan-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">2. Pendengaran</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendengaran"
                                            id="pendengaran-baik">
                                        <label class="form-check-label" for="pendengaran-baik">Baik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendengaran"
                                            id="pendengaran-tidak">
                                        <label class="form-check-label" for="pendengaran-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">3. Penciuman</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penciuman"
                                            id="penciuman-baik">
                                        <label class="form-check-label" for="penciuman-baik">Baik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="penciuman"
                                            id="penciuman-tidak">
                                        <label class="form-check-label" for="penciuman-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">4. Pengecapan</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengecapan"
                                            id="pengecapan-baik">
                                        <label class="form-check-label" for="pengecapan-baik">Baik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pengecapan"
                                            id="pengecapan-tidak">
                                        <label class="form-check-label" for="pengecapan-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">5. Perabaan</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perabaan" id="perabaan-baik">
                                        <label class="form-check-label" for="perabaan-baik">Baik</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="perabaan"
                                            id="perabaan-tidak">
                                        <label class="form-check-label" for="perabaan-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
