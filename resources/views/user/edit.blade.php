@extends('layouts.master')

<div class="container mt-4">
    <h2 class="mb-4">Edit Pengguna</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $user->nik }}" required maxlength="20">
        </div>

        <div class="mb-3">
            <label for="profesi" class="form-label">Profesi</label>
            <input type="text" name="profesi" class="form-control" value="{{ $user->profesi }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No. Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $user->no_telepon }}" required maxlength="20">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $user->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (biarkan kosong jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
