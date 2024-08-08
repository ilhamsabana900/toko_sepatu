@extends('layouts.app')
@section('content')
    <div class="container mt-4"> <!-- Menambahkan kelas margin top di sini -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('img/sepatu1.jpg') }}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('img/sepatu2.jpg') }}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('img/sepatu3.jpg') }}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col text-center mt-1">
                <h2>Flash Sale</h2>
            </div>
        </div>
        {{-- crousell --}}
        <div class="container mt-5">
            <div class="carousel-container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach ($products as $product)

                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{asset('images/' .$product->gambar) }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/sepatu04.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/sepatu03.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/sepatu02.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/sepatu01.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan lebih banyak carousel-item jika diperlukan -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col text-center mt-2">
                <h2>Product</h2>
            </div>
        </div>
    </div>
@endsection
