@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New User</h1>
    </div>

    <div class="my-4">
        <form action="/admin/users/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama anda" autofocus value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="gender">
                            @if(old('gender') == 'Pria')
                                <option value="Pria" selected>Pria</option>
                                <option value="Wanita">Wanita</option>
                            @elseif(old('gender') == 'Wanita')
                                <option value="Pria">Pria</option>
                                <option value="Wanita" selected>Wanita</option>
                            @else
                                <option selected>Pilih jenis kelamin anda</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            @endif
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan alamat anda" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input name="kota" type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" placeholder="Masukkan kota anda" value="{{ old('kota') }}">
                        @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input name="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" placeholder="Masukkan provinsi anda" value="{{ old('provinsi') }}">
                        @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input name="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" placeholder="Masukkan kode pos anda" value="{{ old('kode_pos') }}">
                        @error('kode_pos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" class="form-select @error('level') is-invalid @enderror" id="level">
                            @if(old('level') == '1')
                                <option value="1" selected>Admin</option>
                                <option value="0">User</option>
                            @elseif(old('level') == '0')
                                <option value="1">Admin</option>
                                <option value="0" selected>User</option>
                            @else
                                <option selected>Pilih jenis level</option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            @endif
                        </select>
                        @error('level')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Telepon</label>
                        <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan nomor telepon anda" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan username anda" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password anda">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="konfirmasi_password" class="form-label">Konfirmasi Password </label>
                        <input name="konfirmasi_password" type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" placeholder="Masukkan konfirmasi password anda">
                        @error('konfirmasi_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email anda" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Profil</label>
                        <input name="image" id="image" type="file" class="form-control" placeholder="Masukkan source gambar">
                        <div class="form-text">rasio gambar 1:1, ukuran kurang dari 2 MB</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="d-grid gap-2 col-3 mt-1">
                    <button class="btn btn-dark" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection