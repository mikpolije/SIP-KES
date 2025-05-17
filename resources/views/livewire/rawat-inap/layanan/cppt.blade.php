<?php
use App\Models\CPPT;
use App\Models\Pendaftaran;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $pendaftaran;
    public $cppts;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::find($pendaftaranId);
        $this->loadCppts();
    }

    #[On('cppt-added')]
    public function loadCppts() {
        $this->cppts = CPPT::where('id_pendaftaran', $this->pendaftaranId)
            ->with(['icd10', 'icd9', 'obat'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function openCpptModal($cpptId = null) {
        $this->dispatch('open-cppt-modal', cpptId: $cpptId);
    }

    public function onCpptSaved() {
        $this->loadCppts();
    }
};
?>

<div>
    <div>
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
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $cppt->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $pendaftaran->poli_rawat_inap->informed_consent->dokter->nama }}</td>
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
                                <td>{{ $pendaftaran->poli_rawat_inap->informed_consent->dokter->nama }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button
                                            class="btn btn-sm btn-primary rounded-circle me-1"
                                            wire:click="$emit('showCpptDetail', '{{ $cppt->created_at->format('Y-m-d') }}')">
                                            <i class="bi bi-file-text"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary rounded-circle">
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
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary rounded-pill" wire:click="openCpptModal">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    @livewire('rawat-inap.layanan.cppt-modal', [
        'pendaftaranId' => $pendaftaranId
    ], key('cppt-modal-'.$pendaftaranId))
</div>
