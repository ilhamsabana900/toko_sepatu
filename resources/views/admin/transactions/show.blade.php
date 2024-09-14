@extends('layouts.admin')

@section('content')
    <h1>Detail Transaksi</h1>

    <p><strong>User:</strong> {{ $transaction->user->name }}</p>
    <p><strong>Email:</strong> {{ $transaction->user->email }}</p>
    <p><strong>Total Harga:</strong> {{ $transaction->total_harga }}</p>
    <p><strong>Status:</strong> {{ $transaction->status }}</p>
    <p><strong>Tanggal Transaksi:</strong> {{ $transaction->tanggal_transaksi }}</p>

    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Update Status:</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ $transaction->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="batal" {{ $transaction->status == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
