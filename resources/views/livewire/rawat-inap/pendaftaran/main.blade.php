<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $patientId;
    public $currentStep = 1;
    public $totalSteps = 2;

    // personal
    #[Validate('required')]
    public $nama = '';
    public $nomorRM = '';
    #[Validate('required')]
    public $nik = '';
    #[Validate('required')]
    public $tempatLahir = '';
    #[Validate('required')]
    public $tanggalLahir = '';
    #[Validate('required')]
    public $jenisKelamin = '';
    #[Validate('required')]
    public $agama = '';
    #[Validate('required')]
    public $statusPerkawinan = '';

    // alamat
    #[Validate('required')]
    public $alamatLengkap = '';
    public $rt = '';
    public $rw = '';
    #[Validate('required')]
    public $kab = '';
    public $alamatDomisili = '';
    public $rtDomisili = '';
    public $rwDomisili = '';
    public $kabDomisili = '';
    #[Validate('required')]
    public $noHP = '';
    #[Validate('required')]
    public $pendidikan = '';
    #[Validate('required')]
    public $pekerjaan = '';
    public $bahasa = '';

    // info lain
    public $kodePos = '';
    public $kec = '';
    public $prov = '';
    public $kecDomisili = '';
    public $provDomisili = '';
    #[Validate('required')]
    public $kelasPerawatan = 'kelas1';
    #[Validate('required')]
    public $ruangInap = '';
    #[Validate('required')]
    public $pembayaran = 'umum';

    // general consent fields
    public $namaPenanggungJawab = '';
    public $hubunganPasien = '';
    public $tanggalLahirPenanggungJawab = '';
    public $umurPenanggungJawab = '';
    public $jenisKelaminPenanggungJawab = '';
    public $alamatPenanggungJawab = '';
    public $kodePosPenanggungJawab = '';
    public $rtPenanggungJawab = '';
    public $rwPenanggungJawab = '';
    public $kecPenanggungJawab = '';
    public $kabPenanggungJawab = '';
    public $provPenanggungJawab = '';

    public function mount($patientId)
    {
        $this->patientId = $patientId;
        $this->totalSteps = 2;
        $this->nomorRM = $patientId;
    }

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'nama' => 'required',
                'nik' => 'required',
                'tempatLahir' => 'required',
                'tanggalLahir' => 'required',
                'jenisKelamin' => 'required',
                'agama' => 'required',
                'statusPerkawinan' => 'required',
                'alamatLengkap' => 'required',
                'kab' => 'required',
                'noHP' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'kelasPerawatan' => 'required',
                'ruangInap' => 'required',
                'pembayaran' => 'required',
            ]);
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function calculateAge($birthDate)
    {
        $birthDate = new DateTime($birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate);
        return $age->y;
    }

    public function updatedTanggalLahirPenanggungJawab()
    {
        if ($this->tanggalLahirPenanggungJawab) {
            $this->umurPenanggungJawab = $this->calculateAge($this->tanggalLahirPenanggungJawab);
        }
    }

    public function submit()
    {
        $this->validate([
            'namaPenanggungJawab' => 'required',
            'hubunganPasien' => 'required',
            'tanggalLahirPenanggungJawab' => 'required',
            'jenisKelaminPenanggungJawab' => 'required',
            'alamatPenanggungJawab' => 'required',
        ]);

        session()->flash('message', 'Form submitted successfully!');
        $this->dispatch('switch-tab', tab: 'pemeriksaan');
    }
}; ?>

<div class="container stepper-container p-4">
    <div class="stepper" id="stepper">
        <div class="step">
            <div class="step-circle {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
            <div class="step-title">Identitas Diri</div>
        </div>
        <div class="step-connector {{ $currentStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
        <div class="step">
            <div class="step-circle {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
            <div class="step-title">General Consent</div>
        </div>
    </div>

    <!-- step 1 content - identitas diri -->
    <div class="step-content {{ $currentStep === 1 ? 'active' : '' }}" data-step-content="1">
        <div>
            <form>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-4">
                        <!-- nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" wire:model="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="nama">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- nomor rm -->
                        <div class="mb-3">
                            <label for="nomorRM" class="form-label">Nomor RM</label>
                            <input type="text" wire:model="nomorRM" class="form-control" id="nomorRM" readonly>
                        </div>

                        <!-- nik -->
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" wire:model="nik" class="form-control @error('nik') is-invalid @enderror"
                                id="nik">
                            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- tempat lahir -->
                        <div class="mb-3">
                            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" wire:model="tempatLahir"
                                class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir">
                            @error('tempatLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- tanggal lahir -->
                        <div class="mb-3">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" wire:model="tanggalLahir"
                                class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir">
                            @error('tanggalLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- jenis kelamin -->
                        <div class="mb-3">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select wire:model="jenisKelamin"
                                class="form-select @error('jenisKelamin') is-invalid @enderror" id="jenisKelamin">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenisKelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- agama -->
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select wire:model="agama" class="form-select @error('agama') is-invalid @enderror"
                                id="agama">
                                <option value="" selected disabled>Pilih Agama</option>
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Konghucu</option>
                            </select>
                            @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- status perkawinan -->
                        <div class="mb-3">
                            <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                            <select wire:model="statusPerkawinan"
                                class="form-select @error('statusPerkawinan') is-invalid @enderror"
                                id="statusPerkawinan">
                                <option value="" selected disabled>Pilih Status</option>
                                <option>Belum Kawin</option>
                                <option>Kawin</option>
                                <option>Cerai Hidup</option>
                                <option>Cerai Mati</option>
                            </select>
                            @error('statusPerkawinan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- middle column -->
                    <div class="col-md-4">
                        <!-- alamat lengkap -->
                        <div class="mb-3">
                            <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                            <input type="text" wire:model="alamatLengkap"
                                class="form-control @error('alamatLengkap') is-invalid @enderror" id="alamatLengkap">
                            @error('alamatLengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- rt/rw -->
                        <div class="row mb-3">
                            <div class="col-auto">
                                <label for="rt" class="form-label">RT:</label>
                                <input type="text" wire:model="rt" class="form-control w-75" id="rt">
                            </div>
                            <div class="col-auto">
                                <label for="rw" class="form-label">RW:</label>
                                <input type="text" wire:model="rw" class="form-control w-75" id="rw">
                            </div>
                        </div>

                        <!-- kab -->
                        <div class="mb-3">
                            <label for="kab" class="form-label">Kab:</label>
                            <input type="text" wire:model="kab" class="form-control @error('kab') is-invalid @enderror"
                                id="kab">
                            @error('kab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- alamat domisili -->
                        <div class="mb-3">
                            <label for="alamatDomisili" class="form-label">Alamat Domisili</label>
                            <input type="text" wire:model="alamatDomisili" class="form-control" id="alamatDomisili">
                        </div>

                        <!-- rt/rw domisili -->
                        <div class="row mb-3">
                            <div class="col-auto">
                                <label for="rtDomisili" class="form-label">RT:</label>
                                <input type="text" wire:model="rtDomisili" class="form-control w-75" id="rtDomisili">
                            </div>
                            <div class="col-auto">
                                <label for="rwDomisili" class="form-label">RW:</label>
                                <input type="text" wire:model="rwDomisili" class="form-control w-75" id="rwDomisili">
                            </div>
                        </div>

                        <!-- kab domisili -->
                        <div class="mb-3">
                            <label for="kabDomisili" class="form-label">Kab:</label>
                            <input type="text" wire:model="kabDomisili" class="form-control" id="kabDomisili">
                        </div>

                        <!-- no.hp -->
                        <div class="mb-3">
                            <label for="noHP" class="form-label">No.HP</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="text" wire:model="noHP"
                                    class="form-control @error('noHP') is-invalid @enderror" id="noHP">
                            </div>
                            @error('noHP') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- pendidikan -->
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select wire:model="pendidikan"
                                class="form-select @error('pendidikan') is-invalid @enderror" id="pendidikan">
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA/SMK</option>
                                <option>D3</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                            </select>
                            @error('pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- pekerjaan -->
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <select wire:model="pekerjaan" class="form-select @error('pekerjaan') is-invalid @enderror"
                                id="pekerjaan">
                                <option value="" selected disabled>Pilih Pekerjaan</option>
                                <option>PNS</option>
                                <option>Swasta</option>
                                <option>Wiraswasta</option>
                                <option>Pelajar/Mahasiswa</option>
                                <option>Tidak Bekerja</option>
                            </select>
                            @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- bahasa yang dikuasai -->
                        <div class="mb-3">
                            <label for="bahasa" class="form-label">Bahasa yang dikuasai</label>
                            <select wire:model="bahasa" class="form-select" id="bahasa">
                                <option value="" selected disabled>Pilih Bahasa</option>
                                <option>Indonesia</option>
                                <option>Inggris</option>
                                <option>Mandarin</option>
                                <option>Jawa</option>
                                <option>Sunda</option>
                            </select>
                        </div>
                    </div>

                    <!-- right column -->
                    <div class="col-md-4">
                        <!-- kode pos -->
                        <div class="mb-3">
                            <label for="kodePos" class="form-label">Kode Pos:</label>
                            <input type="text" wire:model="kodePos" class="form-control" id="kodePos">
                        </div>

                        <!-- kec & prov -->
                        <div class="mb-3">
                            <label for="kec" class="form-label">Kec:</label>
                            <input type="text" wire:model="kec" class="form-control" id="kec">
                        </div>
                        <div class="mb-3">
                            <label for="prov" class="form-label">Prov:</label>
                            <input type="text" wire:model="prov" class="form-control" id="prov">
                        </div>

                        <!-- kec & prov domisili -->
                        <div class="mb-3">
                            <label for="kecDomisili" class="form-label">Kec:</label>
                            <input type="text" wire:model="kecDomisili" class="form-control" id="kecDomisili">
                        </div>
                        <div class="mb-3">
                            <label for="provDomisili" class="form-label">Prov:</label>
                            <input type="text" wire:model="provDomisili" class="form-control" id="provDomisili">
                        </div>

                        <!-- kelas perawatan -->
                        <div class="mb-3">
                            <label for="kelasPerawatan" class="form-label">Kelas Perawatan</label>
                            <div class="border rounded p-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="kelasPerawatan"
                                        value="kelas1" id="kelas1">
                                    <label class="form-check-label" for="kelas1">Kelas 1</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="kelasPerawatan"
                                        value="kelas2" id="kelas2">
                                    <label class="form-check-label" for="kelas2">Kelas 2</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="kelasPerawatan"
                                        value="kelas3" id="kelas3">
                                    <label class="form-check-label" for="kelas3">Kelas 3</label>
                                </div>
                            </div>
                            @error('kelasPerawatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- ruang inap -->
                        <div class="mb-3">
                            <label for="ruangInap" class="form-label">Ruang Inap</label>
                            <select wire:model="ruangInap" class="form-select @error('ruangInap') is-invalid @enderror"
                                id="ruangInap">
                                <option value="" selected disabled>Pilih ruang Inap</option>
                                <option>Ruang A</option>
                                <option>Ruang B</option>
                                <option>Ruang C</option>
                            </select>
                            @error('ruangInap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- pembayaran -->
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Pembayaran</label>
                            <div class="border rounded p-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="pembayaran" value="umum"
                                        id="umum">
                                    <label class="form-check-label" for="umum">Umum</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="pembayaran" value="bpjs"
                                        id="bpjs">
                                    <label class="form-check-label" for="bpjs">BPJS</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="pembayaran"
                                        value="asuransi" id="asuransi">
                                    <label class="form-check-label" for="asuransi">Asuransi</label>
                                </div>
                            </div>
                            @error('pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- step 2 content - general consent -->
    <div class="step-content {{ $currentStep === 2 ? 'active' : '' }}" data-step-content="2">
        <div class="container bg-white shadow-sm rounded p-4 my-4">
            <form>
                <!-- Header -->
                <div class="text-center mb-4">
                    <h4 class="fw-bold">GENERAL CONSENT</h4>
                </div>

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
                            <span class="input-group-text bg-primary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </span>
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

    <div class="navigation-buttons mt-4">
        <button class="btn btn-secondary" wire:click="prevStep" {{ $currentStep===1 ? 'disabled' : '' }}>
            Previous
        </button>

        @if($currentStep < $totalSteps) <button class="btn btn-primary" wire:click="nextStep">Next</button>
            @else
            <button class="btn btn-success" wire:click="submit">Submit</button>
            @endif
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
