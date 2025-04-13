@extends('layouts.master')
@section('title', 'SIP-Kes | Rawat Inap')

<!--

jadi untuk summed up-nya.
semua yang ada di rawat inap pake mix dari css dan scripts (yang ada di tiap section yg disediakan)
sisanya untuk logic dan layout page pake livewire + alpinejs + kadang volt + pure bootstrap 5

-->

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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

    #cari-data-container {
        position: relative;

        i {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #111754;
        }

        input {
            padding-left: 30px;
        }
    }

    .icd-container {
        overflow: hidden;

        .icd-title {
            background-color: #676981;
            padding: 5px 0;
            color: white;
        }

        .icd-content {
            background-color: #e3e4e9;
            padding: 5px 0;
            color: black;
        }

        p {
            text-align: center;
            margin: 0;
            padding: 0;
        }
    }
</style>
@endsection

@section('pageContent')
@livewire('rawat-inap.main')
@endsection

@section('scripts')
<script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
<script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
@endsection
