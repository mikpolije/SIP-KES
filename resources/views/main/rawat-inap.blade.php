@extends('layouts.master')
@section('title', 'SIP-Kes | Rawat Inap')

@section('css')
<!-- punyanya Johann-S/bs-stepper buat bootstrap
yang ada steppernya, tapi pake css aja ea, anti js js club -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endsection

@section('pageContent')
@livewire('rawat-inap.main')
@endsection
