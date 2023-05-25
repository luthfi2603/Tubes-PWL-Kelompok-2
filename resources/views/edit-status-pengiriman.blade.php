@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row text-center">
            <h3>Edit Status Pengiriman</h3>
        </div>
        <div class="row">
            <div class="col-4 mx-auto">
                <form method="POST" action="{{ route('edit-status-logic') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="text-primary">Tanggal Pembelian</label>
                        <input value="{{ $pembelian->tanggal_pembelian }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Kode Pembelian</label>
                        <input value="{{ $pembelian->id_pembelian }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Jumlah Pembayaran</label>
                        <input value="Rp {{ number_format($pembelian->total_pembelian, 0, '.', '.') }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="text-primary">Status Pembayaran</label>
                        <input value="{{ $pembelian->status_pembayaran }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pengiriman" class="text-primary">Status Pengiriman</label> <br>
                        <select name="pengiriman" id="pengiriman" class="form-select @error('pengiriman') is-invalid @enderror" autofocus>
                            <option selected>Pilih Status Pengiriman</option>
                            <option value="PENDING">PENDING</option>
                            <option value="SENT">SENT</option>
                        </select>
                        @error('pengiriman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <input type="hidden" name="id" value="{{ $pembelian->id_pembelian }}">
                        <button class="btn btn-dark tombol" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection