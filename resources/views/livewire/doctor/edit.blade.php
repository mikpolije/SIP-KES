<?php
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Livewire\Forms\Doctor\DoctorForm;
use App\Models\Master\Doctor;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public DoctorForm $form;

    public Doctor $dokter;

    public function mount()
    {
        $this->form->setDoctor($this->dokter);
    }

    public function update()
    {
        try {
            $this->form->update();
            session()->flash('success','Berhasil mengubah data dokter');
            $this->redirect(route('doctor.index'));
        } catch (Exception $e) {
            session()->flash('error', 'Gagal mengubah data dokter');
        }
    }
};

?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ubah Data Dokter</h5>

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
      </div>
    @endif

    <form wire:submit.prevent="update">
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control @error('form.email') is-invalid @enderror" id="email" type="email"
              wire:model="form.email">
            @error('form.email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="nama">Nama Dokter</label>
            <input class="form-control @error('form.nama') is-invalid @enderror" id="nama" type="text"
              wire:model="form.nama">
            @error('form.nama')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="gelar_depan">Gelar Depan</label>
            <input class="form-control @error('form.gelar_depan') is-invalid @enderror" id="gelar_depan" type="text"
              wire:model="form.gelar_depan">
            @error('form.gelar_depan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="gelar_belakang">Gelar Belakang</label>
            <input class="form-control @error('form.gelar_belakang') is-invalid @enderror" id="gelar_belakang"
              type="text" wire:model="form.gelar_belakang">
            @error('form.gelar_belakang')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="no_telepon">Nomor Telepon</label>
            <input class="form-control @error('form.no_telepon') is-invalid @enderror" id="no_telepon" type="text"
              wire:model="form.no_telepon">
            @error('form.no_telepon')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="no_sip">No SIP</label>
            <input class="form-control @error('form.no_sip') is-invalid @enderror" id="no_sip" type="text"
              wire:model="form.no_sip">
            @error('form.no_sip')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="nip">NIP</label>
            <input class="form-control @error('form.nip') is-invalid @enderror" id="nip" type="text"
              wire:model="form.nip">
            @error('form.nip')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label" for="jadwal_layanan">Jadwal Layanan</label>
            <input class="form-control @error('form.jadwal_layanan') is-invalid @enderror" id="jadwal_layanan"
              type="text" wire:model="form.jadwal_layanan">
            @error('form.jadwal_layanan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea class="form-control @error('form.alamat') is-invalid @enderror" id="alamat" rows="3"
              wire:model="form.alamat"></textarea>
            @error('form.alamat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('doctor.index') }}">Kembali</a>
      </div>
    </form>
  </div>
</div>
