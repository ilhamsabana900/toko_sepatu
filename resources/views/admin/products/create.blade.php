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
            <label for="nama_product">Nama Produk</label>
            <input type="text" name="nama_product" class="form-control" value="{{ old('nama_product') }}">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}">
        </div>
        <div class="form-group">
            <label for="ukuran">Ukuran</label>
            <div id="size-fields">
                <input type="text" name="ukuran[]" class="form-control mb-2" placeholder="Ukuran 1" value="{{ old('ukuran.0') }}">
            </div>
            <button type="button" id="add-size" class="btn btn-secondary btn-sm">Tambah Ukuran</button>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        document.getElementById('add-size').addEventListener('click', function() {
            const sizeFields = document.getElementById('size-fields');
            const inputCount = sizeFields.getElementsByTagName('input').length;
            const newSizeInput = document.createElement('input');
            newSizeInput.type = 'text';
            newSizeInput.name = `ukuran[]`;
            newSizeInput.className = 'form-control mb-2';
            newSizeInput.placeholder = `Ukuran ${inputCount + 1}`;
            sizeFields.appendChild(newSizeInput);
        });
    </script>
@endsection
