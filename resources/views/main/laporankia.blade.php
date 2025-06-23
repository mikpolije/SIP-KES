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
                                <label class="form-label" for="decisions3">Jenis Pemeriksaan:</label>
                                <select class="form-select" aria-label="Default select example" style="width: 150px;" id="jenis_pemeriksaan">
                                    <option value="semua" selected>Semua</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="anak">Anak</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-info btn-3d" id="tampilkan-data" style="margin-top: 20px;">Tampilkan
                                Data</button>
                        </div>

                        <!-- Grafik Laporan Layanan -->
                        <div class="col-md-7">
                            <h1 class="title2">Grafik Laporan Layanan</h1>
                            <div class="card shadow mt-2 p-3" id="card-laporan">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- People Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                        class="bi bi-people me-2" viewBox="0 0 16 16">
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
                                <button type="button" class="btn btn-warning btn-3d btn-print-report" style="margin-right: 10px;">Cetak</button>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<!-- Grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {
        $('input, select, textarea').on('input change', function () {
            let id = $(this).attr('id');
            $(`#error-${id}`).html('');
        });

        $(document).on('click', '#tampilkan-data', function () {
            let eThis = $(this)
            eThis.prop('disabled', true)
            eThis.html('Loading...')

            let tanggal_awal = $('#tanggal_awal').val()
            let tanggal_akhir = $('#tanggal_akhir').val()
            let jenis_pemeriksaan = $('#jenis_pemeriksaan').val()

            let data = {
                tanggal_awal: tanggal_awal,
                tanggal_akhir: tanggal_akhir,
                jenis_pemeriksaan: jenis_pemeriksaan,
            }

            $.ajax({
                url: "{{ route('api.poli-kia.report') }}",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data
            })
            .done(function (res) {
                $('#tanggal-laporan').html(tanggal_awal && tanggal_akhir ?
                    `${tanggal_awal} - ${tanggal_akhir}` :
                    tanggal_awal ? `Mulai tanggal ${tanggal_awal}` :
                    tanggal_akhir ? `Sampai dengan tanggal ${tanggal_akhir}` :
                    '');

                let data = res.data;

                let labels = [];
                let values = [];
                let total = 0;

                data.forEach(item => {
                    labels.push(item.jenis_pemeriksaan);
                    values.push(item.total);
                    total += item.total;
                });

                $('#jumlah-kunjungan').text(total);

                $('#chart-container').show();

                if (window.myChart) {
                    window.myChart.destroy();
                }

                const ctx = document.getElementById('chart').getContext('2d');
                window.myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Kunjungan',
                            data: values,
                            backgroundColor: ['#2196F3'],
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
            })
            .fail(function (xhr, status, error) {
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
                eThis.html('Tampilkan Data')
            })
        })

        $(document).on('click', '.btn-print-report', function () {
            printChartAsTable();
        })
    })

    function printChartAsTable() {
        if (!window.myChart) {
            alert('Silakan tampilkan data terlebih dahulu sebelum mencetak!');
            return;
        }

        let labels = window.myChart.data.labels;
        let data = window.myChart.data.datasets[0].data;
        let tanggal = $('#tanggal-laporan').text();
        let total = $('#jumlah-kunjungan').text();
        let jenisFilter = $('#jenis_pemeriksaan option:selected').text();
        let chartImage = window.myChart.toBase64Image();

        const printWindow = window.open('', '_blank', 'width=1000,height=700,scrollbars=yes');
        
        if (!printWindow) {
            alert('Popup blocker mungkin memblokir jendela print. Silakan izinkan popup untuk situs ini.');
            return;
        }

        const doc = printWindow.document;

        const html = doc.createElement('html');
        
        const head = doc.createElement('head');
        const metaCharset = doc.createElement('meta');
        metaCharset.setAttribute('charset', 'UTF-8');
        
        const title = doc.createElement('title');
        title.textContent = 'Laporan Kunjungan Poli KIA';
        
        const style = doc.createElement('style');
        style.textContent = `
            @media print {
                body { margin: 0; }
                .no-print { display: none; }
                .page-break { page-break-before: always; }
            }
            
            body { 
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                margin: 20px; 
                color: #333;
                line-height: 1.4;
                background-color: #fff;
            }
            
            .header {
                text-align: center;
                margin-bottom: 30px;
                border-bottom: 3px solid #0066cc;
                padding-bottom: 20px;
            }
            
            .header h1 {
                color: #111754;
                margin: 0;
                font-size: 24px;
                font-weight: bold;
            }
            
            .header h2 {
                color: #666;
                margin: 5px 0;
                font-size: 18px;
                font-weight: normal;
            }
            
            .info-section {
                background-color: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                border-left: 4px solid #111754;
            }
            
            .info-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 8px;
            }
            
            .info-row:last-child {
                margin-bottom: 0;
            }
            
            .info-label {
                font-weight: bold;
                color: #555;
                min-width: 150px;
            }
            
            .info-value {
                color: #333;
                font-weight: 500;
            }
            
            table { 
                width: 100%; 
                border-collapse: collapse; 
                margin: 20px 0;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                border-radius: 8px;
                overflow: hidden;
            }
            
            th { 
                background: #111754;
                color: white;
                padding: 12px 8px;
                text-align: center;
                font-weight: bold;
                font-size: 14px;
            }
            
            td { 
                border: 1px solid #ddd; 
                padding: 10px 8px;
                font-size: 13px;
            }
            
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            
            tr:hover {
                background-color: #e3f2fd;
            }
            
            .chart-container { 
                text-align: center; 
                margin: 30px 0;
                padding: 20px;
                background-color: #fafafa;
                border-radius: 8px;
                border: 1px solid #e0e0e0;
            }
            
            .chart-container h3 {
                color: #111754;
                margin-bottom: 15px;
                font-size: 16px;
            }
            
            .chart-container img { 
                max-width: 100%; 
                height: auto;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            
            .footer {
                margin-top: 40px;
                text-align: right;
                font-size: 12px;
                color: #666;
                border-top: 1px solid #ddd;
                padding-top: 15px;
            }
            
            .summary-box {
                background: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                text-align: center;
                margin: 20px 0;
                border: 1px solid #111754;
            }
            
            .summary-box h3 {
                margin: 0;
                color: #111754;
                font-size: 18px;
            }
            
            .print-button {
                background-color: #111754;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 14px;
                margin-bottom: 20px;
            }
            
            .print-button:hover {
                background-color: #0d1142;
            }
        `;
        
        head.appendChild(metaCharset);
        head.appendChild(title);
        head.appendChild(style);
        
        const body = doc.createElement('body');
        
        const printButton = doc.createElement('button');
        printButton.className = 'print-button no-print';
        printButton.textContent = 'Cetak Laporan';
        printButton.onclick = () => printWindow.print();
        
        const headerDiv = doc.createElement('div');
        headerDiv.className = 'header';
        
        const h1 = doc.createElement('h1');
        h1.textContent = 'LAPORAN KUNJUNGAN POLI KIA';
        
        const h2 = doc.createElement('h2');
        h2.textContent = 'Sistem Informasi Pelayanan Kesehatan';
        
        headerDiv.appendChild(h1);
        headerDiv.appendChild(h2);
        
        const infoSection = doc.createElement('div');
        infoSection.className = 'info-section';
        
        const infoRow1 = doc.createElement('div');
        infoRow1.className = 'info-row';
        
        const infoLabel1 = doc.createElement('span');
        infoLabel1.className = 'info-label';
        infoLabel1.textContent = 'Periode Laporan:';
        
        const infoValue1 = doc.createElement('span');
        infoValue1.className = 'info-value';
        infoValue1.textContent = tanggal || 'Semua Data';
        
        infoRow1.appendChild(infoLabel1);
        infoRow1.appendChild(infoValue1);
        
        const infoRow2 = doc.createElement('div');
        infoRow2.className = 'info-row';
        
        const infoLabel2 = doc.createElement('span');
        infoLabel2.className = 'info-label';
        infoLabel2.textContent = 'Filter Pemeriksaan:';
        
        const infoValue2 = doc.createElement('span');
        infoValue2.className = 'info-value';
        infoValue2.textContent = jenisFilter;
        
        infoRow2.appendChild(infoLabel2);
        infoRow2.appendChild(infoValue2);
    
        const tanggalCetak = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        const infoRow3 = doc.createElement('div');
        infoRow3.className = 'info-row';
        
        const infoLabel3 = doc.createElement('span');
        infoLabel3.className = 'info-label';
        infoLabel3.textContent = 'Tanggal Cetak:';
        
        const infoValue3 = doc.createElement('span');
        infoValue3.className = 'info-value';
        infoValue3.textContent = tanggalCetak;
        
        infoRow3.appendChild(infoLabel3);
        infoRow3.appendChild(infoValue3);
        
        infoSection.appendChild(infoRow1);
        infoSection.appendChild(infoRow2);
        infoSection.appendChild(infoRow3);
        
        const summaryBox = doc.createElement('div');
        summaryBox.className = 'summary-box';
        
        const summaryH3 = doc.createElement('h3');
        summaryH3.textContent = `Total Kunjungan: ${total} Pasien`;
        
        summaryBox.appendChild(summaryH3);
        
        const table = doc.createElement('table');
        
        const thead = doc.createElement('thead');
        const headerRow = doc.createElement('tr');
        
        const th1 = doc.createElement('th');
        th1.style.width = '10%';
        th1.textContent = 'No';
        
        const th2 = doc.createElement('th');
        th2.style.width = '60%';
        th2.textContent = 'Jenis Pemeriksaan';
        
        const th3 = doc.createElement('th');
        th3.style.width = '30%';
        th3.textContent = 'Jumlah Kunjungan';
        
        headerRow.appendChild(th1);
        headerRow.appendChild(th2);
        headerRow.appendChild(th3);
        thead.appendChild(headerRow);
        
        const tbody = doc.createElement('tbody');
        let totalKunjungan = 0;
        
        labels.forEach((label, index) => {
            totalKunjungan += parseInt(data[index]);
            
            const row = doc.createElement('tr');
            
            const td1 = doc.createElement('td');
            td1.style.textAlign = 'center';
            td1.textContent = index + 1;
            
            const td2 = doc.createElement('td');
            td2.style.textAlign = 'left';
            td2.style.paddingLeft = '15px';
            td2.textContent = label;
            
            const td3 = doc.createElement('td');
            td3.style.textAlign = 'center';
            td3.style.fontWeight = 'bold';
            td3.textContent = data[index];
            
            row.appendChild(td1);
            row.appendChild(td2);
            row.appendChild(td3);
            tbody.appendChild(row);
        });
        
        const totalRow = doc.createElement('tr');
        totalRow.style.backgroundColor = '#e9ecef';
        totalRow.style.fontWeight = 'bold';
        
        const totalTd1 = doc.createElement('td');
        totalTd1.setAttribute('colspan', '2');
        totalTd1.style.textAlign = 'center';
        totalTd1.textContent = 'TOTAL';
        
        const totalTd2 = doc.createElement('td');
        totalTd2.style.textAlign = 'center';
        totalTd2.style.color = '#111754';
        totalTd2.textContent = totalKunjungan;
        
        totalRow.appendChild(totalTd1);
        totalRow.appendChild(totalTd2);
        tbody.appendChild(totalRow);
        
        table.appendChild(thead);
        table.appendChild(tbody);
        
        const chartContainer = doc.createElement('div');
        chartContainer.className = 'chart-container';
        
        const chartH3 = doc.createElement('h3');
        chartH3.textContent = 'Grafik Visualisasi Data';
        
        const chartImg = doc.createElement('img');
        chartImg.src = chartImage;
        chartImg.alt = 'Grafik Laporan Kunjungan Poli KIA';
        
        chartContainer.appendChild(chartH3);
        chartContainer.appendChild(chartImg);
        
        const footer = doc.createElement('div');
        footer.className = 'footer';
        
        const footerP1 = doc.createElement('p');
        const footerStrong = doc.createElement('strong');
        footerStrong.textContent = 'Dicetak pada: ';
        footerP1.appendChild(footerStrong);
        footerP1.appendChild(doc.createTextNode(tanggalCetak));
        
        const footerP2 = doc.createElement('p');
        const footerEm = doc.createElement('em');
        footerEm.textContent = 'Dokumen ini digenerate secara otomatis oleh Sistem Informasi Pelayanan Kesehatan';
        footerP2.appendChild(footerEm);
        
        footer.appendChild(footerP1);
        footer.appendChild(footerP2);
        
        body.appendChild(printButton);
        body.appendChild(headerDiv);
        body.appendChild(infoSection);
        body.appendChild(summaryBox);
        body.appendChild(table);
        body.appendChild(chartContainer);
        body.appendChild(footer);
        
        html.appendChild(head);
        html.appendChild(body);
        
        doc.replaceChild(html, doc.documentElement);
        doc.close();
        
        setTimeout(() => {
            printWindow.focus();
        }, 500);
    }
</script>
@endsection