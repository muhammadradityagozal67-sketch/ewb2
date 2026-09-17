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

        $infoTerbaru = [
            [
                'icon' => 'megaphone',
                'kategori' => 'Pengumuman',
                'judul' => 'Jadwal Ujian Tengah Semester Ganjil TA 2025/2026',
                'tanggal' => '20 Mei 2026',
            ],
            [
                'icon' => 'calendar',
                'kategori' => 'Agenda',
                'judul' => 'Upacara Peringatan Hari Pendidikan Nasional',
                'tanggal' => '02 Mei 2026',
            ],
            [
                'icon' => 'trophy',
                'kategori' => 'Prestasi',
                'judul' => 'Juara 1 Lomba Robotik Tingkat Provinsi Jawa Barat',
                'tanggal' => '28 April 2026',
            ],
            [
                'icon' => 'image',
                'kategori' => 'Galeri',
                'judul' => 'Kegiatan Class Meeting Tahun 2026',
                'tanggal' => '25 April 2026',
            ],
        ];

        $statistik = [
            ['label' => 'Siswa Aktif', 'nilai' => '1.250+'],
            ['label' => 'Guru & Staff', 'nilai' => '75+'],
            ['label' => 'Jurusan', 'nilai' => '4'],
            ['label' => 'Prestasi', 'nilai' => '120+'],
        ];

        return view('home', compact('beritaTerbaru', 'galeriTerbaru', 'infoTerbaru', 'statistik'));
    }
}
