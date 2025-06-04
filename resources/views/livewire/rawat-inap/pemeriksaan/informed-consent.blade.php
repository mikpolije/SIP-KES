<?php

use App\Models\Dokter;
use Livewire\Volt\Component;
use App\Models\InformedConsent;
use App\Models\Pendaftaran;
use App\Models\PoliRawatInap;
use Livewire\Attributes\On;

new class extends Component {
    public $noRM = '';
    public $nama = '';
    public $tanggalLahir = '';
    public $jenisKelamin = '';
    public $dokterPelaksana = '';
    public $pemberiInformasi = '';
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

    public $is_diterangkan = 0;
    public $is_diterima = 0;
    public $is_menyatakan = 0;
    public $tindakan = '';

    public $namaPasien = '';
    public $tanggalLahirPasien = '';
    public $alamatPasien = '';
    public $namaPerwakilan = '';
    public $tanggalLahirPerwakilan = '';
    public $alamatPerwakilan = '';
    public $pendaftaranId;
    public $doctors;

    public $timestamp;

    public function mount($pendaftaranId = null)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->doctors = Dokter::all();

        if ($pendaftaranId) {
            $pendaftaran = Pendaftaran::with('data_pasien')->find($pendaftaranId);

            if ($pendaftaran) {
                $this->noRM = $pendaftaran->data_pasien->no_rm;
                $this->nama = $pendaftaran->data_pasien->nama_lengkap;
                $this->tanggalLahir = $pendaftaran->data_pasien->tanggal_lahir_pasien;
                $this->jenisKelamin = $pendaftaran->data_pasien->jenis_kelamin;
                $this->namaPasien = $pendaftaran->data_pasien->nama_lengkap;
                $this->tanggalLahirPasien = $pendaftaran->data_pasien->tanggal_lahir_pasien;
                $this->alamatPasien = $pendaftaran->data_pasien->alamat_pasien;

                $this->namaPerwakilan = $pendaftaran->wali_pasien->nama_lengkap ?? '';
                $this->tanggalLahirPerwakilan = $pendaftaran->wali_pasien->tanggal_lahir_pasien ?? '';
                $this->alamatPerwakilan = $pendaftaran->wali_pasien->alamat_pasien ?? '';

                $this->timestamp = now();

                $informedConsent = InformedConsent::where('id_pendaftaran', $pendaftaranId)->first();
                if ($informedConsent) {
                    $this->dokterPelaksana = $informedConsent->id_dokter;
                    $this->pemberiInformasi = $informedConsent->pemberi_informasi;
                    $this->penerimaInformasi = $informedConsent->penerima_informasi;
                    $this->diagnosis = $informedConsent->diagnosis;
                    $this->tindakanKedokteran = $informedConsent->tindakan_kedokteran;
                    $this->indikasi = $informedConsent->indikasi_tindakan;
                    $this->tataCara = $informedConsent->tata_cara;
                    $this->risiko = $informedConsent->risiko;
                    $this->komplikasi = $informedConsent->komplikasi;
                    $this->prognosis = $informedConsent->prognosis;
                    $this->alternatif = $informedConsent->alternatif_risiko;
                    $this->anestesi = $informedConsent->anestesi;
                    $this->pengambilanSampel = $informedConsent->pengambilan_sampel_darah;
                    $this->lainLainConsent = $informedConsent->lain_lain;

                    $this->is_dipahami = $informedConsent->is_dipahami;
                    $this->is_diterima = $informedConsent->is_diterima;
                    $this->is_menyatakan = $informedConsent->is_menyatakan;

                    $this->tindakan = $informedConsent->tindakan;

                    $this->timestamp = $informedConsent->created_at;
                }
            }
        }
    }

    #[On('submit-step3')]
    public function submit()
    {
        try {
            $this->validate([
                'noRM' => 'required',
                'nama' => 'required',
                'dokterPelaksana' => 'required',
                'pemberiInformasi' => 'required',
                'penerimaInformasi' => 'required',
                'diagnosis' => 'required',
                'tindakanKedokteran' => 'required',
                'indikasi' => 'required',
                'tataCara' => 'required',
                'risiko' => 'required',
                'komplikasi' => 'required',
                'prognosis' => 'required',
                'namaPasien' => 'required',
                'is_menyatakan' => 'required',
            ]);

            $data = [
                'id_pendaftaran' => $this->pendaftaranId,
                'id_dokter' => $this->dokterPelaksana,
                'pemberi_informasi' => $this->pemberiInformasi,
                'penerima_informasi' => $this->penerimaInformasi,
                'diagnosis' => $this->diagnosis,
                'tindakan_kedokteran' => $this->tindakanKedokteran,
                'indikasi_tindakan' => $this->indikasi,
                'tata_cara' => $this->tataCara,
                'risiko' => $this->risiko,
                'komplikasi' => $this->komplikasi,
                'prognosis' => $this->prognosis,
                'alternatif_risiko' => $this->alternatif,
                'pengambilan_sampel_darah' => $this->pengambilanSampel,
                'lain_lain' => $this->lainLainConsent,
                'nama_pasien' => $this->namaPasien,
                'tanggal_lahir_pasien' => $this->tanggalLahirPasien,
                'alamat_pasien' => $this->alamatPasien,

                'is_diterangkan' => $this->is_diterangkan,
                'is_diterima' => $this->is_diterima,
                'is_menyatakan' => $this->is_menyatakan,
                'tindakan' => $this->tindakan,

                'nama_perwakilan' => $this->namaPerwakilan,
                'tanggal_lahir_perwakilan' => $this->tanggalLahirPerwakilan,
                'alamat_perwakilan' => $this->alamatPerwakilan,
                'anestesi' => $this->anestesi,
            ];

            $informedConsent = InformedConsent::updateOrCreate(
                ['id_pendaftaran' => $this->pendaftaranId],
                $data
            );

            PoliRawatInap::where('id_pendaftaran', $this->pendaftaranId)
                ->update(['id_informed_consent' => $informedConsent->id]);

            flash()->success('Informed consent berhasil disimpan');
            $this->dispatch('submit-finally', success: true);
        } catch (\Exception $e) {
            flash()->error('Gagal menyimpan informed consent: ' . $e->getMessage());
        }
    }
}; ?>

<div>
    <div>
        <div class="container py-4">
            <form wire:submit.prevent="save">
                <!-- DATA PASIEN -->
                <div class="mb-4">
                    <h5>DATA PASIEN</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="noRM" class="form-label">No RM</label>
                            <input type="text" wire:model="noRM" class="form-control" id="noRM" placeholder="010101" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" wire:model="nama" class="form-control" id="nama" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahir" class="form-control" id="tanggalLahir" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" wire:model="jenisKelamin" class="form-control" id="jenisKelamin" disabled>
                        </div>
                    </div>
                </div>

                <!-- PEMBERIAN INFORMASI -->
                <div class="mb-4">
                    <h5>PEMBERIAN INFORMASI</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="dokterPelaksana" class="form-label">Dokter Pelaksana</label>
                            <select wire:model="dokterPelaksana" class="form-select" id="dokterPelaksana" required>
                                <option value="">Pilih Dokter</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">
                                        {{ $doctor->gelar_depan }} {{ $doctor->nama }} {{ $doctor->gelar_belakang }} ({{ $doctor->no_sip }})
                                    </option>
                                @endforeach
                            </select>
                            @error('dokterPelaksana') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pemberiInformasi" class="form-label">Pemberi Informasi</label>
                            <input type="text" wire:model="pemberiInformasi" class="form-control"
                                id="pemberiInformasi" required>
                        </div>
                        <div class="col-md-6">
                            <label for="penerimaInformasi" class="form-label">Penerima / Pemberi Informasi
                                </label>
                            <input type="text" wire:model="penerimaInformasi" class="form-control"
                                id="penerimaInformasi" required>
                            @error('penerimaInformasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <input type="text" wire:model="diagnosis" class="form-control" id="diagnosis" required>
                            @error('diagnosis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tindakanKedokteran" class="form-label">Tindakan Kedokteran</label>
                            <input type="text" wire:model="tindakanKedokteran" class="form-control"
                                id="tindakanKedokteran" required>
                            @error('tindakanKedokteran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="indikasi" class="form-label">Indikasi Tindakan</label>
                            <input type="text" wire:model="indikasi" class="form-control" id="indikasi" required>
                            @error('indikasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tataCara" class="form-label">Tata Cara</label>
                            <input type="text" wire:model="tataCara" class="form-control" id="tataCara" required>
                            @error('tataCara') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="risiko" class="form-label">Risiko</label>
                            <input type="text" wire:model="risiko" class="form-control" id="risiko" required>
                            @error('risiko') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="komplikasi" class="form-label">Komplikasi</label>
                            <input type="text" wire:model="komplikasi" class="form-control" id="komplikasi" required>
                            @error('komplikasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prognosis" class="form-label">Prognosis</label>
                            <input type="text" wire:model="prognosis" class="form-control" id="prognosis" required>
                            @error('prognosis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="alternatif" class="form-label">Alternatif & Resiko</label>
                            <input type="text" wire:model="alternatif" class="form-control" id="alternatif" required>
                            @error('alternatif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="anestesi" class="form-label">Anestesi Lokal</label>
                            <input type="text" wire:model="anestesi" class="form-control" id="anestesi">
                            @error('anestesi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pengambilanSampel" class="form-label">Pengambilan Sampel Darah</label>
                            <input type="text" wire:model="pengambilanSampel" class="form-control"
                                id="pengambilanSampel">
                            @error('pengambilanSampel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label for="lainLainConsent" class="form-label">Lain-Lain</label>
                            <input type="text" wire:model="lainLainConsent" class="form-control" id="lainLainConsent">
                            @error('lainLainConsent') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <!-- PERNYATAAN -->
                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan bahwa saya</span>
                                    <div class="mx-2">
                                        <select class="form-select" wire:model="is_diterangkan" id="is_diterangkan">
                                            <option value="1">telah</option>
                                            <option value="0">belum</option>
                                        </select>
                                        @error('is_diterangkan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                <span>menerangkan hal-hal di atas secara benar dan jelas</span>
                            </div>
                            <div class="mt-2">
                                <span>dan memberikan kesempatan untuk bertanya dan berdiskusi</span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan bahwa saya</span>
                                    <div class="mx-2">
                                        <select class="form-select" wire:model="is_diterima" id="is_diterima">
                                            <option value="1">telah</option>
                                            <option value="0">belum</option>
                                        </select>
                                        @error('is_diterima') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                <span>menerima informasi sebagaimana di atas yang saya</span>
                            </div>
                            <div class="mt-2">
                                <span>paraf dikolom kanannya, dan telah memahaminya</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- is_menyatakan / PENOLAKAN TINDAKAN KEDOKTERAN -->
                <div class="mb-4">
                    <h5>PENOLAKAN TINDAKAN KEDOKTERAN</h5>
                    <div class="mb-3">
                        <p>Yang bertandatangan dibawah ini, saya</p>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="namaPasien" class="form-label">Nama</label>
                            <input type="text" wire:model="namaPasien" class="form-control" id="namaPasien" disabled>
                        </div>
                        <div class="col-12">
                            <label for="tanggalLahirPasien" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahirPasien" class="form-control"
                                id="tanggalLahirPasien" disabled>
                        </div>
                        <div class="col-12">
                            <label for="alamatPasien" class="form-label">Alamat</label>
                            <textarea class="form-control" wire:model="alamatPasien" id="alamatPasien"
                                rows="3" disabled></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span>Dengan ini menyatakan</span>
                                <div class="dropdown mx-2">
                                    <select class="form-select" wire:model="is_menyatakan" id="is_menyatakan">
                                        <option value="1">setuju</option>
                                        <option value="0">tidak</option>
                                    </select>
                                    @error('is_menyatakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <span>untuk dilakukannya tindakan</span>
                                <input type="text" wire:model="tindakan" class="form-control mx-2"
                                    style="width: 200px;">
                                @error('tindakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <span>dengan</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="namaPerwakilan" class="form-label">Nama</label>
                            <input type="text" wire:model="namaPerwakilan" class="form-control" id="namaPerwakilan" disabled>
                        </div>
                        <div class="col-12">
                            <label for="tanggalLahirPerwakilan" class="form-label">Tanggal Lahir</label>
                            <input type="text" wire:model="tanggalLahirPerwakilan" class="form-control"
                                id="tanggalLahirPerwakilan" disabled>
                        </div>
                        <div class="col-12">
                            <label for="alamatPerwakilan" class="form-label">Alamat</label>
                            <textarea class="form-control" wire:model="alamatPerwakilan" id="alamatPerwakilan"
                                rows="3" disabled></textarea>
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
                            <p>
                                Jember, {{ $timestamp->translatedFormat('j F Y') }} jam {{ $timestamp->translatedFormat('H:i') }} WIB
                            </p>
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
            </form>
        </div>
    </div>
</div>
