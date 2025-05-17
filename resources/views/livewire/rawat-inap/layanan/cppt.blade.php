<?php
use App\Models\CPPT;
use App\Models\Pendaftaran;
use App\Models\Dokter;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $pendaftaran;
    public $cppts;
    public $dateFilter;
    public $dpjpFilter;
    public $dokters;
    public $showFilters = false;

    public $confirmingDuplicate = false;
    public $cpptToDuplicate;


    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::find($pendaftaranId);
        $this->dokters = Dokter::orderBy('nama')->get();
        $this->loadCppts();
    }

    #[On('cppt-added')]
    public function loadCppts() {
        $query = CPPT::where('id_pendaftaran', $this->pendaftaranId)
            ->with(['icd10', 'icd9', 'obat', 'pendaftaran.poli_rawat_inap.informed_consent.dokter']);

        if ($this->dateFilter) {
            $query->whereDate('created_at', $this->dateFilter);
        }

        if ($this->dpjpFilter) {
            $query->whereHas('pendaftaran.poli_rawat_inap.informed_consent', function($q) {
                $q->where('id_dokter', $this->dpjpFilter);
            });
        }

        $this->cppts = $query->orderBy('created_at', 'desc')->get();
    }

    public function applyFilters() {
        $this->loadCppts();
    }

    public function resetFilters() {
        $this->dateFilter = null;
        $this->dpjpFilter = null;
        $this->loadCppts();
    }

    public function toggleFilters() {
        $this->showFilters = !$this->showFilters;
    }

    public function openCpptModal($cpptId = null) {
        $this->dispatch('open-cppt-modal', cpptId: $cpptId);
    }

    public function onCpptSaved() {
        $this->loadCppts();
    }

    public function confirmDuplicate($cpptId) {
        $this->cpptToDuplicate = $cpptId;
        $this->confirmingDuplicate = true;
    }

    public function duplicateCppt() {
        $original = CPPT::find($this->cpptToDuplicate);

        if ($original) {
            $duplicate = $original->replicate();
            $duplicate->created_at = now();
            $duplicate->save();

            $this->loadCppts();
            $this->dispatch('notify', type: 'success', message: 'CPPT berhasil diduplikasi');
        }

        $this->confirmingDuplicate = false;
        $this->cpptToDuplicate = null;
    }
};
?>

<div>
    <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-sm btn-outline-primary" wire:click="toggleFilters">
            <i class="bi bi-funnel"></i> {{ $showFilters ? 'Sembunyikan Filter' : 'Tampilkan Filter' }}
        </button>
    </div>

    @if($showFilters)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="dateFilter" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="dateFilter" wire:model="dateFilter">
                </div>

                <div class="col-md-4">
                    <label for="dpjpFilter" class="form-label">DPJP</label>
                    <select class="form-select" id="dpjpFilter" wire:model="dpjpFilter">
                        <option value="">Semua Dokter</option>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 d-flex align-items-end gap-2">
                    <button class="btn btn-primary" wire:click="applyFilters">
                        <i class="bi bi-search"></i> Terapkan
                    </button>
                    <button class="btn btn-outline-secondary" wire:click="resetFilters">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">TGL VISIT</th>
                        <th scope="col">DPJP</th>
                        <th scope="col">KETERANGAN</th>
                        <th scope="col">OLEH</th>
                        <th scope="col" class="text-center">
                            <i class="bi bi-pencil-square"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($cppts as $index => $cppt)
                        @php
                            $dokter = optional(optional(optional($cppt->pendaftaran)->poli_rawat_inap)->informed_consent)->dokter;
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cppt->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $dokter->nama ?? '-' }}</td>
                            <td>
                                @if($cppt->icd10)
                                    Diagnosis: {{ $cppt->icd10->code }} - {{ $cppt->icd10->display }}<br>
                                @endif
                                @if($cppt->icd9)
                                    Tindakan: {{ $cppt->icd9->code }} - {{ $cppt->icd9->display }}<br>
                                @endif
                                @if($cppt->pemeriksaan)
                                    {{ $cppt->pemeriksaan }}<br>
                                @endif
                            </td>
                            <td>{{ $dokter->nama ?? '-' }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button
                                        class="btn btn-sm btn-primary rounded-circle me-1"
                                        wire:click="$emit('showCpptDetail', '{{ $cppt->created_at->format('Y-m-d') }}')">
                                        <i class="bi bi-file-text"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary rounded-circle" wire:click="confirmDuplicate('{{ $cppt->id }}')">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data CPPT</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary rounded-pill" wire:click="openCpptModal">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    @livewire('rawat-inap.layanan.cppt-modal', [
        'pendaftaranId' => $pendaftaranId
    ], key('cppt-modal-'.$pendaftaranId))

    <!-- Confirmation Modal -->
    @if($confirmingDuplicate)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Duplikasi</h5>
                    <button type="button" class="btn-close" wire:click="$set('confirmingDuplicate', false)"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menduplikasi CPPT ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('confirmingDuplicate', false)">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="duplicateCppt">Duplikasi</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
