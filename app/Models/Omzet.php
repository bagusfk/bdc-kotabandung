<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omzet extends Model
{
    use HasFactory;

    protected $table = 'omzets';
    protected $fillable = [
        'month',
        'omzet',
        'total_omzet',
        'profit'
    ];
}
