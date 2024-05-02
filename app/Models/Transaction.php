<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'invoice',
        'address',
        'phone',
        'total_qty',
        'total_price',
        'shipping_cost',
        'payment_method',
        'payment_status',
        'order_status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
