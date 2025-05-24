<?php

use Livewire\Volt\Component;
use App\Models\SuratKontrol;

new class extends Component {
    public $suratKontrols;

    public function mount()
    {
        $this->suratKontrols = SuratKontrol::with(['dokter', 'data_pasien'])->latest()->get();
    }

    public function detail($id)
    {
        return redirect()->route('main.persuratan.kontrol.print', ['id' => $id]);
    }
}; ?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Daftar Surat Kontrol</h1>
        <a href="/main/persuratan/kontrol/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Surat Kontrol
        </a>
    </div>

    <div class="table-responsive">
        @if($suratKontrols->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Belum ada data surat kontrol. Klik tombol "Tambah Surat Kontrol" untuk membuat baru.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Rencana Kontrol</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratKontrols as $index => $surat)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $surat->nomor }}</td>
                        <td>{{ $surat->tanggal }}</td>
                        <td>{{ $surat->data_pasien->nama_lengkap ?? '-' }}</td>
                        <td>{{ $surat->dokter->nama ?? $surat->kepada }}</td>
                        <td>{{ $surat->diagnosa ?? '-' }}</td>
                        <td>{{ $surat->rencana_kontrol ? \Carbon\Carbon::parse($surat->rencana_kontrol)->format('d/m/Y') : '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button wire:click="detail({{ $surat->id }})" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button wire:click="delete({{ $surat->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
