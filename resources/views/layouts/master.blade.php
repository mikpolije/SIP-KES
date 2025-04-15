<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="@yield('theme', 'light')" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    @include('layouts.head')
    <title>@yield('title', 'SIP-Kes')</title>
    @yield('css')

    <style>
        .title {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: bold;
            text-align: left;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: medium;
            text-align: left;
            color: #1A1A1A;
            padding: 9px 0;
        }

        .section-title {
            font-size: 16px;
            margin-bottom: 1.2rem;
        }

        .required-label::after {
            content: " *";
            color: red;
            font-weight: bold;
        }

        .stepper-container {
            padding: 40px 0;
        }

        .stepper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
            max-width: 500px;
            /* Limit width for compactness */
            margin-left: auto;
            margin-right: auto;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
            color: #4285F4;
            border: 2px solid #4285F4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .step-circle.active {
            background-color: #4285F4;
            color: white;
            border: none;
        }

        .step-title {
            font-size: 14px;
            color: #333;
            text-align: center;
        }

        .step-connector {
            width: 100px;
            /* Fixed width for connector */
            height: 2px;
            background-color: #E0E0E0;
            /* Default gray color for inactive */
            margin: 0 10px;
            position: relative;
            top: -15px;
            transition: background-color 0.3s ease;
        }

        .step-connector.active {
            background-color: #4285F4;
            /* Blue color for active/completed */
        }

        .step-content {
            display: none;
            padding: 20px;
            margin-bottom: 20px;
        }

        .step-content.active {
            display: block;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
        }


        .signature-block {
            min-height: 180px;
            display: flex;
            flex-direction: column;
        }

        .border-bottom {
            border-color: #000 !important;
        }
    </style>
</head>

<body class="link-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ URL::asset('build/images/logos/logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">

        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>@include('layouts.sidebar')</div>
        </aside>
        <!-- Sidebar End -->

        <div class="page-wrapper">
            <!-- Header Start -->
            <header class="topbar">
                <div class="with-vertical">@include('layouts.header')</div>
                <div class="app-header with-horizontal">@include('layouts.horizontal-header')</div>
            </header>
            <!-- Header End -->

            <aside class="left-sidebar with-horizontal">
                @include('layouts.horizontal-sidebar')
            </aside>

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('pageContent')
                </div>
            </div>
            <!-- @include('layouts.customizer') -->
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts')
    @yield('scripts')
</body>

</html>
