<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_penjualan extends Model
{
    use HasFactory;

    protected $table = 'laporan_penjualans';
    // Assuming 'total_price' is the only field you need to access
    protected $fillable = ['total_product'];
}
