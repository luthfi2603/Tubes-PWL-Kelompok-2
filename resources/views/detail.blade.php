@extends('layouts.main')

@section('container')
    <div class="container">
        @if(session()->has('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row text-center">
            <h3>Detail Produk</h3>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <img src="{{ asset('storage/' . $product->image . '') }}" alt="{{ $product->nama_produk }}" width="100%">
            </div>
            <div class="col-8 ps-5">
                <form action="/keranjang" method="POST">
                    @csrf
                    <input type="hidden" name="id_produk" value="{{ $product->id }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                    <input type="hidden" name="nama_produk" value="{{ $product->nama_produk }}">
                    <input type="hidden" name="harga_produk" value="{{ $product->harga_produk }}">
                    <h4 class="text-center">
                        {{ $product->nama_produk }}
                    </h4>
                    <h5 class="m-0">Harga</h5>
                    <span>Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</span>
                    <h5 class="m-0 mt-2">Deskripsi</h5>
                    <p class="m-0 text-justify">
                        {{ $product->deskripsi_produk }}
                    </p>
                    @can('admin')
                    @else
                        <h5 class="m-0 mt-2">Jumlah</h5>
                        <input class="jumlah" type="number" name="jumlah" min="1"> <br>
                        <button class="btn btn-dark mt-2" type="submit">Tambah ke keranjang</button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endsection