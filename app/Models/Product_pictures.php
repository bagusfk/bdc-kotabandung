<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_pictures extends Model
{
    protected $fillable = [
        'product_id',
        'product_picture'
    ];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Stokbarang::class, 'product_id');
    }
}
