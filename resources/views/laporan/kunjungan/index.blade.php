@extends('layouts.master')

@section('title', $data['title'])

@section('css')
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
@endsection

@section('pageContent')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mb-4">Grafik Data Harian</h4>
                <canvas id="dailyChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('dailyChart').getContext('2d');
        const dailyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Statistik Kunjungan Harian'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
