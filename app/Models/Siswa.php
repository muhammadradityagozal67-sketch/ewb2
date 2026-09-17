<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['user_id', 'nisn', 'nama', 'kelas', 'jurusan', 'nama_ortu', 'ortu_user_id'];

    public function nilai() { return $this->hasMany(Nilai::class, 'siswa_id'); }
    public function absensi() { return $this->hasMany(Absensi::class, 'siswa_id'); }
    public function tagihan() { return $this->hasMany(Tagihan::class, 'siswa_id'); }
    public function eskul() { return $this->hasMany(Eskul::class, 'siswa_id'); }
    public function peminjamanBuku() { return $this->hasMany(PeminjamanBuku::class, 'siswa_id'); }
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function ortuUser() { return $this->belongsTo(User::class, 'ortu_user_id'); }
}
