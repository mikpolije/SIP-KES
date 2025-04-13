<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    public $activeTab = 'pendaftaran';
    public $showPatientDetails = false;
    public $selectedPatient = null;
    public $selectedPatientName = null;
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
            'note' => 'RUJUK INTERNAL IGD'
        ],
        [
            'id' => '17171717',
            'name' => 'Raihan Sigma',
            'nik' => '3350168808651717',
            'birth_date' => '12-09-2002',
            'admission_date' => '27-02-2017',
            'address' => 'SUMBERSARI',
            'room' => '',
            'note' => 'RUJUK INTERNAL IGD'
        ],
    ];

    public function selectPatient($id, $name)
    {
        $this->selectedPatient = $id;
        $this->selectedPatientName = $name;
        $this->showPatientDetails = true;
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
}; ?>

<div class="h-screen overflow-auto py-6 flex flex-col justify-center sm:py-12">
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
                            <table class="table table-sm table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>RM</th>
                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>TGL LAHIR</th>
                                        <th>TGL MASUK</th>
                                        <th>ALAMAT</th>
                                        <th>RUANGAN</th>
                                        <th>KET</th>
                                        <th class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="small">
                                    @foreach($this->filteredPatients as $index => $patient)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $patient['id'] }}</td>
                                        <td>{{ $patient['name'] }}</td>
                                        <td>{{ $patient['nik'] }}</td>
                                        <td>{{ $patient['birth_date'] }}</td>
                                        <td>{{ $patient['admission_date'] }}</td>
                                        <td>{{ $patient['address'] }}</td>
                                        <td>{{ $patient['room'] }}</td>
                                        <td>{{ $patient['note'] }}</td>
                                        <td class="text-center">
                                            <button
                                                wire:click="selectPatient('{{ $patient['id'] }}', '{{ $patient['name'] }}')"
                                                class="btn btn-primary btn-sm py-0">Detail</button>
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

                        <!-- tabs navigation -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button wire:click="changeTab('pendaftaran')"
                                    class="nav-link {{ $activeTab === 'pendaftaran' ? 'active' : '' }}" type="button">
                                    Pendaftaran
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button wire:click="changeTab('pemeriksaan')"
                                    class="nav-link {{ $activeTab === 'pemeriksaan' ? 'active' : '' }}" type="button">
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

                        <!-- tabs content
                        ini pake key biar bisa aja di livewire,
                        maybe theres another solution, idk and id-really-c
                        -->
                        <div>
                            <!-- pendaftaran tab -->
                            <div x-show="$wire.activeTab === 'pendaftaran'" x-transition>
                                @livewire('rawat-inap.pendaftaran.main', ['patientId' => $selectedPatient],
                                key('pendaftaran-'.$selectedPatient))
                            </div>

                            <!-- pemeriksaan tab -->
                            <div x-show="$wire.activeTab === 'pemeriksaan'" x-transition>
                                @livewire('rawat-inap.pemeriksaan.main', ['patientId' => $selectedPatient],
                                key('pemeriksaan-'.$selectedPatient))
                            </div>

                            <!-- layanan tab -->
                            <div x-show="$wire.activeTab === 'layanan'" x-transition>
                                @livewire('rawat-inap.layanan.main', ['patientId' => $selectedPatient],
                                key('layanan-'.$selectedPatient))
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
