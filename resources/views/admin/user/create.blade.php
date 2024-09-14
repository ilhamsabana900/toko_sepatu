@extends('layouts.admin')

@section('content')
    <h1>Tambah User</h1>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
        </div>

        <!-- Tambah field provinsi, kota, kecamatan, kelurahan jika diperlukan -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
