@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <!-- Menampilkan Detail Produk -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="{{ asset('images/' . $product->gambar) }}" class="img-fluid" alt="{{ $product->nama_product }}">
            </div>

            <div class="col-md-6">
                <h1>{{ $product->nama_product }}</h1>
                <p class="lead">{{ $product->deskripsi }}</p>
                <h3>Rp. {{ number_format($product->harga, 0, ',', '.') }}</h3>

                <!-- Form Tambah ke Keranjang -->
                <!-- Form Tambah ke Keranjang -->
                <form id="formTambahKeKeranjang" action="{{ route('keranjang.tambah') }}" method="POST"
                    style="display: inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="form-group">
                        <label for="size">Ukuran</label>
                        <select id="size" name="size" class="form-control" required>
                            <option value="" disabled selected>Pilih Ukuran</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="quantity">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1"
                            value="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Tambah ke Keranjang</button>
                </form>

                <!-- Form Checkout Langsung -->
                <form id="formCheckoutLangsung" action="{{ route('checkout.langsung') }}" method="POST"
                    style="display: inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="checkoutSize" name="size">
                    <input type="hidden" id="checkoutQuantity" name="quantity">

                    <button type="submit" class="btn btn-success mt-2">Checkout Sekarang</button>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get the form elements
                        var sizeElement = document.getElementById('size');
                        var quantityElement = document.getElementById('quantity');

                        // Set event listeners for the size and quantity fields
                        sizeElement.addEventListener('change', function() {
                            document.getElementById('checkoutSize').value = sizeElement.value;
                        });

                        quantityElement.addEventListener('change', function() {
                            document.getElementById('checkoutQuantity').value = quantityElement.value;
                        });

                        // Set the values on page load if they already exist
                        document.getElementById('checkoutSize').value = sizeElement.value;
                        document.getElementById('checkoutQuantity').value = quantityElement.value;
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
