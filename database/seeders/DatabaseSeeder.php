<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =====================
        // USERS
        // =====================
        DB::table('users')->insert([
            ['name' => 'Administrator', 'email' => 'admin@smkinfokom.sch.id', 'password' => Hash::make('admin123'), 'role' => 'admin', 'nisn' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budi Santoso (Orang Tua)', 'email' => 'ortu@smkinfokom.sch.id', 'password' => Hash::make('ortu123'), 'role' => 'ortu', 'nisn' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ahmad Rizki Pratama', 'email' => 'siswa@smkinfokom.sch.id', 'password' => Hash::make('siswa123'), 'role' => 'siswa', 'nisn' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // =====================
        // DATA SISWA
        // =====================
        DB::table('siswas')->insert([
            'user_id' => 3,
            'nisn' => '1234567890',
            'nama' => 'Ahmad Rizki Pratama',
            'kelas' => 'XI RPL 1',
            'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
            'nama_ortu' => 'Budi Santoso',
            'ortu_user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // =====================
        // NILAI SISWA
        // =====================
        $mapel = [
            ['Pemrograman Web', 85, 82, 88, 85, 75],
            ['Basis Data', 78, 80, 82, 80, 75],
            ['Desain Grafis', 90, 88, 92, 90, 75],
            ['Matematika', 70, 72, 74, 72, 70],
            ['Bahasa Indonesia', 80, 82, 84, 82, 75],
            ['Bahasa Inggris', 75, 78, 80, 78, 75],
            ['Fisika', 65, 68, 70, 68, 65],
            ['Pendidikan Agama', 88, 90, 92, 90, 75],
        ];
        foreach ($mapel as $m) {
            DB::table('nilai')->insert([
                'siswa_id' => 1, 'mata_pelajaran' => $m[0],
                'nilai_tugas' => $m[1], 'nilai_uts' => $m[2],
                'nilai_uas' => $m[3], 'nilai_akhir' => $m[4],
                'kkm' => $m[5], 'semester' => '1',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // =====================
        // ABSENSI
        // =====================
        $bulan = ['Juli', 'Agustus', 'September'];
        $absenData = [[22,1,0,1],[24,0,1,0],[20,0,0,2]];
        foreach ($bulan as $i => $b) {
            DB::table('absensi')->insert([
                'siswa_id' => 1, 'bulan' => $b . ' 2025',
                'hadir' => $absenData[$i][0], 'sakit' => $absenData[$i][1],
                'izin' => $absenData[$i][2], 'alpa' => $absenData[$i][3],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // =====================
        // TAGIHAN
        // =====================
        $tagihanData = [
            ['SPP', 'Juli 2025', 150000, 'lunas', '2025-07-15'],
            ['SPP', 'Agustus 2025', 150000, 'lunas', '2025-08-15'],
            ['SPP', 'September 2025', 150000, 'belum_lunas', '2025-09-15'],
            ['Uang Kegiatan', null, 200000, 'belum_lunas', '2025-09-30'],
        ];
        foreach ($tagihanData as $t) {
            DB::table('tagihan')->insert([
                'siswa_id' => 1, 'jenis' => $t[0], 'bulan' => $t[1],
                'jumlah' => $t[2], 'status' => $t[3], 'jatuh_tempo' => $t[4],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // =====================
        // ESKUL
        // =====================
        DB::table('eskul')->insert([
            ['siswa_id' => 1, 'nama_eskul' => 'Paskibra', 'pelatih' => 'Ahmad Hotib, S.Pd.I', 'hari' => 'Sabtu', 'nilai' => 'A', 'created_at' => now(), 'updated_at' => now()],
            ['siswa_id' => 1, 'nama_eskul' => 'Coding Club', 'pelatih' => 'Ridwan Hala, S.Kom.,Gr.', 'hari' => 'Jumat', 'nilai' => 'A', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // =====================
        // PEMINJAMAN BUKU
        // =====================
        DB::table('peminjaman_buku')->insert([
            ['siswa_id' => 1, 'judul_buku' => 'Pemrograman PHP & MySQL', 'tanggal_pinjam' => '2025-08-01', 'tanggal_kembali' => '2025-08-15', 'status' => 'dikembalikan', 'denda' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['siswa_id' => 1, 'judul_buku' => 'Jaringan Komputer Dasar', 'tanggal_pinjam' => '2025-09-01', 'tanggal_kembali' => null, 'status' => 'dipinjam', 'denda' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // =====================
        // DATA GURU
        // =====================
        $gurus = [
            // Pimpinan Inti (urutan 1-9)
            ['Ir. Hj. Liliek Rahmaningsih, M.M.Pd.', 'Kepala Sekolah', null, 1],
            ['Mila Yaelasari, M.Pd.', 'Wakil Kepala Sekolah', 'Bidang Kurikulum', 2],
            ['Dea Rijalul Fikri, S.Kom.,Gr.', 'Wakil Kepala Sekolah', 'Bidang Kesiswaan', 3],
            ['R. Radiani Srirestuti Dewi, SS.,Gr.', 'Wakil Kepala Sekolah', 'Bidang Hubungan Industri dan Masyarakat', 4],
            ['Heny Handayani, S.Pd.', 'Wakil Kepala Sekolah', 'Bidang Pengembangan SDM', 5],
            ['Agus Tiyono, M.Pd.', 'Wakil Kepala Sekolah', 'Bidang Sarana dan Prasarana', 6],
            // Struktural
            ['Aditya Nugraha, ST.', 'Ketua Manajemen Mutu / Kepala Program Keahlian TKJ', null, 7],
            ['Cahyadi Rozi, ST.', 'Kepala Tata Usaha', null, 8],
            ['Drs. Puji Marhaen Waluyo', 'Kepala Perpustakaan', null, 9],
            ['Putri Riandini, S.Hut., M.Pd.,Gr.', 'Kepala Bendahara', null, 10],
            // Kepala Program Keahlian
            ['Ridwan Hala, S.Kom.,Gr.', 'Kepala Program Keahlian RPL', null, 11],
            ['Muhammad Ibnu Arif, S.IKom.', 'Kepala Program Keahlian DKV', null, 12],
            ['Erli Suherli, A.Md.Kom.', 'Kepala Program Keahlian PSPT', null, 13],
            // Pembina & Staf
            ['Ahmad Hotib, S.Pd.I', 'Pembina OSIS', null, 14],
            ['Abdul Azis, M.Pd.', 'Pembina OSIS', null, 15],
            ['Vera Yuni Astuti, SP., M.IKom.,Gr.', 'Staf Kurikulum', null, 16],
            ['M. Fauzan Arifin, S.IKom.,Gr.', 'Staf Kurikulum', null, 17],
            // BK
            ['Dra. Popon Puspitasari', 'Guru Bimbingan & Konseling', null, 18],
            ['Richo Santana, S.Kom.', 'Guru Bimbingan & Konseling', null, 19],
            ['Dian Hardianti, S.Kom.,Gr.', 'Guru Bimbingan & Konseling', null, 20],
            // Teller / Bendahara
            ['Yeni Yuliawati, S.Pd.,Gr.', 'Staf Teller (Bendahara)', null, 21],
            ['Rita Widyastuti', 'Staf Teller (Bendahara)', null, 22],
            ['Eva Farida Rahayu, S.Pd.,Gr.', 'Staf Teller (Bendahara)', null, 23],
            // TU
            ['Jayadi, S.Pd.,Gr.', 'Staf Tata Usaha', null, 24],
            ['Yadi Setiadi, S.Sos.,Gr.', 'Staf Tata Usaha', null, 25],
            ['Siti Nuraeni', 'Staf Tata Usaha', null, 26],
            // Perpustakaan
            ['Reza Prafitriansyah, S.Kom.,Gr.', 'Staf Perpustakaan', null, 27],
            // Guru
            ['Dra. Diana Octaria', 'Guru', null, 28],
            ['Nabila Ahmadia Pratama, S.Pd.', 'Guru', null, 29],
            ['Erwin Hasiholan Gultom, S.Kom.', 'Guru', null, 30],
            ['Widyatama Nuranisa, SM.', 'Guru', null, 31],
            ['Dara Purwanita, S.Pd.,Gr.', 'Guru', null, 32],
        ];
        foreach ($gurus as $g) {
            DB::table('gurus')->insert([
                'nama' => $g[0], 'jabatan' => $g[1], 'bidang' => $g[2],
                'foto' => null, 'urutan' => $g[3],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}
