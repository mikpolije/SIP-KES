<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noRM = '';
    public $nama = '';
    public $tanggalLahir = '';
    public $jenisKelamin = '';
    public $dokterPelaksana = '';
    public $pemberianInformasi = '';
    public $penerimaInformasi = '';
    public $diagnosis = '';
    public $tindakanKedokteran = '';
    public $indikasi = '';
    public $tataCara = '';
    public $risiko = '';
    public $komplikasi = '';
    public $prognosis = '';
    public $alternatif = '';
    public $anestesi = '';
    public $pengambilanSampel = '';
    public $lainLainConsent = '';
    public $pernyataan1 = 'telah';
    public $pernyataan2 = 'telah';
    public $namaPasien = '';
    public $tanggalLahirPasien = '';
    public $alamatPasien = '';
    public $persetujuan = 'Setuju';
    public $tindakanPersetujuan = '';
    public $namaPerwakilan = '';
    public $tanggalLahirPerwakilan = '';
    public $alamatPerwakilan = '';

    public function mount($patientId = null)
    {
        $this->patientId = $patientId;
    }
}; ?>

<div>
    <div>
        <div class="container py-4">
            <form>
                <!-- DATA PASIEN -->
                <div class="mb-4">
                    <h5>DATA PASIEN</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="noRM" class="form-label">No RM</label>
                            <input type="text" wire:model="noRM" class="form-control" id="noRM" placeholder="010101">
                        </div>
                        <div class="col-md-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" wire:model="nama" class="form-control" id="nama"
                                placeholder="Adin Rizqha">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahir" class="form-control" id="tanggalLahir"
                                placeholder="01/12/2022">
                        </div>
                        <div class="col-md-3">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" wire:model="jenisKelamin" class="form-control" id="jenisKelamin"
                                placeholder="Perempuan">
                        </div>
                    </div>
                </div>

                <!-- PEMBERIAN INFORMASI -->
                <div class="mb-4">
                    <h5>PEMBERIAN INFORMASI</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="dokterPelaksana" class="form-label">Dokter Pelaksana</label>
                            <input type="text" wire:model="dokterPelaksana" class="form-control" id="dokterPelaksana">
                        </div>
                        <div class="col-md-6">
                            <label for="pemberianInformasi" class="form-label">Pemberian Informasi</label>
                            <input type="text" wire:model="pemberianInformasi" class="form-control"
                                id="pemberianInformasi">
                        </div>
                        <div class="col-md-6">
                            <label for="penerimaInformasi" class="form-label">Penerima Informasi / Pemberi
                                Persetujuan</label>
                            <input type="text" wire:model="penerimaInformasi" class="form-control"
                                id="penerimaInformasi">
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <input type="text" wire:model="diagnosis" class="form-control" id="diagnosis">
                        </div>
                        <div class="col-md-6">
                            <label for="tindakanKedokteran" class="form-label">Tindakan Kedokteran</label>
                            <input type="text" wire:model="tindakanKedokteran" class="form-control"
                                id="tindakanKedokteran">
                        </div>
                        <div class="col-md-6">
                            <label for="indikasi" class="form-label">Indikasi Tindakan</label>
                            <input type="text" wire:model="indikasi" class="form-control" id="indikasi">
                        </div>
                        <div class="col-md-6">
                            <label for="tataCara" class="form-label">Tata Cara</label>
                            <input type="text" wire:model="tataCara" class="form-control" id="tataCara">
                        </div>
                        <div class="col-md-6">
                            <label for="risiko" class="form-label">Risiko</label>
                            <input type="text" wire:model="risiko" class="form-control" id="risiko">
                        </div>
                        <div class="col-md-6">
                            <label for="komplikasi" class="form-label">Komplikasi</label>
                            <input type="text" wire:model="komplikasi" class="form-control" id="komplikasi">
                        </div>
                        <div class="col-md-6">
                            <label for="prognosis" class="form-label">Prognosis</label>
                            <input type="text" wire:model="prognosis" class="form-control" id="prognosis">
                        </div>
                        <div class="col-md-6">
                            <label for="alternatif" class="form-label">Alternatif & Risiko</label>
                            <select class="form-select" wire:model="alternatif" id="alternatif">
                                <option value="" selected></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="anestesi" class="form-label">Anestesi Lokal</label>
                            <input type="text" wire:model="anestesi" class="form-control" id="anestesi">
                        </div>
                        <div class="col-md-6">
                            <label for="pengambilanSampel" class="form-label">Pengambilan Sampel Darah</label>
                            <input type="text" wire:model="pengambilanSampel" class="form-control"
                                id="pengambilanSampel">
                        </div>
                        <div class="col-12">
                            <label for="lainLainConsent" class="form-label">Lain-Lain</label>
                            <input type="text" wire:model="lainLainConsent" class="form-control" id="lainLainConsent">
                        </div>
                    </div>
                </div>

                <!-- PERNYATAAN -->
                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan bahwa saya</span>
                                <div class="dropdown mx-2">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="pernyataan1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $pernyataan1 }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="pernyataan1">
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('pernyataan1', 'telah')">telah</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('pernyataan1', 'belum')">belum</a></li>
                                    </ul>
                                </div>
                                <span>menerangkan hal-hal di atas secara benar dan jelas</span>
                            </div>
                            <div class="mt-2">
                                <span>dan memberikan kesempatan untuk bertanya dan berdiskusi</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan bahwa saya</span>
                                <div class="dropdown mx-2">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="pernyataan2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $pernyataan2 }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="pernyataan2">
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('pernyataan2', 'telah')">telah</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('pernyataan2', 'belum')">belum</a></li>
                                    </ul>
                                </div>
                                <span>menerima informasi sebagaimana di atas yang saya</span>
                            </div>
                            <div class="mt-2">
                                <span>paraf dikolom kanannya, dan telah memahaminya</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PERSETUJUAN / PENOLAKAN TINDAKAN KEDOKTERAN -->
                <div class="mb-4">
                    <h5>PERSETUJUAN / PENOLAKAN TINDAKAN KEDOKTERAN</h5>
                    <div class="mb-3">
                        <p>Yang bertandatangan dibawah ini, saya</p>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="namaPasien" class="form-label">Nama</label>
                            <input type="text" wire:model="namaPasien" class="form-control" id="namaPasien">
                        </div>
                        <div class="col-12">
                            <label for="tanggalLahirPasien" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahirPasien" class="form-control"
                                id="tanggalLahirPasien">
                        </div>
                        <div class="col-12">
                            <label for="alamatPasien" class="form-label">Alamat</label>
                            <textarea class="form-control" wire:model="alamatPasien" id="alamatPasien"
                                rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan</span>
                                <div class="dropdown mx-2">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="persetujuan"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $persetujuan }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="persetujuan">
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('persetujuan', 'Setuju')">Setuju</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                wire:click.prevent="$set('persetujuan', 'Menolak')">Menolak</a></li>
                                    </ul>
                                </div>
                                <span>untuk dilakukannya tindakan</span>
                                <input type="text" wire:model="tindakanPersetujuan" class="form-control mx-2"
                                    style="width: 200px;">
                                <span>dengan</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="namaPerwakilan" class="form-label">Nama</label>
                            <input type="text" wire:model="namaPerwakilan" class="form-control" id="namaPerwakilan">
                        </div>
                        <div class="col-12">
                            <label for="tanggalLahirPerwakilan" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahirPerwakilan" class="form-control"
                                id="tanggalLahirPerwakilan">
                        </div>
                        <div class="col-12">
                            <label for="alamatPerwakilan" class="form-label">Alamat</label>
                            <textarea class="form-control" wire:model="alamatPerwakilan" id="alamatPerwakilan"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="small">Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah
                            dijelaskan seperti di atas kepada saya, termasuk risiko dan komplikasi yang mungkin
                            timbul. Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka
                            keberhasilan tindakan kedokteran bukanlah keniscayaan, melainkan sangat tergantung
                            kepada izin Tuhan Yang Maha Esa</p>
                    </div>
                    <div class="text-end mt-3">
                        <p>Jember, ........./........./20...... jam........WIB</p>
                    </div>
                </div>

                <!-- TANDA TANGAN -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4 text-center">
                        <div class="border p-5 mb-2"></div>
                        <p>Dokter</p>
                        <p class="small">(Nama)</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="border p-5 mb-2"></div>
                        <p>Saksi Pihak Klinik</p>
                        <p class="small">(Nama)</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="border p-5 mb-2"></div>
                        <p>Yang Menyatakan</p>
                        <p class="small">(Nama)</p>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                        </svg>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
