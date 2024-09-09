<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelola_data_penjualan extends Model
{
    protected $fillable = [
        'dated',
        'kode',
        'description',
        'debit',
        'kredit'
    ];
}
