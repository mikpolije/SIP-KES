<?php

use App\Models\AsessmenAwal;
use App\Models\CPPT;
use App\Models\Pendaftaran;
use App\Models\ResumeMedis;
use Livewire\Volt\Component;

new class extends Component {

    public $nama;
    public $noRM;
    public $tglMasuk;
    public $tglKeluar;
    public $tglLahir;
    public $jenisKelamin;
    public $pembayaran;
    public $nik;
    public $dokterPenanggungJawab;
    public $ruangPerawatan;
    public $diagnosaMasuk;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        // $this->existingResMed = ResumeMedis::where('id_pendaftaran', $pendaftaranId)->first();
        $cppt = CPPT::where('id_pendaftaran', $pendaftaranId)
                  ->orderBy('created_at', 'asc')->first();
        $aswal = AsessmenAwal::where('id_pendaftaran', $pendaftaranId)->first();

        if ($this->pendaftaran) {
            $this->nama = $this->pendaftaran->data_pasien->nama_lengkap;
            $this->noRM = $this->pendaftaran->data_pasien->no_rm;
            $this->nik = $this->pendaftaran->data_pasien->nik;
            $this->tglMasuk = $this->pendaftaran->poli_rawat_inap->created_at->format('Y-m-d');
            $this->tanggal_lahir = $this->pendaftaran->data_pasien->tanggal_lahir;
            $this->ruangPerawatan = $this->pendaftaran->poli_rawat_inap->kelas;
            $this->dokterPenanggungJawab = $this->pendaftaran->poli_rawat_inap->informed_consent->dokter->nama;
            $this->pembayaran = $this->pendaftaran->poli_rawat_inap->pembayaran;
            $this->tglLahir = $this->pendaftaran->data_pasien->tanggal_lahir . ' / ' . $this->jenis_kelamin($this->pendaftaran->data_pasien->jenis_kelamin);
        }

        if ($aswal) {
            // $this->diagnosaMasuk = $cppt->diagnosa_masuk;
        }

        if ($cppt) {
            $this->diagnosaMasuk = $cppt->icd10->display;
        }
    }

    public function jenis_kelamin(bool $kelamin) {
        if ($kelamin) {
            return 'Laki-laki';
        } else {
            return 'Perempuan';
        }
    }
}; ?>

<div>
    <div class="py-4">
        <div class="mb-4">
            <div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-0">RESUME MEDIS</h2>
                        <div class="mb-2">
                            <label class="form-label fw-bold">NO:</label>
                            <input type="text" class="form-control form-control-sm d-inline-block w-auto">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <h5 class="fw-bold">RINGKASAN PULANG</h5>
                        <p class="fst-italic">(DISCHARGE SUMMARY)</p>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="nama" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">No. RM</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="noRM" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Tgl. Masuk dan Tgl. Keluar</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="tglMasuk" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Tgl. Lahir / Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="tglLahir" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Pembayaran</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="pembayaran" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">No.SEP / NIK</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="nik" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Dokter Penanggung Jawab</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="dokterPenanggungJawab" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Ruang Perawatan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="ruangPerawatan" disabled>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Diagnosa Masuk</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" wire:model="diagnosaMasuk" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Indikasi Rawat Inap -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Indikasi Rawat Inap</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- ANAMNESIS Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">ANAMNESIS</h5>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Ringkasan Penyakit</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Riwayat Penyakit</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- PEMERIKSAAN FISIK Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">PEMERIKSAAN FISIK</h5>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Keadaan Umum</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Tanda Vital</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Pemeriksaan Fisik</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- PEMERIKSAAN PENUNJANG Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">PEMERIKSAAN PENUNJANG</h5>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">1. Laboratorium</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">2. Radiologi</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Lain-Lain</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- Terapi Medis Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Terapi Medis Selama di Rumah Sakit</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <!-- Alergi Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Alergi</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- Diagnosis Section -->
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Diagnosis Utama</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">KODE ICD 10</span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Penyebab Luar / Cidera / Kecelakaan (jika ada)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Diagnosis Sekunder / Komorbid</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">KODE ICD 9</span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Tindakan / Procedure</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Instruksi dan Edukasi (Tindak lanjut)</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <!-- KONDISI SAAT PULANG Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">KONDISI SAAT PULANG</h5>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Keadaan Umum</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Kesadaran</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Tanda Vital</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Catatan Penting (kondisi saat ini)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Status Pulang</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Cara Keluar RS</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- TINDAK LANJUT Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">TINDAK LANJUT</h5>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Kontrol Ulang</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Nama DPJP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <!-- TERAPI PULANG Section -->
                <div class="row mb-2">
                    <div class="col-12">
                        <h5 class="fw-bold">TERAPI PULANG</h5>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Cara Pemberian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Signature Section with Table and Lines -->
                <div class="row mt-4 mb-3">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center align-top pt-3" width="33%">
                                    <p>Pasien</p>
                                </td>
                                <td class="text-center align-top pt-3" width="33%">
                                    <p>Pemberi Informasi</p>
                                </td>
                                <td class="text-center align-top pt-3" width="34%">
                                    <p>Jember, ____________ 20__</p>
                                </td>
                            </tr>
                            <tr style="height: 100px;">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center border-top-0">
                                    <div class="border-top mx-3"></div>
                                </td>
                                <td class="text-center border-top-0">
                                    <div class="border-top mx-3"></div>
                                </td>
                                <td class="text-center border-top-0">
                                    <div class="border-top mx-3"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
