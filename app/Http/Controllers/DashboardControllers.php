<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class PortalOrtuController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $siswa = Siswa::where('ortu_user_id', $user->id)->first();
        if (!$siswa) {
            return view('portal.ortu-dashboard', ['siswa' => null]);
        }
        $tagihan = $siswa->tagihan()->orderBy('status')->get();
        $nilai = $siswa->nilai()->get();
        $absensi = $siswa->absensi()->get();
        $eskul = $siswa->eskul()->get();
        $perpustakaan = $siswa->peminjamanBuku()->get();
        return view('portal.ortu-dashboard', compact('siswa', 'tagihan', 'nilai', 'absensi', 'eskul', 'perpustakaan'));
    }
}

class PortalSiswaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();
        if (!$siswa) {
            return view('portal.siswa-dashboard', ['siswa' => null]);
        }
        $tagihan = $siswa->tagihan()->orderBy('status')->get();
        $nilai = $siswa->nilai()->get();
        $absensi = $siswa->absensi()->get();
        return view('portal.siswa-dashboard', compact('siswa', 'tagihan', 'nilai', 'absensi'));
    }
}

class GuruController extends Controller
{
    public function index()
    {
        $pimpinan = Guru::where('urutan', '<=', 6)->orderBy('urutan')->get();
        $struktural = Guru::whereBetween('urutan', [7, 13])->orderBy('urutan')->get();
        $staff = Guru::where('urutan', '>', 13)->orderBy('urutan')->get();
        return view('guru', compact('pimpinan', 'struktural', 'staff'));
    }
}
