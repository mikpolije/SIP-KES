<!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon icon-->
<link type="image/png" href="{{ URL::asset('build/images/logos/logo.png') }}" rel="shortcut icon" />

<!-- Core Css -->
<!-- <script src="{{ URL::asset('build/css/styles.css') }}"></script> -->
{{-- @vite(['resources/scss/styles.scss']) --}}


<link href="{{ asset('build/css/styles.css') }}" rel="stylesheet">
