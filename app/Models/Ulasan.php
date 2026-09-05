<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasans';

    protected $fillable = [
        'id_pekerjaan',
        'id_pelamar',
        'rating',
        'komentar',
    ];

    public function kerjaan()
{
    return $this->belongsTo(Kerjaan::class, 'id_pekerjaan');
}

public function pelamar()
{
    return $this->belongsTo(User::class, 'id_pelamar');
}
public function pemberiUlasan()
{
    return $this->belongsTo(User::class, 'id_pemberi_ulasan');
}

}
