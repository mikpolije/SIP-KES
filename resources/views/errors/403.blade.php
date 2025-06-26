@extends('layouts.master-auth')

@section('title', 'Modernize Bootstrap Admin')

@section('content')
<div class="container text-center" style="padding-top: 100px;">
    <h1>Anda tidak memiliki hak akses</h1>
    <p>Silakan kembali ke halaman utama.</p>
    <a href="{{ url('/main/index') }}" class="btn btn-primary mt-4">Kembali ke Halaman Utama</a>
</div>
@endsection
