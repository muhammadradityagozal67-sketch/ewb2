<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Upacara Peringatan Hari Pendidikan Nasional 2026',
                'ringkasan' => 'Seluruh siswa dan guru mengikuti upacara peringatan Hardiknas dengan khidmat di lapangan sekolah.',
                'isi' => "Upacara peringatan Hari Pendidikan Nasional tahun 2026 berlangsung khidmat di lapangan SMK INFOKOM Kota Bogor. Seluruh siswa, guru, dan staff mengikuti jalannya upacara dengan tertib. Kepala sekolah dalam sambutannya menekankan pentingnya semangat belajar dan inovasi di era digital.",
                'gambar' => 'berita-1.jpg',
                'penulis' => 'Admin',
                'tanggal' => '2026-05-02',
            ],
            [
                'judul' => 'Siswa SMK INFOKOM Kota Bogor Juara 1 Lomba Robotik Tingkat Provinsi',
                'ringkasan' => 'Tim robotik sekolah berhasil meraih juara 1 dalam kompetisi robotik tingkat Provinsi Jawa Barat.',
                'isi' => "Tim robotik SMK INFOKOM Kota Bogor berhasil meraih juara 1 pada ajang Lomba Robotik Tingkat Provinsi Jawa Barat 2026. Prestasi ini merupakan hasil kerja keras siswa dan pembimbing selama berbulan-bulan persiapan. Sekolah berencana mengirimkan tim ini ke tingkat nasional.",
                'gambar' => 'berita-2.jpg',
                'penulis' => 'Admin',
                'tanggal' => '2026-04-28',
            ],
            [
                'judul' => 'Kegiatan Uji Kompetensi Keahlian (UKK) 2026',
                'ringkasan' => 'Siswa kelas XII mengikuti Uji Kompetensi Keahlian sebagai syarat kelulusan jurusan.',
                'isi' => "Uji Kompetensi Keahlian (UKK) tahun 2026 diikuti oleh seluruh siswa kelas XII dari berbagai jurusan. Kegiatan ini menjadi salah satu syarat kelulusan sekaligus tolak ukur kompetensi siswa sebelum terjun ke dunia kerja atau industri.",
                'gambar' => 'berita-3.jpg',
                'penulis' => 'Admin',
                'tanggal' => '2026-04-20',
            ],
            [
                'judul' => 'Class Meeting Semester Genap 2025/2026',
                'ringkasan' => 'Rangkaian pertandingan olahraga dan seni mewarnai kegiatan class meeting semester ini.',
                'isi' => "Kegiatan Class Meeting semester genap tahun ajaran 2025/2026 diisi dengan berbagai pertandingan olahraga seperti futsal, basket, serta lomba seni antar kelas. Kegiatan ini bertujuan mempererat kebersamaan siswa setelah menyelesaikan ujian akhir semester.",
                'gambar' => 'berita-4.jpg',
                'penulis' => 'Admin',
                'tanggal' => '2026-04-15',
            ],
        ];

        foreach ($data as $item) {
            Berita::create(array_merge($item, [
                'slug' => Str::slug($item['judul']),
            ]));
        }
    }
}
