<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $patientId;
    public $currentStep = 1;
    public $totalSteps = 2;

    // Step 1 fields
    public $keluhan = '';
    public $riwayatPenyakit = '';
    public $alergi = 'tidak';
    public $jenisAlergi = '';
    public $riwayatPengobatan = '';
    public $denyutJantung = '';
    public $pernafasan = '';
    public $suhuTubuh = '';
    public $sistole = '';
    public $diastole = '';
    public $skalaNyeri = '';
    public $statusPsikologi = [];
    public $bunuhDiri = false;
    public $bunuhDiriLaporan = '';
    public $lainLain = false;
    public $lainLainText = '';

    public function mount($patientId = null)
    {
        $this->patientId = $patientId;
        $this->totalSteps = 2;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            // Add any validation for step 1 if needed
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('scroll-to-top');
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('scroll-to-top');
        }
    }

    public function submit()
    {
        // Save data logic here
        session()->flash('message', 'Asesmen awal berhasil disimpan!');
    }
}; ?>

<div class="container stepper-container p-4">
    <div class="stepper" id="stepper">
        <div class="step">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
            <div class="step-title">Asessmen Awal</div>
        </div>
        <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
        <div class="step">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
            <div class="step-title">Informed Consent</div>
        </div>
    </div>

    <!-- Step 1 content - Asessmen Awal -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <div class="container">

            <form>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan Utama</label>
                            <textarea wire:model="keluhan" class="form-control" id="keluhan" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="riwayat-penyakit" class="form-label">Riwayat Penyakit</label>
                            <textarea wire:model="riwayatPenyakit" class="form-control" id="riwayat-penyakit"
                                rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Riwayat Alergi</label>
                            <div class="mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                        id="tidak-alergi" value="tidak" checked>
                                    <label class="form-check-label" for="tidak-alergi">Tidak</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                        id="ya-alergi" value="ya">
                                    <label class="form-check-label" for="ya-alergi">Ya</label>
                                </div>
                            </div>
                            <input type="text" wire:model="jenisAlergi" class="form-control" id="jenis-alergi"
                                placeholder="Jenis alergi">
                        </div>

                        <div class="mb-3">
                            <label for="riwayat-pengobatan" class="form-label">Riwayat Pengobatan</label>
                            <textarea wire:model="riwayatPengobatan" class="form-control" id="riwayat-pengobatan"
                                rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="denyut-jantung" class="form-label">Denyut Jantung</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="denyutJantung" class="form-control"
                                        id="denyut-jantung">
                                    <span class="unit-label">bpm</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="pernafasan" class="form-label">Pernafasan</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="pernafasan" class="form-control" id="pernafasan">
                                    <span class="unit-label">x/menit</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="suhu-tubuh" class="form-label">Suhu Tubuh</label>
                                <div class="position-relative">
                                    <input type="text" wire:model="suhuTubuh" class="form-control" id="suhu-tubuh">
                                    <span class="unit-label">°C</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tekanan Darah</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <input type="text" wire:model="sistole" class="form-control" id="sistole"
                                            placeholder="Sistole">
                                        <span class="unit-label">mmHg</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <input type="text" wire:model="diastole" class="form-control" id="diastole"
                                            placeholder="Diastole">
                                        <span class="unit-label">mmHg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Skala Nyeri</label>
                            <div class="pain-scale-checkbox">
                                @foreach([0, 2, 4, 6, 8, 10] as $value)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model="skalaNyeri"
                                        name="skala-nyeri" id="nyeri-{{ $value }}" value="{{ $value }}">
                                    <label class="form-check-label" for="nyeri-{{ $value }}">{{ $value }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Psikologi</label>
                            <div class="mb-2">
                                @foreach(['tenang', 'cemas', 'takut', 'marah'] as $status)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" wire:model="statusPsikologi"
                                        id="{{ $status }}" value="{{ $status }}">
                                    <label class="form-check-label" for="{{ $status }}">{{ ucfirst($status) }}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" wire:model="bunuhDiri" id="bunuh-diri"
                                    value="1">
                                <label class="form-check-label" for="bunuh-diri">
                                    Kecenderungan bunuh diri, dilapor ke
                                    <input type="text" wire:model="bunuhDiriLaporan"
                                        class="form-control form-control-sm d-inline-block" style="width: 150px;">
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="lainLain" id="lain-lain"
                                    value="1">
                                <label class="form-check-label" for="lain-lain">Lain-lain, tuliskan</label>
                                <textarea wire:model="lainLainText" class="form-control mt-2" id="lain-lain-text"
                                    rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Step 2 content - Informed Consent (Blank Page) -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <div>
            <div class="container py-4">
                <form>
                    <!-- DATA PASIEN -->
                    <div class="mb-4">
                        <h5>DATA PASIEN</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="noRM" class="form-label">No RM</label>
                                <input type="text" class="form-control" id="noRM" placeholder="010101">
                            </div>
                            <div class="col-md-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Adin Rizqha">
                            </div>
                            <div class="col-md-3">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tanggalLahir" placeholder="01/12/2022">
                            </div>
                            <div class="col-md-3">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenisKelamin" placeholder="Perempuan">
                            </div>
                        </div>
                    </div>

                    <!-- PEMBERIAN INFORMASI -->
                    <div class="mb-4">
                        <h5>PEMBERIAN INFORMASI</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="dokterPelaksana" class="form-label">Dokter Pelaksana</label>
                                <input type="text" class="form-control" id="dokterPelaksana">
                            </div>
                            <div class="col-md-6">
                                <label for="pemberianInformasi" class="form-label">Pemberian Informasi</label>
                                <input type="text" class="form-control" id="pemberianInformasi">
                            </div>
                            <div class="col-md-6">
                                <label for="penerimaInformasi" class="form-label">Penerima Informasi / Pemberi
                                    Persetujuan</label>
                                <input type="text" class="form-control" id="penerimaInformasi">
                            </div>
                            <div class="col-md-6">
                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" class="form-control" id="diagnosis">
                            </div>
                            <div class="col-md-6">
                                <label for="tindakanKedokteran" class="form-label">Tindakan Kedokteran</label>
                                <input type="text" class="form-control" id="tindakanKedokteran">
                            </div>
                            <div class="col-md-6">
                                <label for="indikasi" class="form-label">Indikasi Tindakan</label>
                                <input type="text" class="form-control" id="indikasi">
                            </div>
                            <div class="col-md-6">
                                <label for="tataCara" class="form-label">Tata Cara</label>
                                <input type="text" class="form-control" id="tataCara">
                            </div>
                            <div class="col-md-6">
                                <label for="risiko" class="form-label">Risiko</label>
                                <input type="text" class="form-control" id="risiko">
                            </div>
                            <div class="col-md-6">
                                <label for="komplikasi" class="form-label">Komplikasi</label>
                                <input type="text" class="form-control" id="komplikasi">
                            </div>
                            <div class="col-md-6">
                                <label for="prognosis" class="form-label">Prognosis</label>
                                <input type="text" class="form-control" id="prognosis">
                            </div>
                            <div class="col-md-6">
                                <label for="alternatif" class="form-label">Alternatif & Risiko</label>
                                <select class="form-select" id="alternatif">
                                    <option selected></option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="anestesi" class="form-label">Anestesi Lokal</label>
                                <input type="text" class="form-control" id="anestesi">
                            </div>
                            <div class="col-md-6">
                                <label for="pengambilanSampel" class="form-label">Pengambilan Sampel Darah</label>
                                <input type="text" class="form-control" id="pengambilanSampel">
                            </div>
                            <div class="col-12">
                                <label for="lainLain" class="form-label">Lain-Lain</label>
                                <input type="text" class="form-control" id="lainLain">
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
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            id="pernyataan1" data-bs-toggle="dropdown" aria-expanded="false">
                                            telah
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="pernyataan1">
                                            <li><a class="dropdown-item" href="#">telah</a></li>
                                            <li><a class="dropdown-item" href="#">belum</a></li>
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
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            id="pernyataan2" data-bs-toggle="dropdown" aria-expanded="false">
                                            telah
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="pernyataan2">
                                            <li><a class="dropdown-item" href="#">telah</a></li>
                                            <li><a class="dropdown-item" href="#">belum</a></li>
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
                                <input type="text" class="form-control" id="namaPasien">
                            </div>
                            <div class="col-12">
                                <label for="tanggalLahirPasien" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tanggalLahirPasien">
                            </div>
                            <div class="col-12">
                                <label for="alamatPasien" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamatPasien" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <span>Dengan ini menyatakan</span>
                                    <div class="dropdown mx-2">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                            id="persetujuan" data-bs-toggle="dropdown" aria-expanded="false">
                                            Setuju
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="persetujuan">
                                            <li><a class="dropdown-item" href="#">Setuju</a></li>
                                            <li><a class="dropdown-item" href="#">Menolak</a></li>
                                        </ul>
                                    </div>
                                    <span>untuk dilakukannya tindakan</span>
                                    <input type="text" class="form-control mx-2" style="width: 200px;">
                                    <span>dengan</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="namaPerwakilan" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="namaPerwakilan">
                            </div>
                            <div class="col-12">
                                <label for="tanggalLahirPerwakilan" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tanggalLahirPerwakilan">
                            </div>
                            <div class="col-12">
                                <label for="alamatPerwakilan" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamatPerwakilan" rows="3"></textarea>
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
                        <button type="button" class="btn btn-primary">Simpan</button>
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

    <div class="navigation-buttons mt-4">
        <button class="btn btn-secondary" wire:click="prevStep" {{ $currentStep===1 ? 'disabled' : '' }}>
            Previous
        </button>

        @if($currentStep < $totalSteps) <button class="btn btn-primary" wire:click="nextStep">Next</button>
            @else
            <button class="btn btn-success" wire:click="submit">Simpan</button>
            @endif
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
