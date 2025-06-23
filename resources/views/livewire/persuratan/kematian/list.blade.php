<?php
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\SuratKematian;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function with()
    {
        return [
            'suratKematians' => SuratKematian::with(['data_pasien', 'icd10'])
                ->latest()
                ->paginate(10)
        ];
    }

    public function detail($id)
    {
        return redirect()->route('main.persuratan.kematian.print', ['id' => $id]);
    }

    public function delete($id)
    {
        try {
            SuratKematian::findOrFail($id)->delete();
            flash()->success('Surat kematian berhasil dihapus.');
        } catch (\Exception $e) {
            flash()->error('Gagal menghapus surat kematian.');
        }
    }
}; ?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="title">Daftar Surat Kematian</h1>
        <a href="/main/persuratan/kematian/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Surat Kematian
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
        @if($suratKematians->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Belum ada data surat kematian. Klik tombol "Tambah Surat Kematian" untuk membuat baru.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Kematian</th>
                        <th scope="col">Tempat Kematian</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Penandatangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratKematians as $index => $surat)
                    <tr>
                        <th scope="row">{{ $suratKematians->firstItem() + $index }}</th>
                        <td>{{ $surat->nomor }}</td>
                        <td>{{ $surat->data_pasien->nama_lengkap ?? '-' }}</td>
                        <td>
                            @if($surat->tanggal_masuk_rs)
                                {{ \Carbon\Carbon::parse($surat->tanggal_masuk_rs)->format('d/m/Y') }}
                                @if($surat->waktu_masuk_rs)
                                    <br><small class="text-muted">{{ $surat->waktu_masuk_rs }}</small>
                                @endif
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($surat->tanggal_kematian)
                                {{ \Carbon\Carbon::parse($surat->tanggal_kematian)->format('d/m/Y') }}
                                @if($surat->waktu_kematian)
                                    <br><small class="text-muted">{{ $surat->waktu_kematian }}</small>
                                @endif
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $surat->tempat_kematian ?? '-' }}</td>
                        <td>
                            @if($surat->icd10)
                                <span class="badge bg-secondary">{{ $surat->icd10->code }}</span><br>
                                <small>{{ $surat->icd10->display }}</small>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $surat->penandatangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button wire:click="detail({{ $surat->id }})" class="btn btn-sm btn-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button wire:click="delete({{ $surat->id }})"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat kematian ini?')">
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
                    Menampilkan {{ $suratKematians->firstItem() }} sampai {{ $suratKematians->lastItem() }}
                    dari {{ $suratKematians->total() }} hasil
                </div>
                <div>
                    {{ $suratKematians->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
