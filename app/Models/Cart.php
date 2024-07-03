<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelola_data_ksm_id',
        'product_id',
        'buyer_id',
        'qty',
        'total_price',
    ];

    public function stokbarang()
    {
        return $this->belongsTo(Stokbarang::class, 'product_id');
    }

    public function ksm()
    {
        return $this->belongsTo(Kelola_data_ksm::class, 'kelola_data_ksm_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
