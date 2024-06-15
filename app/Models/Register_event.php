<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_event extends Model
{
    use HasFactory;

    protected $table = 'register_events';

    // Tambahkan atribut yang dapat diisi massal jika diperlukan
    protected $fillable = ['user_id', 'event_id'];

    // Definisikan hubungan many-to-many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ksm()
    {
        return $this->belongsTo(Kelola_data_ksm::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
