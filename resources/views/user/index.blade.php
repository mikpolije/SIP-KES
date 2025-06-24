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

<form method="GET" action="{{ route('user.index') }}" class="form-inline">
    <input type="hidden" name="search" value="{{ request('search') }}">
<div class="pagination-controls bg-white rounded-lg shadow-md p-3 flex items-center">
        <!-- Previous Button -->
        <button id="prev-btn" class="page-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-3 rounded mr-2" disabled>
            &larr; Prev
        </button>
        
        <!-- Items per page selector -->
        <div class="select-wrapper">
            <select id="perPage" class="appearance-none bg-gray-100 border border-gray-300 text-gray-700 py-1 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="ml-2 text-gray-600">items</span>
        </div>
        
        <!-- Next Button -->
        <button id="next-btn" class="page-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-3 rounded ml-2">
            Next &rarr;
        </button>
    </div>
</form>

</div>
@endsection
