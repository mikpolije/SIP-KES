<?php
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

new class extends Component {
    public $doctorId;
    public $nama;
    public $nip;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $alamat;
    public $no_telp;
    public $spesialis;
    public $status;

    public function mount($dokter) {
        $this->doctorId = $dokter;
        $this->loadDoctor();
    }

    public function loadDoctor() {
        $doctor = DB::table('dokter')->where('id', $this->doctorId)->first();

        if (!$doctor) {
            session()->flash('error', 'Dokter tidak ditemukan');
            return redirect()->route('dokter.index');
        }

        $this->nama = $doctor->nama;
        $this->nip = $doctor->nip;
        $this->alamat = $doctor->alamat;
        $this->no_telepon = $doctor->no_telepon;
    }

    public function rules() {
        return [
            'nama' => 'required|string|max:255',
            'nip' => ['required', 'string', 'max:20', Rule::unique('dokter', 'nip')->ignore($this->doctorId)],

        ];
    }

    public function update() {
        $this->validate();

        try {
            DB::table('dokter')
                ->where('id', $this->doctorId)
                ->update([
                    'nama' => $this->nama,
                    'nip' => $this->nip,
                    'tempat_lahir' => $this->tempat_lahir,
                    'tanggal_lahir' => $this->tanggal_lahir,
                    'jenis_kelamin' => $this->jenis_kelamin,
                    'alamat' => $this->alamat,
                    'no_telp' => $this->no_telp,
                    'spesialis' => $this->spesialis,
                    'status' => $this->status,
                    'updated_at' => now(),
                ]);

            session()->flash('success', 'Data dokter berhasil diperbarui');
            $this->dispatch('doctor-updated');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui data dokter: ' . $e->getMessage());
        }
    }
};

?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ubah Data Dokter</h5>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form wire:submit.prevent="update">
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" wire:model="nama">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" wire:model="nip">
            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>


      <div class="row mb-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="no_telp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" wire:model="no_telp">
            @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>


      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" wire:model="alamat"></textarea>
        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('doctor.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
</div>
