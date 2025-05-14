<?php

use App\Models\Pendaftaran;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
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
    public $pendaftaranId;

    public function mount($pendaftaranId)
    {
        $this->nomorRM = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first()->data_pasien->nomor_rm;
        $this->$pendaftaranId = $pendaftaranId;
    }

    public function calculateAge($birthDate)
    {
        $birthDate = new DateTime($birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate);
        return $age->y;
    }

    public function submit()
    {
        session()->flash('message', 'Form submitted successfully!');
        $this->dispatch('patient-registered', pendaftaranId: $this->pendaftaranId);
        $this->dispatch('switch-tab', tab: 'pemeriksaan');
    }
}; ?>

<div>
    <form>
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror"
                        id="nama">
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
                    <select wire:model="jenisKelamin" class="form-select @error('jenisKelamin') is-invalid @enderror"
                        id="jenisKelamin">
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenisKelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- agama -->
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select wire:model="agama" class="form-select @error('agama') is-invalid @enderror" id="agama">
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
                        class="form-select @error('statusPerkawinan') is-invalid @enderror" id="statusPerkawinan">
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
                        <input type="text" wire:model="noHP" class="form-control @error('noHP') is-invalid @enderror"
                            id="noHP">
                    </div>
                    @error('noHP') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- pendidikan -->
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <select wire:model="pendidikan" class="form-select @error('pendidikan') is-invalid @enderror"
                        id="pendidikan">
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
                            <input class="form-check-input" type="radio" wire:model="kelasPerawatan" value="kelas1"
                                id="kelas1">
                            <label class="form-check-label" for="kelas1">Kelas 1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="kelasPerawatan" value="kelas2"
                                id="kelas2">
                            <label class="form-check-label" for="kelas2">Kelas 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="kelasPerawatan" value="kelas3"
                                id="kelas3">
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
                            <input class="form-check-input" type="radio" wire:model="pembayaran" value="umum" id="umum">
                            <label class="form-check-label" for="umum">Umum</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="pembayaran" value="bpjs" id="bpjs">
                            <label class="form-check-label" for="bpjs">BPJS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="pembayaran" value="asuransi"
                                id="asuransi">
                            <label class="form-check-label" for="asuransi">Asuransi</label>
                        </div>
                    </div>
                    @error('pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </form>
    <div class="navigation-buttons mt-4 d-flex justify-content-end">
        <button class="btn btn-primary" wire:click="submit">Submit</button>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
