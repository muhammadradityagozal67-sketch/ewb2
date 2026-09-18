<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbPendaftar extends Model
{
    protected $table = 'ppdb_pendaftar';

    protected $fillable = [
        'no_pendaftaran',
        'jalur',
        'jurusan_pilihan_1',
        'jurusan_pilihan_2',
        'nama_lengkap',
        'nisn',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat_tinggal',
        'asal_smp',
        'tahun_lulus',
        'nama_ortu_wali',
        'pekerjaan_ortu',
        'no_hp_ortu',
        'no_hp_siswa',
        'nilai_rata_rata',
        'status',
        'catatan_admin',
    ];

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'diterima'      => ['label' => 'DITERIMA', 'class' => 'bg-green-100 text-green-800 border-green-200'],
            'ditolak'       => ['label' => 'TIDAK DITERIMA', 'class' => 'bg-red-100 text-red-800 border-red-200'],
            'terverifikasi' => ['label' => 'TERVERIFIKASI', 'class' => 'bg-blue-100 text-blue-800 border-blue-200'],
            default         => ['label' => 'MENUNGGU VERIFIKASI', 'class' => 'bg-yellow-100 text-yellow-800 border-yellow-200'],
        };
    }
}
