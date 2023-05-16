@extends('layouts.main')

@section('container')
    <div class="container" style="margin-bottom: 270px;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session()->has('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('gagal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <main class="w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Konfirmasi Email</h1>
                    <form action="/konfirmasi-email" method="POST">
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
                        <button class="mt-2 w-100 btn btn-lg btn-info" type="submit">Konfirmasi Email</button>
                    </form>
                    <small class="d-block text-center mt-3">
                        <a class="text-decoration-none" href="/login">Kembali ke login</a>
                    </small>
                </main>
            </div>
        </div>
    </div>
@endsection