<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Nilai extends Model { protected $table = 'nilai'; protected $fillable = ['siswa_id','mata_pelajaran','nilai_tugas','nilai_uts','nilai_uas','nilai_akhir','kkm','semester']; }
