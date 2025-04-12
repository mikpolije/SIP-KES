<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran SIP-KES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="text-center my-4">
                <img src="{{ asset('image/logosipkes.png') }}" alt="SIP-Kes Logo" class="img-fluid"
                    style="max-width: 150px;" />
            </div>
            <ul class="nav flex-column">
                <li><a href="#"><i class="ri-dashboard-line icon"></i> Dashboard</a></li>
                <li><a href="#"><i class="ri-survey-line icon"></i>Pendaftaran</a></li>
                <li><a href="#"><i class="ri-stethoscope-fill icon"></i>Pemeriksaan</a></li>
                <li><a href="#"><i class="ri-capsule-fill icon"></i>Farmasi</a></li>
                <li><a href="#" class="active"><i class="ri-money-dollar-circle-line icon"></i> Pembayaran</a></li>
                <li><a href="#"><i class="ri-file-text-line icon"></i>Persuratan</a></li>
                <li><a href="#"><i class="ri-book-read-line icon"></i>Rekam Medis</a></li>
                <li><a href="#"><i class="ri-file-copy-2-line icon"></i>Laporan</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="container-fluid">
            <div class="card w-100">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
