<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_harga',
        'status',
        'tanggal_transaksi',
        
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke model Product
    public function Product()
    {
        return $this->belongsTo((Product::class));
    }
}
