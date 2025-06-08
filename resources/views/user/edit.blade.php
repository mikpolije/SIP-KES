@extends('layouts.master')


<div class="container mt-4">
    <h2 class="mb-4">Edit Pengguna</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (biarkan kosong jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

