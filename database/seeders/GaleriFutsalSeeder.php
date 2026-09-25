<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriFutsalSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Galeri::create([
            'judul' => 'Juara 1 PSSI Futsal Championship 2023',
            'gambar' => 'futsal-champions.webp',
            'kategori' => 'Prestasi',
        ]);
    }
}
