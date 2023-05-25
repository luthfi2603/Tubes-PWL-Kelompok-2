<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model {
    use HasFactory;
    protected $fillable = [
        'id_pembelian',
        'user_id',
        'nama_pembeli',
        'tanggal_pembelian',
        'total_pembelian',
        'e_money',
        'e_money_number',
        'status_pembayaran',
        'status_pembelian'
    ];
    protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}