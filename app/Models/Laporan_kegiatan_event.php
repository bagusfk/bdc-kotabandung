<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_kegiatan_event extends Model
{
    use HasFactory;

    public function register_event()
    {
        return $this->belongsTo(Register_event::class, 'regist_id');
    }
}
