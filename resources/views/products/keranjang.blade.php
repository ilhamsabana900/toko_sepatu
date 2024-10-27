@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Keranjang Belanja</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($keranjang))
        <p>Keranjang Anda kosong.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keranjang as $item)
                    <tr>
                        <td><img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="50"></td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['ukuran'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp. {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>
                            <!-- Form untuk menghapus item dari keranjang -->
                            <form action="{{ route('keranjang.hapus', $item['id']) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total: Rp. {{ number_format($total, 0, ',', '.') }}</h3>

        <!-- Form untuk proses checkout -->
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mt-2">Checkout Sekarang</button>
        </form>
    @endif
</div>
@endsection
