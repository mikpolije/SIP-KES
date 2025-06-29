@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
@endsection

@section('pageContent')
    <div class="container-fluid" id="all-content">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Data Resep Obat</h1>
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
                                <input type="text" class="form-control search-bar me-2" id="no_rm" placeholder="Masukkan No.RM"
                                    style="width: 250px;">
                                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
                                <button class="btn btn-primary search-button" id="cari_data_pasien">Cari</button>
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
                                <input type="text" class="form-control required" id="no_antrian" name="no_antrian"/>
                            </div>
                        </div>

                        <!-- No. RM -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="participants3">No. RM:</label>
                                <input type="text" class="form-control required" id="no_rm_display" disabled/>
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label" for="participants3">Nama:</label>
                                <input type="text" class="form-control required" id="nama_pemeriksaan" disabled/>
                            </div>
                        </div>

                        <!-- Tanggal Penyerahan -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="tlwali">Tanggal Penyerahan:</label>
                                <input type="date" class="form-control required" id="tlwali" name="tanggal_penyerahan" />
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
                            <div class="d-flex mb-3 position-relative">
                                <input type="text" class="form-control me-2" id="cari-obat" placeholder="Cari Obat (minimal 2 huruf)" style="width: 67%;">
                                <div id="hasil-search-obat" class="list-group position-absolute" style="top: 100%; z-index: 1000; width: 100%; display: none;"></div>
                                <button class="btn btn-primary btn-3d me-auto" onclick="tambahObat()">
                                    <i class="ti ti-plus"></i> Tambah
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
                                        <th class="text-light">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-obat">
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
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
                                <tbody id="tabel-pengambilan-obat">
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
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
                                <textarea name="catatan" id="decisions3" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- OPTION BUTTON -->
                    <div class="row mb-9 justify-content-end">
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-3d" style="margin-right: 10px;"
                                onclick="window.location.href='{{ url('main/dataobat') }}'">Sebelumnya</button>
                            <button type="button" class="btn btn-success btn-3d" id="simpan-draf" style="margin-right: 10px;">Simpan
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function printTables() {
            const noAntrian = document.getElementById('no_antrian').value || '-';
            const noRM = document.getElementById('no_rm_display').value || '-';
            const namaPasien = document.getElementById('nama_pemeriksaan').value || '-';
            const tanggalPenyerahan = document.querySelector('input[name="tanggal_penyerahan"]').value || '-';
            const catatan = document.querySelector('textarea[name="catatan"]').value || '-';
            
            let table1Content = `
                <table>
                    <thead>
                        <tr>
                            <th>Jumlah</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            
            const table1Rows = document.querySelectorAll('#tabel-obat tr.item-tabel-obat');
            if (table1Rows.length === 0) {
                table1Content += '<tr><td colspan="3" class="text-center">Tidak Ada Data</td></tr>';
            } else {
                table1Rows.forEach(row => {
                    const jumlah = row.querySelector('input[name="jumlah[]"]')?.value || '-';
                    const namaObat = row.cells[1]?.textContent || '-';
                    const harga = row.cells[2]?.textContent || '-';
                    
                    table1Content += `
                        <tr>
                            <td>${jumlah}</td>
                            <td>${namaObat}</td>
                            <td>${harga}</td>
                        </tr>
                    `;
                });
            }
            table1Content += '</tbody></table>';
            
            let table2Content = `
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            
            const table2Rows = document.querySelectorAll('#tabel-pengambilan-obat tr.item-tabel-pengambilan-obat');
            if (table2Rows.length === 0) {
                table2Content += '<tr><td colspan="4" class="text-center">Tidak Ada Data</td></tr>';
            } else {
                table2Rows.forEach(row => {
                    const tanggal = row.querySelector('input[name="tanggal[]"]')?.value || '-';
                    const jumlah = row.cells[1]?.textContent || '-';
                    const namaObat = row.cells[2]?.textContent || '-';
                    const harga = row.cells[3]?.textContent || '-';
                    
                    table2Content += `
                        <tr>
                            <td>${tanggal}</td>
                            <td>${jumlah}</td>
                            <td>${namaObat}</td>
                            <td>${harga}</td>
                        </tr>
                    `;
                });
            }
            table2Content += '</tbody></table>';
            
            const printWindow = window.open('', '', 'width=800,height=600');
            
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Data Resep Obat - Print</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                            color: #333;
                        }
                        .header {
                            text-align: center;
                            margin-bottom: 30px;
                            border-bottom: 2px solid #333;
                            padding-bottom: 20px;
                        }
                        .header h1 {
                            color: #111754;
                            font-size: 24px;
                            margin: 0;
                        }
                        .patient-info {
                            margin-bottom: 30px;
                            border: 1px solid #ddd;
                            padding: 15px;
                            border-radius: 5px;
                            background-color: #f9f9f9;
                        }
                        .patient-info h3 {
                            margin-top: 0;
                            color: #111754;
                            border-bottom: 1px solid #ddd;
                            padding-bottom: 10px;
                        }
                        .info-row {
                            display: flex;
                            margin-bottom: 8px;
                        }
                        .info-label {
                            font-weight: bold;
                            width: 150px;
                            display: inline-block;
                        }
                        .info-value {
                            flex: 1;
                        }
                        .section-title {
                            color: #111754;
                            font-size: 18px;
                            margin: 30px 0 15px 0;
                            border-bottom: 1px solid #333;
                            padding-bottom: 5px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 30px;
                            font-size: 12px;
                        }
                        table, th, td {
                            border: 1px solid #333;
                        }
                        th {
                            background-color: #343a40;
                            color: white;
                            padding: 10px;
                            text-align: center;
                            font-weight: bold;
                        }
                        td {
                            padding: 8px;
                            text-align: center;
                        }
                        tr:nth-child(even) {
                            background-color: #f8f9fa;
                        }
                        .notes {
                            border: 1px solid #ddd;
                            padding: 15px;
                            border-radius: 5px;
                            background-color: #f9f9f9;
                            margin-top: 20px;
                        }
                        .notes h4 {
                            margin-top: 0;
                            color: #111754;
                        }
                        .print-date {
                            text-align: right;
                            font-size: 10px;
                            color: #666;
                            margin-top: 30px;
                        }
                        @media print {
                            body { margin: 0; }
                            .patient-info, .notes { background-color: #f9f9f9 !important; }
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>DATA RESEP OBAT</h1>
                    </div>
                    
                    <div class="patient-info">
                        <h3>Informasi Pasien</h3>
                        <div class="info-row">
                            <span class="info-label">No. Antrian:</span>
                            <span class="info-value">${noAntrian}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">No. RM:</span>
                            <span class="info-value">${noRM}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Nama Pasien:</span>
                            <span class="info-value">${namaPasien}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Tanggal Penyerahan:</span>
                            <span class="info-value">${tanggalPenyerahan}</span>
                        </div>
                    </div>
                    
                    <h2 class="section-title">Rincian Obat</h2>
                    ${table1Content}
                    
                    <h2 class="section-title">Data Pengambilan Obat</h2>
                    ${table2Content}
                    
                    ${catatan ? `
                    <div class="notes">
                        <h4>Catatan:</h4>
                        <p>${catatan.replace(/\n/g, '<br>')}</p>
                    </div>
                    ` : ''}
                    
                    <div class="print-date">
                        Dicetak pada: ${new Date().toLocaleString('id-ID')}
                    </div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
            
            setTimeout(() => {
                printWindow.print();
                
                printWindow.onafterprint = function() {
                    printWindow.close();
                };
            }, 500);
        }
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '#cari_data_pasien', function (e) {
                let eThis = $(this)
                let no_rm = $('#no_rm').val()

                if (!no_rm) {
                    errorMessage('No.RM tidak boleh kosong')
                    return
                }

                eThis.prop('disabled', true)
                eThis.html('Loading...')

                $.ajax({
                    url: "{{ route('api.poli-kia.show', ':noRm') }}".replace(':noRm', no_rm),
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).done(function (res) {
                    let data = res.data
                    $('#nama_pemeriksaan').val(data.data_pasien.nama_pasien)
                    $('#no_rm_display').val(data.data_pasien.no_rm)
                    $('#id_pendaftaran').val(data.id_pendaftaran)

                    if (data.pengambilan_obat) {
                        $('[name="no_antrian"]').val(data.pengambilan_obat.no_antrian)
                        $('[name="tanggal_penyerahan"]').val(data.pengambilan_obat.tanggal_penyerahan)
                        $('[name="catatan"]').html(data.pengambilan_obat.catatan)

                        if (data.pengambilan_obat.detail_pengambilan_obat.length > 0) {
                            $('#tabel-obat').html('')
                            $('#tabel-pengambilan-obat').html('')
                            data.pengambilan_obat.detail_pengambilan_obat.forEach((obat, index) => {
                                let random = Math.random().toString(36).substring(7);
                                let nama = obat.detail_pembelian_obat.obat.nama
                                let harga = obat.detail_pembelian_obat.obat.harga
                                $('#tabel-obat').append(`
                                    <tr class="item-tabel-obat parent-multiple-data" data-id="${obat.detail_pembelian_obat.id}">
                                        <td>
                                            <input type="hidden" name="id_detail_pembelian_obat[]" value="${obat.detail_pembelian_obat.id}">
                                            <input type="number" class="form-control" name="jumlah[]" value="${obat.jumlah}" min="1" id="${random}">
                                            <input type="hidden" name="harga[]" value="${harga}">
                                        </td>
                                        <td>${nama} (Exp ${obat.detail_pembelian_obat.tanggal_kadaluarsa})</td>
                                        <td>${harga}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" onclick="hapusObat('${obat.detail_pembelian_obat.id}')">Hapus</button>
                                        </td>
                                    </tr>
                                `)

                                $('#tabel-pengambilan-obat').append(`
                                    <tr class="item-tabel-pengambilan-obat parent-multiple-data" data-id="${obat.detail_pembelian_obat.id}">
                                        <td>
                                            <input type="date" class="form-control" name="tanggal[]" value="${obat.tanggal}">
                                        </td>
                                        <td>
                                            <span class="${random}">${obat.jumlah}</span>
                                        </td>
                                        <td>${nama} (Exp ${obat.detail_pembelian_obat.tanggal_kadaluarsa})</td>
                                        <td>${harga}</td>
                                    </tr>
                                `)
                            })
                        }
                    } else {
                        $('[name="no_antrian"]').val('')
                        $('[name="tanggal_penyerahan"]').val('')
                        $('[name="catatan"]').html('')
                        $('#tabel-obat').html(`
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        `)
                        $('#tabel-pengambilan-obat').html(`
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        `)
                    }
                }).fail(function (xhr, status, error) {
                    errorMessage(xhr.responseJSON.message)
                }).always(function () {
                    eThis.prop('disabled', false)
                    eThis.html('Cari')
                })
            });

            $(document).on('click', '.btn-delete-obat', function () {
                const id = $(this).data('id');

                $(`#tabel-obat tr[data-id="${id}"]`).remove();
                $(`#tabel-pengambilan-obat tr[data-id="${id}"]`).remove();
            });
        });

        let timer = null;

        $('#cari-obat').on('input', function() {
            clearTimeout(timer);

            const query = $(this).val();
            if (query.length < 2) {
                $('#hasil-search-obat').hide().empty();
                return;
            }

            timer = setTimeout(() => {
                $.ajax({
                    url: "{{ route('api.obat.detail-pembelian') }}",
                    method: 'GET',
                    data: { search: query },
                    success: function(response) {
                        $('#hasil-search-obat').empty();

                        if (response.data.length === 0) {
                            $('#hasil-search-obat').hide();
                            return;
                        }

                        response.data.forEach(obat => {
                            $('#hasil-search-obat').append(`
                                <button type="button" class="list-group-item list-group-item-action" onclick="pilihObat('${obat.obat.nama} (Exp ${obat.tanggal_kadaluarsa} ~ Stok ${obat.stok_gudang})', '${obat.id}', '${obat.obat.harga}')">
                                    ${obat.obat.nama} (Exp ${obat.tanggal_kadaluarsa} ~ Stok ${obat.stok_gudang})
                                </button>
                            `);
                        });

                        $('#hasil-search-obat').show();
                    }
                });
            }, 300);
        });

        function pilihObat(nama, id, harga) {
            $('#cari-obat').val(nama);
            $('#hasil-search-obat').hide().empty();
            $('#cari-obat').attr('data-id', id);
            $('#cari-obat').attr('data-harga', harga);
        }

        function searchobat() {
            $('#cari-obat').trigger('input');
        }

        function tambahObat() {
            const nama = $('#cari-obat').val();
            const harga = $('#cari-obat').attr('data-harga');
            const id = $('#cari-obat').attr('data-id');

            if (!id) {
                errorMessage('Pilih obat dari daftar terlebih dahulu.');
                return;
            }

            let random = Math.floor(Math.random() * 100000000) + 1;

            if ($('#tabel-obat .item-tabel-obat').length == 0) {
                $('#tabel-obat').html('')
            }

            $('#tabel-obat').append(`
                <tr class="item-tabel-obat parent-multiple-data" data-id="${id}">
                    <td>
                        <input type="hidden" name="id_detail_pembelian_obat[]" value="${id}">
                        <input type="number" class="form-control" name="jumlah[]" value="1" min="1" id="${random}">
                        <input type="hidden" name="harga[]" value="${harga}">
                    </td>
                    <td>${nama}</td>
                    <td>${harga}</td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="hapusObat('${id}')">Hapus</button>
                    </td>
                </tr>
            `)

            if ($('#tabel-pengambilan-obat .item-tabel-pengambilan-obat').length == 0) {
                $('#tabel-pengambilan-obat').html('')
            }

            $('#tabel-pengambilan-obat').append(`
                <tr class="item-tabel-pengambilan-obat parent-multiple-data" data-id="${id}">
                    <td>
                        <input type="date" class="form-control" name="tanggal[]">
                    </td>
                    <td>
                        <span class="${random}">1</span>
                    </td>
                    <td>${nama}</td>
                    <td>${harga}</td>
                </tr>
            `)
        }

        function hapusObat(id) {
            $(`.parent-multiple-data[data-id="${id}"]`).remove();

            if ($('#tabel-obat tr').length == 0) {
                $('#tabel-obat').html(`
                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                    </tr>
                `)
                $('#tabel-pengambilan-obat').html(`
                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                    </tr>
                `)
            }
        }

        $(document).on('input', 'input[name="jumlah[]"]', function (e) {
            const id = $(this).attr('id');
            const value = $(this).val();
            $(`.${id}`).text(value);
        })

        $(document).on('click', '#simpan-draf', function (e) {
            let eThis = $(this)
            eThis.prop('disabled', true)
            eThis.html('Loading...')
            let id = $('#no_rm').val()

            if (id == '') {
                errorMessage('Pilih pasien terlebih dahulu.')
                eThis.prop('disabled', false)
                eThis.html('Simpan Draf')
                return
            }

            let data = {
                no_antrian: $('input[name="no_antrian"]').val(),
                tanggal_penyerahan: $('input[name="tanggal_penyerahan"]').val(),
                catatan: $('textarea[name="catatan"]').val(),
            }

            $('#tabel-obat').find('.item-tabel-obat').each(function (index, item) {
                data[`id_detail_pembelian_obat[${index}]`] = $(item).find('input[name="id_detail_pembelian_obat[]"]').val()
                data[`jumlah[${index}]`] = $(item).find('input[name="jumlah[]"]').val()
                data[`harga[${index}]`] = $(item).find('input[name="harga[]"]').val()
            })

            $('#tabel-pengambilan-obat').find('.item-tabel-pengambilan-obat').each(function (index, item) {
                data[`tanggal[${index}]`] = $(item).find('input[name="tanggal[]"]').val()
            })

            $.ajax({
                url: `{{ route('api.obat.pengambilan', ':id') }}`.replace(':id', id),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data
            }).done(function (res) {
                successMessage(res.message)
            }).fail(function (xhr, status, error) {
                let errors = xhr.responseJSON.errors
                errorMessage(xhr.responseJSON.message)
                if (errors != undefined) {
                    showErrorsOnFields(errors, 'all-content')
                }
            }).always(function () {
                eThis.prop('disabled', false)
                eThis.html('Simpan Draf')
            })
        })



        $(document).on('input change', 'input, select, textarea', function () {
            let name = $(this).attr('name');
            if (!name) {
                return;
            }
            if (name.includes('[]')) {
                let index = $(this).closest('.parent-multiple-data').index();

                $(`#error-${name.replace('[]', '')}_${index}`).remove();
            } else {
                $(`#error-${name}`).remove();
            }
        });
        function setFieldValue(id, value) {
            $(`${id}`).val(value ?? '').trigger('change');
        }
        function showErrorsOnFields(errors, id, scrollTop = true) {
            for (const [key, value] of Object.entries(errors)) {
                let input;

                if (key.includes('.')) {
                    const [base, index] = key.split('.');

                    $(`#${id} [name="${base}[]"]`).each((i, el) => {
                        if (parseInt(index) === i) {
                            input = $(el);
                        }
                    });
                } else {
                    input = $(`#${id} [name="${key}"], #${id} [name="${key}[]"]`);
                }

                if (input.is(':radio') || input.is(':checkbox')) {
                    const lastRadio = input.last();
                    lastRadio.closest('.form-check-inline, .form-check').next('.text-danger').remove();
                    lastRadio.closest('.form-check-inline, .form-check').after(`<div class="text-danger text-sm" id="error-${key.replace('.', '_')}">${value[0]}</div>`);
                } else {
                    const target = input.closest('.input-group').length > 0
                        ? input.closest('.input-group')
                        : input;

                    target.next('.text-danger').remove();
                    target.after(`<div class="text-danger text-sm" id="error-${key.replace('.', '_')}">${value[0]}</div>`);
                }
            }

            if (scrollTop) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        }
        function errorMessage(msg) {
            toastr.error('Gagal', msg, {
                positionClass: 'toast-top-right',
                timeOut: 3000,
                progressBar: true,
                closeButton: true,
            });
        }
        function successMessage(msg) {
            toastr.success('Berhasil', msg, {
                positionClass: 'toast-top-right',
                timeOut: 3000,
                progressBar: true,
                closeButton: true,
            });
        }
    </script>
@endsection
