<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\Kelola_data_ksm;

class Stokbarang extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category_id', 'seller_id', 'name', 'stock', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function ksm()
    {
        return $this->belongsTo(Kelola_data_ksm::class, 'kelola_data_ksm_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
