@extends('layouts.main')

@section('container')
<div class="container" style="margin-bottom: 212px;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="mt-2 w-100 btn btn-lg btn-info" type="submit">login</button>
                </form>
                <small class="d-block text-center mt-3">Belum daftar? <a class="text-decoration-none" href="/daftar">Daftar Sekarang!</a></small>
            </main>
        </div>
    </div>
</div>
{{-- <div class="container mb-5">
    <div class="container">
        <div class="row-sm">
            <div class="card mx-3 my-3">
                <div class="card-body">
                    <div class="card-title">
                        <form method="POST" class="my-login-validation" novalidate="">
                            <div class="form-group">
                                <h3 class="text-center">Login</h3>
                                <p class="mt-2">Username</p>
                                <input id="email" type="text" class="form-control" name="username" value="" required
                                    autofocus>
                                <div class="invalid-feedback">
                                    Email tidak valid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password"> Password </label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    data-eye>
                                <div class="invalid-feedback">
                                    Password tidak valid
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mt-3" name="btnlogin"> Login</button>
                            <hr style="border-top: 1px solid grey;">
                            <a type="button" href="lupa_pass.php" class="btn btn-block btn-link mt-2">Lupa Sandi?</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-sm">
            <div class="card mx-3 my-3">
                <div class="card-body">
                    <div class="card-title">
                        <button type="button" class="btn btn-block btn-link mt-1">
                            <a href="register.html">Belum memiliki akun? Daftar sekarang!</a></button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div> --}}
@endsection