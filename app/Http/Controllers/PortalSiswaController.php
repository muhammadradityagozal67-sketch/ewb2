<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class PortalSiswaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();
        if (!$siswa) {
            return view('portal.siswa-dashboard', ['siswa' => null, 'tagihan' => collect(), 'nilai' => collect(), 'absensi' => collect()]);
        }
        $tagihan = $siswa->tagihan()->orderBy('status')->get();
        $nilai = $siswa->nilai()->get();
        $absensi = $siswa->absensi()->get();
        return view('portal.siswa-dashboard', compact('siswa', 'tagihan', 'nilai', 'absensi'));
    }
}
