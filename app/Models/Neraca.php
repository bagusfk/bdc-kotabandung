<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neraca extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjualan',
        'diskon',
        'pendapatan_komisi',
        'jasa_bank',
        'pendapatan_lainnya',
        'persediaan_barang_awal',
        'pembelian_barang',
        'biaya_pengiriman',
        'biaya_lain',
        'persediaan_barang_akhir',
    ];
}
