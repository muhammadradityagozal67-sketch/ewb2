<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranMagang extends Model
{
    protected $table = 'pendaftaran_magang';

    protected $fillable = [
        'no_pendaftaran',
        'nama_lengkap',
        'nisn',
        'asal_jurusan',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'status',
    ];
}
