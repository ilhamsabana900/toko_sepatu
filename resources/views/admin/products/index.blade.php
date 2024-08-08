@extends('layouts.admin')

@section('content')
    <h1>Daftar Produk</h1>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->nama_product }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->ukuran }}</td>
                    <td>
                        @if ($product->gambar)
                            <img src="{{ asset('images/' . $product->gambar) }}" alt="Gambar Produk" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    
@endsection
