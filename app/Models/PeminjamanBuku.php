<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PeminjamanBuku extends Model { protected $table = 'peminjaman_buku'; protected $fillable = ['siswa_id','judul_buku','tanggal_pinjam','tanggal_kembali','status','denda']; }
