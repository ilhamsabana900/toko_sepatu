@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Menampilkan Detail Produk -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="{{ asset('images/' . $product->gambar) }}" class="img-fluid" alt="{{ $product->nama_product }}">
            </div>
            
            <div class="col-md-6">
                <h1>{{ $product->nama_product }}</h1>
                <p class="lead">{{ $product->deskripsi }}</p>
                <h3 class="text-primary">
                    <h3>Rp. {{ number_format($product->harga, 0, ',', '.') }}</h3>
                </h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="size">Ukuran</label>
                        <select id="size" name="size" class="form-control" required>
                            <option value="" disabled selected>Select Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
