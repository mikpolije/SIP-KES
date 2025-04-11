<?php
use function Livewire\Volt\{state};

state(['activeTab' => 'pendaftaran']);

$setActiveTab = function (string $tabName) {
    $this->activeTab = $tabName;
};
?>

<div>
    <div class="h-screen overflow-auto py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl md:max-w-2xl lg:max-w-4xl mx-auto">
            <div class="relative px-4 py-8 bg-white shadow-md rounded-lg sm:p-10">
                <div class="max-w-md mx-auto md:max-w-xl lg:max-w-3xl">
                    <div>
                        <h1 class="title" id="page-title">Layanan</h1>

                        <div class="border-b border-gray-200 mb-6">
                            <div class="flex space-x-1">
                                <button wire:click="setActiveTab('pendaftaran')"
                                    class="px-4 py-2 relative {{ $activeTab === 'pendaftaran' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                                    Pendaftaran
                                    @if ($activeTab === 'pendaftaran')
                                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                    @endif
                                </button>
                                <button wire:click="setActiveTab('pemeriksaan')"
                                    class="px-4 py-2 relative {{ $activeTab === 'pemeriksaan' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                                    Pemeriksaan
                                    @if ($activeTab === 'pemeriksaan')
                                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                    @endif
                                </button>
                                <button wire:click="setActiveTab('layanan')"
                                    class="px-4 py-2 relative {{ $activeTab === 'layanan' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                                    Layanan
                                    @if ($activeTab === 'layanan')
                                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                    @endif
                                </button>
                            </div>
                        </div>

                        <div class="py-4">
                            <!-- Pendaftaran Tab -->
                            @if ($activeTab === 'pendaftaran')
                            <div>
                            page pendaftaran (perlu stepper)
                            </div>
                            @endif

                            <!-- Pemeriksaan Tab -->
                            @if ($activeTab === 'pemeriksaan')
                            <div>
                            page pemeriksaan (stepper juga)
                            </div>
                            @endif

                            <!-- Layanan Tab -->
                            @if ($activeTab === 'layanan')
                            <div>
                            page layanan (stepper lagi)
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
