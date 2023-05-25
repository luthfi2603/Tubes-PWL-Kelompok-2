@extends('admin.layouts.main')

@section('container')
    <div class="mt-4 mb-5">
        <div class="text-end mb-4">
            <button class="btn btn-info" onclick="PrintDiv('divToPrint')"><span data-feather="printer"></span></button>
        </div>
        <div id="divToPrint">
            <div class="container">
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
                        <h3>Faktur Pemesanan</h3>
                        <h5>Kode Pemesanan : {{ $idPembelian }}</h5>
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
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection