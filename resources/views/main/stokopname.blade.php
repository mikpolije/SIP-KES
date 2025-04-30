@extends('layouts.master')

@section('title', 'SIP-Kes | Stok Opname')

@section('css')
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
@endsection

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <main class="flex-1 p-4">
                <h1 class="text-3xl fw-bold text-dark mb-4">Stok Opname</h1>

                <!-- Nav Pills -->
                <ul class="nav nav-pills mb-3" id="stokTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button onclick="showTab('ringkasan', event)" class="nav-link active" id="ringkasan-tab" data-bs-toggle="pill" data-bs-target="#ringkasan" type="button" role="tab">Data Ringkasan Obat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="showTab('rincian', event)" class="nav-link" id="rincian-tab" data-bs-toggle="pill" data-bs-target="#rincian" type="button" role="tab">Data Rincian Obat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="showTab('akanKadaluarsa', event)" class="nav-link" id="akanKadaluarsa-tab" data-bs-toggle="pill" data-bs-target="#akanKadaluarsa" type="button" role="tab">Obat Akan Kadaluarsa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="showTab('kadaluarsa', event)" class="nav-link" id="kadaluarsa-tab" data-bs-toggle="pill" data-bs-target="#kadaluarsa" type="button" role="tab">Obat Kadaluarsa</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content p-3 bg-white shadow rounded-3" id="stokTabContent">
                    <div class="tab-pane fade show active" id="ringkasan" role="tabpanel">
                        <table class="table table-bordered nowrap">
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

                    <div class="tab-pane fade" id="rincian" role="tabpanel">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRincianObatModal">
                                <i class="fas fa-plus me-2"></i>Tambah Rincian Obat
                            </button>
                        </div>
                        <table class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>No Fraktur</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Stok Opname</th>
                                    <th>Stok Gudang</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="akanKadaluarsa" role="tabpanel">
                        <table class="table table-bordered nowrap">
                            <thead>
                                <tr>
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

                    <div class="tab-pane fade" id="kadaluarsa" role="tabpanel">
                        <table class="table table-bordered nowrap">
                            <thead>
                                <tr>
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
                </div>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button class="btn btn-info text-white">Sebelumnya</button>
                    <button class="btn btn-info text-white">Selanjutnya</button>
                </div>
            </main>
        </div>
    </div>


    <div class="modal fade" id="addRincianObatModal" tabindex="-1" aria-labelledby="addRincianObatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                        <div class="mb-1">
                            <label class="col-form-label">Rincian Obat</label>
                        </div>
                        <div id="obatList">
                        </div>
                        <button type="button" class="btn btn-secondary" id="tambahObat">Tambah Obat</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitRincianObat">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="koreksiModal" tabindex="-1" aria-labelledby="koreksiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="koreksiModalLabel">Form Koreksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="formKoreksiObat">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Faktur</label>
                                <input type="text" class="form-control" name="no_faktur" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_koreksi" class="form-label">Tanggal Koreksi</label>
                            <input type="date" class="form-control" id="tanggal_koreksi" name="tanggal_koreksi">
                        </div>

                        <div class="row">
                            <div class="card col-md-6 mb-3">
                                <div class="card-header bg-secondary text-white">
                                    Stok Opname
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6 mb-3">
                                        <label for="stok_opname_saat_ini" class="form-label">Stok Saat Ini</label>
                                        <input type="number" class="form-control" id="stok_opname_saat_ini" name="stok_opname_saat_ini" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="stok_opname_baru" class="form-label">Stok Baru</label>
                                        <input type="number" class="form-control" id="stok_opname_baru" name="stok_opname_baru">
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6 mb-3">
                                <div class="card-header bg-secondary text-white">
                                    Stok Gudang
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6 mb-3">
                                        <label for="stok_gudang_saat_ini" class="form-label">Stok Saat Ini</label>
                                        <input type="number" class="form-control" id="stok_gudang_saat_ini" name="stok_gudang_saat_ini" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="stok_gudang_baru" class="form-label">Stok Baru</label>
                                        <input type="number" class="form-control" id="stok_gudang_baru" name="stok_gudang_baru">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alasan_koreksi" class="form-label">Alasan</label>
                            <textarea class="form-control" id="alasan_koreksi" name="alasan_koreksi" rows="3"></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitKoreksiObat">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('build/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script>
        function showTab(id, event) {
            switch (id) {
                case "ringkasan":
                    loadRingkasanObat();
                    break;

                case "rincian":
                    loadRincianObat();
                    break;

                case "akanKadaluarsa":
                    loadObatAkanKadaluarsa();
                    break;

                case "kadaluarsa":
                    loadObatKadaluarsa();
                    break;

                default:
                    break;
            }
        }

        function loadObat(selectElement) {
            $.ajax({
                url: "{{ route('api.obat.index') }}",
                method: 'GET',
                success: function(response) {
                    var options = '<option value="">Pilih Obat</option>';
                    $.each(response.data, function(index, obat) {
                        options += `<option value="${obat.id}">${obat.nama}</option>`;
                    });
                    selectElement.html(options);
                }
            });
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
                    { data: 'stok_opname' },
                    { data: 'stok_gudang' },
                    { data: 'stok_opname' },
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
            $('#rincian table.table').DataTable({
                deferRender: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ordering: false,
                dom: 'lBfrtip',
                ajax: {
                    url: "{{ route('api.obat.rincian') }}",
                    type: "GET",
                    dataSrc: function (json) {
                        const rows = [];

                        json.data.forEach(group => {
                            let total_stok_opname = 0
                            let total_stok_gudang = 0
                            group.details.forEach(detail => {
                                rows.push({
                                    is_group: false,
                                    nama_obat: group.nama_obat,
                                    tanggal_kadaluarsa: detail.tanggal_kadaluarsa,
                                    no_faktur: detail.no_faktur,
                                    tanggal_faktur: detail.tanggal_faktur,
                                    stok_opname: detail.stok_opname,
                                    stok_gudang: detail.stok_gudang,
                                    aksi: `
                                        <button class="btn btn-sm btn-warning koreksi-btn" data-bs-toggle="modal" data-bs-target="#koreksiModal"
                                            data-id="${detail.id_detail_pembelian_obat}"
                                            data-no_faktur="${detail.no_faktur}"
                                            data-nama_obat="${group.nama_obat}"
                                            data-stok_opname="${detail.stok_opname}"
                                            data-stok_gudang="${detail.stok_gudang}"
                                        >Koreksi</button>`
                                });

                                total_stok_opname+=detail.stok_opname
                                total_stok_gudang+=detail.stok_gudang
                            });

                            rows.push({
                                is_group: true,
                                nama_obat: `<strong>Total ${group.nama_obat}</strong>`,
                                tanggal_kadaluarsa: '',
                                no_faktur: '',
                                tanggal_faktur: '',
                                stok_opname: total_stok_opname,
                                stok_gudang: total_stok_gudang,
                                aksi: ''
                            });
                        });

                        return rows;
                    }
                },
                columns: [
                    { data: 'nama_obat' },
                    { data: 'tanggal_kadaluarsa' },
                    { data: 'no_faktur' },
                    { data: 'tanggal_faktur' },
                    { data: 'stok_opname' },
                    { data: 'stok_gudang' },
                    { data: 'aksi' }
                ],
                createdRow: function (row, data, dataIndex) {
                    if (data.is_group) {
                        $(row).addClass('fw-bolder');
                    }
                },
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

        function loadObatAkanKadaluarsa() {
            $("#akanKadaluarsa table.table").DataTable().destroy();
            $("#akanKadaluarsa table.table").DataTable({
                deferRender: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ordering: false,
                dom: 'lBfrtip',
                ajax: {
                    url: "{{ route('api.obat.akan-kadaluarsa') }}",
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
                        render: (res) => {
                            return res.obat.nama
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.tanggal_kadaluarsa
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.pembelian_obat.no_faktur
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.pembelian_obat.tanggal_faktur
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.stok_opname
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.stok_gudang
                        }
                    },
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

        function loadObatKadaluarsa() {
            $("#kadaluarsa table.table").DataTable().destroy();
            $("#kadaluarsa table.table").DataTable({
                deferRender: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ordering: false,
                dom: 'lBfrtip',
                ajax: {
                    url: "{{ route('api.obat.kadaluarsa') }}",
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
                        render: (res) => {
                            return res.obat.nama
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.tanggal_kadaluarsa
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.pembelian_obat.no_faktur
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.pembelian_obat.tanggal_faktur
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.stok_opname
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return res.stok_gudang
                        }
                    },
                    {
                        data: null,
                        render: (res) => {
                            return `<button class="btn btn-sm btn-danger hapus-btn" data-id="${res.id}">Hapus</button>`
                        }
                    },
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

        $(document).ready(function () {
            loadRingkasanObat();
            loadRincianObat();
            loadObatAkanKadaluarsa();
            loadObatKadaluarsa();

            $(document).on('input change', 'input, select, textarea', function () {
                let name = $(this).attr('name');
                if (name.includes('[]')) {
                    let index = $(this).closest('div.parent-multiple-data').index();

                    $(`#error-${name.replace('[]', '')}_${index}`).remove();
                } else {
                    $(`#error-${name}`).remove();
                }
            });

            $('#tambahObat').click(function () {
                var newRow = $(`
                    <div class="parent-multiple-data row obat-item align-items-end mb-2">
                        <div class="col-md-3">
                            <label>Obat:</label>
                            <select class="form-control" name="id_obat[]">
                                <option value="">Pilih Obat</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Kadaluarsa:</label>
                            <input type="date" class="form-control" name="tanggal_kadaluarsa[]">
                        </div>
                        <div class="col-md-2">
                            <label>Stok Opname:</label>
                            <input type="number" class="form-control" name="stok_opname[]">
                        </div>
                        <div class="col-md-2">
                            <label>Stok Gudang:</label>
                            <input type="number" class="form-control" name="stok_gudang[]">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm form-control w-100 remove-obat">-</button>
                        </div>
                    </div>
                `);

                $('#obatList').append(newRow);
                loadObat(newRow.find('select'));
            });

            $(document).on('click', '.remove-obat', function () {
                $(this).closest('.obat-item').remove();
            });

            $('#submitRincianObat').click(function() {
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.html('Loading...')
                var formData = $('#formRincianObat').serialize();

                $.ajax({
                    url: "{{ route('api.obat.rincian.store') }}",
                    method: 'POST',
                    data: formData,
                }).done(function(res) {
                    alert(res.message)
                    loadRincianObat()
                    $('.btn-close').trigger('click')
                    $('#formRincianObat')[0].reset();
                    $('#obatList').empty();
                }).fail(function(xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    if (errors !== undefined) {
                        for (const [key, value] of Object.entries(errors)) {
                            if (key.includes('.')) {
                                const [name, index] = key.split('.');
                                const input = $(`[name="${name}[]"]`).eq(index);

                                const target = input.closest('.input-group').length > 0
                                    ? input.closest('.input-group')
                                    : input;

                                target.next('.text-danger').remove();
                                target.after(`<div class="text-danger text-xs" id="error-${name}_${index}">${value[0]}</div>`);
                            } else {
                                const input = $(`#${key}`);

                                const target = input.closest('.input-group').length > 0
                                    ? input.closest('.input-group')
                                    : input;

                                target.next('.text-danger').remove();
                                target.after(`<div class="text-danger text-xs" id="error-${key}">${value[0]}</div>`);
                            }
                        }
                    } else {
                        alert(xhr.responseJSON.message);
                    }
                }).always(function () {
                    eThis.prop('disabled', false)
                    eThis.html('Simpan')
                })
            });

            $(document).on('click', '.koreksi-btn', function () {
                const id = $(this).attr('data-id');
                const no_faktur = $(this).attr('data-no_faktur');
                const nama_obat = $(this).attr('data-nama_obat');
                const stok_opname = $(this).attr('data-stok_opname');
                const stok_gudang = $(this).attr('data-stok_gudang');

                $('#formKoreksiObat [name="no_faktur"]').val(no_faktur)
                $('#nama_obat').val(nama_obat)
                $('#stok_opname_saat_ini').val(stok_opname)
                $('#stok_gudang_saat_ini').val(stok_gudang)
                $('#stok_opname_baru').val(stok_opname)
                $('#stok_gudang_baru').val(stok_gudang)

                $('#submitKoreksiObat').attr('data-id', id)
            });

            $('#submitKoreksiObat').click(function() {
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.html('Loading...')

                let data = {
                    tanggal_koreksi: $("#tanggal_koreksi").val(),
                    stok_opname_baru: $("#stok_opname_baru").val(),
                    stok_gudang_baru: $("#stok_gudang_baru").val(),
                    alasan_koreksi: $("#alasan_koreksi").val(),
                }

                $.ajax({
                    url: "{{ route('api.obat.rincian.koreksi', ':id') }}".replace(':id', eThis.attr('data-id')),
                    method: 'POST',
                    data: data,
                }).done(function(res) {
                    alert(res.message)
                    loadRincianObat()
                    $('.btn-close').trigger('click')
                    $('#formKoreksiObat')[0].reset();
                }).fail(function(xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    if (errors !== undefined) {
                        for (const [key, value] of Object.entries(errors)) {
                            if (key.includes('.')) {
                                const [name, index] = key.split('.');
                                const input = $(`[name="${name}[]"]`).eq(index);

                                const target = input.closest('.input-group').length > 0
                                    ? input.closest('.input-group')
                                    : input;

                                target.next('.text-danger').remove();
                                target.after(`<div class="text-danger text-xs" id="error-${name}_${index}">${value[0]}</div>`);
                            } else {
                                const input = $(`#${key}`);

                                const target = input.closest('.input-group').length > 0
                                    ? input.closest('.input-group')
                                    : input;

                                target.next('.text-danger').remove();
                                target.after(`<div class="text-danger text-xs" id="error-${key}">${value[0]}</div>`);
                            }
                        }
                    } else {
                        alert(xhr.responseJSON.message);
                    }
                }).always(function () {
                    eThis.prop('disabled', false)
                    eThis.html('Simpan')
                })
            });

            $(document).on('click', '.hapus-btn', function () {
                let eThis = $(this)
                eThis.prop('disabled', true)
                eThis.html('Loading...')

                const id = $(this).attr('data-id');

                if (confirm(`Apakah Anda yakin ingin menghapus obat ini?`)) {
                    $.ajax({
                        url: `{{ route('api.obat.kadaluarsa.delete', ':id') }}`.replace(':id', id),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).done(function (res) {
                        alert(res.message)
                        loadObatKadaluarsa()
                    }).fail(function (xhr, status, error) {
                        alert(xhr.responseJSON.message)
                    }).always(function () {
                        eThis.prop('disabled', false)
                        eThis.html('Hapus')
                    })
                } else {
                    eThis.prop('disabled', false)
                    eThis.html('Hapus')
                }
            });
        });
    </script>
@endsection
