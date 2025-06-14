<?php

use App\Models\AsessmenAwal;
use App\Models\CPPT;
use App\Models\InformedConsent;
use App\Models\Pendaftaran;
use App\Models\ResumeMedis;
use Livewire\Volt\Component;

new class extends Component {

    public $pendaftaranId;
    public $pendaftaran;
    public $existingResMed;

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
    public $indikasi;
    public $riwayatPenyakit;
    public $keadaanUmum;
    public $alergi;
    public $namaDPJP;
    public $diagnosisUtama;
    public $kodeICD10;
    public $diagnosisSekunder;
    public $kodeICD9;

    public $no = "(Auto-generated)";
    public $ringkasan_penyakit;
    public $laboratorium;
    public $radiologi;
    public $lain_lain;
    public $instruksi_edukasi;
    public $kondisi_saat_pulang;
    public $penyebab_luar;
    public $tindakan;
    public $tanggal_kontrol;

    public $tandaVital;
    public $pemeriksaanFisik;
    public $terapiMedis;
    public $keadaanUmumPulang;
    public $kesadaran;
    public $tandaVitalPulang;
    public $catatanPenting;
    public $statusPulang;
    public $caraKeluar;

    public $distinctIcd10 = [];
    public $distinctIcd9 = [];
    public $distinctObat = [];

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        $this->existingResMed = ResumeMedis::where('id_pendaftaran', $pendaftaranId)->first();

        $cpptData = CPPT::where('id_pendaftaran', $pendaftaranId)
            ->orderBy('created_at', 'asc')
            ->get();

        $cpptAwal = $cpptData->first();
        $cpptAkhir = $cpptData->last();

        $allIcd10 = [];
        $allIcd9 = [];
        $allObat = [];

        foreach ($cpptData as $cppt) {
            $icd10 = json_decode($cppt->id_icd10, true) ?? [];
            $icd9 = json_decode($cppt->id_icd9, true) ?? [];
            $obat = json_decode($cppt->id_obat, true) ?? [];

            $allIcd10 = array_merge($allIcd10, $icd10);
            $allIcd9 = array_merge($allIcd9, $icd9);

            foreach ($obat as $o) {
                $allObat[] = [
                    'id_obat' => $o['id_obat'] ?? null,
                    'nama' => $o['nama'] ?? null
                ];
            }
        }

        $this->distinctIcd10 = array_unique($allIcd10);
        $this->distinctIcd9 = array_unique($allIcd9);
        $this->distinctObat = collect($allObat)->unique('id_obat')->all();

        $asesmen_awal = AsessmenAwal::where('id_pendaftaran', $pendaftaranId)->first();
        $informed_consent = InformedConsent::where('id_pendaftaran', $pendaftaranId)->first();

        if ($this->pendaftaran) {
            $this->nama = $this->pendaftaran->data_pasien->nama_pasien;
            $this->noRM = $this->pendaftaran->data_pasien->no_rm;
            $this->nik = $this->pendaftaran->data_pasien->nik_pasien;
            $this->tglMasuk = $this->pendaftaran->poli_rawat_inap->created_at->format('Y-m-d');
            $this->tanggal_lahir = $this->pendaftaran->data_pasien->tanggal_lahir;
            $this->ruangPerawatan = $this->pendaftaran->poli_rawat_inap->kelas;
            $this->dokterPenanggungJawab = $this->pendaftaran->poli_rawat_inap->informed_consent->dokter->nama;
            $this->pembayaran = $this->pendaftaran->poli_rawat_inap->pembayaran;
            $this->tglLahir = $this->pendaftaran->data_pasien->tanggal_lahir . ' / ' . $this->jenis_kelamin($this->pendaftaran->data_pasien->jenis_kelamin);
        }

        if ($asesmen_awal && $informed_consent && $cpptAwal) {
            $this->diagnosaMasuk = $cpptAwal->id_icd10;
            $this->indikasi = $informed_consent->indikasi_tindakan;
            $this->riwayatPenyakit = $asesmen_awal->riwayat_penyakit;
            $this->keadaanUmum = $asesmen_awal->keadaan_umum;
            $this->alergi = $asesmen_awal->alergi;
            $this->namaDPJP = $informed_consent->dokter->nama;
            $this->diagnosisUtama = $cpptAwal->id_icd10 ?? '-';
            $this->kodeICD10 = $cpptAwal->id_icd10->code ?? '-';
            $this->diagnosisSekunder = ($cpptAkhir->id_icd9 ?? '-');
            $this->kodeICD9 = ($cpptAkhir->id_icd9 ?? '-');

            if ($this->existingResMed) {
                $this->no = $this->existingResMed->no;
                $this->ringkasan_penyakit = $this->existingResMed->ringkasan_penyakit;
                $this->laboratorium = $this->existingResMed->laboratorium;
                $this->radiologi = $this->existingResMed->radiologi;
                $this->lain_lain = $this->existingResMed->lain_lain;
                $this->instruksi_edukasi = $this->existingResMed->instruksi_edukasi;
                $this->kondisi_saat_pulang = $this->existingResMed->kondisi_saat_pulang;
                $this->penyebab_luar = $this->existingResMed->penyebab_luar;
                $this->tindakan = $this->existingResMed->tindakan;
                $this->tanggal_kontrol = $this->existingResMed->tanggal_kontrol
                    ? $this->existingResMed->tanggal_kontrol->format('Y-m-d') : null;
            } else {
                $this->ringkasan_penyakit = $informed_consent->ringkasan_penyakit;
                $this->no = 'IM/' . date('Y') . '/000';
            }
        } else {
            $missing = [];

            if (!$asesmen_awal) $missing[] = 'Asesmen Awal';
            if (!$informed_consent) $missing[] = 'Informed Consent';
            if (!$cpptAwal) $missing[] = 'CPPT';

            $message = 'Tolong isi data berikut terlebih dahulu: ' . implode(', ', $missing);
            flash()->error($message);
            $this->dispatch('switch-tab', tab: 'pemeriksaan');
        }
    }

    public function save() {
        $this->validate([
            'ringkasan_penyakit' => 'nullable|string',
            'laboratorium' => 'nullable|string',
            'radiologi' => 'nullable|string',
            'lain_lain' => 'nullable|string',
            'instruksi_edukasi' => 'nullable|string',
            'kondisi_saat_pulang' => 'nullable|string',
            'penyebab_luar' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'tanggal_kontrol' => 'nullable|date',
        ]);

        try {
            $data = [
                'id_pendaftaran' => $this->pendaftaranId,
                'ringkasan_penyakit' => $this->ringkasan_penyakit,
                'laboratorium' => $this->laboratorium,
                'radiologi' => $this->radiologi,
                'lain_lain' => $this->lain_lain,
                'instruksi_edukasi' => $this->instruksi_edukasi,
                'kondisi_saat_pulang' => $this->kondisi_saat_pulang,
                'penyebab_luar' => $this->penyebab_luar,
                'tindakan' => $this->tindakan,
                'tanggal_kontrol' => $this->tanggal_kontrol,
            ];

            if ($this->existingResMed) {
                $this->existingResMed->update($data);
                flash()->success('Resume Medis berhasil diperbarui!');
            } else {
                $data['no'] = $this->generateResumeNumber();
                ResumeMedis::create($data);
                flash()->success('Resume Medis berhasil disimpan!');
            }

        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function generateResumeNumber() {
        $year = date('Y');
        $lastResume = ResumeMedis::where('no', 'like', "IM/{$year}/%")
            ->orderBy('no', 'desc')
            ->first();

        if ($lastResume) {
            $lastNumber = intval(substr($lastResume->no, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        return "IM/{$year}/{$newNumber}";
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
            <form wire:submit.prevent="save">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-0">RESUME MEDIS</h2>
                        <div class="mb-2">
                            <label class="form-label fw-bold">NO:</label>
                            <input type="text" class="form-control form-control-sm d-inline-block w-auto" wire:model="no" disabled>
                        </div>
                    </div>
                </div>

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
                        <input type="text" class="form-control" wire:model="indikasi" disabled>
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
                        <textarea class="form-control" rows="3" wire:model="ringkasan_penyakit"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Riwayat Penyakit</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="riwayatPenyakit" disabled>
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
                        <input type="text" class="form-control" wire:model="keadaanUmum" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Tanda Vital</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="tandaVital" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Pemeriksaan Fisik</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="pemeriksaanFisik" disabled>
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
                        <textarea class="form-control" rows="2" wire:model="laboratorium"></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">2. Radiologi</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" wire:model="radiologi"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Lain-Lain</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" wire:model="lain_lain"></textarea>
                    </div>
                </div>

                <!-- Terapi Medis Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Terapi Medis Selama di Rumah Sakit</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" wire:model="terapiMedis" disabled></textarea>
                    </div>
                </div>

                <!-- Alergi Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Alergi</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="alergi" disabled>
                    </div>
                </div>

                <!-- Diagnosis Section -->
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Diagnosis Utama</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" wire:model="diagnosisUtama" disabled>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">KODE ICD 10</span>
                            <input type="text" class="form-control" wire:model="kodeICD10" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Diagnosis Sekunder / Komorbid</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" wire:model="diagnosisSekunder" disabled>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">KODE ICD 9</span>
                            <input type="text" class="form-control" wire:model="kodeICD9" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Penyebab Luar / Cidera / Kecelakaan (jika ada)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="penyebab_luar">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Tindakan / Procedure</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" wire:model="tindakan"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Instruksi dan Edukasi (Tindak lanjut)</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" wire:model="instruksi_edukasi"></textarea>
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
                        <input type="text" class="form-control" wire:model="keadaanUmumPulang" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Kesadaran</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="kesadaran" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Tanda Vital</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="tandaVitalPulang" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Catatan Penting (kondisi saat ini)</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" wire:model="kondisi_saat_pulang"></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label class="form-label">Status Pulang</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="statusPulang" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Cara Keluar RS</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="caraKeluar" disabled>
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
                        <input type="date" class="form-control" wire:model="tanggal_kontrol">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Nama DPJP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" wire:model="namaDPJP" disabled>
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
                                </tr>
                            </thead>
                            <tbody>
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
                        <button type="submit" class="btn btn-primary px-4" wire:loading.attr="disabled">
                            <span wire:loading.remove>Simpan</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
