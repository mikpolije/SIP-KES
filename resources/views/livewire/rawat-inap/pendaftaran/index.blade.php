<?php

use App\Models\Pendaftaran;
use App\Models\PoliRawatInap;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    public $nama = '';
    public $nomorRM = '';
    public $nik = '';
    public $tempatLahir = '';
    public $tanggalLahir = '';
    public $jenisKelamin = '';
    public $agama = '';
    public $statusPerkawinan = '';
    public $alamatLengkap = '';
    public $rt = '';
    public $rw = '';
    public $kab = '';
    public $alamatDomisili = '';
    public $rtDomisili = '';
    public $rwDomisili = '';
    public $kabDomisili = '';
    public $noHP = '';
    public $pendidikan = '';
    public $pekerjaan = '';
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
    public $existingRawatInap;

    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $this->currentPatient = $pendaftaran->data_pasien;
        $this->nomorRM = $this->currentPatient->nomor_rm;

        $this->existingRawatInap = PoliRawatInap::where('id_pendaftaran', $pendaftaranId)->first();

        $this->nama = $this->currentPatient->nama_lengkap;
        $this->alamatLengkap = $this->currentPatient->alamat_lengkap;
        $this->nomorRM = $this->currentPatient->no_rm;
        $this->nik = $this->currentPatient->nik;
        $this->tempatLahir = $this->currentPatient->tempat_lahir;
        $this->tanggalLahir = $this->currentPatient->tanggal_lahir;
        $this->jenisKelamin = $this->currentPatient->jenis_kelamin;
        $this->agama = $this->currentPatient->agama;
        $this->statusPerkawinan = $this->currentPatient->status_perkawinan;
        $this->rt = $this->currentPatient->rt;
        $this->rw = $this->currentPatient->rw;

        $this->prov = $this->currentPatient->provinsi->name ?? null;
        $this->kab = $this->currentPatient->kota->name ?? null;
        $this->kec = $this->currentPatient->kecamatan->name ?? null;

        $this->kodePos = $this->currentPatient->kode_pos;
        $this->noHP = $this->currentPatient->nomor_telepon;
        $this->pendidikan = $this->currentPatient->pendidikan;
        $this->pekerjaan = $this->currentPatient->pekerjaan;

        $this->alamatDomisili = $this->currentPatient->alamat_lengkap;

        $this->rtDomisili = $this->currentPatient->rt;
        $this->rwDomisili = $this->currentPatient->rw;


        if($this->existingRawatInap) {
            $this->kelasPerawatan = $this->existingRawatInap->kelas;
            $this->ruangInap = $this->existingRawatInap->ruangan;
            $this->pembayaran = $this->existingRawatInap->pembayaran;
        }
    }

    public function submit()
    {

        $this->validate();

        if ($this->existingRawatInap) {
            $this->existingRawatInap->update([
                'kelas' => $this->kelasPerawatan,
                'ruangan' => $this->ruangInap,
                'pembayaran' => $this->pembayaran,
            ]);

            flash()->success('Form berhasil diupdate!');

            $this->dispatch('switch-tab', tab: 'pemeriksaan');
            return;
        }


        PoliRawatInap::create([
            'id_pendaftaran' => $this->pendaftaranId,
            'kelas' => $this->kelasPerawatan,
            'ruangan' => $this->ruangInap,
            'pembayaran' => $this->pembayaran,
        ]);

        flash()->success('Form berhasil diisi!');

        $this->dispatch('patient-registered', pendaftaranId: $this->pendaftaranId);
        $this->dispatch('switch-tab', tab: 'pemeriksaan');

    }
}; ?>

<div>
    <form wire:submit.prevent="submit">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror"
                        id="nama" disabled>
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- nomor rm -->
                <div class="mb-3">
                    <label for="nomorRM" class="form-label">Nomor RM</label>
                    <input type="text" wire:model="nomorRM" class="form-control" id="nomorRM" disabled>
                </div>

                <!-- nik -->
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" wire:model="nik" class="form-control @error('nik') is-invalid @enderror"
                        id="nik" disabled>
                    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- tempat lahir -->
                <div class="mb-3">
                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                    <input type="text" wire:model="tempatLahir"
                        class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" disabled>
                    @error('tempatLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- tanggal lahir -->
                <div class="mb-3">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" wire:model="tanggalLahir"
                        class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" disabled>
                    @error('tanggalLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- jenis kelamin -->
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select wire:model="jenisKelamin" class="form-select @error('jenisKelamin') is-invalid @enderror"
                        id="jenisKelamin" disabled>
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenisKelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- agama -->
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select wire:model="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" disabled>
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
                        class="form-select @error('statusPerkawinan') is-invalid @enderror" id="statusPerkawinan" disabled>
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
                        class="form-control @error('alamatLengkap') is-invalid @enderror" id="alamatLengkap" disabled>
                    @error('alamatLengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- rt/rw -->
                <div class="row mb-3">
                    <div class="col-auto">
                        <label for="rt" class="form-label">RT:</label>
                        <input type="text" wire:model="rt" class="form-control w-75" id="rt" disabled>
                    </div>
                    <div class="col-auto">
                        <label for="rw" class="form-label">RW:</label>
                        <input type="text" wire:model="rw" class="form-control w-75" id="rw" disabled>
                    </div>
                </div>

                <!-- kab -->
                <div class="mb-3">
                    <label for="kab" class="form-label">Kab:</label>
                    <input type="text" wire:model="kab" class="form-control @error('kab') is-invalid @enderror"
                        id="kab" disabled>
                    @error('kab') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- alamat domisili -->
                <div class="mb-3">
                    <label for="alamatDomisili" class="form-label">Alamat Domisili</label>
                    <input type="text" wire:model="alamatDomisili" class="form-control" id="alamatDomisili" disabled>
                </div>

                <!-- rt/rw domisili -->
                <div class="row mb-3">
                    <div class="col-auto">
                        <label for="rtDomisili" class="form-label">RT:</label>
                        <input type="text" wire:model="rtDomisili" class="form-control w-75" id="rtDomisili" disabled>
                    </div>
                    <div class="col-auto">
                        <label for="rwDomisili" class="form-label">RW:</label>
                        <input type="text" wire:model="rwDomisili" class="form-control w-75" id="rwDomisili" disabled>
                    </div>
                </div>

                <!-- no.hp -->
                <div class="mb-3">
                    <label for="noHP" class="form-label">No.HP</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input type="text" wire:model="noHP" class="form-control @error('noHP') is-invalid @enderror"
                            id="noHP" disabled>
                    </div>
                    @error('noHP') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- pendidikan -->
                    {{--
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <select wire:model="pendidikan" class="form-select @error('pendidikan') is-invalid @enderror"
                        id="pendidikan" disabled>
                        <option value="" selected disabled>Pilih Pendidikan</option>
                        <option>Tidak Sekolah</option>
                        <option>SD</option>
                        <option>SLTP sederajat</option>
                        <option>SLTA sederajat</option>
                        <option>D4</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                    </select>
                    @error('pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                    --}}

                <!-- pekerjaan -->
                    {{--
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <select wire:model="pekerjaan" class="form-select @error('pekerjaan') is-invalid @enderror"
                        id="pekerjaan">
                        <option value="" selected disabled>Pilih Pekerjaan</option>
                        <option>Tidak bekerja</option>
                        <option>PNS</option>
                        <option>TNI/POLRI</option>
                        <option>BUMN</option>
                        <option>Pegawai Swasta/Wirausaha</option>
                        <option>Lain-lain (free text)</option>
                    </select>
                    @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                    --}}

            </div>

            <!-- right column -->
            <div class="col-md-4">
                <!-- kode pos -->
                <div class="mb-3">
                    <label for="kodePos" class="form-label">Kode Pos:</label>
                    <input type="text" wire:model="kodePos" class="form-control" id="kodePos" disabled>
                </div>

                <!-- kec & prov -->
                <div class="mb-3">
                    <label for="kec" class="form-label">Kec:</label>
                    <input type="text" wire:model="kec" class="form-control" id="kec" disabled>
                </div>
                <div class="mb-3">
                    <label for="prov" class="form-label">Prov:</label>
                    <input type="text" wire:model="prov" class="form-control" id="prov" disabled>
                </div>

                <!-- kelas perawatan -->
                <div class="mb-3">
                    <label for="kelasPerawatan" class="form-label">Kelas Perawatan</label>
                    <div class="border rounded p-2">
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="kelasPerawatan" value="1" id="kelas1">
                            <label class="form-check-label border-4" for="1">Kelas 1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="kelasPerawatan" value="2" id="kelas2">
                            <label class="form-check-label border-4" for="2">Kelas 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="kelasPerawatan" value="3" id="kelas3">
                            <label class="form-check-label border-4" for="3">Kelas 3</label>
                        </div>
                    </div>
                    @error('kelasPerawatan') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <!-- ruang inap -->
                <div class="mb-3">
                    <label for="ruangInap" class="form-label">Ruang Inap</label>
                    <select wire:model.live="ruangInap" class="form-select @error('ruangInap') is-invalid @enderror" id="ruangInap">
                        <option value="" selected disabled>Pilih Ruang Inap</option>
                        <option value="a">Ruang A</option>
                        <option value="b">Ruang B</option>
                        <option value="c">Ruang C</option>
                    </select>
                    @error('ruangInap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- pembayaran -->
                <div class="mb-3">
                    <label for="pembayaran" class="form-label">Pembayaran</label>
                    <div class="border rounded p-2">
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="pembayaran" value="umum" id="umum">
                            <label class="form-check-label border-4" for="umum">Umum</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="pembayaran" value="bpjs" id="bpjs">
                            <label class="form-check-label border-4" for="bpjs">BPJS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border-4" type="radio" wire:model.live="pembayaran" value="asuransi" id="asuransi">
                            <label class="form-check-label border-4" for="asuransi">Asuransi</label>
                        </div>
                    </div>
                    @error('pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>
    </form>

    <div class="navigation-buttons mt-4 d-flex justify-content-end">
        <div class="btn btn-primary" wire:click="submit">Submit</div>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
