<?php

use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
    }
}; ?>

<div class="container-fluid py-3">
    <form>
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
                                            <div class="col-3">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Tahun</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Bulan</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Hari</span>
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

                                    <!-- B. KEBUTUHAN NUTRISI -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">B. KEBUTUHAN NUTRISI</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. BB</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-1">
                                                                <span class="form-text">Kg</span>
                                                            </div>
                                                            <div class="col-1">
                                                                <span class="form-text">TB</span>
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-1">
                                                                <span class="form-text">Cm</span>
                                                            </div>
                                                            <div class="col-1">
                                                                <span class="form-text">LILA</span>
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-1">
                                                                <span class="form-text">Cm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Bentuk Makanan</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Nafsu Makan</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-baik">
                                                            <label class="form-check-label" for="nafsu-makan-baik">Baik</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-kurang">
                                                            <label class="form-check-label" for="nafsu-makan-kurang">Kurang</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-tidak-ada">
                                                            <label class="form-check-label" for="nafsu-makan-tidak-ada">Tidak Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 ps-4">4. Apakah turun / tambah dalam 3 bulan terakhir</div>
                                                    <div class="col-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berat-badan"
                                                                id="berat-badan-ya">
                                                            <label class="form-check-label" for="berat-badan-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="text" class="form-control form-control-sm" style="width: 60px;">
                                                            <span class="form-text ms-1">Kg</span>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berat-badan"
                                                                id="berat-badan-tidak">
                                                            <label class="form-check-label" for="berat-badan-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- C. KEBUTUHAN CAIRAN DAN ELEKTROLIT -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">C. KEBUTUHAN CAIRAN DAN ELEKTROLIT</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Minum</div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-4">
                                                        <span class="form-text">cc/ hari</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Perasaan Haus</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="perasaan-haus"
                                                                id="perasaan-haus-iya">
                                                            <label class="form-check-label" for="perasaan-haus-iya">Iya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="perasaan-haus"
                                                                id="perasaan-haus-tidak">
                                                            <label class="form-check-label" for="perasaan-haus-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Mukosa Mulut</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mukosa-mulut"
                                                                id="mukosa-mulut-kering">
                                                            <label class="form-check-label" for="mukosa-mulut-kering">Kering</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mukosa-mulut"
                                                                id="mukosa-mulut-kurang">
                                                            <label class="form-check-label" for="mukosa-mulut-kurang">Kurang</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">4. Turgor</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-baik">
                                                            <label class="form-check-label" for="turgor-baik">Baik</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-sedang">
                                                            <label class="form-check-label" for="turgor-sedang">Sedang</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-kurang">
                                                            <label class="form-check-label" for="turgor-kurang">Kurang</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">5. Edema</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edema"
                                                                id="edema-iya">
                                                            <label class="form-check-label" for="edema-iya">Iya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edema"
                                                                id="edema-tidak">
                                                            <label class="form-check-label" for="edema-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">6. Lain-lain</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- D. KEBUTUHAN ELIMINASI -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">D. KEBUTUHAN ELIMINASI</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Frekuensi BAK</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-4">
                                                                <span class="form-text">x / hari : jumlah</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">cc</span>
                                                            </div>
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
                                                    <div class="col-4 ps-4">2. Frekuensi BAB</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-3">
                                                                <span class="form-text">x / hari : Warna</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Bau</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Konsistensi</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Tgl. Terakhir BAB</div>
                                                    <div class="col-8">
                                                        <input type="date" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- E. KEBUTUHAN AKTIFITAS DAN ISTIRAHAT -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">E. KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Kebiasaan olahraga</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kebiasaan-olahraga"
                                                                id="kebiasaan-olahraga-ya">
                                                            <label class="form-check-label" for="kebiasaan-olahraga-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kebiasaan-olahraga"
                                                                id="kebiasaan-olahraga-tidak">
                                                            <label class="form-check-label" for="kebiasaan-olahraga-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Kebiasaan ROM</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kebiasaan-rom"
                                                                id="kebiasaan-rom-ya">
                                                            <label class="form-check-label" for="kebiasaan-rom-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kebiasaan-rom"
                                                                id="kebiasaan-rom-tidak">
                                                            <label class="form-check-label" for="kebiasaan-rom-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Perubahan gaya berjalan :</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-pelan">
                                                            <label class="form-check-label" for="gaya-berjalan-pelan">Pelan</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-diseret">
                                                            <label class="form-check-label" for="gaya-berjalan-diseret">Diseret</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-goyah">
                                                            <label class="form-check-label" for="gaya-berjalan-goyah">Goyah</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-tremor">
                                                            <label class="form-check-label" for="gaya-berjalan-tremor">Tremor</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Lain - lain :</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">4. Jumlah Tidur</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">5. Obat Tidur</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="obat-tidur"
                                                                id="obat-tidur-pakai">
                                                            <label class="form-check-label" for="obat-tidur-pakai">Pakai</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="obat-tidur"
                                                                id="obat-tidur-tidak">
                                                            <label class="form-check-label" for="obat-tidur-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Jika pakai :</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">Dosis :</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control form-control-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ADL Section -->
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">6. Mandi</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mandi"
                                                                id="mandi-mampu">
                                                            <label class="form-check-label" for="mandi-mampu">Mampu</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mandi"
                                                                id="mandi-dibantu">
                                                            <label class="form-check-label" for="mandi-dibantu">Dibantu</label>
                                                            <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">7. Berpakaian</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berpakaian"
                                                                id="berpakaian-mampu">
                                                            <label class="form-check-label" for="berpakaian-mampu">Mampu</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berpakaian"
                                                                id="berpakaian-dibantu">
                                                            <label class="form-check-label" for="berpakaian-dibantu">Dibantu</label>
                                                            <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">8. Makan</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="makan"
                                                                id="makan-mampu">
                                                            <label class="form-check-label" for="makan-mampu">Mampu</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="makan"
                                                                id="makan-dibantu">
                                                            <label class="form-check-label" for="makan-dibantu">Dibantu</label>
                                                            <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">9. BAB/BAK</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="babbak"
                                                                id="babbak-mampu">
                                                            <label class="form-check-label" for="babbak-mampu">Mampu</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="babbak"
                                                                id="babbak-dibantu">
                                                            <label class="form-check-label" for="babbak-dibantu">Dibantu</label>
                                                            <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">10. Transfering</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="transfering"
                                                                id="transfering-mampu">
                                                            <label class="form-check-label" for="transfering-mampu">Mampu</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="transfering"
                                                                id="transfering-dibantu">
                                                            <label class="form-check-label" for="transfering-dibantu">Dibantu</label>
                                                            <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">11. Lain - lain :</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- F. KEBUTUHAN RASA AMAN DAN NYAMAN -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">F. KEBUTUHAN RASA AMAN DAN NYAMAN</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Nyeri</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri"
                                                                id="nyeri-ya">
                                                            <label class="form-check-label" for="nyeri-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri"
                                                                id="nyeri-tidak">
                                                            <label class="form-check-label" for="nyeri-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Penurunan Karaganda</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penurunan-karaganda"
                                                                id="penurunan-karaganda-ya">
                                                            <label class="form-check-label" for="penurunan-karaganda-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penurunan-karaganda"
                                                                id="penurunan-karaganda-tidak">
                                                            <label class="form-check-label" for="penurunan-karaganda-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Penggunaan alat bantu</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penggunaan-alat-bantu"
                                                                id="penggunaan-alat-bantu-ya">
                                                            <label class="form-check-label" for="penggunaan-alat-bantu-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penggunaan-alat-bantu"
                                                                id="penggunaan-alat-bantu-tidak">
                                                            <label class="form-check-label" for="penggunaan-alat-bantu-tidak">Tidak</label>
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

                                <!-- Communication Needs Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">J. KEBUTUHAN KOMUNIKASI</h6>

                                    <div class="row mb-2">
                                        <div class="col-7">1. Berbicara</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="berbicara"
                                                    id="berbicara-lancar">
                                                <label class="form-check-label" for="berbicara-lancar">Lancar</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="berbicara"
                                                    id="berbicara-tidak">
                                                <label class="form-check-label" for="berbicara-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">Jika tidak, penyebabnya :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Pembicaraan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pembicaraan"
                                                    id="pembicaraan-koheren">
                                                <label class="form-check-label" for="pembicaraan-koheren">Koheren</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pembicaraan"
                                                    id="pembicaraan-inkoheren">
                                                <label class="form-check-label" for="pembicaraan-inkoheren">Inkoheren</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">3. Disorientasi</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disorientasi"
                                                    id="disorientasi-ya">
                                                <label class="form-check-label" for="disorientasi-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disorientasi"
                                                    id="disorientasi-tidak">
                                                <label class="form-check-label" for="disorientasi-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">Jika ya :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">4. Menarik diri</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="menarik-diri"
                                                    id="menarik-diri-ya">
                                                <label class="form-check-label" for="menarik-diri-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="menarik-diri"
                                                    id="menarik-diri-tidak">
                                                <label class="form-check-label" for="menarik-diri-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">5. Apatis</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="apatis"
                                                    id="apatis-ya">
                                                <label class="form-check-label" for="apatis-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="apatis"
                                                    id="apatis-tidak">
                                                <label class="form-check-label" for="apatis-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">6. Lain - lain :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>

                                <!-- Spiritual Needs Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">K. KEBUTUHAN SPIRITUAL</h6>

                                    <div class="row mb-2">
                                        <div class="col-3">1. Agama</div>
                                        <div class="col-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-islam">
                                                <label class="form-check-label" for="agama-islam">Islam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-kristen">
                                                <label class="form-check-label" for="agama-kristen">Kristen</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-katolik">
                                                <label class="form-check-label" for="agama-katolik">Katolik</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-hindu">
                                                <label class="form-check-label" for="agama-hindu">Hindu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-buddha">
                                                <label class="form-check-label" for="agama-buddha">Buddha</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="agama"
                                                    id="agama-konghucu">
                                                <label class="form-check-label" for="agama-konghucu">Konghucu</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5">2. Kegiatan ibadah sehari-hari</div>
                                        <div class="col-7">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5">3. Kegiatan ibadah di Rumah Sakit</div>
                                        <div class="col-7">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Economic Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">L. SOSIAL EKONOMI</h6>

                                    <div class="row mb-2">
                                        <div class="col-3">1. Pekerjaan :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Asuransi Kesehatan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asuransi-kesehatan"
                                                    id="asuransi-kesehatan-punya">
                                                <label class="form-check-label" for="asuransi-kesehatan-punya">Punya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asuransi-kesehatan"
                                                    id="asuransi-kesehatan-tidak">
                                                <label class="form-check-label" for="asuransi-kesehatan-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fall Risk Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">M. RESIKO JATUH</h6>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <textarea class="form-control form-control-sm" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Patient Dependency Level Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">N. TINGKAT KETERGANTUNGAN PASIEN</h6>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <textarea class="form-control form-control-sm" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Supporting Data Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">O. DATA PENUNJANG</h6>

                                    <div class="row mb-2">
                                        <div class="col-3">1. Rontgen :</div>
                                        <div class="col-9">
                                            <textarea class="form-control form-control-sm" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">2. Lab :</div>
                                        <div class="col-9">
                                            <textarea class="form-control form-control-sm" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">3. Lain - lain :</div>
                                        <div class="col-9">
                                            <textarea class="form-control form-control-sm" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="row mt-4 mb-5" style="width: fit-content;">
                                <div class="col text-center">
                                    <p>Jember, ................................20......</p>
                                    <p>Petugas yang mengisi,</p>
                                    <div class="border rounded mx-auto my-3" style="width: 150px; height: 100px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-5">
                            <div class="d-grid gap-2" style="width: 150px;">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
