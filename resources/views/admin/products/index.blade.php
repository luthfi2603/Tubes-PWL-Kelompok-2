@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <a href="/admin/products/add" class="btn btn-primary mb-3">Add new produtct</a>
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
                @foreach($products as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if($user->image == 'assets/img/no_photo.png')
                            <td><img src="{{ asset('../' . $user->image . '') }}" width="50px"></td>
                        @else
                            <td><img src="{{ asset('storage/' . $user->image . '') }}" width="50px"></td>
                        @endif
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="{{ route('users.delete', ['user' => $user->id]) }}" method="POST" class="d-inline">
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
@endsection