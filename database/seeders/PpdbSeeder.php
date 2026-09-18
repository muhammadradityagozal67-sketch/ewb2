<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PpdbPendaftar;

class PpdbSeeder extends Seeder
{
    public function run(): void
    {
        PpdbPendaftar::firstOrCreate(
            ['no_pendaftaran' => 'PPDB-2026-0001'],
            [
                'jalur' => 'Prestasi',
                'jurusan_pilihan_1' => 'Rekayasa Perangkat Lunak (RPL)',
                'jurusan_pilihan_2' => 'Teknik Komputer & Jaringan (TKJ)',
                'nama_lengkap' => 'Muhammad Fajar Ramadhan',
                'nisn' => '0087654321',
                'nik' => '3271011205080001',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2009-05-12',
                'agama' => 'Islam',
                'alamat_tinggal' => 'Jl. Sindangbarang No. 45, Bogor Barat',
                'asal_smp' => 'SMP Negeri 1 Bogor',
                'tahun_lulus' => '2026',
                'nama_ortu_wali' => 'Dedi Gunawan',
                'pekerjaan_ortu' => 'Wiraswasta',
                'no_hp_ortu' => '081234567890',
                'no_hp_siswa' => '081298765432',
                'nilai_rata_rata' => 88.50,
                'status' => 'diterima',
                'catatan_admin' => 'Selamat! Anda dinyatakan DITERIMA pada pilihan ke-1. Silakan lakukan daftar ulang sebelum tanggal 15 Juli 2026.',
            ]
        );

        PpdbPendaftar::firstOrCreate(
            ['no_pendaftaran' => 'PPDB-2026-0002'],
            [
                'jalur' => 'Reguler',
                'jurusan_pilihan_1' => 'Desain Komunikasi Visual (DKV)',
                'jurusan_pilihan_2' => 'Produksi & Siaran Program Televisi (PSPT)',
                'nama_lengkap' => 'Siti Annisa Putri',
                'nisn' => '0091234567',
                'nik' => '3271024308090002',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2009-08-23',
                'agama' => 'Islam',
                'alamat_tinggal' => 'Komp. IPB Baranangsiang Blok C No. 12',
                'asal_smp' => 'SMP Negeri 4 Bogor',
                'tahun_lulus' => '2026',
                'nama_ortu_wali' => 'Hendro Santoso',
                'pekerjaan_ortu' => 'PNS',
                'no_hp_ortu' => '081345678901',
                'no_hp_siswa' => '081398765433',
                'nilai_rata_rata' => 84.20,
                'status' => 'terverifikasi',
                'catatan_admin' => 'Berkas pendaftaran telah diverifikasi. Menunggu jadwal tes wawancara dan portofolio.',
            ]
        );

        PpdbPendaftar::firstOrCreate(
            ['no_pendaftaran' => 'PPDB-2026-0003'],
            [
                'jalur' => 'Reguler',
                'jurusan_pilihan_1' => 'Teknik Komputer & Jaringan (TKJ)',
                'jurusan_pilihan_2' => 'Rekayasa Perangkat Lunak (RPL)',
                'nama_lengkap' => 'Bintang Pratama',
                'nisn' => '0089988776',
                'nik' => '3271031102090003',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2009-02-11',
                'agama' => 'Islam',
                'alamat_tinggal' => 'Jl. Letjen Ibrahim Adjie Gang Masjid No. 8',
                'asal_smp' => 'SMP Negeri 7 Bogor',
                'tahun_lulus' => '2026',
                'nama_ortu_wali' => 'Bambang Irawan',
                'pekerjaan_ortu' => 'Karyawan Swasta',
                'no_hp_ortu' => '085612345678',
                'no_hp_siswa' => '085698765434',
                'nilai_rata_rata' => 79.80,
                'status' => 'menunggu',
                'catatan_admin' => 'Pendaftaran telah diterima dalam sistem. Menunggu proses verifikasi berkas oleh panitia.',
            ]
        );
    }
}
