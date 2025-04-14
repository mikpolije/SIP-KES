@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Data Obat</h1>
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
                    <div class="row mb-9 justify-content-end">
                        <div class="col-md-8 d-flex justify-content-end">
                            <input type="text" class="form-control search-bar me-2" id="" placeholder="Cari Obat"
                                style="width: 250px;">
                            <button class="btn btn-primary search-button" onclick="searchobat()">Cari</button>
                        </div>
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
                </section>

                <!-- ICON -->
                <div class="row mb-10">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <!-- Magnifier icon on the left -->
                        <div class="row mb-9 justify-content-end">
                            <div class="col-md-13 d-flex justify-content-end">
                                <button class="btn btn-secondary search-button" onclick="searchobat()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 5px;">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Pencil square and trash icons on the right -->
                        <div class="d-flex align-items-center">
                            <!-- Pencil Square Icon -->
                            <button class="btn btn-outline-primary me-2" onclick="editItem()"
                                style="border: none; background: none; padding: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="black"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>

                            <!-- Trash Icon -->
                            <button class="btn btn-outline-danger" onclick="deleteItem()"
                                style="border: none; background: none; padding: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="red"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- TABLES -->
                <div class="row justify-content-center">
                    <div class="text-center">
                        <table class="table table-striped table-bordered ">
                            <thead class="table-dark gray">
                                <tr>
                                    <th class="text-light">Nama Obat</th>
                                    <th class="text-light">Keterangan Obat</th>
                                    <th class="text-light">Stok</th>
                                    <th class="text-light">Kadaluwarsa</th>
                                    <th class="text-light">Bentuk Obat</th>
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
                        </table>
                    </div>
                </div>

                <h1 class="text" style="font-size: 0.8rem; margin-top: 10px; margin-bottom: 10px;">
                    Showing 1 to of 1 entrys (filtered from total entres)</h1>

                <!-- OPTION BUTTON -->
                <div class="row mb-9 justify-content-end">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="button" class="btn btn-info btn-3d" style="margin-right: 10px;">Sebelumnya</button>
                        <button type="button" class="btn btn-success btn-3d" style="margin-right: 10px;">Simpan
                            Draf</button>
                        <button type="button" class="btn btn-warning btn-3d" style="margin-right: 10px;"
                            onclick="printTables()">Cetak</button>
                        <button type="button" class="btn btn-info btn-3d"
                            onclick="window.location.href='{{ url('main/datapengambilanobat') }}'">Selanjutnya</button>
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
            // Get all table elements
            const tables = document.querySelectorAll('table.table-striped');

            // Create a new window for printing
            const printWindow = window.open('', '', 'width=800,height=600');

            // Write the tables' HTML into the new window
            printWindow.document.write('<html><head><title>Tabel Obat</title>');
            printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: left; }</style>');
            printWindow.document.write('</head><body>');

            // Loop through all tables and add them to the print window
            tables.forEach((table, index) => {
                printWindow.document.write(`<h3>Rincian Obat</h3>`);
                printWindow.document.write(table.outerHTML);
            });

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