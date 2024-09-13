@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Checkout</h1>

    @if(session('order'))
        <div class="card">
            <div class="card-header">
                <h3>Detail Pesanan</h3>
            </div>
            <div class="card-body">
                <p><h1>DATA PEMBELI</h1></p>
                <p><strong>Nama Pembeli:</strong> {{ session('order')['nama_pembeli'] }}</p>
                <p><strong>Telepon:</strong> {{ session('order')['telepon'] }}</p>
                <p><h2>DATA PRODUK</h2></p>
                @foreach(session('order')['items'] as $item)
                    <p><strong>Nama Produk:</strong> {{ $item['nama'] }}</p>
                    <p><strong>Ukuran:</strong> {{ $item['ukuran'] }}</p>
                    <p><strong>Jumlah:</strong> {{ $item['jumlah'] }}</p>
                    <p><strong>Total Harga:</strong> Rp. {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</p>
                @endforeach
                <h3>Total: Rp. {{ number_format(session('order')['total'], 0, ',', '.') }}</h3>
            </div>
        </div>

        <form action="{{ route('checkout.proses') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">Proses Pembayaran</button>
        </form>
    @else
        <p>Data pesanan tidak ditemukan.</p>
    @endif
</div>
@endsection
