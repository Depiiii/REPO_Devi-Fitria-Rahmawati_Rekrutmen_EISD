<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kerjaan extends Model
{
    use HasFactory;

    protected $table = 'kerjaans';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'nama',
        'imbalan',
        'lokasi',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'imbalan' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'id_pekerjaan');
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_pekerjaan');
    }
}
