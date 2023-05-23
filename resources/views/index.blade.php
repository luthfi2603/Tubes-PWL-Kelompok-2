@extends('layouts.main')

@section('container')
    <!--Halaman Home-->
    <!--bagian carousel-->
    <div id="carouselExampleControls" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/carousel1.webp') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/carousel2.png') }}" class="d-block w-100" alt="...">
            </div>
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

    <!--carousel card-->
    <div class="alert alert-success text-center p-0 mb-4" role="alert">
        <h1>Rekomendasi Barang</h1>
    </div>
    {{-- <h1 class="text-center mb-4" style="background-color: mediumaquamarine;">Rekomendasi Barang</h1> --}}
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
    </div>

    <!--Card barang-->
    <div class="alert alert-success text-center p-0 my-4" role="alert">
        <h1>Makanan dan Minuman</h1>
    </div>
    {{-- <h1 class="text-center my-4" style="background-color: mediumaquamarine;">Barang Lainnya</h1> --}}
    <div class="container">
        <div class="row mb-4">
            @php $i=1; @endphp
            @if(isset($posts))
            @foreach($posts as $post)
            <div class="col-3">
                <div class="card">
                    <img src="{{asset('assets/img/'.$post->image_product)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->product_name}}</h5>
                        <p class="card-text">{{$post->price}}</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
           <!--
            <div class="col-3">
                <div class="card">
                    <img src="{{$post->image_product}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->product_name}}</h5>
                        <p class="card-text">{{$post->price}}</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <img src="assets/img/sabun.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama barang</h5>
                        <p class="card-text">Harga</p>
                        <a href="detail_barang.html" class="btn btn-primary">Detail Barang</a>
                    </div>
                </div>
            </div>
        -->
        </div>
    </div>
    @php $i++; @endphp
    @endforeach
    @endif
@endsection