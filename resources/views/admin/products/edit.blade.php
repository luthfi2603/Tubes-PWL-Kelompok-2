@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Product</h1>
    </div>
    @if(session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="my-4">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-5 mx-auto">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" placeholder="Masukkan nama_produk produk" autofocus value="{{ old('nama_produk', $product->nama_produk) }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga</label>
                        <input name="harga_produk" type="text" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" placeholder="Masukkan harga_produk" value="{{ old('harga_produk', $product->harga_produk) }}">
                        @error('harga_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori_produk" class="form-label">Kategori</label>
                        <input name="kategori_produk" type="text" class="form-control @error('kategori_produk') is-invalid @enderror" id="kategori_produk" placeholder="Masukkan kategori_produk" value="{{ old('kategori_produk', $product->kategori_produk) }}">
                        @error('kategori_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="merek_produk" class="form-label">Merek</label>
                        <input name="merek_produk" type="text" class="form-control @error('merek_produk') is-invalid @enderror" id="merek_produk" placeholder="Masukkan merek_produk" value="{{ old('merek_produk', $product->merek_produk) }}">
                        @error('merek_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_produk" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi_produk" class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk" cols="30" rows="10">{{ old('deskripsi_produk', $product->deskripsi_produk) }}</textarea>
                        @error('deskripsi_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldImage" value="{{ $product->image }}">
                        <label for="image" class="form-label">Gambar</label>
                        @if($product->image == 'assets/img/no_photo.png')
                            <td><img src="{{ asset('../' . $product->image . '') }}" width="50px" class="img-preview img-fluid mb-3 col-sm-5 d-block"></td>
                        @else
                            <td><img src="{{ asset('storage/' . $product->image . '') }}" width="50px" class="img-preview img-fluid mb-3 col-sm-5 d-block"></td>
                        @endif
                        <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="d-grid gap-2 col-3 mt-1">
                    <button class="btn btn-dark" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection