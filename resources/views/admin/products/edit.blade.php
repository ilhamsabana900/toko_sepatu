@extends('layouts.admin')

@section('content')
    <h1>Edit Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_product">Nama Produk</label>
            <input type="text" name="nama_product" class="form-control" value="{{ old('nama_product', $product->nama_product) }}" placeholder="Masukkan nama produk">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan harga produk" step="0.01">
        </div>
        <div class="form-group">
            <label for="ukuran">Ukuran</label>
            <input type="text" name="ukuran" class="form-control" value="{{ old('ukuran', $product->ukuran) }}" placeholder="Masukkan ukuran produk">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if ($product->gambar)
                <div class="mt-2">
                    <img src="{{ asset('images/' . $product->gambar) }}" alt="Gambar Produk" width="100">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
