@extends('layouts.master')

@section('title', 'SIP-Kes | Data Obat')


@section('css')
    <style>
        ul.simple-pagination {
            list-style: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            margin: 0;
        }

        .simple-pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .simple-pagination li {
            list-style: none;
            margin: 0 3px;
            display: inline;
        }

        .light-theme a, .light-theme span {
            color: black;
            font-size: 14px;
            font-weight: bold;
            line-height: 30px;
            text-align: center;
            border: 2px solid #f0ac31;
            min-width: 30px;
            padding: 0 10px;
            border-radius: 15px;
            background-color: #f0ac31;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            display: inline-block;
        }

        .light-theme a:hover, .light-theme li:not(.disabled):not(.active) span:hover {
            text-decoration: none;
            background-color: var(#f0bc5b);
        }

        .light-theme .current {
            background-color: transparent;
            color: black;
            border-color: #f0ac31;
        }

        .light-theme .ellipse {
            background: none;
            border: none;
            cursor: default;
        }

        /* Prev and Next Button Styles (Smaller) */
        .light-theme .prev, .light-theme .next {
            padding: 5px;
            border-radius: 15px;
            background-color: #f0ac31;
            border: 2px solid #f0ac31;
            color: black;
            font-size: 14px;
        }

        .light-theme .prev:hover, .light-theme .next:hover {
            background-color: var(#f0bc5b);
        }

        /* Ellipsis Style */
        .light-theme .ellipse {
            color: black;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
@endsection

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
                            <input type="text" class="form-control search-bar me-2" id="cari-obat" placeholder="Cari Obat"
                                style="width: 250px;">
                            <button class="btn btn-primary search-button btn-cari-obat">Cari</button>
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
                                <button class="btn btn-secondary btn-add-obat me-2" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fas fa-plus me-2"></i>
                                    Tambah
                                </button>
                                <a href="{{ url('main/stokopname') }}">
                                    <button class="btn btn-dark">
                                        Stok Opname
                                    </button>
                                </a>
                            </div>
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
                                    <th class="text-light">Kadaluwarsa Terdekat</th>
                                    <th class="text-light">Bentuk Obat</th>
                                    <th class="text-light">Harga Obat</th>
                                    <th class="text-light">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-list">

                            </tbody>
                            <style>
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

                <div class="pagination justify-content-center w-100 mb-2">

                </div>

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

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addModalLabel">Kelola Obat</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="nama" class="col-form-label">Nama Obat:</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="keterangan" class="col-form-label">Keterangan:</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <div class="mb-3">
                  <label for="bentuk_obat" class="col-form-label">Bentuk Obat:</label>
                  <input type="text" class="form-control" id="bentuk_obat" name="bentuk_obat">
                </div>
                <div class="mb-3">
                  <label for="harga" class="col-form-label">Harga:</label>
                  <input type="number" class="form-control" id="harga" name="harga" step="0.01">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary add-obat">Tambahkan</button>
              <button type="button" class="btn btn-primary update-obat d-none">Sesuaikan</button>
            </div>
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

    <script src="{{ url('build/js/pagination.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('input, select, textarea').on('input change', function () {
                let id = $(this).attr('id');
                $(`#error-${id}`).html('');
            });

            $('.add-obat').on('click', function(e){
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.val('Loading...')

                let data = {
                    nama: $('#nama').val(),
                    keterangan: $('#keterangan').val(),
                    bentuk_obat: $('#bentuk_obat').val(),
                    harga: $('#harga').val(),
                }

                $.ajax({
                    url: `{{ route('api.obat.add') }}`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data
                }).done(function (res) {
                    alert(res.message)
                    $('#addModal').modal('hide');
                    loadObat()
                }).fail(function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors
                    if (errors != undefined) {
                        for (const [key, value] of Object.entries(errors)) {
                            const input = $(`#${key}`);

                            const target = input.closest('.input-group').length > 0
                                ? input.closest('.input-group')
                                : input;

                            target.next('.text-danger').remove();
                            target.after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
                        }
                    } else {
                        alert(xhr.responseJSON.message)
                    }
                }).always(function () {
                    eThis.prop('disabled', false)
                    eThis.html('<i class="fas fa-plus me-2"></i> Tambah')
                })
            })

            $('.update-obat').on('click', function(e){
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.html('Loading...')
                let id = $(this).attr('data-id')
                let data = {
                    nama: $('#nama').val(),
                    keterangan: $('#keterangan').val(),
                    bentuk_obat: $('#bentuk_obat').val(),
                    harga: $('#harga').val(),
                }

                $.ajax({
                    url: `{{ route('api.obat.update', ':id') }}`.replace(':id', id),
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data
                }).done(function (res) {
                    alert(res.message)
                    $('#addModal').modal('hide');
                    loadObat()
                }).fail(function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors
                    if (errors != undefined) {
                        for (const [key, value] of Object.entries(errors)) {
                            const input = $(`#${key}`);

                            const target = input.closest('.input-group').length > 0
                                ? input.closest('.input-group')
                                : input;

                            target.next('.text-danger').remove();
                            target.after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
                        }
                    } else {
                        alert(xhr.responseJSON.message)
                    }
                }).always(function () {
                    eThis.prop('disabled', false)
                    eThis.html('Sesuaikan')
                })
            })

            $(document).on('click', '.delete-obat', function(e){
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.html('Loading...')
                let id = $(this).attr('data-id')
                let nama = $(this).attr('data-nama')

                if (confirm(`Apakah Anda yakin ingin menghapus obat ${nama}?`)) {
                    $.ajax({
                        url: `{{ route('api.obat.delete', ':id') }}`.replace(':id', id),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).done(function (res) {
                        alert(res.message)
                        loadObat()
                    }).fail(function (xhr, status, error) {
                        let errors = xhr.responseJSON.errors
                        if (errors != undefined) {
                            for (const [key, value] of Object.entries(errors)) {
                                const input = $(`#${key}`);

                                const target = input.closest('.input-group').length > 0
                                    ? input.closest('.input-group')
                                    : input;

                                target.next('.text-danger').remove();
                                target.after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
                            }
                        } else {
                            alert(xhr.responseJSON.message)
                        }
                    }).always(function () {
                        eThis.prop('disabled', false)
                        eThis.html('<i class="fas fa-trash"></i>')
                    })
                } else {
                    eThis.prop('disabled', false)
                    eThis.html('<i class="fas fa-trash"></i>')
                }
            })

            $(document).on('click', '.edit-obat', function(e){
                $('.update-obat').removeClass('d-none')
                $('.add-obat').addClass('d-none')
                $('.update-obat').attr('data-id', $(this).attr('data-id'))
                $('#nama').val($(this).attr('data-nama'))
                $('#keterangan').val($(this).attr('data-keterangan'))
                $('#bentuk_obat').val($(this).attr('data-bentuk_obat'))
                $('#harga').val($(this).attr('data-harga'))
            })

            $(document).on('click', '.btn-add-obat', function(e){
                $('#nama').val('')
                $('#keterangan').val('')
                $('#bentuk_obat').val('')
                $('#harga').val('')

                $('.update-obat').addClass('d-none')
                $('.update-obat').attr('data-id', '')
                $('.add-obat').removeClass('d-none')
            })

            $('.btn-cari-obat').on('click', function(e) {
                loadObat($('#cari-obat').val())
            })

            function loadObat(search = '', page = 1) {
                $.ajax({
                    url: "{{ route('api.obat.all') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        search: search,
                        page: page,
                        length: 10,
                    }
                }).done(function (res) {
                    let data = res.data

                    $('#data-list').empty()
                    let aksi = ``
                    data.forEach(item => {
                        aksi = `
                            <button class="btn btn-warning me-2 edit-obat"  data-bs-toggle="modal" data-bs-target="#addModal" data-id="${item.id}" data-nama="${item.nama}" data-keterangan="${item.keterangan}" data-bentuk_obat="${item.bentuk_obat}" data-harga="${item.harga}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger delete-obat" data-id="${item.id}" data-nama="${item.nama}">
                                <i class="fas fa-trash"></i>
                            </button>
                        `

                        $('#data-list').append(`
                            <tr>
                                <td>${item.nama}</td>
                                <td>${item.keterangan}</td>
                                <td>${item.stok}</td>
                                <td>${item.kadaluarsa}</td>
                                <td>${item.bentuk_obat}</td>
                                <td>${Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.harga)}</td>
                                <td>${aksi}</td>
                            </tr>
                        `)
                    })

                    getPagination(res.pagination.last_page, res.pagination.per_page, res.pagination.current_page)
                }).fail(function (xhr, status, error) {
                    alert(xhr.responseJSON.message)
                })
            }

            loadObat();

            function getPagination(totalPage, perPage, page = 1) {
                $('.pagination').pagination({
                    items: totalPage,
                    itemOnPage: perPage,
                    currentPage: page,
                    displayedPages: 1,
                    edges: 1,
                    cssStyle: 'light-theme',
                    hrefTextPrefix: '',
                    prevText: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7l-5 5l5 5" /><path d="M17 7l-5 5l5 5" /></svg>',
                    nextText: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7l5 5l-5 5" /><path d="M13 7l5 5l-5 5" /></svg>',
                    onInit: function () {
                    },
                    onPageClick: function (page, evt) {
                        evt.preventDefault()

                        loadObat($('#cari-obat').val(), page)
                    }
                })
            }
        })
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