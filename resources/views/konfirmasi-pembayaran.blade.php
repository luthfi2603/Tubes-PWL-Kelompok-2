@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row text-center">
            <h3>Keranjang Belanja</h3>
        </div>
        <div class="row">
            <div class="col-5 mx-auto">
                <form method="POST" action="/konfirmasi-pembayaran-logic">
                    @csrf
                    <legend>Data Diri</legend>
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" value="{{ $user->nama }}" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Alamat Email</label>
                        <input id="email" type="text" class="form-control" value="{{ $user->email }}" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="text-primary">Nomor Telepon</label>
                        <input id="noHp" type="number" class="form-control" value="{{ $user->no_hp }}" aria-label="readonly input example" readonly>
                    </div>
                    <legend>Detail Alamat</legend>
                    <div class="mb-3">
                        <label for="alamat" class="text-primary">Alamat</label>
                        <input id="alamat" type="text" class="form-control" value="{{ $user->alamat }}" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="text-primary">Kota / Kabupaten</label>
                        <input id="kota" type="text" class="form-control" value="{{ $user->kota }}" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="text-primary">Provinsi</label>
                        <input id="provinsi" type="text" class="form-control" value="{{ $user->provinsi }}" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="text-primary">Kode Pos</label>
                        <input id="kodePos" type="number" class="form-control" value="{{ $user->kode_pos }}" aria-label="readonly input example" readonly>
                    </div>
                    <legend id="scroll">Metode Pembayaran</legend>
                    <div class="mb-3">
                        <label for="namaPembeli" class="text-primary">Nama Pembeli</label>
                        <input name="namaPembeli" value="{{ $user->nama }}" id="namaPembeli" type="text" class="form-control" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="text-primary">e-money</label>
                        <select name="tujuan" id="tujuan" class="form-select @error('tujuan') is-invalid @enderror">
                            @if(old('tujuan') == 'DANA')
                                <option value="DANA" selected>DANA</option>
                                <option value="OVO">OVO</option>
                                <option value="go-pay">go-pay</option>
                            @elseif(old('tujuan') == 'OVO')
                                <option value="DANA">DANA</option>
                                <option value="OVO" selected>OVO</option>
                                <option value="go-pay">go-pay</option>
                            @elseif(old('tujuan') == 'go-pay')
                                <option value="DANA">DANA</option>
                                <option value="OVO">OVO</option>
                                <option value="go-pay" selected>go-pay</option>
                            @else
                                <option selected>Pilih</option>
                                <option value="DANA">DANA</option>
                                <option value="OVO">OVO</option>
                                <option value="go-pay">go-pay</option>
                            @endif
                        </select>
                        @error('tujuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            Pilih jenis e-money yang anda gunakan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="noHpPembayaran" class="text-primary">Nomor HP Pembayaran</label>
                        <input name="noHpPembayaran" value="{{ $user->no_hp }}" id="noHpPembayaran" type="number" class="form-control" aria-label="readonly input example" readonly>
                    </div>
                    <legend>Ringkasan Pembayaran</legend>
                    <div class="mb-3">
                        <label class="text-primary">Total Transaksi</label><br>
                        <span>Rp {{ number_format($total, 0, '.', '.') }}</span>
                        
                    </div>
                    <div class="mb-3">
                        <label for="jumlahBayar" class="text-primary">Jumlah bayar</label>
                        <input name="di_bayar" id="jumlahBayar" type="number" class="form-control @error('di_bayar') is-invalid @enderror" placeholder="Masukkan nominal" value="{{ old('di_bayar') }}">
                        @error('di_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            Masukkan nominal sesuai dengan total transaksi untuk pembayaran, tanpa titik
                        </div>
                    </div>
                    <div>
                        <input hidden type="number" name="total" value="{{ $total }}">
                        <button type="submit" class="btn btn-dark">Bayar Sekarang</button>
                        <a href="/keranjang" class="btn btn-outline-dark">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('scroll').scrollIntoView();
    </script>
@endsection