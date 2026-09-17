<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tagihan extends Model { protected $table = 'tagihan'; protected $fillable = ['siswa_id','jenis','bulan','jumlah','status','jatuh_tempo']; }
