<?php
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\SuratKontrol;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function with()
    {
        return [
            'suratKontrols' => SuratKontrol::with(['dokter', 'data_pasien'])
                ->latest()
                ->paginate(10)
        ];
    }

    public function detail($id)
    {
        return redirect()->route('main.persuratan.kontrol.print', ['id' => $id]);
    }

    public function delete($id)
    {
        try {
            SuratKontrol::findOrFail($id)->delete();
            flash()->success('Surat kontrol berhasil dihapus.');
        } catch (\Exception $e) {
            flash()->error('Gagal menghapus surat kontrol.');
        }
    }
}; ?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="title">Daftar Surat Kontrol</h1>
        <a href="/main/persuratan/kontrol/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Surat Kontrol
        </a>
    </div>
    <div class="d-flex justify-content-end my-4">
        <select class="form-control me-2" id="searchPasien" style="width: 300px;">
            <option value="">Cari Data Pasien...</option>
        </select>
        <button class="btn btn-primary" type="button" id="btnCariPasien">
            <i class="fas fa-search"></i>
        </button>
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
                        <th scope="row">{{ $suratKontrols->firstItem() + $index }}</th>
                        <td>{{ $surat->nomor }}</td>
                        <td>{{ $surat->tanggal }}</td>
                        <td>{{ $surat->data_pasien->nama_lengkap ?? '-' }}</td>
                        <td>{{ $surat->dokter->nama ?? $surat->kepada }}</td>
                        <td>{{ $surat->diagnosa ?? '-' }}</td>
                        <td>{{ $surat->rencana_kontrol ? \Carbon\Carbon::parse($surat->rencana_kontrol)->format('d/m/Y') : '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button wire:click="detail({{ $surat->id }})" class="btn btn-sm btn-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button wire:click="delete({{ $surat->id }})"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat kontrol ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Menampilkan {{ $suratKontrols->firstItem() }} sampai {{ $suratKontrols->lastItem() }}
                    dari {{ $suratKontrols->total() }} hasil
                </div>
                <div>
                    {{ $suratKontrols->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
