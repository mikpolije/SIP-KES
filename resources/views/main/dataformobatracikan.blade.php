@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Form Obat Racikan</h1>
                <style>
                    .title {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 3rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
                    }
                </style>

                <section>
                    <div class="row">
                        <!-- Nama Obat Racikan -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="participants3">Nama Obat Racikan</label>
                                <input type="text" class="form-control required" id="participants3" style="width: 100%;" />
                            </div>
                        </div>

                        <!-- Tanggal Racik -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="tlwali">Tanggal Racik:</label>
                                <input type="date" class="form-control required" id="tlwali" name="tlwali" />
                            </div>
                        </div>
                    </div>

                    <!-- dropdown -->
                    <div class="row">
                        <!-- Satuan -->
                        <div class="col-md-6">
                            <label class="form-label" for="satuan">Satuan</label>
                            <select class="form-select" aria-label="Default select example" style="width: 200px;">
                                <option selected>--pilihan satuan--</option>
                                <option value="1">Botol</option>
                                <option value="2">Dus</option>
                                <option value="3">Box</option>
                                <option value="4">Tablet</option>
                                <option value="4">Lain-lain</option>
                            </select>
                        </div>

                        <!-- Jenis Racikan -->
                        <div class="col-md-6">
                            <label class="form-label" for="jenis-racikan">Jenis Racikan</label>
                            <select class="form-select" aria-label="Default select example" style="width: 200px;">
                                <option selected>--pilih jenis racikan--</option>
                                <option value="1">Padat</option>
                                <option value="2">Cair</option>
                                <option value="4">Lain-lain</option>
                            </select>
                        </div>
                    </div>

                    <style>
                        /* 3D Input Styling */
                        .form-control {
                            border: 1px solid #ced4da;
                            border-radius: 5px;
                            padding: 10px;
                            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                            /* 3D shadow */
                        }

                        .form-control:focus {
                            outline: none;
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
                            /* Enhanced shadow */
                        }

                        .form-control:hover {
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2), -2px -2px 6px rgba(255, 255, 255, 0.1);
                            /* Subtle shadow */
                        }
                    </style>
                    <style>
                        /* 3D Select Styling */
                        .form-select {
                            border: 1px solid #ced4da;
                            border-radius: 5px;
                            padding: 8px 12px;
                            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                            /* 3D shadow */
                        }

                        .form-select:focus {
                            outline: none;
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
                            /* Enhanced shadow */
                        }

                        .form-select:hover {
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2), -2px -2px 6px rgba(255, 255, 255, 0.1);
                            /* Subtle shadow */
                        }
                    </style>

                    <div class="row">
                        <!-- Keterangan 1 -->
                        <div class="col-md-6" style="margin-top: 5px;">
                            <div class="mb-3">
                                <label class="form-label" for="catatan1">Keterangan</label>
                                <textarea name="catatan1" id="catatan1" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Keterangan 2 -->
                        <div class="col-md-6" style="margin-top: 5px;">
                            <div class="mb-3">
                                <label class="form-label" for="catatan2">Keterangan</label>
                                <textarea name="catatan2" id="catatan2" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <!-- Rincian Obat and Table -->
                        <div class="col-md-12 text-center">
                            <div class="d-flex mb-3">
                                <input type="text" class="form-control me-2" id="" placeholder="Ketik Obat"
                                    style="width: 75%;">
                                <button class="btn btn-primary btn-3d me-auto" style="margin-left: 3px;"
                                    onclick="searchobat()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 5px;">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    Tambah Racikan
                                </button>
                                <button class="btn btn-primary btn-3d" onclick="searchobat()">Cari</button>
                            </div>

                            <!-- TABLES -->
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark gray">
                                    <tr>
                                        <th class="text-light">Jumlah</th>
                                        <th class="text-light">Nama Obat</th>
                                        <th class="text-light">Harga Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan>Larry the Bird</td>
                                        <td colspan>Larry the Bird</td>
                                    </tr>
                                </tbody>
                            </table>
                            <style>
                                /* 3D Table Styling */
                                .table-striped {
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    border: 1px solid #ddd;
                                    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                                    /* 3D shadow */
                                    border-radius: 8px;
                                    overflow: hidden;
                                }
                            </style>
                        </div>
                    </div>

                    <!-- OPTION BUTTON -->
                    <div class="row mb-9 justify-content-end">
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" class="btn btn-success btn-3d" style="margin-right: 10px;">Simpan</button>
                        </div>
                    </div>
                    <style>
                        /* 3D Button Styling */
                        .btn-3d {
                            border: none;
                            border-radius: 5px;
                            color: white;
                            font-size: 1rem;
                            font-weight: bold;
                            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                            /* 3D shadow */
                        }

                        .btn-3d:hover {
                            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
                            /* Enhanced shadow */
                        }

                        .btn-3d:active {
                            box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.3);
                            /* Inset shadow for pressed effect */
                        }
                    </style>
                </section>
@endsection





            @section('scripts')
                <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
                <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
                <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
                <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
                <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
                <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>

                <script>
                    function printForm() {
                        // Clone the section to print
                        const formSection = document.querySelector('.card-body.wizard-content').cloneNode(true);

                        // Remove the search bar and button from the cloned section
                        const searchBar = formSection.querySelector('.d-flex.mb-3');
                        if (searchBar) {
                            searchBar.remove();
                        }

                        // Remove the option buttons from the cloned section
                        const optionButtons = formSection.querySelector('.row.mb-9.justify-content-end');
                        if (optionButtons) {
                            optionButtons.remove();
                        }

                        // Create a new window for printing
                        const printWindow = window.open('', '', 'width=800,height=600');

                        // Write the content of the section into the new window
                        printWindow.document.write('<html><head><title>Form Obat Racikan</title>');
                        printWindow.document.write('<style>body { font-family: Arial, sans-serif; } table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: left; }</style>');
                        printWindow.document.write('</head><body>');
                        printWindow.document.write(formSection.outerHTML);
                        printWindow.document.write('</body></html>');

                        // Close the document and trigger the print dialog
                        printWindow.document.close();
                        printWindow.print();
                    }
                </script>
            @endsection