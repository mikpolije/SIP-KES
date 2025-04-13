<?php
use function Livewire\Volt\{state};

state(['activeTab' => 'pendaftaran']);

$setActiveTab = function (string $tabName) {
    $this->activeTab = $tabName;
};
?>

<div x-data="{ activeTab: 'pendaftaran' }">
    <div class="h-screen overflow-auto py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl md:max-w-2xl lg:max-w-4xl mx-auto">
            <div class="relative px-4 py-8 bg-white shadow-md rounded-lg sm:p-10">
                <div class="max-w-md mx-auto md:max-w-xl lg:max-w-3xl">
                    <div>
                        <h1 class="title" id="page-title">Rawat Inap</h1>
                        <div class="border-b border-gray-200 mb-6">
                            <div class="flex space-x-1">
                                <button @click="activeTab = 'pendaftaran'" class="px-4 py-2 relative"
                                    :class="activeTab === 'pendaftaran' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700'">
                                    Pendaftaran
                                    <div x-show="activeTab === 'pendaftaran'"
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                </button>
                                <button @click="activeTab = 'pemeriksaan'" class="px-4 py-2 relative"
                                    :class="activeTab === 'pemeriksaan' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700'">
                                    Pemeriksaan
                                    <div x-show="activeTab === 'pemeriksaan'"
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                </button>
                                <button @click="activeTab = 'layanan'" class="px-4 py-2 relative"
                                    :class="activeTab === 'layanan' ? 'text-primary-600 font-medium' : 'text-gray-500 hover:text-gray-700'">
                                    Layanan
                                    <div x-show="activeTab === 'layanan'"
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600"></div>
                                </button>
                            </div>
                        </div>
                        <div class="py-4">
                            <!-- Pendaftaran Tab -->
                            <div x-show="activeTab === 'pendaftaran'">
                                @livewire('rawat-inap.pendaftaran.main')
                            </div>
                            <!-- Pemeriksaan Tab -->
                            <div x-show="activeTab === 'pemeriksaan'">
                                @livewire('rawat-inap.pemeriksaan.main')
                            </div>
                            <!-- Layanan Tab -->
                            <div x-show="activeTab === 'layanan'">
                                @livewire('rawat-inap.layanan.main')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
