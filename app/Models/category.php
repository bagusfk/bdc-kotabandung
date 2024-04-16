<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stokbarang;
use App\Models\Kelola_data_ksm;

class category extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Stokbarang::class);
    }

    public function ksm()
    {
        return $this->hasMany(Kelola_data_ksm::class);
    }
}
