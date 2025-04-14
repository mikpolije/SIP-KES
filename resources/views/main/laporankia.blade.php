@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title1">Laporan KIA</h1>
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
                                <label class="form-label" for="tlwali">Tanggal Awal:</label>
                                <input type="date" class="form-control required" id="tlwali" name="tlwali"
                                    style="width: 150px;" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tlwali">Tanggal Akhir:</label>
                                <input type="date" class="form-control required" id="tlwali" name="tlwali"
                                    style="width: 150px;" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="decisions3">Jenis Pemeriksaan:</label>
                                <select class="form-select" aria-label="Default select example" style="width: 150px;">
                                    <option selected>Ibu</option>
                                    <option value="1">Anak</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-info btn-3d" style="margin-top: 20px;">Tampilkan
                                Data</button>
                        </div>

                        <!-- Grafik Laporan Layanan -->
                        <div class="col-md-6">
                            <h1 class="title2">Grafik Laporan Layanan</h1>
                            <div class="d-flex align-items-center">
                                <!-- People Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                    class="bi bi-people me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                </svg>
                                <!-- Jumlah Kunjungan Text -->
                                <h1 class="title3 mb-0">Jumlah Kunjungan:</h1>
                            </div>

                            <!-- Chart Container -->
                            <div id="chart-container" style="margin-top: 20px; display: none;">
                                <canvas id="chart"></canvas>
                            </div>
                        </div>

                        <!-- Grafik -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.querySelector('.btn-info').addEventListener('click', function () {
                                // Get the selected value from the dropdown
                                const jenisPemeriksaan = document.querySelector('.form-select').value;

                                // Show the chart container
                                document.getElementById('chart-container').style.display = 'block';

                                // Generate chart data based on the selected value
                                const labels = ['Kehamilan', 'KB', 'Persalinan'];
                                let data;
                                let chartLabel;

                                if (jenisPemeriksaan === '1') { // Anak
                                    data = [15, 25, 35, 45, 55];
                                    chartLabel = 'Jumlah Kunjungan (Anak)';
                                } else { // Ibu
                                    data = [10, 20, 30, 40, 50];
                                    chartLabel = 'Jumlah Kunjungan (Ibu)';
                                }

                                // Create or update the chart
                                const ctx = document.getElementById('chart').getContext('2d');
                                if (window.myChart) {
                                    window.myChart.destroy(); // Destroy the existing chart if it exists
                                }
                                window.myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: chartLabel,
                                            data: data,
                                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>

                        <!-- OPTION BUTTON -->
                        <div class="row mb-9 justify-content-end">
                            <div class="col-md-8 d-flex justify-content-end">
                                <button type="button" class="btn btn-warning btn-3d" style="margin-right: 10px;"
                                    onclick="printChartAsTable()">Cetak</button>
                            </div>
                        </div>
                        <script>
                            function printChartAsTable() {
                                // Get the chart data
                                const chart = Chart.getChart('chart'); // Get the chart instance
                                if (!chart) {
                                    alert('No chart data available to print.');
                                    return;
                                }

                                const labels = chart.data.labels; // Get the labels (e.g., months)
                                const data = chart.data.datasets[0].data; // Get the dataset values
                                const datasetLabel = chart.data.datasets[0].label; // Get the dataset label

                                // Create a new window for printing
                                const printWindow = window.open('', '', 'width=800,height=600');

                                // Write the table HTML into the new window
                                printWindow.document.write('<html><head><title>Laporan KIA</title>');
                                printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: left; }</style>');
                                printWindow.document.write('</head><body>');
                                printWindow.document.write('<h3>' + datasetLabel + '</h3>');
                                printWindow.document.write('<table>');
                                printWindow.document.write('<thead><tr><th>Label</th><th>Value</th></tr></thead>');
                                printWindow.document.write('<tbody>');

                                // Loop through the chart data and add rows to the table
                                labels.forEach((label, index) => {
                                    printWindow.document.write('<tr><td>' + label + '</td><td>' + data[index] + '</td></tr>');
                                });

                                printWindow.document.write('</tbody></table>');
                                printWindow.document.write('</body></html>');

                                // Close the document and trigger the print dialog
                                printWindow.document.close();
                                printWindow.print();
                            }
                        </script>
                </section>
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
            </div>
        </div>
    </div>
@endsection