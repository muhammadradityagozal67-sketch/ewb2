<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasis';

    protected $fillable = [
        'kategori',
        'judul',
        'slug',
        'isi',
        'gambar',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
