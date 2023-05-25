<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model {
    use HasFactory;
    protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}