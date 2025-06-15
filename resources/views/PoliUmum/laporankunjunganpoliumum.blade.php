@extends('layouts.master')

@section('title', 'SIP-Kes - Laporan 10 Besar Penyakit')

@section('pageContent')
<div class="container mx-auto mt-10 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-900 drop-shadow-md">Laporan Kunjungan</h1>

    <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
        <div class="flex gap-4 mb-4">
            <a href="#" class="bg-blue-100 text-blue-700 font-semibold px-4 py-2 rounded-lg">10 Besar Penyakit</a>
            <a href="#" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow">Laporan Kunjungan</a>
        </div>

        <form action="#" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium">Tanggal</label>
                    <input type="date" name="tanggal_awal" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="pt-6 md:pt-0">
                    <label class="block invisible">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Dokter</label>
                <select name="dokter" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
                    <option value="dr_jennie">dr. Jennie</option>
                    {{-- Tambahkan dokter lain jika perlu --}}
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Cara Bayar</label>
                <select name="cara_bayar" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
                    <option value="umum">Umum</option>
                    <option vaue="bpjs">BPJS</option>
                </select>
            </div>

            <div class="flex justify-center gap-4 mt-6">
                <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-blue-800">
                    Tampilkan
                </button>
                <a href="#" class="bg-yellow-400 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-yellow-500">
                    Download
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
