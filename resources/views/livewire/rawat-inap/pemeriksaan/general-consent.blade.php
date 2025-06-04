<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    public $nama = '';
    public $nomorRM = '';
    public $tanggalLahir = '';
    public $jenisKelamin = '';
    public $alamatLengkap = '';
    public $kodePos = '';
    public $rt = '';
    public $rw = '';
    public $kec = '';
    public $kab = '';
    public $prov = '';

    #[Validate('required')]
    public $namaPenanggungJawab = '';

    #[Validate('required')]
    public $hubunganPasien = '';

    #[Validate('required')]
    public $tanggalLahirPenanggungJawab = '';

    public $umurPenanggungJawab = '';

    #[Validate('required')]
    public $jenisKelaminPenanggungJawab = '';

    #[Validate('required')]
    public $alamatPenanggungJawab = '';

    public $kodePosPenanggungJawab = '';
    public $rtPenanggungJawab = '';
    public $rwPenanggungJawab = '';
    public $kecPenanggungJawab = '';
    public $kabPenanggungJawab = '';
    public $provPenanggungJawab = '';

    #[Validate('required', message: 'Anda harus menyetujui pernyataan ini')]
    public $menyetujuiHakKewajiban = false;

    #[Validate('required', message: 'Anda harus menyetujui perawatan dan pengobatan')]
    public $menyetujuiPerawatan = false;

    #[Validate('required', message: 'Anda harus memilih kesediaan perawatan')]
    public $kesediaanPerawatan = 'Bersedia'; // 'Bersedia' or 'Tidak Bersedia'

    public $diagnosisAwal = '';
    public $rencanaTindakan = '';
    public $tanggalKonsultasi = '';
    public $namaDokter = '';

    public $namaPerawat = '';
    public $namaDokterPenanggungJawab = '';
    public $namaYangMenyatakan = '';
    public $tanggalPenandatanganan = '';

    public function mount() {
        $this->tanggalPenandatanganan = now()->format('Y-m-d');
        $this->tanggalKonsultasi = now()->format('Y-m-d');
    }

    public function calculateAge($birthdate) {
        return now()->diffInYears($birthdate);
    }

    public function updatedTanggalLahirPenanggungJawab() {
        if ($this->tanggalLahirPenanggungJawab) {
            $this->umurPenanggungJawab = $this->calculateAge($this->tanggalLahirPenanggungJawab);
        }
    }

    public function submit() {
        $this->validate();
    }
}; ?>

<div>
    <div>
        <form>
            <p>Saya yang bertanda tangan di bawah ini :</p>
            <p class="fw-bold">Keluarga Penanggung Jawab</p>

            <!-- Family Responsible Person Section -->
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="namaPenanggungJawab" class="form-label">Nama</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="namaPenanggungJawab"
                        class="form-control @error('namaPenanggungJawab') is-invalid @enderror"
                        id="namaPenanggungJawab">
                    @error('namaPenanggungJawab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="hubunganPasien" class="form-label">Hubungan dengan Pasien</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="hubunganPasien"
                        class="form-control @error('hubunganPasien') is-invalid @enderror" id="hubunganPasien">
                    @error('hubunganPasien') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tanggalLahirPenanggungJawab" class="form-label">Tanggal Lahir</label>
                </div>
                <div class="col-md-4">
                    <input type="date" wire:model="tanggalLahirPenanggungJawab"
                        class="form-control @error('tanggalLahirPenanggungJawab') is-invalid @enderror"
                        id="tanggalLahirPenanggungJawab">
                    @error('tanggalLahirPenanggungJawab') <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <label for="umurPenanggungJawab" class="form-label">Umur</label>
                </div>
                <div class="col-md-2">
                    <input type="text" wire:model="umurPenanggungJawab" class="form-control"
                        id="umurPenanggungJawab" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Jenis Kelamin</label>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="jenisKelaminPenanggungJawab"
                            id="lakiLaki" value="Laki-laki">
                        <label class="form-check-label" for="lakiLaki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="jenisKelaminPenanggungJawab"
                            id="perempuan" value="Perempuan">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    @error('jenisKelaminPenanggungJawab') <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="alamatPenanggungJawab" class="form-label">Alamat</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="alamatPenanggungJawab"
                        class="form-control @error('alamatPenanggungJawab') is-invalid @enderror"
                        id="alamatPenanggungJawab">
                    @error('alamatPenanggungJawab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-2">
                    <label for="kodePosPenanggungJawab" class="form-label">Kode Pos :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="kodePosPenanggungJawab" class="form-control"
                        id="kodePosPenanggungJawab">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">RT:</label>
                </div>
                <div class="col-md-1">
                    <input type="text" wire:model="rtPenanggungJawab" class="form-control" id="rtPenanggungJawab">
                </div>
                <div class="col-md-1">
                    <label class="form-label">RW:</label>
                </div>
                <div class="col-md-1">
                    <input type="text" wire:model="rwPenanggungJawab" class="form-control" id="rwPenanggungJawab">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Kec:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="kecPenanggungJawab" class="form-control" id="kecPenanggungJawab">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-2">
                    <label for="kabPenanggungJawab" class="form-label">Kab:</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="kabPenanggungJawab" class="form-control" id="kabPenanggungJawab">
                </div>
                <div class="col-md-1">
                    <label for="provPenanggungJawab" class="form-label">Prov:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="provPenanggungJawab" class="form-control"
                        id="provPenanggungJawab">
                </div>
            </div>

            <!-- Declaration Section -->
            <p>Selaku wali/pasien Klinik Pratama "Insan Medika", dengan ini menyatakan:</p>
            <ol>
                <li>Informasi tentang Hak dan Kewajiban pasien:
                    <ol type="a">
                        <li>Dengan menandatangani dokumen ini saya mengakui bahwa pada proses pendaftaran untuk
                            mendapatkan PELAYANAN di Klinik Pratama "Insan Medika", saya telah mendapat</li>
                        <li>informasi tentang Hak - hak dan kewajiban saya sebagai pasien. Saya telah menerima
                            informasi tentang peraturan yang diberlakukan oleh Klinik Pratama "Insan Medika", dan
                            saya bersedia untuk mematuhinya.</li>
                    </ol>
                </li>
                <li>Persetujuan perawatan dan pengobatan</li>
            </ol>

            <p class="mb-4">Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya
                mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik, memberikan
                pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka terhadap: Pemeriksaan
                fisik yang dilakukan oleh perawat dan dokter. Pemasangan alat kesehatan (kecuali yang membutuhkan
                persetujuan khusus), Asuhan keperawatan, Pemeriksaan laboratorium, Pemeriksaan Radiologi.</p>

            <p class="mb-4">Dengan ini menyatakan: <span class="fw-bold">Bersedia</span> untuk dilakukan perawatan
                di Klinik Insan Medika pada Pasien atas nama :</p>

            <!-- Patient Information Section -->
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="namaPasien" class="form-label">Nama Pasien</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="nama" class="form-control" id="namaPasien" readonly>
                </div>
                <div class="col-md-2">
                    <label for="noRM" class="form-label">NO.RM</label>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" wire:model="nomorRM" class="form-control" id="noRM" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tanggalLahirPasien" class="form-label">Tanggal Lahir</label>
                </div>
                <div class="col-md-4">
                    <input type="date" wire:model="tanggalLahir" class="form-control" id="tanggalLahirPasien"
                        readonly>
                </div>
                <div class="col-md-2">
                    <label for="umurPasien" class="form-label">Umur</label>
                </div>
                <div class="col-md-4">
                    <input type="text" value="{{ $tanggalLahir ? $this->calculateAge($tanggalLahir) : '' }}"
                        class="form-control" id="umurPasien" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Jenis Kelamin</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="jenisKelamin" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="alamatPasien" class="form-label">Alamat</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="alamatLengkap" class="form-control" id="alamatPasien" readonly>
                </div>
                <div class="col-md-2">
                    <label for="kodePosPasien" class="form-label">Kode Pos :</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="kodePos" class="form-control" id="kodePosPasien" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">RT:</label>
                </div>
                <div class="col-md-1">
                    <input type="text" wire:model="rt" class="form-control" id="rtPasien" readonly>
                </div>
                <div class="col-md-1">
                    <label class="form-label">RW:</label>
                </div>
                <div class="col-md-1">
                    <input type="text" wire:model="rw" class="form-control" id="rwPasien" readonly>
                </div>
                <div class="col-md-1">
                    <label class="form-label">Kec:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="kec" class="form-control" id="kecPasien" readonly>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-2">
                    <label for="kabPasien" class="form-label">Kab:</label>
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="kab" class="form-control" id="kabPasien" readonly>
                </div>
                <div class="col-md-1">
                    <label for="provPasien" class="form-label">Prov:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="prov" class="form-control" id="provPasien" readonly>
                </div>
            </div>

            <!-- signature section -->
            <div class="row text-center">
                <!-- date row -->
                <div class="col-12 mb-4 mr-6">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <p>Jember, 2025</p>
                        </div>
                    </div>
                </div>

                <!-- signature blocks -->
                <div class="col-md-4">
                    <div class="signature-block">
                        <p class="mb-5">Perawat</p>
                        <div class="border-bottom mx-4" style="height: 80px;"></div>
                        <p class="mt-2 small text-muted">(Nama & Tanda Tangan)</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="signature-block">
                        <p class="mb-5">Dokter</p>
                        <div class="border-bottom mx-4" style="height: 80px;"></div>
                        <p class="mt-2 small text-muted">(Nama & Tanda Tangan)</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="signature-block">
                        <p class="mb-5">Yang Menyatakan</p>
                        <div class="border-bottom mx-4" style="height: 80px;"></div>
                        <p class="mt-2 small text-muted">(Nama & Tanda Tangan)</p>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
