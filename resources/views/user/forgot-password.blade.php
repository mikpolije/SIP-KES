@extends('layouts.master')

@section('title', 'Lupa Password')

@section('pageContent')
<div class="container mt-5">
    <h3 class="mb-4">Lupa Password</h3>

    @if($errors->has('identity'))
        <div class="alert alert-danger">{{ $errors->first('identity') }}</div>
    @endif

    <form action="{{ route('password.checkIdentity') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Profesi</label>
            <input type="text" name="profesi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Lanjut</button>
    </form>
</div>
@endsection
