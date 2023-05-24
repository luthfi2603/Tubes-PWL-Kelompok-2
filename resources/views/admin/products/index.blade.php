@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <a href="/admin/products/add" class="btn btn-primary mb-3">Add new product</a>
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if($product->image == 'assets/img/no_photo.png')
                            <td><img src="{{ asset('../' . $product->image . '') }}" width="100px"></td>
                        @else
                            <td><img src="{{ asset('storage/' . $product->image . '') }}" width="100px"></td>
                        @endif
                        <td>{{ $product->nama_produk }}</td>
                        <td width="110px">Rp {{ number_format($product->harga_produk, 0, '.', '.') }}</td>
                        <td>{{ $product->kategori_produk }}</td>
                        <td>{{ $product->merek_produk }}</td>
                        <td>{{ $product->deskripsi_produk }}</td>
                        <td>
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="{{ route('products.delete', ['product' => $product->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 badge bg-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $products->links() }}
    </div>
@endsection