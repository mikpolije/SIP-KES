@extends('layouts.main')

@section('content')
<h2>Tambah Poli</h2>
<form method="POST" action="{{ route('poli.store') }}">
    @csrf
    <div class="mb-3">
        <label>ID Poli</label>
        <input type="text" name="id_layanan" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nama Poli</label>
        <input type="text" name="nama_layanan" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
@endsection
