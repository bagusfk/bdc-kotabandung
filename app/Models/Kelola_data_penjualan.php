<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelola_data_penjualan extends Model
{
    protected $fillable = [
        'kas',
        'bank_bjb',
        'bank_bandung',
        'sewa_bayar_dimuka',
        'piutang',
        'persediaan',
        'inventaris',
        'investasi',
        'harta_tetap',
        'penyusutan_harta_tetap',
        'hutang',
        'alokasi_bop_komite',
        'alokasi_bop_pengelola',
        'alokasi_gaji_pengelola',
        'alokasi_gaji_tenaga_ahli',
        'alokasi_pengembangan_kapasitas',
        'alokasi_sewa_kantor_dan_peralatan',
        'modal_bdc',
        'modal_awal',
        'pemupukan_modal_dari_laba',
        'lr_tahun_lalu',
        'lr_tahun_berjalan',
    ];
}
