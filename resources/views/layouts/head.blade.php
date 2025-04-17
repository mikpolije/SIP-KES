<!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/png" href="{{ URL::asset('build/images/logos/logo.png') }}" />

<!-- Core Css -->
<!-- <script src="{{ URL::asset('build/css/styles.css') }}"></script> -->
{{-- @vite(['resources/scss/styles.scss']) --}}
<link rel="stylesheet" href="{{asset('/build/css/styles.css')}}">

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
