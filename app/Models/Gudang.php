<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $fillable = [
        'nama_gudang',
        'alamat_gudang',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'gudang_id', 'id');
    }
}
