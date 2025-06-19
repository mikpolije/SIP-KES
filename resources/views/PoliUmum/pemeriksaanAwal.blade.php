@extends('layouts.master')

@section('title', 'SIP-Kes | Pendaftaran')
<style>
    body {
        background-color: #B4AEAE;
    }
</style>

<style>
    /* CSS untuk kelas danger */
    .danger {
        color: red;
    }
</style>

<style>
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #17a2b8;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: none;
        animation: slideIn 0.5s ease-out;
    }

    /* Animasi slide-in */
    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(0);
        }
    }
</style>

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 id="wizard-title" class="wizard-title">Pendaftaran</h1>
                <style>
                    .wizard-title {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 3rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        margin-bottom: 20px;
                    }
                </style>
                <form action="{{ route('poliumum.pemeriksaanAwal.store', $data_pendaftaran->id_pendaftaran) }}" method="POST" class="validation-wizard wizard-circle mt-5">
                    @csrf
                    <!-- Step 1 -->
                    <h6>Pendaftaran</h6>
                    <section>
                    </section>

                    <!-- Step 2 -->
                    <h6>Pemeriksaan Awal</h6>
                    <section>
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="ti ti-circle-check fs-5"></i>
                                <div class="ms-3">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger d-flex align-items-start" role="alert">
                                <i class="ti ti-alert-circle fs-5 me-2"></i>
                                <div>
                                    <strong>Terjadi kesalahan!</strong>
                                    <ul class="mb-0 mt-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <h4 class="section-title">Data Pemeriksaan Awal</h4>

                        <!-- Card 1: Data Pendaftaran -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="noantrian">No. Antrian</label>
                                            <input type="text" class="form-control required" id="noantrian"
                                                name="noantrian" />
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="norm">No. RM</label>
                                            <input type="text" class="form-control required" id="norm" value="{{ $data_pendaftaran->no_rm }}"
                                                name="no_rm" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" class="form-control required" id="nama"
                                                name="nama_pasien" value="{{ $data_pendaftaran->data_pasien->nama_pasien }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="tanggalperiksa">Tanggal Pemeriksaan</label>
                                            <input type="date" class="form-control required" id="tanggalperiksa"
                                                name="tanggal_periksa_pasien" value="{{ $data_pendaftaran->created_at->format('Y-m-d') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="kunjungansakit">Kunjungan Sakit</label>
                                            <select class="form-select required" id="kunjungansakit" name="kunjungan_sakit">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Card 2: Subjective section -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Subjek/Keluhan</label>
                                        <div class="mb-3">
                                            <textarea id="subjektif" name="subjektif" rows="12" class="form-control required"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Objective section -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Objective</label>
                                        <div class="row">
                                            <!-- Left Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sistole</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control required number-input"
                                                            id="sistole-mask" name="sistole" pattern="[0-9]*"
                                                            inputmode="numeric">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Berat Badan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control required decimal-input"
                                                            id="berat-mask" name="bb_pasien" pattern="[0-9.,]*"
                                                            inputmode="decimal">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                    <div class="invalid-feedback">Berat badan harus diisi</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Suhu</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required decimal-input"
                                                            id="suhu-mask" name="suhu" pattern="[0-9.,]*"
                                                            inputmode="decimal" required>
                                                        <span class="input-group-text">°C</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Respiratory Rate</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="resprate-mask" name="rr_pasien" pattern="[0-9]*"
                                                            inputmode="numeric" required>
                                                        <span class="input-group-text">/mnt</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Diastole</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="diastole-mask" name="diastole" pattern="[0-9]*"
                                                            inputmode="numeric" required>
                                                        <span class="input-group-text">mmHg</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tinggi Badan</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required decimal-input"
                                                            id="tinggi-mask" name="tb_pasien" pattern="[0-9.,]*"
                                                            inputmode="decimal" required>
                                                        <span class="input-group-text">cm</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">SpO2</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control required number-input"
                                                            id="spo2-mask" name="spo2" pattern="[0-9]*"
                                                            inputmode="numeric" required>
                                                        <span class="input-group-text">%</span>
                                                        <div class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary d-flex align-items-center justify-content-center w-100" type="submit">
                            Simpan
                        </button>
                    </section>

                    <!-- Step 3 -->
                    <h6 class="fw-bold mt-4">Pemeriksaan</h6>
                    <section>
                        <h4 class="section-title mb-3">Data Pemeriksaan</h4>
                        <style>
                            .section-title {
                                font-family: 'Poppins', sans-serif;
                                font-size: 2rem;
                                font-weight: bold;
                                text-align: left;
                                color: #1A1A1A;
                                padding: 9px 0;
                            }
                        </style>
                    </section>

                    <!-- Step 4 -->
                    <h6>Farmasi</h6>
                    <section>
                    </section>

                    <!-- Step 5 -->
                    <h6>Pembayaran</h6>
                    <section>
                    </section>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pemeriksaan Fisik dengan Canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

    <div class="modal fade" id="statusLokalisModal" tabindex="-1" aria-labelledby="statusLokalisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="statusLokalisModalLabel">Pemeriksaan Fisik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- CANVAS -->
                        <div class="col-md-7 text-center">
                            <!-- Toolbar -->
                            <div class="mb-2">
                                <button type="button" class="btn btn-outline-dark btn-sm" id="btnDrawToggle"
                                    onclick="toggleDrawMode()">
                                    ✏️
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="undoCanvas()">
                                    ↩️
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="redoCanvas()">
                                    ↪️
                                </button>
                                <button type="button "class="btn btn-outline-dark btn-sm" onclick="clearCanvas()">
                                    ❌
                                </button>

                                <!-- Canvas -->
                                <div style="border: 1px solid #ccc; display: inline-block;">
                                    <canvas id="bodyCanvas" width="500" height="500"></canvas>
                                </div>
                            </div>

                            <!-- Form Input -->
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Bagian yang Diperiksa</label>
                                    <input type="text" class="form-control" id="bagianDiperiksa"
                                        placeholder="Ketik di sini">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Keterangan</label>
                                    <textarea class="form-control" id="keteranganFisik" rows="5" placeholder="Ketik di sini"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol "Simpan" -->
                    <div class="container mt-5 text-center">
                        <button type="button" class="btn btn-primary" id="saveButton">Simpan</button>
                    </div>

                    <!-- Elemen Notifikasi -->
                    <div class="notification" id="notification">
                        <i class="bi bi-info-circle"></i>
                        <strong>Data Pasien Tersimpan ke Antrian</strong>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .input-with-unit {
                display: flex;
                align-items: center;
                gap: 10px;
                /* jarak antara input dan unit */
            }

            .input-with-unit .form-control {
                flex: 1;
                /* agar input mengambil ruang yang tersisa */
                width: 100%;
                /* pastikan input penuh di dalam kotak */
                max-width: 200px;
                /* ubah sesuai kebutuhan tampilan */
            }

            .unit-label {
                white-space: nowrap;
                font-size: 0.95rem;
                color: #666;
            }
        </style>

        <style>
            /* Styling khusus untuk modal Surat Keterangan Sehat */
            #modalSehat .modal-content {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
                border: none;
            }

            #modalSehat .modal-header {
                border-bottom: none;
            }

            #modalSehat .modal-title {
                font-size: 32px;
                font-weight: 800;
                color: #0a0f5c;
                /* Biru tua */
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            }

            #modalSehat label.form-label {
                font-weight: 600;
            }

            #modalSehat input.form-control,
            #modalSehat select.form-select,
            #modalSehat textarea.form-control {
                border-radius: 10px;
                background-color: #f9f9f9;
                border: 1px solid #dcdcdc;
            }

            #modalSehat input::placeholder,
            #modalSehat textarea::placeholder {
                color: #c0c0c0;
                font-style: italic;
            }

            #modalSehat .btn-primary {
                background-color: #2959f7;
                font-weight: 600;
                font-size: 16px;
                padding: 10px 0;
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(41, 89, 247, 0.4);
                border: none;
            }

            #modalSehat .btn-primary:hover {
                background-color: #1834a7;
            }

            #modalSehat .btn-close {
                font-size: 1.2rem;
            }

            /* Responsive kecil: padding lebih kecil */
            @media (max-width: 576px) {
                #modalSehat .modal-content {
                    padding: 20px;
                }

                #modalSehat .modal-title {
                    font-size: 26px;
                }
            }

            /* Tambahkan ke stylesheet Anda */
            #signature-pad {
                touch-action: none;
                /* Penting untuk perangkat touch */
                cursor: crosshair;
            }

            .signature-instruction {
                position: absolute;
                bottom: 5px;
                left: 10px;
                color: #6c757d;
                font-size: 0.8rem;
            }

            .icd-item:hover {
                background-color: #B3B9F9;
            }

            #selected-icds-icd10 {
                max-height: 200px;
                overflow-y: auto;
            }

            .table thead th {
                background-color: #B3B9F9 !important;
            }

            .table thead th {
                color: #000000;
            }

            .table tbody td {
                vertical-align: middle;
            }

            .table {
                margin-bottom: 0;
                border-color: #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }

            .table tbody tr:hover {
                background-color: rgba(179, 185, 249, 0.1);
            }

            .view-details {
                padding: 0.25rem 0.5rem;
            }
        </style>

        <style>
            /* Styling khusus untuk modal Surat Keterangan Sakit */
            #modalSakit .modal-content {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
                border: none;
            }

            #modalSakit .modal-header {
                border-bottom: none;
            }

            #modalSakit .modal-title {
                font-size: 32px;
                font-weight: 800;
                color: #0a0f5c;
                /* Biru tua */
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            }

            #modalSakit label.form-label {
                font-weight: 600;
            }

            #modalSakit input.form-control,
            #modalSakit select.form-select,
            #modalSakit textarea.form-control {
                border-radius: 10px;
                background-color: #f9f9f9;
                border: 1px solid #dcdcdc;
            }

            #modalSakit input::placeholder,
            #modalSakit textarea::placeholder {
                color: #c0c0c0;
                font-style: italic;
            }

            #modalSakit .btn-primary {
                background-color: #2959f7;
                font-weight: 600;
                font-size: 16px;
                padding: 10px 0;
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(41, 89, 247, 0.4);
                border: none;
            }

            #modalSakit .btn-primary:hover {
                background-color: #1834a7;
            }

            #modalSakit .btn-close {
                font-size: 1.2rem;
            }

            /* Responsive kecil: padding lebih kecil */
            @media (max-width: 576px) {
                #modalSakit .modal-content {
                    padding: 20px;
                }

                #modalSakit .modal-title {
                    font-size: 26px;
                }
            }

            /* Tambahkan ke stylesheet Anda */
            #signature-pad-sakit {
                touch-action: none;
                /* Penting untuk perangkat touch */
                cursor: crosshair;
            }

            .signature-instruction {
                position: absolute;
                bottom: 5px;
                left: 10px;
                color: #6c757d;
                font-size: 0.8rem;
            }
        </style>

    @endsection



    @section('scripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
        <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi canvas ketika modal ditampilkan
                $('#modalSehat').on('shown.bs.modal', function() {
                    initSignaturePad('signature-pad', 'clear-signature');
                });
                // Untuk modal surat sakit
                $('#modalSakit').on('shown.bs.modal', function() {
                    initSignaturePad('signature-pad-sakit', 'clear-signature-sakit');
                });

                function initSignaturePad(canvasId, clearButtonId) {
                    const canvas = document.getElementById(canvasId);
                    const ctx = canvas.getContext('2d');

                    // Atur ukuran canvas yang tepat
                    function resizeCanvas() {
                        const container = canvas.parentElement;
                        canvas.width = container.offsetWidth;
                        canvas.height = container.offsetHeight;
                        ctx.lineWidth = 2;
                        ctx.lineCap = 'round';
                        ctx.strokeStyle = '#000000';
                    }

                    resizeCanvas();

                    // Variabel untuk tracking
                    let isDrawing = false;
                    let lastX = 0;
                    let lastY = 0;

                    // Fungsi untuk mendapatkan posisi mouse/touch
                    function getPosition(e) {
                        let posX, posY;
                        if (e.type.includes('touch')) {
                            const touch = e.touches[0] || e.changedTouches[0];
                            const rect = canvas.getBoundingClientRect();
                            posX = touch.clientX - rect.left;
                            posY = touch.clientY - rect.top;
                        } else {
                            const rect = canvas.getBoundingClientRect();
                            posX = e.clientX - rect.left;
                            posY = e.clientY - rect.top;
                        }
                        return {
                            x: posX,
                            y: posY
                        };
                    }

                    // Event listeners untuk mouse
                    canvas.addEventListener('mousedown', (e) => {
                        const pos = getPosition(e);
                        isDrawing = true;
                        [lastX, lastY] = [pos.x, pos.y];
                        e.preventDefault();
                    });

                    canvas.addEventListener('mousemove', (e) => {
                        if (!isDrawing) return;
                        const pos = getPosition(e);
                        draw(pos.x, pos.y);
                        e.preventDefault();
                    });

                    canvas.addEventListener('mouseup', () => {
                        isDrawing = false;
                    });

                    canvas.addEventListener('mouseout', () => {
                        isDrawing = false;
                    });

                    // Event listeners untuk touch
                    canvas.addEventListener('touchstart', (e) => {
                        const pos = getPosition(e);
                        isDrawing = true;
                        [lastX, lastY] = [pos.x, pos.y];
                        e.preventDefault();
                    });

                    canvas.addEventListener('touchmove', (e) => {
                        if (!isDrawing) return;
                        const pos = getPosition(e);
                        draw(pos.x, pos.y);
                        e.preventDefault();
                    });

                    canvas.addEventListener('touchend', () => {
                        isDrawing = false;
                    });

                    // Fungsi menggambar
                    function draw(x, y) {
                        ctx.beginPath();
                        ctx.moveTo(lastX, lastY);
                        ctx.lineTo(x, y);
                        ctx.stroke();
                        [lastX, lastY] = [x, y];
                    }

                    // Tombol hapus
                    document.getElementById('clear-signature').addEventListener('click', () => {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                    });

                    // Handle resize window
                    window.addEventListener('resize', () => {
                        resizeCanvas();
                    });
                }
            });
        </script>

        <script>
            // Add delete functionality
            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    this.closest('tr').remove();
                });
            });

            // Add search functionality (example)
            document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
                const searchTerm = document.getElementById('icd10Search').value;
                // Here you would typically call an API to search ICD-10 codes
                console.log('Searching for:', searchTerm);
            });
        </script>

        <script>
            // Add click event for view details button
            document.querySelector('.view-details').addEventListener('click', function() {
                // Set modal content based on the row data
                const modalContent = `
                <p><strong>Nama:</strong> Kepala</p>
                <p><strong>Keterangan:</strong> Kelainan pada pembuluh darah</p>
                <p><strong>Detail Tambahan:</strong></p>
                <ul>
                    <li>Jenis Kelainan: Varises pembuluh darah</li>
                    <li>Tingkat Keparahan: Sedang</li>
                    <li>Tanggal Pemeriksaan: 15-06-2023</li>
                </ul>
            `;

                document.getElementById('modalBodyContent').innerHTML = modalContent;

                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
                modal.show();
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Daftar judul per step
                const titles = [
                    'Pendaftaran', // Step 1
                    'Pemeriksaan Awal', // Step 2
                    'Pemeriksaan Poli Umum', // Step 3
                    'Farmasi', // Step 4
                    'Pembayaran' // Step 5
                ];

                const titleElement = document.getElementById('wizard-title');
                const wizard = document.querySelector('.validation-wizard');

                if (wizard) {
                    $(wizard).on('stepChanged', function(event, currentIndex) {
                        titleElement.innerText = titles[currentIndex] || 'Pendaftaran Rawat Jalan';
                    });
                }
            });
        </script>

        <script>
            // Function to validate NIK (16 digits)
            function validateNIK(input) {
                // Remove non-numeric characters
                let value = input.value.replace(/\D/g, '');

                // Set max length
                if (value.length > 16) {
                    value = value.slice(0, 16);
                }

                // Update input value
                input.value = value;

                // Show/hide error message
                const errorElement = document.getElementById('nik-error');
                if (value.length > 0 && value.length !== 16) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }

            // Function to validate numeric inputs with specific length
            function validateNumeric(input, maxLength) {
                // Remove non-numeric characters
                let value = input.value.replace(/\D/g, '');

                // Set max length if specified
                if (maxLength && value.length > maxLength) {
                    value = value.slice(0, maxLength);
                }

                // Update input value
                input.value = value;

                // Show/hide error message
                const fieldId = input.id;
                const errorElement = document.getElementById(`${fieldId}-error`);
                if (errorElement) {
                    if (value.length > 0 && maxLength && value.length !== maxLength) {
                        errorElement.style.display = 'block';
                    } else {
                        errorElement.style.display = 'none';
                    }
                }
            }

            // Function to validate phone numbers (10-13 digits)
            function validateTelepon(input) {
                // Remove non-numeric characters
                let value = input.value.replace(/\D/g, '');

                // Set max length
                if (value.length > 13) {
                    value = value.slice(0, 13);
                }

                // Update input value
                input.value = value;

                // Show/hide error message
                const fieldId = input.id;
                const errorElement = document.getElementById(`${fieldId}-error`);
                if (errorElement) {
                    if (value.length > 0 && (value.length < 10 || value.length > 13)) {
                        errorElement.style.display = 'block';
                    } else {
                        errorElement.style.display = 'none';
                    }
                }
            }

            // Fix for input type="number" with maxlength attribute (since maxlength doesn't work on number inputs)
            document.addEventListener('DOMContentLoaded', function() {
                // Apply to all numeric inputs
                const numericInputs = document.querySelectorAll('input[type="number"]');
                numericInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        const maxLength = this.getAttribute('maxlength');
                        if (maxLength && this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to process decimal input (accepts both . and , as decimal separators)
                function processDecimalInput(input, value) {
                    // Replace comma with dot for consistency
                    let newValue = value.replace(/,/g, '.');

                    // Remove any characters that aren't numbers or dots
                    newValue = newValue.replace(/[^0-9.]/g, '');

                    // Ensure only one decimal point
                    const parts = newValue.split('.');
                    if (parts.length > 2) {
                        newValue = parts[0] + '.' + parts.slice(1).join('');
                    }

                    // If starts with dot, add 0 before
                    if (newValue.startsWith('.')) {
                        newValue = '0' + newValue;
                    }

                    return newValue;
                }

                // Number inputs (whole numbers only)
                const numberInputs = document.querySelectorAll('.number-input');
                numberInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });

                    input.addEventListener('paste', function(e) {
                        e.preventDefault();
                        const pasteData = e.clipboardData.getData('text/plain');
                        const numbers = pasteData.replace(/[^0-9]/g, '');
                        document.execCommand('insertText', false, numbers);
                    });
                });

                // Decimal inputs (accepts numbers and decimal points)
                const decimalInputs = document.querySelectorAll('.decimal-input');
                decimalInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.value = processDecimalInput(this, this.value);
                    });

                    input.addEventListener('paste', function(e) {
                        e.preventDefault();
                        const pasteData = e.clipboardData.getData('text/plain');
                        const processedValue = processDecimalInput(this, pasteData);
                        document.execCommand('insertText', false, processedValue);
                    });

                    // Remove trailing decimal point when losing focus
                    input.addEventListener('blur', function() {
                        if (this.value.endsWith('.')) {
                            this.value = this.value.slice(0, -1);
                        }
                    });
                });
            });
        </script>

        <script>
            function validateNumeric(input, maxLength) {
                // Hapus karakter non-angka
                let value = input.value.replace(/\D/g, '');

                // Batasi panjang maksimal jika ditentukan
                if (maxLength && value.length > maxLength) {
                    value = value.slice(0, maxLength);
                }

                // Update nilai input
                input.value = value;

                // Tampilkan atau sembunyikan pesan error
                const fieldId = input.id;
                const errorElement = document.getElementById(`${fieldId}-error`);
                if (errorElement) {
                    if (value.length > 0 && maxLength && value.length !== maxLength) {
                        errorElement.style.display = 'block';
                    } else {
                        errorElement.style.display = 'none';
                    }
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons @1.10.5/font/bootstrap-icons.min.js"></script>


        <script>
            // Fungsi untuk menampilkan notifikasi
            function showNotification() {
                const notification = document.getElementById('notification');
                notification.style.display = 'block';

                // Sembunyikan notifikasi setelah 3 detik
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            }

            // Event listener untuk tombol "Simpan"
            document.getElementById('saveButton').addEventListener('click', () => {
                console.log('Data pasien berhasil disimpan.');
                showNotification();
            });
        </script>

        {{-- <!-- ICD-10 Search Script -->
    <script>
        $(document).ready(function() {
            // Variables to track selected ICDs
            let selectedICDs = [];

            // Handle search input
            $('#search-icd').on('input', function() {
                const searchTerm = $(this).val();

                if (searchTerm.length < 2) {
                    $('#search-results').hide();
                    return;
                }

                // Make AJAX request to search endpoint
                $.ajax({
                    url: '{{ url('search_icd.php') }}',
data: {
term: searchTerm
},
dataType: 'json',
success: function(data) {
// Clear previous results
$('#search-results').empty();

if (data.length > 0) {
// Add each result to dropdown
data.forEach(function(item) {
$('#search-results').append(
`<div class="search-item p-2 border-bottom hover-bg" data-id="${item.id}" data-name="${item.name}">
    <strong>${item.id}</strong> - ${item.name}
</div>`
);
});

// Show results dropdown
$('#search-results').show();
} else {
$('#search-results').append(
`<div class="p-2 text-muted">Tidak ada hasil ditemukan</div>`
);
$('#search-results').show();
}
},
error: function(xhr, status, error) {
console.error('Error searching ICD:', error);
$('#search-results').html(
'<div class="p-2 text-danger">Error searching: ' + error +
    '</div>');
$('#search-results').show();
}
});
});

// Handle search button click
$('#search-btn').click(function() {
const searchTerm = $('#search-icd').val();
if (searchTerm.length >= 2) {
// Trigger the same search process
$('#search-icd').trigger('input');
}
});

// Handle selecting an ICD from the results
$(document).on('click', '.search-item', function() {
const id = $(this).data('id');
const name = $(this).data('name');

// Check if already selected
if (!selectedICDs.some(item => item.id === id)) {
// Add to selected ICDs
selectedICDs.push({
id,
name
});

// Update the display of selected ICDs
updateSelectedICDs();
}

// Clear search and hide results
$('#search-icd').val('');
$('#search-results').hide();
});

// Function to update display of selected ICDs
function updateSelectedICDs() {
const container = $('#selected-icds');

if (selectedICDs.length === 0) {
container.html(
'<p class="text-muted text-center mb-0" id="no-icd-selected">Belum ada diagnosa yang dipilih</p>'
);
} else {
container.empty();

selectedICDs.forEach(function(item, index) {
container.append(
`<div class="selected-icd-item mb-1 d-flex align-items-center">
    <span class="me-auto"><strong>${item.id}</strong> - ${item.name}</span>
    <button type="button" class="btn btn-sm btn-outline-danger remove-icd" data-index="${index}">
        <i class="fas fa-times"></i>
    </button>
</div>`
);
});
}
}

// Handle removing a selected ICD
$(document).on('click', '.remove-icd', function() {
const index = $(this).data('index');
selectedICDs.splice(index, 1);
updateSelectedICDs();
});

// Close dropdown when clicking outside
$(document).on('click', function(event) {
if (!$(event.target).closest('#search-icd, #search-results, #search-btn').length) {
$('#search-results').hide();
}
});
});
</script>

<!-- Tambahkan CSS untuk fitur ICD-10 -->
<style>
.search-item {
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-item:hover {
    background-color: #f8f9fa;
}

.selected-icd-item {
    background-color: #e9f7fe;
    padding: 5px 10px;
    border-radius: 4px;
}

#search-results {
    border: 1px solid #ced4da;
    border-radius: 0 0 5px 5px;
}

.hover-bg:hover {
    background-color: #f0f0f0;
    cursor: pointer;
}

.z-index-dropdown {
    z-index: 1000;
}

.min-height-80 {
    min-height: 80px;
}
</style> --}}

        <!-- Script untuk menggambar di canvas -->
        <script>
            const canvas = document.getElementById('bodyCanvas');
            const ctx = canvas.getContext('2d');
            const image = new Image();
            let isDrawing = false;
            let drawEnabled = false;
            let initialized = false;
            let undoStack = [];
            let redoStack = [];
            let currentColor = 'red'; // Warna default

            function toggleDrawMode() {
                drawEnabled = !drawEnabled;
                const button = document.getElementById('btnDrawToggle');
                if (drawEnabled) {
                    button.classList.add('active');
                    button.innerHTML = '🛑'; // misalnya ganti ikon saat aktif
                } else {
                    button.classList.remove('active');
                    button.innerHTML = '✏️'; // ikon default
                }
            }

            function undoCanvas() {
                if (undoStack.length > 0) {
                    const lastState = undoStack.pop();
                    redoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height)); // simpan state saat ini ke redo
                    ctx.putImageData(lastState, 0, 0);
                }
            }

            function redoCanvas() {
                if (redoStack.length > 0) {
                    const nextState = redoStack.pop();
                    undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height)); // simpan state saat ini ke undo
                    ctx.putImageData(nextState, 0, 0);
                }
            }

            function clearCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(image, 0, 0, canvas.width, canvas.height); // redraw the body image
            }

            function saveCanvas() {
                if (event) event.preventDefault(); // penting agar tidak reload

                const imageData = canvas.toDataURL();
                console.log("Saved image data:", imageData);
                alert("Gambar disimpan!");
                // Kirim imageData via AJAX atau simpan sesuai kebutuhan
            }

            canvas.addEventListener('mousedown', (e) => {
                if (!drawEnabled) return;
                isDrawing = true;
                // Simpan state sebelum menggambar
                undoStack.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
                // Kosongkan redoStack karena ada aksi baru
                redoStack = [];
                ctx.strokeStyle = currentColor;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.beginPath();
                ctx.moveTo(e.offsetX, e.offsetY);
            });

            canvas.addEventListener('mousemove', (e) => {
                if (!isDrawing || !drawEnabled) return;
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            });

            canvas.addEventListener('mouseup', () => {
                if (!drawEnabled) return;
                isDrawing = false;
            });

            // Load gambar saat modal dibuka pertama kali
            $('#statusLokalisModal').on('shown.bs.modal', function() {
                if (!initialized) {
                    image.onload = function() {
                        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                    };
                    image.src =
                        '/build/images/gambarmedis/Status-lokalis.jpg'; // Ganti path sesuai lokasi file gambar Anda
                    initialized = true;
                } else {
                    // setiap buka ulang, redraw image (jika dibutuhkan)
                    clearCanvas();
                }
            });

            function editPemeriksaan(bagian, keterangan, imageDataUrl = null) {
                document.getElementById('bagianDiperiksa').value = bagian;
                document.getElementById('keteranganFisik').value = keterangan;

                const modal = new bootstrap.Modal(document.getElementById('statusLokalisModal'));
                modal.show();

                $('#statusLokalisModal').off('shown.bs.modal').on('shown.bs.modal', function() {
                    const ctx = canvas.getContext('2d');
                    const background = new Image();
                    background.onload = () => {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.drawImage(background, 0, 0, canvas.width, canvas.height);

                        if (imageDataUrl) {
                            const overlay = new Image();
                            overlay.onload = () => {
                                ctx.drawImage(overlay, 0, 0, canvas.width, canvas.height);
                            };
                            overlay.src = imageDataUrl;
                        }
                    };
                    background.src = '/build/images/gambarmedis/Status-lokalis.jpg';
                });
            }
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const previousBtn = document.querySelector('a[href="#previous"]');
                if (previousBtn) {
                    previousBtn.textContent = "Sebelumnya";
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const nextBtn = document.querySelector('a[href="#next"]');
                if (nextBtn) {
                    nextBtn.textContent = "Simpan";
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi dropdown menggunakan Bootstrap
                const dropdownElement = document.getElementById('suratKeteranganDropdown');
                if (dropdownElement) {
                    const dropdown = new bootstrap.Dropdown(dropdownElement);
                }

                // Event listener untuk item dropdown
                document.querySelectorAll('.dropdown-item').forEach(item => {
                    item.addEventListener('click', function(event) {
                        event.preventDefault();
                        const targetModal = this.getAttribute('data-bs-target');
                        if (targetModal) {
                            const modal = new bootstrap.Modal(document.querySelector(targetModal));
                            modal.show();
                        }
                    });
                });
            });
        </script>

        <script>
            const tableIcd = new DataTable('#icdTable', {
                responsive: true,
                paging: true,
                searching: true,
                info: true,
                pageLength: 10, // Default: tampilkan 10 entri
                lengthMenu: [5, 10, 25, 50, 100]
            });
            const tableLayanan = new DataTable('#layananTable', {
                responsive: true,
                paging: true,
                searching: true,
                info: true,
                pageLength: 10, // Default: tampilkan 10 entri
                lengthMenu: [5, 10, 25, 50, 100]
            });
        </script>

    @endsection
