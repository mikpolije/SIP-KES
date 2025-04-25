<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<div class="brand-logo d-flex align-items-center justify-content-between">
    <a class="logo-img d-flex align-items-center text-nowrap" href="/main/index">
        <img class="dark-logo logo-size" src="{{ URL::asset('build/images/logos/logosipkes.png') }}" alt="Logo-Dark" />
        <img class="light-logo logo-size" src="{{ URL::asset('build/images/logos/logosipkes.png') }}" alt="Logo-light" />
    </a>
    <a class="sidebartoggler text-decoration-none fs-5 d-block d-xl-none ms-auto" href="javascript:void(0)">
        <i class="ti ti-x"></i>
    </a>
</div>

<style>
    .brand-logo {
        padding-top: 25px;
        padding-bottom: 25px;
        padding-left: 25px;
        /* Memberi jarak antara logo dan tepi kiri */
    }

    .logo-size {
        width: 180px;
        height: 60px;
        object-fit: contain;
        /* Menjaga rasio gambar */
        display: block;
    }

    .logo-img {
        display: flex;
        justify-content: flex-start;
        /* Membuat logo rata kiri */
        align-items: center;
    }
</style>


<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- Home -->
        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->
        <!-- Dashboard -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="/" aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-speedometer2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd"
                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                    </svg>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/pendaftaran') ? 'active' : '' }}" href="/main/pendaftaran"
                aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-clipboard" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                    </svg>
                </span>
                <span class="hide-menu">Pendaftaran</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ request()->is('main/polikia') || request()->is('main/poliumum') || request()->is('main/rawat-inap') ? 'active' : '' }}"
                href="#">
                <span class="d-flex">
                    <svg class="bi bi-heart-pulse" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5" />
                        <path
                            d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162z" />
                    </svg>
                </span>
                <span class="hide-menu">Pemeriksaan</span>
            </a>
            <ul class="first-level {{ request()->is('main/polikia') || request()->is('main/poliumum') || request()->is('main/rawat-inap') ? 'in' : '' }} collapse"
                aria-expanded="false">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/poliumum') ? 'active' : '' }}" href="/main/poliumum"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Poli Umum</span>
                    </a>
                    {{-- <ul class="second-level collapse" aria-expanded="false">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}"
                                href="/main/poliumum/antrian">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Antrian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}"
                                href="/main/poliumum/riwayat">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Riwayat</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/layanan', 'main/layanan/*') ? 'active' : '' }}"
                        href="/main/layanan">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Poli KIA</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/rawat-inap', 'main/rawat-inap/*') ? 'active' : '' }}"
                        href="/main/rawat-inap" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Rawat Inap</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="{{ route('triase.create') }}"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">UGD</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- farmasi -->
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ request()->is('') ? 'active' : '' }}" href="javascript:void(0)"
                aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-capsule-pill" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </span>
                <span class="hide-menu">Farmasi</span>
            </a>
            <ul class="first-level {{ request()->is('') ? 'in' : '' }} collapse" aria-expanded="false">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/dataobat') ? 'active' : '' }}" href="/main/dataobat"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Data Obat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/datapengambilanobat') ? 'active' : '' }}"
                        href="/main/datapengambilanobat" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Data Pengambilan Obat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/dataresep') ? 'active' : '' }}"
                        href="/main/dataresep" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Data Resep</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/pembayaran') ? 'active' : '' }}" href="/main/pembayaran"
                aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-currency-dollar" xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                    </svg>
                </span>
                <span class="hide-menu">Pembayaran</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ request()->is('') ? 'active' : '' }}" href="javascript:void(0)"
                aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-envelope-paper" xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267zm13 .566v5.734l-4.778-2.867zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083zM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                    </svg>
                </span>
                <span class="hide-menu">Persuratan</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level {{ request()->is('main/general-consent') ? 'in' : '' }}">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/general-consent') ? 'active' : '' }}" href="/main/general-consent"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">General Consent</span>
                    </a>
                </li>
            <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="/"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Surat Kematian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="/main/blog-detail">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Surat Control</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="" aria-expanded="false">
                <span>
                    <svg class="bi bi-book" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                    </svg>
                </span>
                <span class="hide-menu">Rekam Medis</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ request()->is('') ? 'active' : '' }}" href="javascript:void(0)"
                aria-expanded="false">
                <span class="d-flex">
                    <svg class="bi bi-journals" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2" />
                        <path
                            d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0" />
                    </svg>
                </span>
                <span class="hide-menu">Laporan</span>
            </a>
            <ul class="first-level {{ request()->is('') ? 'in' : '' }} collapse" aria-expanded="false">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="/"
                        aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">10 Besar Penyakit</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="/main/blog-detail">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Kunjungan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/laporankia') ? 'active' : '' }}"
                        href="/main/laporankia">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Laporan KIA</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ Route::is('doctor.*') ? 'active' : '' }}" href="javascript:void(0)"
                aria-expanded="false">
                <span class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-database" viewBox="0 0 16 16">
                        <path
                            d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313M13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A5 5 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A5 5 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525" />
                    </svg>
                </span>
                <span class="hide-menu">Master Data</span>
            </a>
            <ul class="first-level {{ Route::is('doctor.*') ? 'in' : '' }} collapse" aria-expanded="false">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('main/stokopname') ? 'active' : '' }}"
                        href="/main/stokopname" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Data Pengguna</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('doctor.*') ? 'active' : '' }}"
                        href="{{ route('doctor.index') }}" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Data Dokter</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('') ? 'active' : '' }}" href="{{ route('layanan.index') }}">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Layanan</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
