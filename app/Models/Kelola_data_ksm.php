<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Kelola_data_ksm extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'brand_name', 'owner', 'no_wa', 'category_id', 'address'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
