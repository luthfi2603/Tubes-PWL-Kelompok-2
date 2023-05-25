@extends('layouts.main')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-8 mx-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="divToPrint">
        <div class="container mtNav">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets/img/logo.png') }}" width="100px">
                </div>
                <div class="col text-end">
                    <address>
                        Jalan Makmur Gang Bakti No. 16b <br>
                        Telepon : 08983874300 <br>
                        Email : luthfim904@gmail.com
                    </address>
                </div>
                <div class="col-12 text-center">
                    <h3>Bukti Pembelian</h3>
                    <h5>Kode Pemesanan : {{ session('idPembelian') }}</h5>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong>Detail Pemesan</strong>
                    <address>
                        Nama :     {{ $data1->user->nama }} <br>
                        Alamat :   {{ $data1->user->alamat }} <br>
                        Kota :     {{ $data1->user->kota }} <br>
                        Provinsi : {{ $data1->user->provinsi }} <br>
                        Kode Pos : {{ $data1->user->kode_pos }} <br>
                        No. HP :   {{ $data1->user->no_hp }}
                    </address>
                </div>
                <div class="col-6 text-end">
                    <strong>Tanggal Pemesanan</strong> <br>
                    {{ $data1->tanggal_pembelian }} <br>
                    <strong>Detail Pembayaran</strong> <br>
                        {{ $data1->nama_pembeli }} <br>
                        {{ $data1->e_money }} <br>
                        {{ $data1->e_money_number }} <br>
                </div>
            </div>
            <div class="col-lg-12">
                <table width="100%" class="table table-bordered text-center align-middle border-dark">
                    <thead>
                        <tr class="bg-ijo2">
                            <th>No</th>
                            <th colspan="2">Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($data2 as $item)
                            @php
                                $subtotal = $item->harga * $item->jumlah;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$item->image.'') }}" width="80px">
                                </td>
                                <td class="text-start">
                                    Kode : {{ $item->product_id }} <br>
                                    Nama : {{ $item->nama }}
                                </td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp {{ number_format($item->harga, 0, '.', '.') }}</td>
                                <td>Rp {{ number_format($subtotal, 0, '.', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">T  o  t  a  l</td>
                            <td>Rp {{ number_format($total, 0, '.', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            <div class="col-lg-12">
                <p class="bukti1">
                    Silahkan Melakukan Pembayaran sebesar Rp {{ number_format($total, 0, '.', '.') }},- ke <br>
                    <strong>
                        {{ $data1->e_money }} 08983874300 A/N GoMarket. <br>
                        Jika sudah, kirim bukti pembayaran ke email GoMarket supaya kami akan kirim resi pengiriman.
                    </strong> <br>
                    jika ada keluhan, kritik, dan saran hubungi Customer service GoMarket di nomor : 08983874300
                </p>
                <p>
                    <strong class="bukti2"> NB:</strong>
                    simpan bukti pembelian ini sampai barang sudah terkirim kepada anda.
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container mb-4">
        <div class="row text-end">
            <form action="/bukti-pembelian" method="POST">
                @csrf
                <input type="button" value="Print" class="btn btn-success text-white" onclick="PrintDiv('divToPrint')">
                <input type="submit" name="finish" value="Selesai" class="btn btn-dark">
            </form>
        </div>
        
    </div>
@endsection