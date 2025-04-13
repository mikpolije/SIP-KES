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
                        <h1 class="mb-4 h3">Rawat Inap</h1>

                        <!-- Bootstrap 5 Nav Tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button @click="activeTab = 'pendaftaran'"
                                    :class="activeTab === 'pendaftaran' ? 'nav-link active' : 'nav-link'"
                                    id="pendaftaran-tab"
                                    type="button"
                                    role="tab"
                                    aria-controls="pendaftaran"
                                    aria-selected="activeTab === 'pendaftaran'">
                                    Pendaftaran
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button @click="activeTab = 'pemeriksaan'"
                                    :class="activeTab === 'pemeriksaan' ? 'nav-link active' : 'nav-link'"
                                    id="pemeriksaan-tab"
                                    type="button"
                                    role="tab"
                                    aria-controls="pemeriksaan"
                                    aria-selected="activeTab === 'pemeriksaan'">
                                    Pemeriksaan
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button @click="activeTab = 'layanan'"
                                    :class="activeTab === 'layanan' ? 'nav-link active' : 'nav-link'"
                                    id="layanan-tab"
                                    type="button"
                                    role="tab"
                                    aria-controls="layanan"
                                    aria-selected="activeTab === 'layanan'">
                                    Layanan
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content py-3">
                            <!-- Pendaftaran Tab -->
                            <div x-show="activeTab === 'pendaftaran'"
                                 :class="activeTab === 'pendaftaran' ? 'tab-pane fade show active' : 'tab-pane fade'"
                                 id="pendaftaran"
                                 role="tabpanel"
                                 aria-labelledby="pendaftaran-tab">
                                @livewire('rawat-inap.pendaftaran.main')
                            </div>

                            <!-- Pemeriksaan Tab -->
                            <div x-show="activeTab === 'pemeriksaan'"
                                 :class="activeTab === 'pemeriksaan' ? 'tab-pane fade show active' : 'tab-pane fade'"
                                 id="pemeriksaan"
                                 role="tabpanel"
                                 aria-labelledby="pemeriksaan-tab">
                                @livewire('rawat-inap.pemeriksaan.main')
                            </div>

                            <!-- Layanan Tab -->
                            <div x-show="activeTab === 'layanan'"
                                 :class="activeTab === 'layanan' ? 'tab-pane fade show active' : 'tab-pane fade'"
                                 id="layanan"
                                 role="tabpanel"
                                 aria-labelledby="layanan-tab">
                                @livewire('rawat-inap.layanan.main')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
