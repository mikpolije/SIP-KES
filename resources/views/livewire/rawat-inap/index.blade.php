<?php

use App\Models\Pendaftaran;
use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $activeTab = 'pendaftaran';
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

        $this->patientIsRegistered = (bool)(isset($patient->poli_rawat_inap) ?? 0);
        $this->patientIsExamined = (bool)((isset($patient->poli_rawat_inap->id_asessmen_awal) && isset($patient->poli_rawat_inap->id_informed_consent)) ?? 0);

        if (!$this->patientIsRegistered) {
            $this->activeTab = 'pendaftaran';
        } elseif (!$this->patientIsExamined) {
            $this->activeTab = 'pemeriksaan';
        } else {
            $this->activeTab = 'layanan';
        }

        $this->dispatch('patient-selected', pendaftaranId: $id);
    }

    public function backToList()
    {
        $this->reset('selectedPatient', 'selectedPatientName', 'showPatientDetails');
    }

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
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
        return Pendaftaran::where('layanan', 'Rawat Inap')
            ->when($this->search, function ($query) {
                $query->whereHas('data_pasien', function ($subquery) {
                    $subquery->where('nama_lengkap', 'like', '%' . $this->search . '%')
                            ->orWhere('no_rm', 'like', '%' . $this->search . '%')
                            ->orWhere('nik', 'like', '%' . $this->search . '%');
                })
                ->orWhere('id_pendaftaran', 'like', '%' . $this->search . '%');
            })
            ->with('data_pasien')
            ->paginate($this->perPage);
    }

    #[On('switch-tab')]
    public function handleTabSwitch($tab)
    {
        $validTabs = ['pendaftaran', 'pemeriksaan', 'layanan'];

        if (in_array($tab, $validTabs)) {
            $this->activeTab = $tab;

            if ($this->selectedPatient) {
                $this->dispatch('patient-selected', pendaftaranId: $this->selectedPatient);
            }
        }
    }

    #[On('patient-registered')]
    public function handlePatientRegistered($pendaftaranId)
    {
        $register = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        if(isset($register->poli_rawat_inap)) {
            $this->patientIsRegistered = true;
        }
    }


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
                                    <select wire:model.live="perPage" class="form-select form-select-sm me-2" style="width: 80px;">
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
                                            <th style="width: 15%">KET</th>
                                            <th class="text-center" style="width: 6%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                        @if(count($this->filteredPatients) > 0)
                                            @foreach($this->filteredPatients as $index => $patient)
                                                <tr wire:click="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_lengkap }}')"
                                                    style="cursor: pointer;"
                                                    class="hover-effect-row">
                                                    <td class="text-center">{{ ($this->filteredPatients->currentPage() - 1) * $this->perPage + $index + 1 }}</td>
                                                    <td class="text-nowrap">{{ $patient->data_pasien->no_rm }}</td>
                                                    <td class="text-truncate" data-bs-toggle="tooltip"
                                                        title="{{ $patient->data_pasien->nama_lengkap }}">{{ $patient->data_pasien->nama_lengkap }}</td>
                                                    <td class="text-nowrap">{{ $patient->data_pasien->nik }}</td>
                                                    <td class="text-nowrap">{{ $patient->data_pasien->tanggal_lahir }}</td>
                                                    <td class="text-nowrap">{{ $patient->created_at }}</td>
                                                    <td class="text-truncate" data-bs-toggle="tooltip"
                                                        title="{{ $patient->data_pasien->alamat_lengkap }}">{{ $patient->data_pasien->alamat_lengkap }}</td>
                                                    <td class="text-truncate" data-bs-toggle="tooltip"
                                                        title="{{ $patient->note ?? '' }}">Rujuk {{ $patient->layanan }}</td>
                                                    <td class="text-center p-1">
                                                        <button
                                                            wire:click.stop="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_lengkap }}')"
                                                            class="btn btn-primary btn-sm p-0 px-1" title="Detail">
                                                            <i class="ti ti-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center py-3">Tidak ada data pasien yang ditemukan</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="small text-muted">
                                    Menampilkan {{ $this->filteredPatients->firstItem() ?? 0 }} hingga {{ $this->filteredPatients->lastItem() ?? 0 }} dari {{ $this->filteredPatients->total() ?? 0 }} data
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
                                    <span class="ms-2">{{ $selectedPatientName }} (No Pendaftaran: {{ $selectedPatient }})</span>
                                </div>
                            </div>

                            @if($patientIsRegistered)
                            <ul class="nav nav-tabs mb-4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button wire:click="changeTab('pendaftaran')"
                                        class="nav-link {{ $activeTab === 'pendaftaran' ? 'active' : '' }}"
                                        type="button">
                                        {{-- <i class="bi bi-file--check"></i> --}}
                                        Pendaftaran
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button wire:click="changeTab('pemeriksaan')"
                                        class="nav-link {{ $activeTab === 'pemeriksaan' ? 'active' : '' }}"
                                        type="button">
                                        Pemeriksaan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button wire:click="changeTab('layanan')"
                                        class="nav-link {{ $activeTab === 'layanan' ? 'active' : '' }}" type="button">
                                        Layanan
                                    </button>
                                </li>
                            </ul>
                            <hr>
                            @endif

                            <!-- Tab content -->
                            <div>
                                @if(!$patientIsRegistered)
                                @livewire('rawat-inap.pendaftaran.index', ['pendaftaranId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient))
                                @else
                                @switch($activeTab)
                                @case('pendaftaran')
                                @livewire('rawat-inap.pendaftaran.index',
                                ['pendaftaranId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient)
                                )
                                @break
                                @case('pemeriksaan')
                                @livewire('rawat-inap.pemeriksaan.index',
                                ['pendaftaranId' => $selectedPatient],
                                key('pemeriksaan-'.$selectedPatient)
                                )
                                @break
                                @case('layanan')
                                @livewire('rawat-inap.layanan.index',
                                ['pendaftaranId' => $selectedPatient],
                                key('layanan-'.$selectedPatient)
                                )
                                @break
                                @endswitch
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
