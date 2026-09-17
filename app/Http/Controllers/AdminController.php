<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Visitor;
use App\Models\Berita;
use App\Models\Galeri;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalBerita = Berita::count();
        $totalPengunjung = Visitor::count();
        $gurus = Guru::orderBy('urutan')->get();
        return view('admin.dashboard', compact('totalGuru', 'totalSiswa', 'totalBerita', 'totalPengunjung', 'gurus'));
    }
}
