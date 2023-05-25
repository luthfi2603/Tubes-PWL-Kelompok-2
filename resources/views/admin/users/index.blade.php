@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My users</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <a href="/admin/users/create" class="btn btn-primary mb-3">Create new user</a>
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr class="text-center align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
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
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->provinsi }}</td>
                        <td>{{ $user->kota }}</td>
                        <td>{{ $user->kode_pos }}</td>
                        <td>
                            @if($user->level == 1)
                                Admin
                            @else
                                User
                            @endif
                        </td>
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
    <div class="d-flex justify-content-center mb-5">
        {{ $users->links() }}
    </div>
@endsection