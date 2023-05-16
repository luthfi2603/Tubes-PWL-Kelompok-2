<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/logo.png') }}" sizes="16x16 32x32" rel="shortcut icon">
    <title>GoMarket</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!--bagian navbar untuk landing page-->
    <nav class="navbar navbar-expand-lg bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="60" height="55" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Makanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Minuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alat Dapur</a>
                    </li>
                </ul>
            </div>
            <!--fitur search-->
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat datang, {{ auth()->user()->nama }}
                            <img src="{{ asset('storage/' . auth()->user()->image . '') }}" class="rounded-circle ms-1" style="width:40px;">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">
                                <i class="bi bi-cart"></i> Keranjang</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!--fitur masuk dan daftar-->
                    <a href="/login" class="btn btn-outline-success">Login</a>
                    <a href="/register" class="btn btn-outline-success mx-2">Register</a>
                @endauth
            </ul>
        </div>
    </nav>

    {{-- bagian yang berubah --}}
    @yield('container')

    <!--Bagian Footer Halaman-->
    <footer>
        <div class="text-start mt-5 pt-4" style="background-color:mediumaquamarine;">
            <div class="container  row">
                <div class="col-md-4 d-flex align-items-center ">
                    <img src="assets/img/logo.png" alt="GoMarket Logo"
                        style="width: fit-content; height: 190px;">
                </div>
                <div class="col-md-4 align-self-center">
                    <h4>Tentang GoMarket</h4>
                    <p>GoMarket adalah platform marketplace yang menyediakan berbagai<br>
                        produk kebutuhan rumah tangga seperti
                        makanan, minuman, dan alat dapur.</p>
                </div>
                <div class="col-md-4 align-self-center">
                    <h4>Kontak</h4>
                    <p>Jl. Jend. Sudirman No. 123<br>
                        Jakarta 12345<br>
                        Email: info@gomarket.com<br>
                        Telepon: 021-1234567</p>
                </div>
            </div>
            <hr>
            <p class="m-0 pb-4 text-center">© 2023 GoMarket. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>

</html>