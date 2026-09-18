<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Profil::create([
            'sejarah' => 'Pada tahun 2005 Yayasan Telekomunikasi Nasional mendirikan Lembaga Pendidikan Menengah Kejuruan (SMK) Informatika dan Telekomunikasi atau disebut sebagai SMK INFOKOM Kota Bogor, didirikan pada tanggal 10 Mei 2005 dan mendapatkan Izin Operasional dari Dinas Pendidikan Kota Bogor dengan nomor : 421/.5/86 DISDIK Tahun 2005,Tanggal 18 Juli 2005 adapun hal lain sebagi bukti eksistensi pada bidang pengembangan mutu Pendidikan di lingkung Menengah Kejuruan, SMK Infokom Kota Bogor dibawah naungan Yayasan Telekomunikasi Nasional sudah memiliki 4 (empat) Kompetensi Keahlian diantaranya : Teknik Komputer Jaringan (TKJ), Rekayasa Perangkat Lunak (RPL), Multimedia (MM), Teknik Produksi dan Penyiaran Program Pertelevisian (TPPPP). Yang seluruh kompetensinya telah Terakreditasi “ A” oleh Badan Akreditasi Provinsi Jawa Barat.',
            'visi_misi' => '<h4 class="font-bold text-lg mb-2 text-cyan-700">Visi:</h4><p class="mb-5 text-justify">Menjadi sekolah menengah kejuruan unggulan yang menghasilkan lulusan berintegritas, berprestasi, berwawasan global, dan profesional di bidang Teknologi Informasi dan Komunikasi yang diakui oleh dunia usaha serta industri baik di tingkat nasional maupun internasional.</p><h4 class="font-bold text-lg mb-2 text-cyan-700">Misi:</h4><ul class="list-disc pl-5 space-y-2 text-justify"><li>Menyelenggarakan pembelajaran berkualitas berbasis karakter untuk membentuk peserta didik yang bertakwa dan berakhlak mulia.</li><li>Mengembangkan kurikulum yang adaptif dan proaktif terhadap perkembangan ilmu pengetahuan dan teknologi.</li><li>Mengoptimalkan potensi akademik dan non-akademik siswa agar mampu bersaing di era digital.</li><li>Menjalin kerja sama (link and match) yang erat dengan Dunia Usaha dan Dunia Industri (DUDI) serta perguruan tinggi.</li><li>Meningkatkan kualitas tenaga pendidik dan kependidikan melalui pelatihan dan sertifikasi yang berkelanjutan.</li><li>Menyediakan sarana dan prasarana pendidikan yang memadai sesuai dengan standar industri.</li></ul>',
            'sambutan' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi SMK INFOKOM Kota Bogor. Puji dan syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya. Di era digital saat ini, pendidikan kejuruan dituntut untuk terus beradaptasi dengan perkembangan teknologi. Oleh karena itu, kami berkomitmen untuk membentuk lulusan yang kompeten, berkarakter unggul, dan siap menghadapi tantangan dunia kerja maupun melanjutkan ke perguruan tinggi. Melalui website ini, kami berharap dapat memberikan informasi yang akurat dan transparan bagi masyarakat, orang tua, serta peserta didik.',
            'struktur' => 'Berikut adalah bagan Struktur Organisasi SMK INFOKOM Kota Bogor yang menggambarkan hierarki koordinasi dan pembagian tugas pokok dalam operasional pendidikan di sekolah.',
            'fasilitas' => 'SMK INFOKOM Kota Bogor terus berupaya melengkapi dan meningkatkan fasilitas sarana maupun prasarana untuk mendukung proses belajar mengajar yang efektif, inovatif, dan sesuai dengan standar industri.',
            'jurusan_teks' => 'SMK INFOKOM Kota Bogor membuka beberapa program keahlian di bidang informatika dan komunikasi untuk membekali siswa dengan kompetensi yang siap kerja maupun siap melanjutkan ke jenjang pendidikan tinggi.',
            'nama_kepsek' => 'Nama Kepala Sekolah',
            'foto_kepsek' => 'img/kepala-sekolah.jpg',
            'foto_struktur' => 'img/struktur-organisasi.jpg',
        ]);

        $jurusans = [
            [
                'nama' => 'Rekayasa Perangkat Lunak (RPL)',
                'deskripsi' => 'Membekali siswa dengan kemampuan merancang, membangun, dan menguji aplikasi desktop, web, maupun mobile. Mempelajari bahasa pemrograman, database, algoritma, serta pengembangan UI/UX yang modern sesuai standar industri perangkat lunak terkini.',
                'foto' => 'img/jurusan-rpl.jpg',
            ],
            [
                'nama' => 'Teknik Komputer dan Jaringan (TKJ)',
                'deskripsi' => 'Fokus pada instalasi, konfigurasi, dan pemeliharaan jaringan komputer, server, serta sistem keamanan infrastruktur IT.',
                'foto' => 'img/jurusan-tkj.jpg',
            ],
            [
                'nama' => 'Produksi Siar dan Program Televisi (PSPT)',
                'deskripsi' => 'Membekali siswa dengan keterampilan dalam bidang penyiaran dan produksi program televisi. Siswa belajar tentang tata kamera, tata suara, editing video, penyutradaraan, hingga manajemen produksi siaran televisi dan konten digital.',
                'foto' => 'img/jurusan-pspt.jpg',
            ],
            [
                'nama' => 'Desain Komunikasi Visual (DKV)',
                'deskripsi' => 'Mempelajari desain grafis, branding, ilustrasi digital, videografi, serta produksi materi visual untuk kebutuhan industri kreatif. Siswa dilatih untuk menyampaikan pesan komunikasi melalui elemen visual yang menarik dan efektif.',
                'foto' => 'img/jurusan-dkv.jpg',
            ],
        ];

        foreach ($jurusans as $j) {
            \App\Models\Jurusan::create($j);
        }
    }
}
