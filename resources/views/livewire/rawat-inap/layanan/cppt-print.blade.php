<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.blank')]
class extends Component {
    //
}; ?>

@push('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
            border: 2px solid #000;
            position: relative;
        }

        .header-section {
            display: flex;
            border-bottom: 2px solid #000;
        }

        .clinic-info {
            flex: 1;
            padding: 20px;
            border-right: 2px solid #000;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .logo {
            width: 60px;
            height: 60px;
            border: 2px solid #2e7d32;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            background-color: white;
        }

        .logo-text {
            color: #2e7d32;
            font-weight: bold;
            font-size: 10px;
            text-align: center;
            line-height: 1.2;
        }

        .clinic-name {
            font-size: 24px;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 8px;
        }

        .clinic-address {
            font-size: 12px;
            color: #333;
            line-height: 1.4;
        }

        .patient-info {
            width: 300px;
            border-collapse: collapse;
        }

        .patient-info td {
            border: 1px solid #000;
            padding: 8px 12px;
            font-size: 14px;
        }

        .patient-info .label {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 100px;
        }

        .main-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #1a237e;
            padding: 15px;
            border-bottom: 2px solid #000;
            letter-spacing: 1px;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            height: 600px;
        }

        .main-table th {
            border: 1px solid #000;
            padding: 15px 8px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            background-color: #f8f9fa;
            vertical-align: middle;
        }

        .main-table td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
        }

        .col-date {
            width: 12%;
        }

        .col-profession {
            width: 15%;
        }

        .col-assessment {
            width: 40%;
        }

        .col-instruction {
            width: 20%;
        }

        .col-edit {
            width: 13%;
        }

        .main-table tbody tr {
            height: 100%;
        }

        .main-table tbody td {
            height: 100%;
        }
    </style>
@endpush

<div class="form-container">

    <div class="header-section">
        <div class="clinic-info">
            <div class="logo-container">
                <img src="{{ asset('assets/klinik-insan.png') }}" alt="Klinik Insan Medika Logo" class="img-fluid" width="200">
                <div>
                    <div class="clinic-name">KLINIK INSAN MEDIKA</div>
                    <div class="clinic-address">
                        Jl. Mr Wahid, Renes, Wirowongso, kec. Ajung,<br>
                        Kabupaten Jember, Jawa Timur
                    </div>
                </div>
            </div>
        </div>

        <table class="patient-info">
            <tr>
                <td class="label">No. RM</td>
                <td></td>
            </tr>
            <tr>
                <td class="label">Nama Pasien</td>
                <td></td>
            </tr>
            <tr>
                <td class="label">Tgl Lahir</td>
                <td></td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="main-title">
        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
    </div>

    <table class="main-table">
        <thead>
            <tr>
                <th class="col-date">TGL/JAM</th>
                <th class="col-profession">PROFESI<br>(PPA)</th>
                <th class="col-assessment">HASIL ASSESMENT<br>PENATALAKSANAAN<br>PASIEN</th>
                <th class="col-instruction">INSTRUKSI</th>
                <th class="col-edit">LAST EDIT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
