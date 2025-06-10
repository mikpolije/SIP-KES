@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('css')
    <style>
        /* 3D Input Styling */
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
        }

        .form-control:focus {
            outline: none;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
        }

        .form-select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 8px 12px;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2), -3px -3px 8px rgba(255, 255, 255, 0.1);
        }

        .form-select:focus {
            outline: none;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3), -2px -2px 6px rgba(255, 255, 255, 0.2);
        }

        .btn-3d {
            border: none;
            border-radius: 5px;
            color: white;
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

        /* Smaller font size for titles */
        .title2 {
            font-size: 2rem;
            /* Reduced from 3rem */
        }

        .title3 {
            font-size: 1.5rem;
            /* Reduced from 2rem */
        }

        /* Smaller font size for form labels and inputs */
        .form-label {
            font-size: 0.9rem;
            /* Reduced font size */
        }

        .form-control {
            font-size: 0.9rem;
            /* Reduced font size */
            padding: 8px;
            /* Adjusted padding */
        }

        .form-select {
            font-size: 0.9rem;
            /* Reduced font size */
            padding: 6px 10px;
            /* Adjusted padding */
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

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title1">Laporan Kunjungan</h1>
                <style>
                    .title1 {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 2rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
                        margin-bottom: 40px;
                    }
                </style>

                <section>
                    <div class="row">
                        <!-- Kriteria Pencarian -->
                        <div class="col-md-4">
                            <h1 class="title2">Kriteria Pencarian</h1>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_awal">Tanggal Awal:</label>
                                <input type="date" class="form-control required" id="tanggal_awal" name="tanggal_awal"
                                    style="width: 150px;" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_akhir">Tanggal Akhir:</label>
                                <input type="date" class="form-control required" id="tanggal_akhir" name="tanggal_akhir"
                                    style="width: 150px;" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="layanan">Pilih Layanan:</label>
                                <select class="form-select" id="layanan" name="layanan" style="width: 200px;">
                                    <option value="">-- Semua Layanan --</option>
                                    <option value="Poli Umum">Poli Umum</option>
                                    <option value="KIA">KIA</option>
                                    <option value="UGD">UGD</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Circum">Circum</option>
                                    <option value="Vaksin Internasional">Vaksin Internasional</option>
                                </select>
                            </div>
                            
                            <button type="button" class="btn btn-info btn-3d" id="tampilkan-data"
                                style="margin-top: 20px;">Tampilkan
                                Data</button>
                        </div>

                        <!-- Grafik Laporan Layanan -->
                        <div class="col-md-7">
                            <h1 class="title2">Grafik Laporan Layanan</h1>
                            <div class="card shadow mt-2 p-3" id="card-laporan">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- People Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                        fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                    </svg>
                                    <!-- Jumlah Kunjungan Text -->
                                    <h1 class="title3 mb-0">Jumlah Kunjungan: <span id="jumlah-kunjungan">-</span></h1>
                                </div>
                                <p class="text-center mb-0 mt-1" id="tanggal-laporan"></p>

                                <!-- Chart Container -->
                                <div id="chart-container" style="margin-top: 10px; display: none;">
                                    <canvas id="chart"></canvas>
                                </div>
                            </div>
                        </div>


                        <!-- OPTION BUTTON -->
                        <div class="row mb-9 justify-content-end">
                            <div class="col-md-8 d-flex justify-content-end">
                                <button type="button" class="btn btn-warning btn-3d" style="margin-right: 10px;"
                                    onclick="printChartAsTable()">Cetak</button>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Tambahkan ini jika jQuery belum terpasang -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#tampilkan-data', function() {
                let eThis = $(this);
                eThis.prop('disabled', true).html('Loading...');

                let tanggal_awal = $('#tanggal_awal').val();
                let tanggal_akhir = $('#tanggal_akhir').val();
                let layanan = $('#layanan').val();

                if (!tanggal_awal || !tanggal_akhir) {
                    alert('Silakan pilih Tanggal Awal dan Tanggal Akhir terlebih dahulu.');
                    eThis.prop('disabled', false).html('Tampilkan Data');
                    return;
                }

                $.ajax({
                    url: "{{ route('api.kunjungan.report') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tanggal_awal: tanggal_awal,
                        tanggal_akhir: tanggal_akhir,
                        layanan: layanan
                    },
                    success: function(res) {
                        console.log(res);
                        if (!res.data || res.data.length === 0) {
                            $('#jumlah-kunjungan').text('0');
                            $('#tanggal-laporan').html(`${tanggal_awal} - ${tanggal_akhir}`);
                            $('#chart-container').hide();
                            alert("Data tidak ditemukan untuk rentang tanggal tersebut.");
                            return;
                        }

                        $('#tanggal-laporan').html(`${tanggal_awal} - ${tanggal_akhir}`);

                        let labels = [];
                        let values = [];
                        let total = 0;

                        res.data.forEach(item => {
                            labels.push(item.jenis_pemeriksaan);
                            values.push(item.total);
                            total += item.total;
                        });

                        $('#jumlah-kunjungan').text(total);
                        $('#chart-container').hide().fadeIn(600);

                        if (window.myChart) window.myChart.destroy();

                        const ctx = document.getElementById('chart').getContext('2d');
                        window.myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Kunjungan',
                                    data: values,
                                    backgroundColor: '#2196F3',
                                    borderRadius: 10
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1
                                        }
                                    }
                                }
                            }
                        });
                    },
                    error: function(xhr) {
                        alert("Gagal mengambil data. Pastikan route dan backend siap.");
                    },
                    complete: function() {
                        eThis.prop('disabled', false).html('Tampilkan Data');
                    }
                });
            });
        });
    </script>
@endsection
