@extends('layouts.main')

@section('container')
    @if(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show col-8 mx-auto" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-8 mx-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!--Halaman Home-->
    <!--bagian carousel-->
    <div id="gambarAwal" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/carousel1.webp') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/carousel2.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#gambarAwal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#gambarAwal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--carousel card-->
    {{-- <div class="alert alert-success text-center p-0 mb-4" role="alert">
        <h1>Rekomendasi Barang</h1>
    </div>
    <div class="container">
        <div id="carousel-card" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/gula.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Gula</h5>
                                    <p class="card-text">This is a description of card 1.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/indomie.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Indomie</h5>
                                    <p class="card-text">This is a description of card 2.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/meja.webp') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Meja Makan</h5>
                                    <p class="card-text">This is a description of card 3.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/minyak.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Minyak</h5>
                                    <p class="card-text">This is a description of card 4.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/pel.webp') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Alat Pel Lantai</h5>
                                    <p class="card-text">This is a description of card 5.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/sabun.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Sabun</h5>
                                    <p class="card-text">This is a description of card 6.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/shampo.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Shampo</h5>
                                    <p class="card-text">This is a description of card 7.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/spatula.jpg') }}" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Spatula</h5>
                                    <p class="card-text">This is a description of card 8.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-card" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-card" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div> --}}

    <!--Card barang-->
    <div class="alert alert-success text-center p-0 my-4" role="alert">
        <h1>Semua Produk</h1>
    </div>
    <div class="container">
        <div class="row">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nama_produk }}</h5>
                                <p class="card-text">
                                    Harga : <br>
                                    Rp {{ number_format($product->harga_produk, 0, '.', '.') }}
                                    <br>
                                    <div style="overflow: hidden;height: 100px;">
                                        {{ $product->deskripsi_produk }}
                                    </div>
                                </p>
                                <a href="/detail/{{ $product->id }}" class="btn btn-outline-success">Detail Barang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection