<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'event_name', 'event_organizer', 'event_date_start', 'event_date_end', 'location', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registeredUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function peserta()
    {
        return $this->hasMany(Register_event::class);
    }
}
