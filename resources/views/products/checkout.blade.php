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
                <p><strong>Nama Produk:</strong> {{ session('order')['nama'] }}</p>
                <p><strong>Ukuran:</strong> {{ session('order')['ukuran'] }}</p>
                <p><strong>Jumlah:</strong> {{ session('order')['jumlah'] }}</p>
                <p><strong>Total Harga:</strong> Rp. {{ number_format(session('order')['total'], 0, ',', '.') }}</p>
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
