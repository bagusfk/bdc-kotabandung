<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buyer_id',
        'qty',
        'total_price',
    ];

    public function stokbarang()
    {
        return $this->belongsTo(Stokbarang::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
