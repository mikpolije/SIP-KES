<?php
use Livewire\Volt\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public function mount()
    {
        if (session()->has('success')) {
            LivewireAlert::title(session('success'))->success()->position('top-end')->toast()->show();
        }
    }
};
?>

<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-start mb-4">
      <h5 class="card-title fw-semibold mb-4">Daftar Dokter</h5>
      <a class="btn btn-primary" href="{{ route('doctor.create') }}">Tambah</a>
    </div>
    <livewire:master.doctors-table />
  </div>
</div>
