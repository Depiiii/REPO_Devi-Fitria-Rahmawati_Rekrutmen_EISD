<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kerjaan;
use App\Models\Lamaran;
use App\Models\Ulasan;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'penggunas';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'program_studi',
        'semester',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function kerjaan()
    {
        return $this->hasMany(Kerjaan::class, 'id_user');
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'id_user');
    }
    public function ulasans()
{
    return $this->hasMany(Ulasan::class, 'id_pelamar');
}
}
