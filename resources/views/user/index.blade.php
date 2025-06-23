@extends('layouts.master')

@section('title', 'Daftar Pengguna')

@section('pageContent')
<div class="container mt-4">
    <h2 class="mb-4">Data Pengguna</h2>

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
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary ml-2">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
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

    <div class="d-flex justify-content-between">
    <div>
        <form method="GET" action="{{ route('user.index') }}" class="d-flex align-items-center">
            {{-- Jaga supaya search tetap ada saat submit --}}
            <input type="hidden" name="search" value="{{ request('search') }}">
            <label for="perPage" class="mr-2 mb-0">Tampilkan</label>
            <select name="perPage" id="perPage" class="form-control form-control-sm" onchange="this.form.submit()">
                @foreach ([5, 10, 20, 50, 100] as $limit)
                    <option value="{{ $limit }}" {{ request('perPage', 10) == $limit ? 'selected' : '' }}>{{ $limit }}</option>
                @endforeach
            </select>
            <span class="ml-2">data per halaman</span>
        </form>
    </div>
    <div>
        {{ $users->links() }}
    </div>
</div>

</div>
@endsection
