<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_produk';
    protected $fillable = [
        'nama_produk', 'image','harga', 'stock'
    ];
}
