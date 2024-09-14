@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('admin.user.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $users->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $users->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $users->telepon }}">
        </div>

        <!-- Tambah field provinsi, kota, kecamatan, kelurahan jika diperlukan -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
