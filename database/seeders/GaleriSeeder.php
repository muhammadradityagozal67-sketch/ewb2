<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['judul' => 'Pertandingan Futsal Antar Kelas', 'gambar' => 'galeri-1.jpg', 'kategori' => 'Olahraga'],
            ['judul' => 'Praktik Laboratorium Komputer', 'gambar' => 'galeri-2.jpg', 'kategori' => 'Akademik'],
            ['judul' => 'Tim Robotik Juara Provinsi', 'gambar' => 'galeri-3.jpg', 'kategori' => 'Prestasi'],
            ['judul' => 'Kunjungan Industri Siswa', 'gambar' => 'galeri-4.jpg', 'kategori' => 'Kegiatan'],
            ['judul' => 'Pentas Seni Tahunan', 'gambar' => 'galeri-5.jpg', 'kategori' => 'Seni'],
            ['judul' => 'Upacara Bendera Rutin', 'gambar' => 'galeri-6.jpg', 'kategori' => 'Kegiatan'],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
