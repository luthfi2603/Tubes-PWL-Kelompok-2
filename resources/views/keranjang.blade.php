@extends('layouts.main')

@section('container')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row text-center">
            <h3>Keranjang Belanja</h3>
        </div>
        <table class="table table-bordered text-center align-middle mt-4">
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
            {{-- <?php
                if(!empty($_SESSION["keranjang"])){
                    $total = "";
                    foreach ($_SESSION["keranjang"] as $keys => $values) {
                        $harga = $values['harga'];
                        $subtotal = $values['qty'] * $harga;
                        $total = ((int)$total + (int)$subtotal);
            ?> --}}
            @php
                $total = 0;
            @endphp
            @foreach ($isiKeranjang as $item)
                @php
                    $subtotal = $item->harga_produk * $item->jumlah;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td class="text-start">
                        <img src="{{ asset('storage/'. $item->image .'') }}" width="80px" class="me-4">
                        Nama :
                        {{ $item->nama_produk }}
                    </td>
                    <td>
                        {{ $item->jumlah }}
                    </td>
                    <td>
                        Rp {{ number_format($item->harga_produk, 0, '.', '.') }}
                    </td>
                    <td>
                        Rp {{ number_format($subtotal, 0, '.', '.') }}
                    </td>
                    <td>
                        <form action="{{ route('productKeranjang.delete', ['keranjang' => $item->id_produk]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="border-0 badge bg-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                {{-- <?php
                        }
                    }
                ?> --}}
            @endforeach
        </table>
        {{-- <?php
            if(isset($_GET['item'])){
                foreach ($_SESSION["keranjang"] as $keys => $values) {
                    if($values['product_id'] == $_GET['item'] ){
                        unset($_SESSION['keranjang'][$keys]);
                    }
                }
                echo"
                    <script>
                        document.location = '?p=keranjang';
                    </script>
                ";
            }
        ?> --}}
        <div class="card mb-3 text-huruf">
            <div class="row">
                <div class="col ms-4 col-4">
                    Total semua:
                </div>
                <div class="col text-end me-4">
                    <span>
                        Rp {{ number_format($total, 0, '.', '.') }}
                    </span>
                </div>
            </div>
        </div>
        <a class="btn btn-dark" href="/">Lanjut Belanja</a>
        <form action="{{ route('productKeranjangAll.delete') }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-dark" onclick="return confirm('Are you sure?')">Hapus Semua</button>
        </form>
        <a class="btn btn-dark" href="konbayar">Berikutnya</a>
        {{-- <?php
            if(isset($_SESSION['username'])){
                echo'
                    <a class="btn btn-dark" href="?p=konPembayaran">Berikutnya</a>
                ';
            }else{
                echo'
                    <a class="btn btn-dark" href="?p=login">Berikutnya</a>
                ';
            }

            if(isset($_GET['act'])){
                if($_GET['act'] == "clear"){
                    unset($_SESSION['keranjang']);
                    echo"
                        <script>
                            document.location.href = '?p=keranjang';
                        </script>
                    ";
                }
            }
        ?> --}}
    </div>
@endsection