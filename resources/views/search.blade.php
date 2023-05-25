@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="search" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
                <button class="btn btn-outline-success me-1" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
        </div>
    </div>
</div>
    <!--Card barang-->
    <div class="container">
        <div class="row">
            @if($products->count())
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
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
    @else
        <p class="text-center fs-4">Tidak Ditemukan</p>
    @endif

@endsection