<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Informasi::create([
            'kategori' => 'Pengumuman',
            'judul' => 'Jadwal Ujian Tengah Semester Ganjil TA 2025/2026',
            'slug' => \Illuminate\Support\Str::slug('Jadwal Ujian Tengah Semester Ganjil TA 2025/2026'),
            'tanggal' => '2026-05-20',
            'isi' => 'Ini adalah isi detail dari pengumuman jadwal ujian.',
        ]);
        
        \App\Models\Informasi::create([
            'kategori' => 'Agenda',
            'judul' => 'Upacara Peringatan Hari Pendidikan Nasional',
            'slug' => \Illuminate\Support\Str::slug('Upacara Peringatan Hari Pendidikan Nasional'),
            'tanggal' => '2026-05-02',
            'isi' => 'Seluruh siswa dan guru diwajibkan mengikuti upacara Hari Pendidikan Nasional.',
        ]);

        \App\Models\Informasi::create([
            'kategori' => 'Prestasi',
            'judul' => 'Juara 1 PSSI CUP LIGA ANTAR PELAJAR KOTA BOGOR',
            'slug' => \Illuminate\Support\Str::slug('Juara 1 PSSI CUP LIGA ANTAR PELAJAR KOTA BOGOR'),
            'tanggal' => '2026-04-28',
            'isi' => 'Tim sepak bola SMK INFOKOM berhasil meraih Juara 1 pada ajang PSSI CUP Liga Antar Pelajar se-Kota Bogor.',
        ]);

        \App\Models\Informasi::create([
            'kategori' => 'Galeri',
            'judul' => 'Kegiatan Class Meeting Tahun 2026',
            'slug' => \Illuminate\Support\Str::slug('Kegiatan Class Meeting Tahun 2026'),
            'tanggal' => '2026-04-25',
            'isi' => 'Dokumentasi kegiatan class meeting yang diadakan setelah ujian akhir semester.',
        ]);
    }
}
