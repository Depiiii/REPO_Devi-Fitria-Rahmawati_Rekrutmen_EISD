<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamarans';

    protected $fillable = [
        'id_pekerjaan',
        'id_user',
        'pesan_lamar',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kerjaan()
    {
        return $this->belongsTo(Kerjaan::class, 'id_pekerjaan');
    }
}
