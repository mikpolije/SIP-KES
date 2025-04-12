@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Data Pengambilan Obat</h1>
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
                    <div class="row mb-9">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <select class="form-select" aria-label="Default select example" style="width: 150px;">
                                <option selected>Poli</option>
                                <option value="1">Poli Umum</option>
                                <option value="2">Rawat Inap</option>
                                <option value="3">Poli KIA</option>
                                <option value="4">UGD</option>
                            </select>
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

                            <!-- Search bar and button -->
                            <div class="d-flex">
                                <input type="text" class="form-control search-bar me-2" id="" placeholder="Data Pasien"
                                    style="width: 250px;">
                                <button class="btn btn-primary search-button" onclick="searchobat()">Cari</button>
                            </div>

                            <style>
                                .search-bar {
                                    border: 1px solid #ced4da;
                                    border-radius: 5px;
                                    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
                                    padding: 10px;
                                    transition: box-shadow 0.3s ease, transform 0.3s ease;
                                }

                                .search-bar:focus {
                                    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
                                    outline: none;
                                }

                                .search-button {
                                    border: none;
                                    border-radius: 5px;
                                    color: white;
                                    padding: 10px 20px;
                                    font-size: 1rem;
                                    font-weight: bold;
                                    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                                    /* 3D shadow */
                                }

                                .search-button:hover {
                                    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
                                    /* Enhanced shadow */
                                }

                                .search-button:active {
                                    box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.3);
                                    /* Inset shadow for pressed effect */
                                }
                            </style>
                        </div>
                    </div>

                    <!-- identity -->
                    <div class="row">
                        <!-- No. Antrian -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="behName2">No. Antrian:</label>
                                <input type="text" class="form-control required" id="behName2" />
                            </div>
                        </div>

                        <!-- No. RM -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="participants3">No. RM:</label>
                                <input type="text" class="form-control required" id="participants3" />
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="participants3">Nama:</label>
                                <input type="text" class="form-control required" id="participants3" />
                            </div>
                        </div>

                        <!-- Tanggal Penyerahan -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="tlwali">Tanggal Penyerahan:</label>
                                <input type="date" class="form-control required" id="tlwali" name="tlwali" />
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
                    </div>


                    <div class="row">
                        <!-- Rincian Obat and Table -->
                        <div class="col-md-8">
                            <label class="form-label" for="decisions3">Rincian Obat</label>
                            <div class="d-flex mb-3">
                                <input type="text" class="form-control me-2" id="" placeholder="Cari Obat"
                                    style="width: 70%;">
                                <button class="btn btn-primary btn-3d me-auto" onclick="searchobat()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 5px;">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    Tambah
                                </button>
                                <button class="btn btn-primary btn-3d" onclick="searchobat()">Cari</button>
                            </div>
                            <style>
                                /* 3D Button Styling */
                                .btn-3d {
                                    border: none;
                                    border-radius: 5px;
                                    color: white;
                                    padding: 10px 20px;
                                    font-size: 1rem;
                                    font-weight: bold;
                                    box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
                                }

                                .btn-3d:hover {
                                    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
                                }

                                .btn-3d:active {
                                    box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.3);
                                }
                            </style>


                            <!-- TABLE 1 -->
                            <table class="table table-striped table-bordered" style="margin: 10px auto; width: 100%;">
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
                                        <td colspan="2">Larry the Bird</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- TABLE 2 -->
                            <table class="table table-striped table-bordered" style="margin: 10px auto; width: 100%;">
                                <thead class="table-dark gray">
                                    <tr>
                                        <th class="text-light">Tanggal</th>
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
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
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

                        <!-- Catatan -->
                        <div class="col-md-4" style="margin-top: 5px;">
                            <div class="mb-3">
                                <label class="form-label" for="decisions3">Catatan</label>
                                <textarea name="decisions" id="decisions3" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- OPTION BUTTON -->
                    <div class="row mb-9 justify-content-end">
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-3d" style="margin-right: 10px;"
                                onclick="window.location.href='{{ url('main/dataobat') }}'">Sebelumnya</button>
                            <button type="button" class="btn btn-success btn-3d" style="margin-right: 10px;">Simpan
                                Draf</button>
                            <button type="button" class="btn btn-warning btn-3d" style="margin-right: 10px;"
                                onclick="printTables()">Cetak</button>
                            <button type="button" class="btn btn-info btn-3d"
                                onclick="window.location.href='{{ url('main/dataresep') }}'">Selanjutnya</button>
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
            </div>
        </div>
    </div>
@endsection





@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
    <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
    <script>
        function printTables() {
            // Get both table elements
            const table1 = document.querySelector('table.table-striped:nth-of-type(1)');
            const table2 = document.querySelector('table.table-striped:nth-of-type(2)');

            // Create a new window for printing
            const printWindow = window.open('', '', 'width=800,height=600');

            // Write the tables' HTML into the new window
            printWindow.document.write('<html><head><title>Tabel Obat</title>');
            printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: left; }</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h3>Rincian Obat</h3>');
            printWindow.document.write(table1.outerHTML);
            printWindow.document.write('<h3></h3>');
            printWindow.document.write(table2.outerHTML);
            printWindow.document.write('</body></html>');

            // Close the document and trigger the print dialog
            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <!-- ICD-10 Search Script -->
    <script>
        $(document).ready(function () {
            // Variables to track selected ICDs
            let selectedICDs = [];

            // Handle search input
            $('#search-icd').on('input', function () {
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
                    success: function (data) {
                        // Clear previous results
                        $('#search-results').empty();

                        if (data.length > 0) {
                            // Add each result to dropdown
                            data.forEach(function (item) {
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
                    error: function (xhr, status, error) {
                        console.error('Error searching ICD:', error);
                        $('#search-results').html(
                            '<div class="p-2 text-danger">Error searching: ' + error +
                            '</div>');
                        $('#search-results').show();
                    }
                });
            });

            // Handle search button click
            $('#search-btn').click(function () {
                const searchTerm = $('#search-icd').val();
                if (searchTerm.length >= 2) {
                    // Trigger the same search process
                    $('#search-icd').trigger('input');
                }
            });

            // Handle selecting an ICD from the results
            $(document).on('click', '.search-item', function () {
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

                    selectedICDs.forEach(function (item, index) {
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
            $(document).on('click', '.remove-icd', function () {
                const index = $(this).data('index');
                selectedICDs.splice(index, 1);
                updateSelectedICDs();
            });

            // Close dropdown when clicking outside
            $(document).on('click', function (event) {
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
    </style>
@endsection