<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omzet extends Model
{
    use HasFactory;

    protected $table = 'omzets';
    protected $fillable = [
        'kelola_data_ksm_id',
        'omzet'
    ];

    public function ksm()
    {
        return $this->belongsTo(Kelola_data_ksm::class, 'kelola_data_ksm_id');
    }
}
