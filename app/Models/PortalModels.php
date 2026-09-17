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

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['siswa_id', 'mata_pelajaran', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_akhir', 'kkm', 'semester'];
    public function siswa() { return $this->belongsTo(Siswa::class, 'siswa_id'); }
}

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['siswa_id', 'bulan', 'hadir', 'sakit', 'izin', 'alpa'];
    public function siswa() { return $this->belongsTo(Siswa::class, 'siswa_id'); }
}

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $fillable = ['siswa_id', 'jenis', 'bulan', 'jumlah', 'status', 'jatuh_tempo'];
    public function siswa() { return $this->belongsTo(Siswa::class, 'siswa_id'); }
}

class Eskul extends Model
{
    protected $table = 'eskul';
    protected $fillable = ['siswa_id', 'nama_eskul', 'pelatih', 'hari', 'nilai'];
    public function siswa() { return $this->belongsTo(Siswa::class, 'siswa_id'); }
}

class PeminjamanBuku extends Model
{
    protected $table = 'peminjaman_buku';
    protected $fillable = ['siswa_id', 'judul_buku', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'denda'];
    public function siswa() { return $this->belongsTo(Siswa::class, 'siswa_id'); }
}

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['ip_address', 'session_id', 'user_agent'];
}
