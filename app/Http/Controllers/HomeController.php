<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::orderByDesc('tanggal')->take(4)->get();
        $galeriTerbaru = Galeri::orderByDesc('id')->take(6)->get();
        $infoTerbaru = \App\Models\Informasi::orderByDesc('tanggal')->take(4)->get();

        $statistik = [
            ['label' => 'Siswa Aktif', 'nilai' => '950+'],
            ['label' => 'Guru & Staff', 'nilai' => '32+'],
            ['label' => 'Jurusan', 'nilai' => '4'],
            ['label' => 'Prestasi', 'nilai' => '120+'],
        ];

        $profil = \App\Models\Profil::first();

        return view('home', compact('beritaTerbaru', 'galeriTerbaru', 'infoTerbaru', 'statistik', 'profil'));
    }
}
