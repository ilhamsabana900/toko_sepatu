@extends('layouts.admin')

@section('content')
    <h1>Daftar Transaksi</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->total_harga }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>
                        <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-info">Detail</a>
                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
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
