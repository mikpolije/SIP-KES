<?php

use Livewire\Volt\Component;

new class extends Component {
    public $no_rm = '';
    public $nik = '';
    public $jenis_kelamin = 'Laki-laki';
    public $nama_pasien = '';
    public $tanggal_lahir_pasien = '';

    public $nama_wali = '';
    public $tanggal_lahir_wali = '';
    public $hubungan_dengan_pasien = '';
    public $alamat = '';
    public $no_telpon = '';

    public $consent1 = false;
    public $consent2 = false;
    public $consent3 = false;
    public $consent4 = false;
    public $consent5 = false;
    public $consent6 = false;
    public $consent7 = false;
    public $consent8 = false;

    public $memberikan_wewenang = true;
    public $nama_penerima_info = '';
    public $hubungan_penerima_info = '';

    public $mengizinkan_akses = true;
    public $nama_akses_keluarga = '';
    public $hubungan_akses_keluarga = '';
}; ?>

<div class="card-body">
    <form>
        <div class="mb-4">
            <h5 class="fw-bold mb-3">DATA PASIEN</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NO RM</label>
                    <input type="text" class="form-control" wire:model="no_rm">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NIK</label>
                    <input type="text" class="form-control" wire:model="nik">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">JENIS KELAMIN</label>
                    <select class="form-select" wire:model="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">NAMA</label>
                    <input type="text" class="form-control" wire:model="nama_pasien">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">TANGGAL LAHIR</label>
                    <input type="text" class="form-control" placeholder="DD/MM/YYYY" wire:model="tanggal_lahir_pasien">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="mb-3">Pasien atau wali di minta membaca, memahami dan mengisi informasi berikut:</p>
            <p class="fw-semibold mb-3">Yang bertanda tangan di bawah ini:</p>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NAMA</label>
                    <input type="text" class="form-control" wire:model="nama_wali">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">TANGGAL LAHIR</label>
                    <input type="text" class="form-control" placeholder="DD/MM/YYYY" wire:model="tanggal_lahir_wali">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Hubungan Dengan Pasien</label>
                    <input type="text" class="form-control" wire:model="hubungan_dengan_pasien">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">ALAMAT</label>
                    <input type="text" class="form-control" wire:model="alamat">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">No. Telpon</label>
                    <input type="text" class="form-control" wire:model="no_telpon">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="mb-3">Selaku wali/pasien Klinik Pratama "Insan Medika", dengan ini menyatakan:</p>
            <p class="fw-semibold mb-3">Informasi tentang Hak dan kewajiban pasien</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent1" wire:model="consent1">
                <label class="form-check-label" for="consent1">
                    Dengan menandatangani dokumen ini saya mengakui bahwa pada proses pendaftaran untuk mendapatkan PELAYANAN di Klinik Pratama "Insan Medika", saya telah mendapat informasi tentang hak dan kewajiban saya sebagai pasien.
                </label>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="consent2" wire:model="consent2">
                <label class="form-check-label" for="consent2">
                    Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Klinik Pratama "Insan Medika", dan saya bersedia keluarga bersedia untuk mematuhinya.
                </label>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Persetujuan perawatan dan pengobatan</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent3" wire:model="consent3">
                <label class="form-check-label" for="consent3">
                    Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya menginginkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik, memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka meliputi: Pemeriksaan fisik yang dilakukan oleh perawat dan dokter, Pemasangan alat kesehatan (kecuali yang membutuhkan persetujuan khusus), Asuhan keperawatan, Pemeriksaan laboratorium, Pemeriksaan Radiologi.
                </label>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Persetujuan pelepasan informasi</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent4" wire:model="consent4">
                <label class="form-check-label" for="consent4">
                    Saya memahami informasi yang ada dalam diri saya termasuk diagnosis, hasil laboratorium, dan hasil tes diagnostik yang akan digunakan untuk perawatan medis di Klinik Pratama "Insan Medika" akan dijamin kerahasiaannya.
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent5" wire:model="consent5">
                <label class="form-check-label" for="consent5">
                    Saya memberi wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan informasi tentang diagnosis hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi atau keperluan lain yang berkaitan.
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">Saya</label>
                <div class="d-inline-block mx-2">
                    <button type="button"
                        class="btn btn-sm {{ $memberikan_wewenang ? 'btn-primary' : 'btn-outline-secondary' }}"
                        wire:click="$set('memberikan_wewenang', true)">
                        Memberikan
                    </button>
                    <button type="button"
                        class="btn btn-sm {{ !$memberikan_wewenang ? 'btn-primary' : 'btn-outline-secondary' }}"
                        wire:click="$set('memberikan_wewenang', false)">
                        Tidak Memberikan
                    </button>
                </div>
                <span>wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan informasi tentang diagnosis hasil</span>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nama" wire:model="nama_penerima_info">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Hubungan" wire:model="hubungan_penerima_info">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Kebutuhan Privasi</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent6" wire:model="consent6">
                <label class="form-check-label" for="consent6">
                    Saya <span class="mx-2">
                        <button type="button"
                            class="btn btn-sm {{ $mengizinkan_akses ? 'btn-primary' : 'btn-outline-secondary' }}"
                            wire:click="$set('mengizinkan_akses', true)">
                            Mengizinkan
                        </button>
                        <button type="button"
                            class="btn btn-sm {{ !$mengizinkan_akses ? 'btn-primary' : 'btn-outline-secondary' }}"
                            wire:click="$set('mengizinkan_akses', false)">
                            Tidak Mengizinkan
                        </button>
                    </span> Klinik Pratama "Insan Medika" memberi akses bagi keluarga dan saudara serta orang-orang yang akan menyebutkan kebutuhan nama bila ada permintaan khusus yang tidak diijinkan)
                </label>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nama" wire:model="nama_akses_keluarga">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Hubungan" wire:model="hubungan_akses_keluarga">
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent7" wire:model="consent7">
                <label class="form-check-label" for="consent7">
                    Saya mengerti dan memahami tentang bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk setiap prosedur/ terapi.
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="consent8" wire:model="consent8">
                <label class="form-check-label" for="consent8">
                    Klinik Pratama "Insan Medika" telah memberikan informasi kepada saya terkait kemungkinan keterbatasan peserta didik dan/ mahasiswa yang turut berpartisipasi dalam proses perawatan.
                </label>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Pengajuan Keluhan</p>
            <p class="mb-3">Saya menyatakan bahwa saya telah menerima informasi tentang adanya tata cara mengajukan dan mengajukan keluhan terkait pelayanan medis ataupun administrasi yang diberikan terhadap diri saya. Saya setuju mengikuti tata cara mengajukan keluhan sesuai prosedur yang ada.</p>

            <p class="mb-4">Dengan tanda tangan saya di bawah ini, saya menyatakan bahwa saya telah membaca dan sepenuhnya setuju dengan setiap pernyataan yang terdapat pada formulir ini dan menandatangani tanpa paksaan dan dengan kesadaran penuh seluruh kriteria yang terdapat pada persetujuan umum (General Consent).</p>

            <div class="text-end mb-4">
                <p>Jember, ___/___/20___, Jam ___WIB</p>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="text-center">
                    <p class="fw-semibold mb-3">Pasien/Keluarga/penanggung jawab</p>
                    <div class="border border-2 border-secondary" style="height: 120px; width: 100%;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <p class="fw-semibold mb-3">Pemberi Informasi</p>
                    <div class="border border-2 border-secondary" style="height: 120px; width: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
            <button type="button" class="btn btn-warning px-4 py-2">Cetak</button>
        </div>
    </form>
</div>
