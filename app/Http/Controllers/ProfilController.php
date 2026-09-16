<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(string $section = 'sejarah')
    {
        $menu = [
            'sejarah' => 'Sejarah Sekolah',
            'visi-misi' => 'Visi & Misi',
            'sambutan' => 'Sambutan Kepala Sekolah',
            'jurusan' => 'Program Keahlian (Jurusan)',
            'struktur' => 'Struktur Organisasi',
            'fasilitas' => 'Fasilitas Sekolah',
        ];

        if (!array_key_exists($section, $menu)) {
            abort(404);
        }

        $jurusanList = [
            [
                'nama' => 'Rekayasa Perangkat Lunak (RPL)',
                'deskripsi' => 'Membekali siswa dengan kemampuan merancang, membangun, dan menguji aplikasi desktop, web, maupun mobile. Mempelajari bahasa pemrograman, database, algoritma, serta pengembangan UI/UX yang modern sesuai standar industri perangkat lunak terkini.',
            ],
            [
                'nama' => 'Teknik Komputer dan Jaringan (TKJ)',
                'deskripsi' => 'Fokus pada instalasi, konfigurasi, dan pemeliharaan jaringan komputer, server, serta sistem keamanan infrastruktur IT.',
            ],
            [
                'nama' => 'Produksi Siar dan Program Televisi (PSPT)',
                'deskripsi' => 'Membekali siswa dengan keterampilan dalam bidang penyiaran dan produksi program televisi. Siswa belajar tentang tata kamera, tata suara, editing video, penyutradaraan, hingga manajemen produksi siaran televisi dan konten digital.',
            ],
            [
                'nama' => 'Desain Komunikasi Visual (DKV)',
                'deskripsi' => 'Mempelajari desain grafis, branding, ilustrasi digital, videografi, serta produksi materi visual untuk kebutuhan industri kreatif. Siswa dilatih untuk menyampaikan pesan komunikasi melalui elemen visual yang menarik dan efektif.',
            ],
        ];

        $konten = [
            'sejarah' => 'SMK INFOKOM Kota Bogor berdiri pada tahun 1998 dengan komitmen menyelenggarakan pendidikan menengah kejuruan yang unggul dan berkarakter. Berlokasi di kawasan Dramaga, Bogor, sekolah ini terus berkembang menjadi salah satu institusi pendidikan terpercaya yang menghasilkan lulusan siap melanjutkan pendidikan tinggi maupun berkarya di masyarakat.',
            'visi-misi' => 'Visi: Menjadi sekolah menengah kejuruan unggulan yang menghasilkan lulusan berintegritas, berprestasi, dan berwawasan global. Misi: Menyelenggarakan pembelajaran berkualitas berbasis karakter, mengembangkan potensi akademik dan non-akademik siswa, serta menjalin kerja sama dengan perguruan tinggi dan mitra pendidikan.',
            'sambutan' => 'Selamat datang di website resmi SMK INFOKOM Kota Bogor. Kami berkomitmen membentuk generasi yang berintegritas, kompetitif, dan siap menghadapi tantangan masa depan melalui pendidikan yang berkualitas dan berkarakter.',
            'jurusan' => 'SMK INFOKOM Kota Bogor membuka beberapa program keahlian di bidang informatika dan komunikasi untuk membekali siswa dengan kompetensi yang siap kerja maupun siap melanjutkan ke jenjang pendidikan tinggi.',
            'struktur' => 'Struktur organisasi sekolah terdiri dari Kepala Sekolah, Wakil Kepala Sekolah bidang Kurikulum, Kesiswaan, Sarana Prasarana, dan Hubungan Masyarakat, serta Koordinator Guru Mata Pelajaran di setiap bidang studi.',
            'fasilitas' => 'Sekolah kami dilengkapi dengan ruang kelas ber-AC, laboratorium komputer, laboratorium jaringan & multimedia, ruang praktik desain grafis, perpustakaan, aula serbaguna, lapangan olahraga, ruang UKS, dan mushola.',
        ];

        return view('profil', [
            'menu' => $menu,
            'activeSection' => $section,
            'judulSection' => $menu[$section],
            'kontenSection' => $konten[$section],
            'jurusanList' => $jurusanList,
        ]);
    }
}
