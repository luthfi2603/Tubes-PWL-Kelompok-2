@extends('layouts.main')

@section('container')

<div class="container mtNav justify-content-center">
    <div class="form">
        <div class="card col-4 marAdmin p-0">
            <div class="card-header bg-ijo2">
                <h4 class="card-title text-center mb-0 text-black">Konfirmasi Pembayaran</h4>
            </div>
            <div class="card-body text-huruf">
                <form method="POST" action="">
                    <legend>Data Diri</legend>
                    <div class="mb-3">
                        <label for="nama" class="text-primary">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Alamat Email</label>
                        <input id="email" type="text" class="form-control" name="email" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="text-primary">Nomor Telepon</label>
                        <input id="noHp" type="number" class="form-control" name="noHp" required value="">
                    </div>
                    <legend>Detail Alamat</legend>
                    <div class="mb-3">
                        <label for="alamat" class="text-primary">Alamat</label>
                        <input id="alamat" type="text" class="form-control" name="alamat" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="text-primary">Kota / Kabupaten</label>
                        <input id="kota" type="text" class="form-control" name="kota" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="text-primary">Provinsi</label>
                        <input id="provinsi" type="text" class="form-control" name="provinsi" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="text-primary">Kode Pos</label>
                        <input id="kodePos" type="number" class="form-control" name="kodePos" required value="">
                    </div>
                    <legend>Metode Pembayaran</legend>
                    <div class="mb-3">
                        <label for="namaPembeli" class="text-primary">Nama Pembeli</label>
                        <input id="namaPembeli" type="text" class="form-control" name="namaPembeli" required placeholder="Isikan nama anda" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="text-primary">e-money</label>
                        <select name="tujuan" id="tujuan" class="form-control">
                            <option value="blank">Pilih</option>
                            <option value="DANA">DANA</option>
                            <option value="OVO">OVO</option>
                            <option value="go-pay">go-pay</option>
                        </select>
                        <div class="form-text">
                            Pilih jenis e-money yang anda gunakan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="noHpPembayaran" class="text-primary">Nomor HP Pembayaran</label>
                        <input id="noHpPembayaran" type="number" class="form-control" name="noHpPembayaran" required placeholder="Isikan nomer e-money anda">
                    </div>
                    <legend>Ringkasan Pembayaran</legend>
                    <div class="mb-3">
                        <label for="email" class="text-primary">Total Transaksi</label><br>
                        <span>
                        </span>
                        <input hidden type="number" name="hidden_total" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahBayar" class="text-primary">Jumlah bayar</label>
                        <input id="jumlahBayar" type="number" class="form-control" name="bayar" required placeholder="Masukkan nominal">
                        <div class="form-text">
                            Masukkan nominal sesuai dengan total transaksi untuk pembayaran, tanpa titik
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark" name="checkout">Bayar Sekarang</button>
                        <a href="inc/.." class="btn btn-outline-dark">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection