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
            <a class="navbar-brand ms-2" href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="55" class="d-inline-block align-text-top">
            </a>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        @if(Request::is('search*'))

                        @else 
                            <a class="btn btn-outline-success me-2 mt-2" href="/search">Search</a>
                        @endif    
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat datang, {{ auth()->user()->username }}
                            @if((auth()->user()->image) == 'assets/img/no_photo.png')
                                <img src="{{ asset('' . auth()->user()->image . '') }}" class="rounded-circle ms-1" style="width:40px;">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->image . '') }}" class="rounded-circle ms-1" style="width:40px;">
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @can('admin')
                                <li><a class="dropdown-item" href="/admin">
                                    <i class="bi bi-person-gear"></i> Admin</a>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="/keranjang">
                                    <i class="bi bi-cart"></i> Keranjang</a>
                                </li>
                                <li><a class="dropdown-item" href="/profil/{{ auth()->user()->username }}">
                                    <i class="bi bi-person"></i> Profil</a>
                                </li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button onclick="return confirm('Apakah kamu yakin?')" type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    @if(Request::is('search*'))

                    @else 
                        <a class="btn btn-outline-success me-2" href="/search">Search</a>
                    @endif
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
                <div class="col-md-4 d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="GoMarket Logo" style="width: fit-content; height: 190px;" class="ms-4">
                </div>
                <div class="col-md-4 align-self-center">
                    <h4>Tentang GoMarket</h4>
                    <p>GoMarket adalah platform marketplace yang menyediakan berbagai<br>
                        produk kebutuhan rumah tangga seperti
                        makanan, minuman, dan alat dapur.</p>
                </div>
                <div class="col-md-4 align-self-center">
                    <h4>Kontak</h4>
                    <p>
                        Jalan Makmur Gang Bakti No. 16b <br>
                        Medan 20114 <br>
                        Email: luthfim904@gmail.com <br>
                        Telepon: 08983874300
                    </p>
                </div>
            </div>
            <hr>
            <p class="m-0 pb-4 text-center">© 2023 GoMarket. All rights reserved.</p>
        </div>
    </footer>
    <script>
        function PrintDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var orginialContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = orginialContents;
        }
    </script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>

</html>