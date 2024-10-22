@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('order'))
        <h3>Detail Pesanan</h3>
        <p><strong>Nama Pembeli:</strong> {{ session('order')['nama_pembeli'] }}</p>
        <p><strong>Telepon:</strong> {{ session('order')['telepon'] }}</p>
        <h4>Produk:</h4>
        @foreach(session('order')['items'] as $item)
            <p>{{ $item['nama'] }} - Jumlah: {{ $item['jumlah'] }}</p>
        @endforeach
        <h4>Total: Rp. {{ number_format(session('order')['total'], 0, ',', '.') }}</h4>
    @else
        <p>Pesanan tidak ditemukan. Silakan lakukan checkout terlebih dahulu.</p>
    @endif
</div>
<button id="pay-button" class="btn btn-primary mt-4">Bayar Sekarang</button>
<div id="result-json" class="mt-2"></div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $transaction->snap_token }}', {
            onSuccess: function(result) {
                
                window.location.href = '/';
            },
        });
    };
</script>
@endsection