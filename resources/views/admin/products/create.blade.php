@extends('layouts.admin')

@section('content')
    <h1>Tambah Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" name="nama_product" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="size">Ukuran</label>
            <input type="text" name="ukuran" class="form-control" value="{{ old('size') }}">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
