<div x-data="{
    activeTab: 'pendaftaran',
    showPatientDetails: false,
    selectedPatient: null,
    selectedPatientName: null,

    selectPatient(id, name) {
        this.selectedPatient = id;
        this.selectedPatientName = name;
        this.showPatientDetails = true;
    },

    backToList() {
        this.showPatientDetails = false;
        this.selectedPatient = null;
        this.selectedPatientName = null;
    }
}">
    <div class="h-screen overflow-auto py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl md:max-w-2xl lg:max-w-4xl mx-auto">
            <div class="relative px-4 py-8 bg-white shadow-md rounded-lg sm:p-10">
                <div class="max-w-md mx-auto md:max-w-xl lg:max-w-3xl">
                    <div>
                        <h1 class="title mb-4 h3">Rawat Inap</h1>

                        <div x-show="!showPatientDetails" class="mb-4">
                            <div class="d-flex justify-content-end align-items-center mb-3">
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari pasien...">
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
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>002001</td>
                                            <td>Aditya Attadewa</td>
                                            <td>3350168808650001</td>
                                            <td>12-09-1999</td>
                                            <td>27-02-2025</td>
                                            <td>SUMBERSARI</td>
                                            <td></td>
                                            <td>RUJUK INTERNAL IGD</td>
                                            <td class="text-center">
                                                <button @click="selectPatient('002001', 'Aditya Attadewa')"
                                                    class="btn btn-primary btn-sm py-0">Detail</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>002031</td>
                                            <td>Aditya Fadrisky</td>
                                            <td>3579680742680003</td>
                                            <td>04-10-1997</td>
                                            <td>02-03-2025</td>
                                            <td>PUGER</td>
                                            <td></td>
                                            <td>RUJUK INTERNAL RJ</td>
                                            <td class="text-center">
                                                <button @click="selectPatient('002031', 'Aditya Fadrisky')"
                                                    class="btn btn-primary btn-sm py-0">Detail</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>002047</td>
                                            <td>Aditya Hailudra</td>
                                            <td>3790681478750008</td>
                                            <td>29-01-2000</td>
                                            <td>02-03-2025</td>
                                            <td>AJUNG</td>
                                            <td>DAHLIA</td>
                                            <td>RUJUK INTERNAL IGD</td>
                                            <td class="text-center">
                                                <button @click="selectPatient('002047', 'Aditya Hailudra')"
                                                    class="btn btn-primary btn-sm py-0">Detail</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div x-show="showPatientDetails">
                            <div class="d-flex align-items-center mb-4">
                                <button @click="backToList" class="btn btn-outline-primary me-3">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </button>
                                <div>
                                    <span class="fw-bold">Pasien:</span>
                                    <span class="ms-2"
                                        x-text="selectedPatientName + ' (' + selectedPatient + ')'"></span>
                                </div>
                            </div>

                            <!-- Tabs -->
                            <ul class="nav nav-tabs mb-4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button @click="activeTab = 'pendaftaran'"
                                        :class="activeTab === 'pendaftaran' ? 'nav-link active' : 'nav-link'"
                                        id="pendaftaran-tab" type="button" role="tab" aria-controls="pendaftaran"
                                        aria-selected="activeTab === 'pendaftaran'">
                                        Pendaftaran
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button @click="activeTab = 'pemeriksaan'"
                                        :class="activeTab === 'pemeriksaan' ? 'nav-link active' : 'nav-link'"
                                        id="pemeriksaan-tab" type="button" role="tab" aria-controls="pemeriksaan"
                                        aria-selected="activeTab === 'pemeriksaan'">
                                        Pemeriksaan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button @click="activeTab = 'layanan'"
                                        :class="activeTab === 'layanan' ? 'nav-link active' : 'nav-link'"
                                        id="layanan-tab" type="button" role="tab" aria-controls="layanan"
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
                                    id="pendaftaran" role="tabpanel" aria-labelledby="pendaftaran-tab">
                                    <div x-data="{}" x-init="
                                        $nextTick(() => {
                                            Livewire.dispatch('patient-selected', { patientId: $parent.selectedPatient })
                                        })
                                    ">
                                        @livewire('rawat-inap.pendaftaran.main')
                                    </div>
                                </div>

                                <!-- Pemeriksaan Tab -->
                                <div x-show="activeTab === 'pemeriksaan'"
                                    :class="activeTab === 'pemeriksaan' ? 'tab-pane fade show active' : 'tab-pane fade'"
                                    id="pemeriksaan" role="tabpanel" aria-labelledby="pemeriksaan-tab">
                                    <div x-data="{}" x-init="
                                        $nextTick(() => {
                                            Livewire.dispatch('patient-selected', { patientId: $parent.selectedPatient })
                                        })
                                    ">
                                        @livewire('rawat-inap.pemeriksaan.main')
                                    </div>
                                </div>

                                <!-- Layanan Tab -->
                                <div x-show="activeTab === 'layanan'"
                                    :class="activeTab === 'layanan' ? 'tab-pane fade show active' : 'tab-pane fade'"
                                    id="layanan" role="tabpanel" aria-labelledby="layanan-tab">
                                    <div x-data="{}" x-init="
                                        $nextTick(() => {
                                            Livewire.dispatch('patient-selected', { patientId: $parent.selectedPatient })
                                        })
                                    ">
                                        @livewire('rawat-inap.layanan.main')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
