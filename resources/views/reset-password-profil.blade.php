@extends('layouts.main')

@section('container')
    <div class="container" style="margin-bottom: 270px;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <main class="w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>
                    <form action="/profil/reset-password/ubah" method="POST">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="username" value="{{ $username }}">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-2">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="name@example.com" autofocus>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" placeholder="name@example.com">
                            <label for="konfirmasi_password">Konfirmasi Password</label>
                            @error('konfirmasi_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="mt-2 w-100 btn btn-lg btn-info" type="submit">Reset Password</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection