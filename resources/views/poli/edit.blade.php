@extends('layouts.main')

@section('content')
<h2>Edit Poli</h2>
<form method="POST" action="{{ route('poli.update', $poli->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>ID Poli</label>
        <input type="text" name="id_layanan" class="form-control" value="{{ $poli->id_layanan }}">
    </div>
    <div class="mb-3">
        <label>Nama Poli</label>
        <input type="text" name="nama_layanan" class="form-control" value="{{ $poli->nama_layanan }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
@endsection