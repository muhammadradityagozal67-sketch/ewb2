<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'nisn'];
    protected $hidden = ['password', 'remember_token'];

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isOrtu(): bool { return $this->role === 'ortu'; }
    public function isSiswa(): bool { return $this->role === 'siswa'; }

    public function siswa() { return $this->hasOne(Siswa::class, 'user_id'); }
    public function anakSiswa() { return $this->hasOne(Siswa::class, 'ortu_user_id'); }
}
