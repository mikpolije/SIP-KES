@extends('layouts.master')

@section('title', 'Daftar Pengguna')

@section('pageContent')
<div class="container mt-4">
    <h1 class="mb-4">Master Data</h1>
    <h3 class="mb-4">Data Pengguna</h3>

    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('register.forms') }}" class="btn btn-primary">+ Tambah User</a>
        </div>
        <form action="{{ route('user.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" placeholder="Cari..." class="form-control" value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary ml-2">Cari</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>NIK</th>
                <th>Profesi</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->profesi }}</td>
                    <td>{{ $user->no_telepon }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-secondary ml-2">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada pengguna ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

<!-- Pagination controls di bawah tabel -->
<div class="mt-3" style="width: 100px;">
    <form method="GET" action="{{ route('user.index') }}">
        <input type="hidden" name="search" value="{{ request('search') }}">
        <input type="hidden" name="page" value="{{ $users->currentPage() }}">

        <!-- Select perPage -->
        <div class="mb-2">
            <select name="perPage" class="form-control form-control-sm" onchange="this.form.submit()">
                @foreach ([5,10,20,50,100] as $limit)
                    <option value="{{ $limit }}" {{ request('perPage', 10) == $limit ? 'selected' : '' }}>{{ $limit }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Prev dan Next berdampingan -->
        <div class="d-flex justify-content-between" style="height: 20px;">
            <a href="{{ $users->previousPageUrl() }}" class="btn btn-sm btn-secondary {{ $users->onFirstPage() ? 'disabled' : '' }}">&laquo; </a>
            <a href="{{ $users->nextPageUrl() }}" class="btn btn-sm btn-secondary {{ $users->hasMorePages() ? '' : 'disabled' }}"> &raquo;</a>
        </div>
    </form>
</div>


</div>
@endsection
