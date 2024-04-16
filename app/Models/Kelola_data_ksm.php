<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Kelola_data_ksm extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'business_name', 'owner', 'no_whatsapp', 'category_id', 'address'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
