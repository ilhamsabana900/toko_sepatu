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

        /* gambar di  product */
        .card-img-top {
            max-height: 150px;
            /* Menyesuaikan tinggi gambar */
            object-fit: cover;
        }

        .card-body {
            font-size: 0.9rem;
            /* Ukuran teks lebih kecil */
        }

        /* pagination */
        .pagination .page-item .page-link {
            font-size: 1rem;
            /* Atur ukuran font */
            padding: 0.5rem 0.75rem;
            /* Sesuaikan padding */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            /* Warna background untuk halaman aktif */
            border-color: #007bff;
            /* Warna border untuk halaman aktif */
            color: #fff;
            /* Warna teks untuk halaman aktif */
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            /* Warna untuk elemen non-aktif */
        }

        /* untuk produk */
        .product-image {
            width: 100%;
            /* Mengatur lebar gambar sesuai dengan kontainer */
            height: auto;
            /* Mempertahankan rasio aspek */
            aspect-ratio: 1 / 1;
            /* Membuat gambar berbentuk persegi */
            object-fit: cover;
            /* Memotong gambar agar sesuai dalam kotak persegi */
            border-radius: 10px;
            /* Melengkungkan sudut gambar */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Menambahkan bayangan */
        }

        /* untuk gambar dalam produk */
        .product-card {
            height: 100%;
            /* Pastikan kartu memiliki tinggi 100% */
            display: flex;
            flex-direction: column;
        }

        .product-image {
            width: 100%;
            /* Lebar gambar mengikuti lebar kontainer */
            height: 250px;
            /* Mengatur tinggi gambar agar seragam */
            object-fit: cover;
            /* Gambar akan dipotong agar sesuai dengan kotak tanpa distorsi */
            border-radius: 10px;
            /* Sudut melengkung */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Bayangan lembut */
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
                <a class="navbar-brand" href="#">SEPEEDSPORT</a>
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
                            <a class="nav-link" aria-current="page" href="#">Riwayat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Keranjang</a>
                        </li>
                    </ul>
                    <form class="d-flex position-absolute top-50 end-0 translate-middle-y" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
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
