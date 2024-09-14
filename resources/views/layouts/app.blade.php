<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPEEDSPORT</title>
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="C:\Users\ilhams\Documents\Project\toko_sepatu\resources\js\app.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <style>
        body {
            padding-top: 70px;
        }

        .carousel-container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            border-radius: 10px;
            background-color: #fff;
        }

        .card {
            border: none;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            background-size: 100%, 100%;
        }

        .card-img-top {
            max-height: 150px;
            object-fit: cover;
        }

        .card-body {
            font-size: 0.9rem;
        }

        .pagination .page-item .page-link {
            font-size: 1rem;
            padding: 0.5rem 0.75rem;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

        .product-image {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-body {
            flex-grow: 1;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">SPEEDSPORT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto position-absolute top-50 start-50 translate-middle">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">New</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Olahraga
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Sepakbola</a></li>
                                <li><a class="dropdown-item" href="#">Futsal</a></li>
                                <li><a class="dropdown-item" href="#">Running</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Brand
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Nike</a></li>
                                <li><a class="dropdown-item" href="#">Adidas</a></li>
                                <li><a class="dropdown-item" href="#">Ardiles</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Kategori
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Sepatu</a></li>
                                <li><a class="dropdown-item" href="#">Aksesoris</a></li>
                                <li><a class="dropdown-item" href="#">Baju</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('user.transactions.index') }}">Riwayat</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('keranjang.index') }}">
                                Keranjang
                                @if(session('keranjang'))
                                    @php
                                        $keranjang = session('keranjang');
                                        $jumlahItem = array_sum(array_column($keranjang, 'jumlah'));
                                    @endphp
                                    <span class="badge badge-primary">{{ $jumlahItem }}</span>
                                @else
                                    <span class="badge badge-primary">0</span>
                                @endif
                            </a>
                        </li>
                        @endauth
                    </ul>
                    @auth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                                </form>
                            </li>
                        </ul>
                    @endauth

                    @guest
                        
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="bg-dark text-light p-4 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Informasi Kontak -->
                    <div class="col-md-3">
                        <h5>Contact Us</h5>
                        <p><i class="fas fa-map-marker-alt"></i> Pasuruan, Jawa Timur</p>
                        <p><i class="fas fa-phone-alt"></i> (123) 456-7890</p>
                        <p><i class="fas fa-envelope"></i> speedsport@gmail.com</p>
                    </div>
        
                    <!-- Navigasi Tambahan -->
                    <div class="col-md-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light">About Us</a></li>
                            <li><a href="#" class="text-light">FAQ</a></li>
                            <li><a href="#" class="text-light">Returns & Refunds</a></li>
                            <li><a href="#" class="text-light">Informasi Pengiriman</a></li>
                            <li><a href="#" class="text-light">Kontak kami</a></li>
                        </ul>
                    </div>
        
                    <!-- Media Sosial -->
                    <div class="col-md-3">
                        <h5>Follow Us</h5>
                        <div>
                            <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <h5 class="mt-3">Subscribe to our Newsletter</h5>
                        <form class="d-flex">
                            <input type="email" class="form-control me-2" placeholder="Enter your email">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </form>
                    </div>
        
                    <!-- Hak Cipta -->
                    <div class="col-md-3">
                        <h5>Perusahaan Kami</h5>
                        <p>Kunjungi alamat toko kami dan hubungi untuk informasi lebih lanjut</p>
                        <p>© 2024 Speedstreet</p>
                    </div>
                </div>
                <hr class="bg-light">
                <div class="row">
                    <div class="col text-center">
                        <p class="mb-0">Powered by <a href="#" class="text-light">Speedstreet</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
