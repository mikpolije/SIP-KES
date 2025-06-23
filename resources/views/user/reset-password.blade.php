@extends('layouts.master')

@section('title', 'Reset Password')

@section('pageContent')
<div class="container mt-5">
    <h3 class="mb-4">Ganti Password untuk {{ $user->username }}</h3>

    <form action="{{ route('password.update', $user->id) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Password Baru</button>
    </form>
</div>
@endsection
