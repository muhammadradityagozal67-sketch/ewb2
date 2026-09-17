<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Eskul extends Model { protected $table = 'eskul'; protected $fillable = ['siswa_id','nama_eskul','pelatih','hari','nilai']; }
