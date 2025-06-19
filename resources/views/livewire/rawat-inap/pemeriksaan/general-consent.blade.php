<?php

use App\Models\GeneralConsentRanap;
use App\Models\Pendaftaran;
use Livewire\Attributes\On;
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

    public $isTahuHak = false;
    public $isSetujuAturan = false;
    public $isSetujuPerawatan = false;
    public $isPahamPrivasi = false;
    public $isBukaInfoAsuransi = false;
    public $isIzinkanKeluarga = false;
    public $isPahamPenolakan = false;
    public $isPahamSiswa = false;

    public $isBeriWewenang = true;
    public $nama_penerima = '';
    public $hubungan_penerima = '';

    public $isBeriAkses = true;
    public $nama_keluarga = '';
    public $hubungan_keluarga = '';

    public $pendaftaranId;

    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $general_consent = GeneralConsentRanap::where('id_pendaftaran', $pendaftaranId)->first();

        if ($pendaftaran->data_pasien) {
            $this->no_rm = $pendaftaran->data_pasien['no_rm'] ?? '';
            $this->nik = $pendaftaran->data_pasien['nik_pasien'] ?? '';
            $this->jenis_kelamin = $pendaftaran->data_pasien['jenis_kelamin'] ?? 'Laki-laki';
            $this->nama_pasien = $pendaftaran->data_pasien['nama_pasien'] ?? '';
            $this->tanggal_lahir_pasien = $pendaftaran->data_pasien['tanggal_lahir_pasien'] ?? '';

            $this->nama_wali = $pendaftaran->wali_pasien['nama_wali'] ?? '';
            $this->tanggal_lahir_wali = $pendaftaran->wali_pasien['tanggal_lahir_wali'] ?? '';
            $this->hubungan_dengan_pasien = $pendaftaran->wali_pasien['hubungan_dengan_pasien'] ?? '';
            $this->alamat = $pendaftaran->wali_pasien['alamat_wali'] ?? '';
            $this->no_telpon = $pendaftaran->wali_pasien['no_telepon_wali'] ?? '';
        }

        if ($general_consent) {

            $this->isTahuHak = $general_consent->isTahuHak;
            $this->isSetujuAturan = $general_consent->isSetujuAturan;
            $this->isSetujuPerawatan = $general_consent->isSetujuPerawatan;
            $this->isPahamPrivasi = $general_consent->isPahamPrivasi;
            $this->isBukaInfoAsuransi = $general_consent->isBukaInfoAsuransi;
            $this->isIzinkanKeluarga = $general_consent->isIzinkanKeluarga;
            $this->isPahamPenolakan = $general_consent->isPahamPenolakan;
            $this->isPahamSiswa = $general_consent->isPahamSiswa;

            $this->isBeriWewenang = $general_consent->isBeriWewenang;
            $this->nama_penerima = $general_consent->nama_penerima;
            $this->hubungan_penerima = $general_consent->hubungan_penerima;

            $this->isBeriAkses = $general_consent->isBeriAkses;
            $this->nama_keluarga = $general_consent->nama_keluarga;
            $this->hubungan_keluarga = $general_consent->hubungan_keluarga;
        }
    }

    #[On('submit-step1')]
    public function submit()
    {
        try {
            $validated = $this->validate([
                // Consent
                'isTahuHak' => 'required|boolean',
                'isSetujuAturan' => 'required|boolean',
                'isSetujuPerawatan' => 'required|boolean',
                'isPahamPrivasi' => 'required|boolean',
                'isBukaInfoAsuransi' => 'required|boolean',
                'isIzinkanKeluarga' => 'required|boolean',
                'isPahamPenolakan' => 'required|boolean',
                'isPahamSiswa' => 'required|boolean',

                // Wewenang
                'isBeriWewenang' => 'required|boolean',
                'nama_penerima' => 'required_if:isBeriWewenang,true|string',
                'hubungan_penerima' => 'required_if:isBeriWewenang,true|string',

                // Family
                'isBeriAkses' => 'required|boolean',
                'nama_keluarga' => 'required_if:isBeriAkses,true|string',
                'hubungan_keluarga' => 'required_if:isBeriAkses,true|string',
            ], [
                'required' => 'Kolom ini wajib diisi',
                'required_if' => 'Kolom ini wajib diisi',
                'boolean' => 'Nilai tidak valid',
            ]);

            GeneralConsentRanap::updateOrCreate(
                ['id_pendaftaran' => $this->pendaftaranId],
                $validated
            );

            flash()->success('Persetujuan umum berhasil disimpan.');
            $this->dispatch('go-next-step');

        } catch (\Illuminate\Validation\ValidationException $e) {
            flash()->error('Tolong isi semua field yang wajib diisi!');
            throw $e; // Tetap lempar exception agar Livewire menampilkan error di field
        }
    }
}; ?>

<div class="card-body">
    <form>
        <div class="mb-4">
            <h5 class="fw-bold mb-3">DATA PASIEN</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NO RM</label>
                    <input type="text" class="form-control" wire:model="no_rm" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NIK</label>
                    <input type="text" class="form-control" wire:model="nik" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">JENIS KELAMIN</label>
                    <select class="form-select" wire:model="jenis_kelamin" disabled>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">NAMA</label>
                    <input type="text" class="form-control" wire:model="nama_pasien" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">TANGGAL LAHIR</label>
                    <input type="text" class="form-control" placeholder="DD/MM/YYYY" wire:model="tanggal_lahir_pasien" disabled>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="mb-3">Pasien atau wali di minta membaca, memahami dan mengisi informasi berikut:</p>
            <p class="fw-semibold mb-3">Yang bertanda tangan di bawah ini:</p>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">NAMA</label>
                    <input type="text" class="form-control" wire:model="nama_wali" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">TANGGAL LAHIR</label>
                    <input type="date" class="form-control" placeholder="DD/MM/YYYY" wire:model="tanggal_lahir_wali" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Hubungan Dengan Pasien</label>
                    <input type="text" class="form-control" wire:model="hubungan_dengan_pasien" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">ALAMAT</label>
                    <input type="text" class="form-control" wire:model="alamat" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">No. Telpon</label>
                    <input type="text" class="form-control" wire:model="no_telpon" disabled>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="mb-3">Selaku wali/pasien Klinik Pratama "Insan Medika", dengan ini menyatakan:</p>
            <p class="fw-semibold mb-3">Informasi tentang Hak dan kewajiban pasien</p>

            <div class="form-check mb-3">
                <input class="form-check-input @error('isTahuHak') is-invalid @enderror" type="checkbox" id="isTahuHak" wire:model="isTahuHak">
                <label class="form-check-label" for="isTahuHak">
                    Dengan menandatangani dokumen ini saya mengakui...
                </label>
                @error('isTahuHak') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="isSetujuAturan" wire:model="isSetujuAturan">
                <label class="form-check-label" for="isSetujuAturan">
                    Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Klinik Pratama "Insan Medika", dan saya bersedia keluarga bersedia untuk mematuhinya.
                </label>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Persetujuan perawatan dan pengobatan</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isSetujuPerawatan" wire:model="isSetujuPerawatan">
                <label class="form-check-label" for="isSetujuPerawatan">
                    Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya menginginkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik, memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka meliputi: Pemeriksaan fisik yang dilakukan oleh perawat dan dokter, Pemasangan alat kesehatan (kecuali yang membutuhkan persetujuan khusus), Asuhan keperawatan, Pemeriksaan laboratorium, Pemeriksaan Radiologi.
                </label>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Persetujuan pelepasan informasi</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isPahamPrivasi" wire:model="isPahamPrivasi">
                <label class="form-check-label" for="isPahamPrivasi">
                    Saya memahami informasi yang ada dalam diri saya termasuk diagnosis, hasil laboratorium, dan hasil tes diagnostik yang akan digunakan untuk perawatan medis di Klinik Pratama "Insan Medika" akan dijamin kerahasiaannya.
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isBukaInfoAsuransi" wire:model="isBukaInfoAsuransi">
                <label class="form-check-label" for="isBukaInfoAsuransi">
                    Saya memberi wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan informasi tentang diagnosis hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi atau keperluan lain yang berkaitan.
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">Saya</label>
                <div class="d-inline-block mx-2">
                    <button type="button"
                        class="btn btn-sm {{ $isBeriWewenang ? 'btn-primary' : 'btn-outline-secondary' }}"
                        wire:click="$set('isBeriWewenang', true)">
                        Memberikan
                    </button>
                    <button type="button"
                        class="btn btn-sm {{ !$isBeriWewenang ? 'btn-primary' : 'btn-outline-secondary' }}"
                        wire:click="$set('isBeriWewenang', false)">
                        Tidak Memberikan
                    </button>
                </div>
                <span>wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan informasi tentang diagnosis hasil</span>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" placeholder="Nama" wire:model="nama_penerima">
                    @error('nama_penerima') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('hubungan_penerima') is-invalid @enderror" placeholder="Hubungan" wire:model="hubungan_penerima">
                    @error('hubungan_penerima') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="fw-semibold mb-3">Kebutuhan Privasi</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isIzinkanKeluarga" wire:model="isIzinkanKeluarga">
                <label class="form-check-label" for="isIzinkanKeluarga">
                    Saya <span class="mx-2">
                        <button type="button"
                            class="btn btn-sm {{ $isBeriAkses ? 'btn-primary' : 'btn-outline-secondary' }}"
                            wire:click="$set('isBeriAkses', true)">
                            Mengizinkan
                        </button>
                        <button type="button"
                            class="btn btn-sm {{ !$isBeriAkses ? 'btn-primary' : 'btn-outline-secondary' }}"
                            wire:click="$set('isBeriAkses', false)">
                            Tidak Mengizinkan
                        </button>
                    </span> Klinik Pratama "Insan Medika" memberi akses bagi keluarga dan saudara serta orang-orang yang akan menyebutkan kebutuhan nama bila ada permintaan khusus yang tidak diijinkan)
                </label>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-6">

                    <input type="text" class="form-control @error('nama_keluarga') is-invalid @enderror" placeholder="Nama" wire:model="nama_keluarga">
                    @error('nama_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('hubungan_keluarga') is-invalid @enderror" placeholder="Nama" wire:model="hubungan_keluarga">
                    @error('hubungan_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isPahamPenolakan" wire:model="isPahamPenolakan">
                <label class="form-check-label" for="isPahamPenolakan">
                    Saya mengerti dan memahami tentang bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk setiap prosedur/ terapi.
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="isPahamSiswa" wire:model="isPahamSiswa">
                <label class="form-check-label" for="isPahamSiswa">
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
