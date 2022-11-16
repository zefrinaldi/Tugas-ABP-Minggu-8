<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
        'brand_id',
        'gudang_id'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function gudang(){
        return $this->belongsTo(Gudang::class, 'gudang_id', 'id');
    }
}
