<?php

use Livewire\Volt\Component;
use App\Models\Layanan;

new class extends Component {
    public $pendaftaranId;
    public $tanggal;
    public $search = '';
    public $perPage = 10;
    public $selectedLayanan = [];

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->tanggal = now()->format('Y-m-d');
    }

    public function pilihLayanan($layananId)
    {
        $this->selectedLayanan[] = $layananId;
    }

    public function hapusLayanan($index)
    {
        unset($this->selectedLayanan[$index]);
        $this->selectedLayanan = array_values($this->selectedLayanan);
    }

    public function simpan()
    {
        session()->flash('message', 'Layanan berhasil disimpan');
    }

    public function getLayananProperty()
    {
        return Layanan::when($this->search, function($query) {
            $query->where('nama_layanan', 'like', '%'.$this->search.'%')
                  ->orWhere('id', 'like', '%'.$this->search.'%');
        })
        ->paginate($this->perPage);
    }
}; ?>

<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" wire:model="tanggal">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-end">
                <button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#layananModal">
                    Tambah
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Tarif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($selectedLayanan as $index => $layananId)
                        @php
                            $layanan = App\Models\Layanan::find($layananId);
                        @endphp
                        <tr>
                            <td>{{ $layanan->id }}</td>
                            <td>{{ $layanan->nama_layanan }}</td>
                            <td>Rp {{ number_format($layanan->tarif_layanan, 0, ',', '.') }},-</td>
                            <td>
                                <button class="btn btn-danger btn-sm" wire:click="hapusLayanan({{ $index }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary" wire:click="simpan">Simpan</button>
        </div>
    </div>

    <div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="layananModalLabel">Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <label class="me-2">Tampilkan</label>
                                <select class="form-select form-select-sm" style="width: 70px;" wire:model="perPage">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="ms-2">entri</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end">
                                <label class="me-2 align-self-center">Cari:</label>
                                <input type="search" class="form-control form-control-sm" style="width: 200px;" wire:model="search">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Tarif</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($this->layanan as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_layanan }}</td>
                                    <td>Rp {{ number_format($item->tarif_layanan, 0, ',', '.') }},-</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                                wire:click="pilihLayanan('{{ $item->id }}')"
                                                @if(in_array($item->id, $selectedLayanan)) disabled @endif>
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Menampilkan {{ $this->layanan->firstItem() }} sampai {{ $this->layanan->lastItem() }} dari {{ $this->layanan->total() }} entri</p>
                        </div>
                        <div class="col-md-6">
                            {{ $this->layanan->links('livewire::simple-bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
