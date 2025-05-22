<?php
use Livewire\Volt\Component;
new class extends Component {
    public $pendaftaranId;
    public $activeTab = 'cppt';
    public $loadedTabs = ['cppt'];

    public $tabs = [
        'cppt' => 'CPPT',
        'asuhan' => 'Asuhan Keperawatan',
        'layanan' => 'Layanan',
        'resume' => 'Resume Medis'
    ];

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
    }

    public function changeTab($tab)
    {
        $this->activeTab = $tab;

        if (!in_array($tab, $this->loadedTabs)) {
            $this->loadedTabs[] = $tab;
        }
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
                        class="nav-link rounded-0 {{ $activeTab === $tabId ? 'bg-white text-primary fw-bold' : 'bg-primary text-white' }}"
                        wire:click="changeTab('{{ $tabId }}')"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="changeTab('{{ $tabId }}')">
                            {{ $tabName }}
                        </span>
                    </button>
                </li>
                @endforeach
            </ul>

            <!-- Tab Content Area -->
            <div class="p-4">
                <!-- Loading indicator for tab content -->
                <div wire:loading wire:target="changeTab" class="text-center p-4">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- CPPT Tab -->
                <div class="{{ $activeTab !== 'cppt' ? 'd-none' : '' }}" id="cppt">
                    @if(in_array('cppt', $loadedTabs))
                        @livewire('rawat-inap.layanan.cppt', ['pendaftaranId' => $pendaftaranId], key('cppt-'.$pendaftaranId))
                    @endif
                </div>

                <!-- Asuhan Keperawatan Tab - Only load when needed -->
                <div class="{{ $activeTab !== 'asuhan' ? 'd-none' : '' }}" id="asuhan">
                    @if(in_array('asuhan', $loadedTabs))
                        <div wire:loading.remove wire:target="changeTab">
                            @livewire('rawat-inap.layanan.asuhan-keperawatan', ['pendaftaranId' => $pendaftaranId], key('asuhan-'.$pendaftaranId))
                        </div>
                    @endif
                </div>

                <!-- Layanan Tab -->
                <div class="{{ $activeTab !== 'layanan' ? 'd-none' : '' }}" id="layanan">
                    @if(in_array('layanan', $loadedTabs))
                        @livewire('rawat-inap.layanan.layanan', ['pendaftaranId' => $pendaftaranId], key('layanan-'.$pendaftaranId))
                    @endif
                </div>

                <!-- Resume Medis Tab -->
                <div class="{{ $activeTab !== 'resume' ? 'd-none' : '' }}" id="resume">
                    @if(in_array('resume', $loadedTabs))
                        @livewire('rawat-inap.layanan.resume-medis', ['pendaftaranId' => $pendaftaranId], key('resume-medis-'.$pendaftaranId))
                    @endif
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
