<?php
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\SuratPulangPaksa;
use App\Models\DataPasien;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function with()
    {
        return [
            'suratPulangPaksas' => SuratPulangPaksa::with(['data_pasien'])
                ->latest()
                ->paginate(10)
        ];
    }

    public function detail($id)
    {
        return redirect()->route('main.persuratan.pulang-paksa.print', ['id' => $id]);
    }

    public function delete($id)
    {
        try {
            SuratPulangPaksa::findOrFail($id)->delete();
            flash()->success('Surat pulang paksa berhasil dihapus.');
        } catch (\Exception $e) {
            flash()->error('Gagal menghapus surat pulang paksa.');
        }
    }
}; ?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="title">Daftar Surat Pulang Paksa</h1>
        <a href="/main/persuratan/pulang-paksa/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Surat Pulang Paksa
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
        @if($suratPulangPaksas->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Belum ada data surat pulang paksa. Klik tombol "Tambah Surat Pulang Paksa" untuk membuat baru.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Hubungan</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Penandatangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratPulangPaksas as $index => $surat)
                    <tr>
                        <th scope="row">{{ $suratPulangPaksas->firstItem() + $index }}</th>
                        <td>{{ $surat->nomor }}</td>
                        <td>{{ $surat->tanggal }}</td>
                        <td>{{ $surat->data_pasien->nama_lengkap ?? '-' }}</td>
                        <td>{{ $surat->nama_lengkap }}</td>
                        <td>
                            @switch($surat->hubungan)
                                @case('1') Diri Sendiri @break
                                @case('2') Orang Tua @break
                                @case('3') Anak @break
                                @case('4') Suami/Istri @break
                                @case('5') Kerabat/Saudara @break
                                @default {{ $surat->hubungan }}
                            @endswitch
                        </td>
                        <td>{{ $surat->no_telepon }}</td>
                        <td>{{ $surat->penandatangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button wire:click="detail({{ $surat->id }})" class="btn btn-sm btn-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button wire:click="delete({{ $surat->id }})"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat pulang paksa ini?')">
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
                    Menampilkan {{ $suratPulangPaksas->firstItem() }} sampai {{ $suratPulangPaksas->lastItem() }}
                    dari {{ $suratPulangPaksas->total() }} hasil
                </div>
                <div>
                    {{ $suratPulangPaksas->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
