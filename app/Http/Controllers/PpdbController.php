<?php

namespace App\Http\Controllers;

class PpdbController extends Controller
{
    public function index()
    {
        $jalur = [
            [
                'nama' => 'Jalur Prestasi',
                'deskripsi' => 'Untuk calon siswa dengan nilai akademik atau prestasi non-akademik (lomba, olahraga, seni) yang unggul.',
            ],
            [
                'nama' => 'Jalur Reguler',
                'deskripsi' => 'Pendaftaran umum berdasarkan nilai rapor dan hasil tes seleksi masuk.',
            ],
            [
                'nama' => 'Jalur Afirmasi',
                'deskripsi' => 'Untuk calon siswa dari keluarga kurang mampu yang dibuktikan dengan dokumen resmi pemerintah.',
            ],
        ];

        $jadwal = [
            ['tahap' => 'Pendaftaran Online', 'waktu' => '1 - 30 Juni 2026'],
            ['tahap' => 'Seleksi & Tes Masuk', 'waktu' => '3 - 5 Juli 2026'],
            ['tahap' => 'Pengumuman Hasil Seleksi', 'waktu' => '10 Juli 2026'],
            ['tahap' => 'Daftar Ulang', 'waktu' => '11 - 15 Juli 2026'],
        ];

        $syarat = [
            'Fotokopi ijazah / SKL SMP atau sederajat',
            'Fotokopi kartu keluarga',
            'Pas foto berwarna terbaru ukuran 3x4',
            'Fotokopi rapor semester 1-5',
        ];

        return view('ppdb', compact('jalur', 'jadwal', 'syarat'));
    }
}
