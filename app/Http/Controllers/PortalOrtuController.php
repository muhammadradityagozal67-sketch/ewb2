<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class PortalOrtuController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $siswa = Siswa::where('ortu_user_id', $user->id)->first();
        if (!$siswa) {
            return view('portal.ortu-dashboard', ['siswa' => null, 'tagihan' => collect(), 'nilai' => collect(), 'absensi' => collect(), 'eskul' => collect(), 'perpustakaan' => collect()]);
        }
        $tagihan = $siswa->tagihan()->orderBy('status')->get();
        $nilai = $siswa->nilai()->get();
        $absensi = $siswa->absensi()->get();
        $eskul = $siswa->eskul()->get();
        $perpustakaan = $siswa->peminjamanBuku()->get();
        return view('portal.ortu-dashboard', compact('siswa', 'tagihan', 'nilai', 'absensi', 'eskul', 'perpustakaan'));
    }
}
