@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pesanan</h1>
</div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Kode Pembelian</th>
                    <th scope="col">Jumlah Pembayaran</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Print</th>
                </tr>
            </thead>
            <tbody>
                @if($pembelian->count() == 0)
                <td colspan="8">Tidak ada pembelian</td>
                @endif
                @foreach($pembelian as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_pembelian }}</td>
                        <td>{{ $item->id_pembelian }}</td>
                        <td>Rp {{ number_format($item->total_pembelian, 0, '.', '.') }}</td>
                        <td>{{ $item->status_pembayaran }}</td>
                        <td>{{ $item->status_pembelian }}</td>
                        <td><a href="{{ route('edit-status', ['pembelian' => $item->id_pembelian]) }}" class="badge bg-warning"><span data-feather="edit"></span></a></td>
                        <td><a href="{{ route('faktur', ['id' => $item->id_pembelian]) }}" class="badge bg-primary"><span data-feather="printer"></span></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection