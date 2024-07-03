<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Kelola_data_ksm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'owner', 'brand_name', 'category_id', 'no_wa', 'link_ig', 'nib',
        'business_entity', 'address', 'product_sales_address', 'business_description',
        'owner_picture', 'logo_image', 'nib_document', 'permission_letter', 'cluster'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->hasMany(Stokbarang::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
