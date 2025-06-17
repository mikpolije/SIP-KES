<?php

use App\Models\Pendaftaran;
use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $activeStep = 1;
    public $totalSteps = 3;
    public $activeTab = 'pendaftaran'; // Keep this for compatibility with child components
    public $showPatientDetails = false;
    public $selectedPatient = null;
    public $selectedPatientName = null;
    public $patientIsRegistered = false;
    public $patientIsExamined = false;
    public $search = '';
    public $perPage = 10;

    public function selectPatient($id, $name)
    {
        $this->selectedPatient = $id;
        $this->selectedPatientName = $name;
        $this->showPatientDetails = true;

        $patient = Pendaftaran::where('id_pendaftaran', $id)->first();
        if(!$patient->data_pasien){
            flash()->error('No RM Pasien tidak ditemukan. Mohon hubungi petugas untuk bantuan lebih lanjut.');
            $this->reset('selectedPatient', 'selectedPatientName', 'showPatientDetails');
            return;
        }

        $this->patientIsRegistered = (bool)(isset($patient->poli_rawat_inap) ?? 0);
        $this->patientIsExamined = (bool)((isset($patient->poli_rawat_inap->id_asessmen_awal) && isset($patient->poli_rawat_inap->id_informed_consent)) ?? 0);

        if (!$this->patientIsRegistered) {
            $this->activeStep = 1;
            $this->activeTab = 'pendaftaran';
        } elseif (!$this->patientIsExamined) {
            $this->activeStep = 2;
            $this->activeTab = 'pemeriksaan';
        } else {
            $this->activeStep = 3;
            $this->activeTab = 'layanan';
        }

        $this->dispatch('patient-selected', pendaftaranId: $id);
    }

    public function backToList()
    {
        $this->reset('selectedPatient', 'selectedPatientName', 'showPatientDetails');
    }

    public function goToStep($step)
    {
        if ($step < 1 || $step > $this->totalSteps) {
            return;
        }

        $this->activeStep = $step;

        // Map steps to tabs for compatibility
        $stepToTab = [
            1 => 'pendaftaran',
            2 => 'pemeriksaan',
            3 => 'layanan'
        ];

        $this->activeTab = $stepToTab[$step];

        if ($this->selectedPatient) {
            $this->dispatch('patient-selected', pendaftaranId: $this->selectedPatient);
        }
    }

    // Add back the changeTab method for child component compatibility
    public function changeTab($tab)
    {
        $this->activeTab = $tab;

        // Map tabs to steps
        $tabToStep = [
            'pendaftaran' => 1,
            'pemeriksaan' => 2,
            'layanan' => 3
        ];

        if (isset($tabToStep[$tab])) {
            $this->activeStep = $tabToStep[$tab];
        }

        if ($this->selectedPatient) {
            $this->dispatch('patient-selected', pendaftaranId: $this->selectedPatient);
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
        $this->resetPage();
    }

    public function getFilteredPatientsProperty()
    {
        return Pendaftaran::where('id_poli', '4')
            ->when($this->search, function ($query) {
                $query->whereHas('data_pasien', function ($subquery) {
                    $subquery->where('nama_pasien', 'like', '%' . $this->search . '%')
                            ->orWhere('no_rm', 'like', '%' . $this->search . '%')
                            ->orWhere('nik_pasien', 'like', '%' . $this->search . '%');
                })
                ->orWhere('id_pendaftaran', 'like', '%' . $this->search . '%');
            })
            ->with('data_pasien')
            ->paginate($this->perPage);
    }

    // Add back the switch-tab listener for child components
    #[On('switch-tab')]
    public function handleTabSwitch($tab)
    {
        $validTabs = ['pendaftaran', 'pemeriksaan', 'layanan'];

        if (in_array($tab, $validTabs)) {
            $this->changeTab($tab);
        }
    }

    #[On('patient-registered')]
    public function handlePatientRegistered($pendaftaranId)
    {
        $register = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        if(isset($register->poli_rawat_inap)) {
            $this->patientIsRegistered = true;
            $this->activeStep = 2;
            $this->activeTab = 'pemeriksaan';
        }
    }

    #[On('examination-completed')]
    public function handleExaminationCompleted($pendaftaranId)
    {
        $this->patientIsExamined = true;
        $this->activeStep = 3;
        $this->activeTab = 'layanan';
    }

    // Add back the shouldShowTab method if child components need it
    public function shouldShowTab($tab)
    {
        if ($tab === 'pendaftaran') {
            return !$this->patientIsRegistered;
        }
        return $this->patientIsRegistered;
    }
}; ?>

<div class="w-100 card">
    <div class="h-screen overflow-auto py-6 flex flex-col justify-center sm:py-12 w-100">
        <div class="relative py-3 sm:max-w-xl md:max-w-2xl lg:max-w-4xl mx-auto">
            <div class="relative px-4 py-8 bg-white shadow-md rounded-lg sm:p-10">
                <div class="max-w-md mx-auto md:max-w-xl lg:max-w-3xl">
                    <div>
                        <h1 class="title mb-4 h3">Rawat Inap</h1>

                        @if(!$showPatientDetails)
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <select wire:model.live="perPage" class="form-select form-select-sm me-2"
                                        style="width: 80px;">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                    <span class="small text-muted">entri per halaman</span>
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari pasien..."
                                        wire:model.live.debounce.300ms="search">
                                    <button class="btn btn-primary" type="button">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered align-middle mb-1">
                                    <thead class="table-light">
                                        <tr class="small">
                                            <th class="text-center" style="width: 5%">#</th>
                                            <th style="width: 8%">RM</th>
                                            <th style="width: 15%">NAMA</th>
                                            <th style="width: 12%">NIK</th>
                                            <th style="width: 8%">TGL LAHIR</th>
                                            <th style="width: 8%">TGL MASUK</th>
                                            <th style="width: 15%">ALAMAT</th>
                                            <th class="text-center" style="width: 6%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                        @if(count($this->filteredPatients) > 0)
                                        @foreach($this->filteredPatients as $index => $patient)
                                        <tr wire:click="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_pasien }}')"
                                            style="cursor: pointer;" class="hover-effect-row">
                                            <td class="text-center">{{ ($this->filteredPatients->currentPage() - 1) *
                                                $this->perPage + $index + 1 }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->no_rm }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient->data_pasien->nama_pasien }}">{{
                                                $patient->data_pasien->nama_pasien }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->nik_pasien }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->tanggal_lahir_pasien }}
                                            </td>
                                            <td class="text-nowrap">{{ $patient->created_at }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient->data_pasien->alamat_pasien }}">{{
                                                $patient->data_pasien->alamat_pasien }}</td>
                                            <td class="text-center p-1">
                                                <button
                                                    wire:click.stop="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_pasien }}')"
                                                    class="btn btn-primary btn-sm p-0 px-1" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="9" class="text-center py-3">Tidak ada data pasien yang
                                                ditemukan</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="small text-muted">
                                    Menampilkan {{ $this->filteredPatients->firstItem() ?? 0 }} hingga {{
                                    $this->filteredPatients->lastItem() ?? 0 }} dari {{ $this->filteredPatients->total()
                                    ?? 0 }} data
                                </div>
                                <div>
                                    {{ $this->filteredPatients->links() }}
                                </div>
                            </div>
                        </div>
                        @else
                        <div>
                            <div class="d-flex align-items-center mb-4">
                                <button wire:click="backToList" class="btn btn-outline-primary me-3">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </button>
                                <div>
                                    <span class="fw-bold">Pasien:</span>
                                    <span class="ms-2">{{ $selectedPatientName }} (No Pendaftaran: {{ $selectedPatient
                                        }})</span>
                                </div>
                            </div>

                            @if($patientIsRegistered || $patientIsExamined)
                            <div class="container stepper-container p-4">
                                <div class="stepper" id="stepper">
                                    <div class="step" wire:click="goToStep(1)" style="cursor: pointer;">
                                        <div class="step-circle {{ $activeStep >= 1 ? 'active' : '' }}" data-step="1">1</div>
                                        <div class="step-title">Pendaftaran</div>
                                    </div>
                                    <div class="step-connector {{ $activeStep >= 2 ? 'active' : '' }}" data-connector="1-2"></div>
                                    <div class="step" wire:click="goToStep(2)" style="cursor: pointer;">
                                        <div class="step-circle {{ $activeStep >= 2 ? 'active' : '' }}" data-step="2">2</div>
                                        <div class="step-title">Pemeriksaan</div>
                                    </div>
                                    <div class="step-connector {{ $activeStep >= 3 ? 'active' : '' }}" data-connector="2-3"></div>
                                    <div class="step" wire:click="goToStep(3)" style="cursor: pointer;">
                                        <div class="step-circle {{ $activeStep >= 3 ? 'active' : '' }}" data-step="3">3</div>
                                        <div class="step-title">Layanan</div>
                                    </div>
                                </div>

                                <!-- Step content -->
                                <div class="step-content-container">
                                    @if(!$patientIsRegistered)
                                    <div class="step-content active">
                                        @livewire('rawat-inap.pendaftaran.index', ['pendaftaranId' => $selectedPatient],
                                        key('pendaftaran-'.$selectedPatient))
                                    </div>
                                    @else
                                    <div class="step-content {{ $activeStep === 1 ? 'active' : '' }}" data-step-content="1">
                                        @livewire('rawat-inap.pendaftaran.index',
                                        ['pendaftaranId' => $selectedPatient],
                                        key('pendaftaran-'.$selectedPatient)
                                        )
                                    </div>
                                    <div class="step-content {{ $activeStep === 2 ? 'active' : '' }}" data-step-content="2">
                                        @livewire('rawat-inap.pemeriksaan.index',
                                        ['pendaftaranId' => $selectedPatient],
                                        key('pemeriksaan-'.$selectedPatient)
                                        )
                                    </div>
                                    <div class="step-content {{ $activeStep === 3 ? 'active' : '' }}" data-step-content="3">
                                        @livewire('rawat-inap.layanan.index',
                                        ['pendaftaranId' => $selectedPatient],
                                        key('layanan-'.$selectedPatient)
                                        )
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="step-content active">
                                @livewire('rawat-inap.pendaftaran.index', ['pendaftaranId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient))
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
