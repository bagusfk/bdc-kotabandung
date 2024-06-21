<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Stokbarang;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_wa',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasRole(): string
    {
        return $this->role;
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class);
    }

    // public function ksm()
    // {
    //     return $this->belongsTo(Kelola_data_ksm::class, 'ksm_id');
    // }
    public function ksm()
    {
        return $this->hasMany(Kelola_data_ksm::class);
    }

    public function cities()
    {
        return $this->belongsTo(cities::class, 'city_id');
    }
}
