@extends('layouts.master')

@section('title', 'Data Verification')

@section('pageContent')
<div class="container mt-5">
    <h1 class="mb-4">Data Verification</h1>
    <h3 class="mb-4">Enter Your Account</h3>

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

        <button type="submit" class="btn btn-primary d-block mx-auto" style="width: 30%;">Send</button>

    </form>
</div>
@endsection
