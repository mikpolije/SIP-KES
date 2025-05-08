<?php
use Livewire\Volt\Component;

new class extends Component {
    public $patientId;
    public $activeTab = 'cppt'; // Default active tab

    // Available tabs
    public $tabs = [
        'cppt' => 'CPPT',
        'asuhan' => 'Asuhan Keperawatan',
        'layanan' => 'Layanan',
        'resume' => 'Resume Medis'
    ];

    public function mount($patientId = null) {
        $this->patientId = $patientId;
    }

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function submit()
    {
        session()->flash('message', 'Form submitted successfully!');
    }
};
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-body p-0">
            <!-- Tab Navigation -->
            <ul class="nav nav-pills nav-fill bg-primary bg-opacity-25 rounded-top">
                @foreach($tabs as $tabId => $tabName)
                <li class="nav-item">
                    <button
                        class="nav-link rounded-0 {{ $activeTab === $tabId ? 'bg-white text-primary fw-bold' : 'bg-primary text-dark' }}"
                        wire:click="changeTab('{{ $tabId }}')">
                        {{ $tabName }}
                    </button>
                </li>
                @endforeach
            </ul>

            <!-- Tab Content Area -->
            <div class="p-4">
                <!-- CPPT Tab -->
                <div class="{{ $activeTab !== 'cppt' ? 'd-none' : '' }}" id="cppt">
                    @livewire('rawat-inap.layanan.cppt', ['patientId' => $patientId], key('cppt-'.$patientId))
                </div>

                <!-- Asuhan Keperawatan Tab -->
                <div class="{{ $activeTab !== 'asuhan' ? 'd-none' : '' }}" id="asuhan">
                    @livewire('rawat-inap.layanan.asuhan-keperawatan', ['patientId' => $patientId],
                    key('asuhan-'.$patientId))
                </div>

                <!-- Layanan Tab -->
                <div class="{{ $activeTab !== 'layanan' ? 'd-none' : '' }}" id="layanan">
                    @livewire('rawat-inap.layanan.layanan', ['patientId' => $patientId], key('layanan-'.$patientId))
                </div>

                <!-- Resume Medis Tab -->
                <div class="{{ $activeTab !== 'resume' ? 'd-none' : '' }}" id="resume">
                    @livewire('rawat-inap.layanan.resume-medis', ['patientId' => $patientId],
                    key('resume-medis-'.$patientId))
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>
