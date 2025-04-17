<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stok Opname</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <link rel="stylesheet" href="{{asset('/build/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <style>
        .tab-content {
            transition: opacity 0.3s ease-in-out;
        }
        .search-container input {
            padding: 7px;
            border-radius: 8px;
            border: 1px solid #ccc;
            text-align: right;
        }

        .pagination {
            justify-content: flex-end !important;
        }
    </style>
</head>
<body class="bg-gray-200 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-white shadow-md p-6 space-y-6">
            <div class="text-center">
                <img src= "img/logosipkes.png" alt="Logo SIPKES" width="200"/>
                <p class="text-sm text-gray-500 mt-1">Sistem Informasi Pelayanan Kesehatan</p>
            </div>
            <nav class="space-y-2">
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Dashboard</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pendaftaran</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pemeriksaan</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Farmasi</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Pembayaran</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Persuratan</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Rekam Medis</a>
                <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Laporan</a>
                <div>
                    <p class="text-gray-600 text-xs mt-2">Master Data</p>
                    <a href="#" class="block text-sm text-blue-600">Data Pengguna</a>
                    <a href="#" class="block text-sm text-gray-800 hover:text-blue-600">Layanan</a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Stok Opname</h1>

            <!-- Card Container -->
            <div class="bg-white shadow-md rounded-2xl">
                <!-- Tabs -->
                <div class="flex">
                    <button onclick="showTab('ringkasan', event)" class="tab-btn bg-white border-b-4 border-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Data Ringkasan Obat</button>
                    <button onclick="showTab('rincian', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Data Rincian Obat</button>
                    <button onclick="showTab('akanKadaluarsa', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Obat Akan Kadaluarsa</button>
                    <button onclick="showTab('kadaluarsa', event)" class="tab-btn bg-blue-400 text-white-900 px-4 py-2 font-medium w-full transition-colors duration-200">Obat Kadaluarsa</button>
                </div>

                <!-- Tab Contents -->
                <div id="ringkasan" class="tab-content block opacity-100 p-4">
                    <table class="table border-top nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Stok Opname</th>
                                <th>Stok Gudang</th>
                                <th>Stok Bebas</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Tab Contents -->
                <div id="rincian" class="tab-content hidden opacity-0 p-4">
                    <div class="flex justify-end mb-4">
                        <button class="btn btn-primary btn-3d" data-bs-toggle="modal" data-bs-target="#addRincianObatModal">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Rincian Obat
                        </button>
                    </div>
                    <table class="table border-top nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>No Fraktur</th>
                                <th>Tanggal Faktur</th>
                                <th>Stok Opname</th>
                                <th>Stok Gudang</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Tab Contents -->
                <div id="akanKadaluarsa" class="tab-content hidden opacity-0 px-6 pb-4">
                <div class="my-2 space-x-2">
                    <button onclick="copyTable('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
                    <button onclick="exportCSV('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
                    <button onclick="exportExcel('akanKadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
                </div>
                <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden" id="rincianTable">
                    <thead class="bg-white border-y border-gray-300">
                    <tr>
                        <th class="px-4 py-2 w-1/4"></th> <!-- Kolom kosong -->
                        <th class="px-4 py-2">Nama Obat</th>
                        <th class="px-4 py-2">Tanggal Kadaluarsa</th>
                        <th class="px-4 py-2">No Fraktur</th>
                        <th class="px-4 py-2">Tanggal Faktur</th>
                        <th class="px-4 py-2">Stok Opname</th>
                        <th class="px-4 py-2">Stok Gudang</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Baris 2 - Pesan kosong -->
                    <tr class="bg-blue-100 border-t border-gray-200">
                        <td colspan="7" class="px-4 py-2 text-center text-gray-700">Tidak ada yang tersedia pada tabel ini</td>
                    </tr>

                    <!-- Baris 3 - Kosong putih -->
                    <tr class="bg-white border-t border-gray-200">
                        <td colspan="7" class="px-4 py-4"></td>
                    </tr>

                    <!-- Baris 4 - Info entri -->
                    <thead class="bg-white border-y border-gray-300">
                    <tr class="bg-white border-t border-gray-200">
                        <td colspan="7" class="px-4 py-2 text-sm text-gray-600">Menampilkan 2 sampai 2 dari 2 entri</td>
                    </tr>
                    </thead>
                    </tbody>

                </table>
                </div>
                <!-- Tab Contents -->
                <div id="kadaluarsa" class="tab-content hidden opacity-0 px-6 pb-4">
                <div class="my-2 space-x-2">
                    <button onclick="copyTable('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Copy</button>
                    <button onclick="exportCSV('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">CSV</button>
                    <button onclick="exportExcel('kadaluarsa')" class="bg-gray-300 hover:bg-gray-400 text-black px-3 py-1 rounded">Excel</button>
                </div>
                <table class="min-w-full text-sm text-left bg-white rounded-md overflow-hidden" id="rincianTable">
                    <thead class="bg-white border-y border-gray-300">  <!-- GANTI dari bg-gray-300 jadi bg-white -->
                    <tr>
                        <th class="px-4 py-2 w-1/4"></th> <!-- Kolom kosong -->
                        <th class="px-4 py-2">Nama Obat</th>
                        <th class="px-4 py-2">Tanggal Kadaluarsa</th>
                        <th class="px-4 py-2">No Fraktur</th>
                        <th class="px-4 py-2">Tanggal Faktur</th>
                        <th class="px-4 py-2">Stok Opname</th>
                        <th class="px-4 py-2">Stok Gudang</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Baris 2 - Pesan kosong -->
                    <tr class="bg-blue-100 border-t border-gray-200">
                        <td colspan="7" class="px-4 py-2 text-center text-gray-700">Tidak ada yang tersedia pada tabel ini</td>
                    </tr>

                    <!-- Baris 3 - Kosong putih -->
                    <tr class="bg-white border-t border-gray-200">
                        <td colspan="7" class="px-4 py-4"></td>
                    </tr>

                    <!-- Baris 4 - Info entri -->
                    <thead class="bg-white border-y border-gray-300">
                    <tr class="bg-white border-t border-gray-200">
                        <td colspan="7" class="px-4 py-2 text-sm text-gray-600">Menampilkan 2 sampai 2 dari 2 entri</td>
                    </tr>
                    </thead>
                    </tbody>

                </table>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-end space-x-4 mt-6">
                <button class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Sebelumnya</button>
                <button class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Selanjutnya</button>
            </div>
        </main>
    </div>

    <div class="modal fade" id="addRincianObatModal" tabindex="-1" aria-labelledby="addRincianObatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addRincianObatModalLabel">Kelola Obat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRincianObat">
                        <div class="mb-3">
                            <label for="no_faktur" class="col-form-label">No Faktur:</label>
                            <input type="text" class="form-control" id="no_faktur" name="no_faktur">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_faktur" class="col-form-label">Tanggal Faktur:</label>
                            <input type="date" class="form-control" id="tanggal_faktur" name="tanggal_faktur">
                        </div>
                        <div id="obatList">
                            <div class="obat-item mb-3">
                                <label for="id_obat" class="col-form-label">Obat:</label>
                                <select class="form-control" id="id_obat" name="id_obat[]">
                                    <option value="">Pilih Obat</option>
                                </select>
                            </div>
                            <div class="obat-item mb-3">
                                <label for="tanggal_kadaluarsa" class="col-form-label">Tanggal Kadaluarsa:</label>
                                <input type="date" class="form-control" name="tanggal_kadaluarsa[]">
                            </div>
                            <div class="obat-item mb-3">
                                <label for="stok_opname" class="col-form-label">Stok Opname:</label>
                                <input type="number" class="form-control" name="stok_opname[]">
                            </div>
                            <div class="obat-item mb-3">
                                <label for="stok_gudang" class="col-form-label">Stok Gudang:</label>
                                <input type="number" class="form-control" name="stok_gudang[]">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" id="tambahObat">Tambah Obat</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitForm">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('build/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script>
        function showTab(id, event) {
            const tabs = document.querySelectorAll('.tab-content');
            const buttons = document.querySelectorAll('.tab-btn');

            tabs.forEach(tab => {
                tab.classList.remove('block');
                tab.classList.add('hidden');
                tab.classList.remove('opacity-100');
                tab.classList.add('opacity-0');
            });

            const activeTab = document.getElementById(id);
            activeTab.classList.remove('hidden');
            setTimeout(() => {
                activeTab.classList.add('opacity-100');
            }, 10);

            buttons.forEach(btn => {
                btn.classList.remove('bg-white', 'border-b-4', 'border-blue-500', 'text-blue-900');
                btn.classList.add('bg-blue-200', 'text-blue-800');
            });

            const clickedButton = event.target;
            clickedButton.classList.remove('bg-blue-200', 'text-blue-800');
            clickedButton.classList.add('bg-white', 'border-b-4', 'border-blue-500', 'text-blue-900');
        }

        function loadRingkasanObat() {
            $("#ringkasan table.table").DataTable().destroy();
            $("#ringkasan table.table").DataTable({
                deferRender: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ordering: false,
                dom: 'lBfrtip',
                ajax: {
                    url: "{{ route('api.obat.index') }}",
                    type: "GET",
                    data: {
                        sort: "ASC"
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataSrc: "data"
                },
                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1 + '.';
                        }
                    },
                    { data: 'nama' },
                    { data: 'stok' },
                    { data: 'stok' },
                    { data: 'stok' },
                ],
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-primary mt-2 mb-2'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary mt-2 mb-2'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary mt-2 mb-2'
                    }
                ]
            });
        }

        function loadRincianObat() {
            $("#rincian table.table").DataTable().destroy();
            $("#rincian table.table").DataTable({
                deferRender: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ordering: false,
                dom: 'lBfrtip',
                ajax: {
                    url: "{{ route('api.obat.rincian') }}",
                    type: "GET",
                    data: {
                        sort: "ASC"
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataSrc: "data"
                },
                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1 + '.';
                        }
                    },
                    { data: 'nama_obat' },
                    { data: 'tanggal_kadaluarsa' },
                    { data: 'no_faktur' },
                    { data: 'tanggal_faktur' },
                    { data: 'stok_opname' },
                    { data: 'stok_gudang' },
                ],
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-primary mt-2 mb-2'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary mt-2 mb-2'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary mt-2 mb-2'
                    }
                ]
            });
        }

        loadRincianObat();
        loadRingkasanObat();

        function loadObat()
        {
            $.ajax({
                url: "{{ route('api.obat.index') }}",
                method: 'GET',
                success: function(response) {
                    var obatOptions = '';
                    $.each(response.data, function(index, obat) {
                        obatOptions += `<option value="${obat.id}">${obat.nama}</option>`;
                    });
                    $('#obatList .obat-item:last-child select').html(obatOptions);
                }
            });
        }
        loadObat();

        $('#tambahObat').click(function() {
            var newObatItem = `
                <div class="obat-item mb-3">
                    <label for="obat_id" class="col-form-label">Obat:</label>
                    <select class="form-control" name="obat_id[]">
                        <option value="">Pilih Obat</option>
                        <!-- Dinamis - Obat akan dimuat di sini -->
                    </select>
                </div>
                <div class="obat-item mb-3">
                    <label for="tanggal_kadaluarsa" class="col-form-label">Tanggal Kadaluarsa:</label>
                    <input type="date" class="form-control" name="tanggal_kadaluarsa[]">
                </div>
                <div class="obat-item mb-3">
                    <label for="stok_opname" class="col-form-label">Stok Opname:</label>
                    <input type="number" class="form-control" name="stok_opname[]">
                </div>
                <div class="obat-item mb-3">
                    <label for="stok_gudang" class="col-form-label">Stok Gudang:</label>
                    <input type="number" class="form-control" name="stok_gudang[]">
                </div>
            `;

            $('#obatList').append(newObatItem);
            loadObat();
        });
    </script>
</body>
</html>
