<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_product',
        'harga',
        'ukuran',
        'deskripsi',
        'gambar',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
