@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-6">Surat Keterangan Sakit</h1>

    <div class="flex justify-end mb-4">
        <div class="flex">
            <select class="border rounded-l p-2">
                <option>Data Pasien</option>
                <!-- Tambahkan opsi lain kalau perlu -->
            </select>
            <button class="bg-blue-500 text-white p-2 rounded-r">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">NO.</th>
                        <th class="px-4 py-2 border">TANGGAL PERIKSA</th>
                        <th class="px-4 py-2 border">NO. RM</th>
                        <th class="px-4 py-2 border">NOMOR SURAT</th>
                        <th class="px-4 py-2 border">NAMA PASIEN</th>
                        <th class="px-4 py-2 border">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratSakit as $index => $suratSakit)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($surat->tanggal_periksa)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 border">{{ $surat->no_rm }}</td>
                        <td class="px-4 py-2 border">{{ $surat->nomor_surat }}</td>
                        <td class="px-4 py-2 border">{{ $surat->nama_pasien }}</td>
                        <td class="px-4 py-2 border flex justify-center space-x-2">
                            <a href="{{ route('surat-sakit.cetak', $surat->id) }}" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V2h9v7h5v13H6V9z" />
                                </svg>
                                Cetak
                            </a>
                            <a href="{{ route('surat-sakit.detail', $surat->id) }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($suratSakit->isEmpty())
                <p class="text-center mt-4 text-gray-500">Data tidak tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
