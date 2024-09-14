<!-- resources/views/user/transactions/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Riwayat Transaksi</h1>

    @if ($transactions->isEmpty())
        <p>Anda belum memiliki riwayat transaksi.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>Rp. {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($transaction->status) }}</td>
                        <td>{{ $transaction->tanggal_transaksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
