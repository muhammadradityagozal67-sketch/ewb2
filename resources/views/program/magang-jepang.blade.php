@extends('layouts.app')

@section('title', 'Kerja Magang Jepang - SMK INFOKOM')

@section('content')
<!-- Hero Section -->
<div class="relative bg-red-800 py-20 lg:py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1528164344705-47542687000d?auto=format&fit=crop&q=80" alt="Japan Landscape" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/90 to-red-800/80"></div>
    <div class="relative max-w-7xl mx-auto px-6 text-center lg:text-left flex flex-col lg:flex-row items-center gap-12">
        <div class="flex-1">
            <span class="inline-block py-1 px-3 rounded-full bg-red-100 text-red-700 font-bold text-xs mb-6 uppercase tracking-widest">Program Unggulan</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 font-display leading-tight">Kerja Magang Jepang <br><span class="text-red-300">Meraih Sukses di Negeri Sakura</span></h1>
            <p class="text-lg text-red-100 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                Program eksklusif SMK INFOKOM Kota Bogor yang memberikan kesempatan kepada siswa dan alumni untuk mengikuti program pemagangan ke Jepang. Jadilah SDM berstandar internasional!
            </p>
            <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                <a href="{{ route('program.magang.daftar') }}" class="px-8 py-3 bg-white text-red-700 font-bold rounded-lg shadow-lg hover:bg-gray-50 hover:shadow-xl transition-all duration-300">Daftar Sekarang</a>
                <a href="#informasi" class="px-8 py-3 bg-transparent border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-red-700 transition-all duration-300">Info Lengkap</a>
            </div>
        </div>
        <div class="hidden lg:block w-96 relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-red-500 to-red-700 rounded-3xl transform rotate-3 scale-105 opacity-50 blur-lg"></div>
            <img src="https://images.unsplash.com/photo-1542051812871-75f8075775aa?auto=format&fit=crop&q=80" alt="Internship in Japan" class="relative rounded-3xl shadow-2xl border-4 border-white object-cover h-96 w-full">
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16" id="informasi">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Kolom Kiri / Utama -->
        <div class="lg:col-span-2 space-y-12">
            
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xl shadow-sm"><i class="fa fa-info-circle"></i></div>
                    <h2 class="text-2xl font-bold text-gray-800">Tentang Program</h2>
                </div>
                <div class="prose prose-red text-gray-600">
                    <p>Program Kerja Magang Jepang merupakan salah satu program unggulan Bursa Kerja Khusus (BKK) SMK INFOKOM Kota Bogor. Kami bekerjasama dengan berbagai LPK (Lembaga Pelatihan Kerja) resmi dan terpercaya untuk menyalurkan lulusan terbaik kami ke perusahaan-perusahaan di Jepang.</p>
                    <p>Peserta magang tidak hanya mendapatkan pengalaman kerja internasional, namun juga pembelajaran bahasa, budaya, dan disiplin etos kerja khas Jepang yang sangat bermanfaat untuk karir masa depan.</p>
                </div>
            </section>

            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xl shadow-sm"><i class="fa fa-gem"></i></div>
                    <h2 class="text-2xl font-bold text-gray-800">Keuntungan Program</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <i class="fa fa-money-bill-wave text-3xl text-green-500 mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Penghasilan Menjanjikan & Mandiri Finansial</h3>
                        <p class="text-sm text-gray-600 mb-2">Mendapatkan tunjangan magang atau gaji yang kompetitif sesuai standar di Jepang (biasanya mulai dari 120.000 hingga 150.000 Yen per bulan bergantung daerah dan lembur).</p>
                        <p class="text-sm text-gray-600">Peserta juga disediakan fasilitas tempat tinggal/asrama, asuransi, dan perlindungan kerja penuh selama di Jepang.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <i class="fa fa-language text-3xl text-blue-500 mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Penguasaan Bahasa Secara Alami</h3>
                        <p class="text-sm text-gray-600 mb-2">Tinggal dan bekerja di Jepang memaksa peserta untuk beradaptasi dengan bahasa lokal. Peserta didorong untuk lulus program sertifikasi JLPT (Japanese Language Proficiency Test) level N4 hingga N3.</p>
                        <p class="text-sm text-gray-600">Kemampuan bahasa ini menjadi modal yang sangat bernilai tinggi saat mencari pekerjaan.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <i class="fa fa-certificate text-3xl text-yellow-500 mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Sertifikat Resmi Internasional</h3>
                        <p class="text-sm text-gray-600 mb-2">Memperoleh sertifikat resmi dari JITCO atau OTIT (Organization for Technical Intern Training) yang diakui secara internasional sebagai bukti kompetensi teknis.</p>
                        <p class="text-sm text-gray-600">Banyak perusahaan multi-nasional sangat menghargai lulusan magang Jepang karena standar kerjanya yang tinggi.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <i class="fa fa-user-tie text-3xl text-purple-500 mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Karakter Unggul & Karir Cemerlang</h3>
                        <p class="text-sm text-gray-600 mb-2">Selain keterampilan teknis, peserta dibentuk menjadi pribadi yang disiplin, mandiri, pekerja keras, dan menghargai waktu (etos kerja Jepang).</p>
                        <p class="text-sm text-gray-600">Terbuka peluang besar untuk bekerja di perusahaan Penanaman Modal Asing (PMA) Jepang di Indonesia dengan posisi yang lebih baik.</p>
                    </div>
                </div>
            </section>

        </div>

        <!-- Kolom Kanan / Sidebar -->
        <div class="space-y-8">
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6 border-b pb-4">Persyaratan Umum</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Pria / Wanita, usia 18 - 25 tahun.
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Lulusan SMK INFOKOM (semua jurusan).
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Sehat jasmani dan rohani (Lulus Medical Check Up).
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Tidak bertato dan tidak bertindik (bagi pria).
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Tinggi badan minimal: Pria 160 cm, Wanita 150 cm.
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fa fa-check-circle text-green-500 mt-1"></i> Mendapat izin resmi dari orang tua/wali.
                    </li>
                </ul>
            </div>
            
            <div class="bg-red-700 rounded-2xl p-8 text-white shadow-lg text-center">
                <i class="fa fa-question-circle text-4xl mb-4 opacity-80"></i>
                <h3 class="text-lg font-bold mb-2">Tertarik Bergabung?</h3>
                <p class="text-sm text-red-100 mb-6">Pendaftaran dibuka setiap tahun melalui Bursa Kerja Khusus (BKK) SMK INFOKOM.</p>
                <a href="{{ route('program.magang.daftar') }}" class="block w-full py-3 bg-white text-red-700 font-bold rounded-lg hover:bg-gray-100 transition shadow-md">Daftar Sekarang</a>
            </div>
        </div>

    </div>
</div>
@endsection
