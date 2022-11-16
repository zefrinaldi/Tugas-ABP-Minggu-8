<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $fillable = [
        'nama_brand',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function gudang(){
        return $this->hasManyThrough(Gudang::class, 
            Product::class,
            'brand_id',
            'id',
            'id',
            'gudang_id'
        );
    }
}
