<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model {
    use HasFactory;
    protected $fillable = [
        'id_produk',
        'jumlah',
        'image',
        'nama_produk',
        'harga_produk'
    ];
}