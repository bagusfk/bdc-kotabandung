<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
