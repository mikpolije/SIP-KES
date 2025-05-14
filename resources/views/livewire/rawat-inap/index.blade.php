<?php

use App\Models\Pendaftaran;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    public $activeTab = 'pendaftaran';
    public $showPatientDetails = false;
    public $selectedPatient = null;
    public $selectedPatientName = null;
    public $patientIsRegistered = false;
    public $patientIsExamined = false;
    public $search = '';

    public $patients;

    public function mount() {
        $this->patients = Pendaftaran::where('layanan', 'Rawat Inap')->get();
    }

    public function selectPatient($id, $name)
    {
        $this->selectedPatient = $id;
        $this->selectedPatientName = $name;
        $this->showPatientDetails = true;

        $patient = collect($this->patients)->firstWhere('id', $id);
        $this->patientIsRegistered = (bool)($patient['is_registered'] ?? 0);
        $this->patientIsExamined = (bool)($patient['is_examined'] ?? 0);

        if (!$this->patientIsRegistered) {
            $this->activeTab = 'pendaftaran';
        } elseif (!$this->patientIsExamined) {
            $this->activeTab = 'pemeriksaan';
        } else {
            $this->activeTab = 'layanan';
        }

        $this->dispatch('patient-selected', patientId: $id);
    }

    public function backToList()
    {
        $this->reset('selectedPatient', 'selectedPatientName', 'showPatientDetails');
    }

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
        if ($this->selectedPatient) {
            $this->dispatch('patient-selected', patientId: $this->selectedPatient);
        }
    }

    public function getFilteredPatientsProperty()
    {
        return collect($this->patients)
            ->when($this->search, function ($collection) {
                return $collection->filter(function ($patient) {
                    return str_contains(strtolower($patient['name']), strtolower($this->search)) ||
                           str_contains(strtolower($patient['id']), strtolower($this->search));
                });
            })
            ->all();
    }

    #[On('switch-tab')]
    public function handleTabSwitch($tab)
    {
        $validTabs = ['pendaftaran', 'pemeriksaan', 'layanan'];

        if (in_array($tab, $validTabs)) {
            $this->activeTab = $tab;

            if ($this->selectedPatient) {
                $this->dispatch('patient-selected', patientId: $this->selectedPatient);
            }
        }
    }

    #[On('patient-registered')]
    public function handlePatientRegistered($patientId)
    {
        $this->patients = collect($this->patients)->map(function ($patient) use ($patientId) {
            if ($patient['id'] == $patientId) {
                $patient['is_registered'] = 1;
            }
            return $patient;
        })->all();

        $this->patientIsRegistered = true;
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
                            <div class="d-flex justify-content-end align-items-center mb-3">
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
                                        @foreach($this->filteredPatients as $index => $patient)
                                        <tr wire:click="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_lengkap }}')"
                                            style="cursor: pointer;"
                                            class="hover-effect-row">
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->no_rm }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient->data_pasien->nama }}">{{ $patient->data_pasien->nama_lengkap }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->nik }}</td>
                                            <td class="text-nowrap">{{ $patient->data_pasien->tanggal_lahir }}</td>
                                            <td class="text-nowrap">{{ $patient->created_at }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient->data_pasien->alamat_lengkap }}">{{ $patient->data_pasien->alamat_lengkap }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient['note'] }}">Rujuk {{ $patient->data_pasien->alamat_lengkap }}</td>
                                            <td class="text-center p-1">
                                                <button
                                                    wire:click.stop="selectPatient('{{ $patient->id_pendaftaran }}', '{{ $patient->data_pasien->nama_lengkap }}')"
                                                    class="btn btn-primary btn-sm p-0 px-1" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                    <span class="ms-2">{{ $selectedPatientName }} ({{ $selectedPatient }})</span>
                                </div>
                            </div>

                            @if($patientIsRegistered)
                            <ul class="nav nav-tabs mb-4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button wire:click="changeTab('pendaftaran')"
                                        class="nav-link {{ $activeTab === 'pendaftaran' ? 'active' : '' }}"
                                        type="button">
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
                                @livewire('rawat-inap.pendaftaran.index', ['patientId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient))
                                @else
                                @switch($activeTab)
                                @case('pendaftaran')
                                @livewire('rawat-inap.pendaftaran.index',
                                ['patientId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient)
                                )
                                @break
                                @case('pemeriksaan')
                                @livewire('rawat-inap.pemeriksaan.index',
                                ['patientId' => $selectedPatient],
                                key('pemeriksaan-'.$selectedPatient)
                                )
                                @break
                                @case('layanan')
                                @livewire('rawat-inap.layanan.index',
                                ['patientId' => $selectedPatient],
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
