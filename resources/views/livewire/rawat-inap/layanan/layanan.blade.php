<?php

use Livewire\Volt\Component;
use App\Models\LayananPendaftaran;
use App\Models\Layanan;
use App\Models\Pendaftaran;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pendaftaranId;
    public $layananList = [];
    public $search = '';
    public $perPage = 7;
    public $notification = null; // Added notification property

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->loadLayananPendaftaran();

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        if(!$pendaftaran->asessmen_awal) {
            flash()->warning('Isi Asessmen Awal terlebih dahulu!');
            $this->dispatch('switch-tab', tab: 'pemeriksaan');
        }
    }

    public function loadLayananPendaftaran() {
        if ($this->pendaftaranId) {
            $this->layananList = LayananPendaftaran::with('layanan')
                ->where('id_pendaftaran', $this->pendaftaranId)
                ->get();
        }
    }

    public function getLayananModalDataProperty() {
        $query = Layanan::query();

        if ($this->search) {
            $query->where('nama_layanan', 'like', '%'.$this->search.'%');
        }

        return $query->paginate($this->perPage);
    }

    public function selectLayanan($layananId) {
        $layanan = Layanan::find($layananId);

        LayananPendaftaran::create([
            'id_pendaftaran' => $this->pendaftaranId,
            'id_layanan' => $layananId
        ]);

        $this->notification = [
            'type' => 'success',
            'message' => 'Layanan "' . $layanan->nama_layanan . '" berhasil ditambahkan!'
        ];

        $this->loadLayananPendaftaran();
        flash()->success('Layanan berhasil ditambahkan!');
    }

    public function dismissNotification() {
        $this->notification = null;
    }

    public function updatedSearch() {
        $this->resetPage();
    }

    public function updatedPerPage() {
        $this->resetPage();
    }
}; ?>

<div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal">
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
                        <th>Harga Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($layananList) > 0)
                        @foreach($layananList as $item)
                            <tr>
                                <td>{{ $item->layanan->id ?? '' }}</td>
                                <td>{{ $item->layanan->nama_layanan ?? '' }}</td>
                                <td>Rp {{ number_format($item->layanan->tarif_layanan, 0, ',', '.') }},-</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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

                    <!-- flash notification -->
                    @if($notification)
                        <div class="alert alert-{{ $notification['type'] }} alert-dismissible fade show" role="alert">
                            {{ $notification['message'] }}
                            <button type="button" class="btn-close" wire:click="dismissNotification" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <label class="me-2">Tampilkan</label>
                                <select class="form-select form-select-sm" style="width: 70px;" wire:model.live="perPage">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="ms-2">entri</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end">
                                <label class="me-2 align-self-center">Cari:</label>
                                <input type="search" class="form-control form-control-sm" style="width: 200px;" wire:model.live.debounce.300ms="search">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Layanan</th>
                                    <th>Tarif</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($this->layananModalData as $layanan)
                                    <tr>
                                        <td>{{ $layanan->id }}</td>
                                        <td>{{ $layanan->nama_layanan }}</td>
                                        <td>Rp {{ number_format($layanan->tarif_layanan, 0, ',', '.') }},-</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" wire:click="selectLayanan({{ $layanan->id }})">
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
                            <p>Menampilkan {{ $this->layananModalData->firstItem() ?? 0 }} hingga {{ $this->layananModalData->lastItem() ?? 0 }} dari {{ $this->layananModalData->total() }} entri</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pagination-container">
                                {{ $this->layananModalData->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
