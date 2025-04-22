<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new
#[Title('Rawat Inap')]
class extends Component {
    public $activeTab = 'pendaftaran';
    public $showPatientDetails = false;
    public $selectedPatient = null;
    public $selectedPatientName = null;
    public $patientIsRegistered = false;
    public $patientIsExamined = false;
    public $search = '';

    public $patients = [
        [
            'id' => '002001',
            'name' => 'Aditya Attadewa',
            'nik' => '3350168808650001',
            'birth_date' => '12-09-1999',
            'admission_date' => '27-02-2025',
            'address' => 'SUMBERSARI',
            'room' => '',
            'note' => 'RUJUK INTERNAL IGD',
            'is_registered' => 0,
            'is_examined' => 0
        ],
        [
            'id' => '17171717',
            'name' => 'Raihan Sigma',
            'nik' => '3350168808651717',
            'birth_date' => '12-09-2002',
            'admission_date' => '27-02-2017',
            'address' => 'SUMBERSARI',
            'room' => '',
            'note' => 'RUJUK INTERNAL IGD',
            'is_registered' => 1,
            'is_examined' => 1
        ],
    ];

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

    // buat filter pasien
    // nama sama id aje
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
        // ini ganti sesuai tab ea
        // kali ini, seperti yang didesign kan ada 3 buat "klik"-annya
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

    // buat cek pasien ini pake tabs tidak
    // cek di selectPatient()
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
                                            <th style="width: 8%">RUANGAN</th>
                                            <th style="width: 15%">KET</th>
                                            <th class="text-center" style="width: 6%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                        @foreach($this->filteredPatients as $index => $patient)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-nowrap">{{ $patient['id'] }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient['name'] }}">{{ $patient['name'] }}</td>
                                            <td class="text-nowrap">{{ $patient['nik'] }}</td>
                                            <td class="text-nowrap">{{ $patient['birth_date'] }}</td>
                                            <td class="text-nowrap">{{ $patient['admission_date'] }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient['address'] }}">{{ $patient['address'] }}</td>
                                            <td>{{ $patient['room'] }}</td>
                                            <td class="text-truncate" data-bs-toggle="tooltip"
                                                title="{{ $patient['note'] }}">{{ $patient['note'] }}</td>
                                            <td class="text-center p-1">
                                                <button
                                                    wire:click="selectPatient('{{ $patient['id'] }}', '{{ $patient['name'] }}')"
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
