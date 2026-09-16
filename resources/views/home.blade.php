@extends('layouts.app')

@section('title', 'Beranda - SMK INFOKOM Kota Bogor')

@section('content')

    {{-- HERO --}}
    <section class="bg-neutral-950 text-white relative border-b border-red-600/20"
        style="background-image: linear-gradient(rgba(10,10,10,.75), rgba(10,10,10,.9)), url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRabwJ6LhUd19EUsPnNFage9ujNRURi8WkvKKh6pvXQvA&s=10'); background-size: cover; background-position: center;"
    >
        <div class="max-w-7xl mx-auto px-6 py-28 text-center">
            <p class="text-red-500 text-xs tracking-[0.3em] uppercase mb-4">Selamat Datang di</p>
            <h1 class="font-display text-4xl md:text-6xl font-bold leading-tight">SMK INFOKOM Kota Bogor</h1>
            <div class="w-16 h-px bg-red-500 mx-auto my-6"></div>
            <p class="text-neutral-400 max-w-xl mx-auto">Membentuk pribadi unggul, berintegritas, dan berwawasan luas untuk masa depan yang gemilang.</p>
            <div class="mt-8 flex gap-4 justify-center">
                <a href="{{ route('profil') }}" class="bg-red-500 text-neutral-950 px-6 py-3 rounded-none font-semibold text-sm tracking-wide uppercase hover:bg-red-400 transition">Profil Sekolah</a>
                <a href="{{ route('ppdb.index') }}" class="border border-red-500 text-red-500 px-6 py-3 rounded-none font-semibold text-sm tracking-wide uppercase hover:bg-red-500 hover:text-neutral-950 transition">PPDB Online</a>
            </div>
        </div>
    </section>

    {{-- INFO TERBARU --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="font-display text-2xl font-bold text-neutral-900 text-center mb-2">Informasi Terbaru</h2>
        <div class="w-12 h-px bg-red-500 mx-auto mb-10"></div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($infoTerbaru as $info)
                <div class="text-center border-t-2 border-red-500 pt-5">
                    <p class="font-semibold text-neutral-900 text-xs tracking-widest uppercase">{{ $info['kategori'] }}</p>
                    <p class="text-sm mt-2 text-neutral-600">{{ $info['judul'] }}</p>
                    <p class="text-xs text-neutral-400 mt-2">{{ $info['tanggal'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            @if(file_exists(public_path('images/umum/tentang-kami.jpg')))
                <img src="{{ asset('images/umum/tentang-kami.jpg') }}" alt="Kegiatan Siswa" class="h-72 w-full object-cover">
            @else
                <div class="bg-neutral-200 h-72 flex items-center justify-center text-neutral-500">
                    Foto Kegiatan Siswa
                </div>
            @endif
            <div>
                <h2 class="font-display text-2xl font-bold text-neutral-900 mb-4">Tentang Kami</h2>
                <div class="w-12 h-px bg-red-500 mb-5"></div>
                <p class="text-neutral-600 leading-relaxed mb-6">
                    SMK INFOKOM Kota Bogor adalah lembaga pendidikan menengah kejuruan yang berkomitmen membentuk generasi
                    berintegritas, kompetitif, dan siap melanjutkan pendidikan tinggi maupun berkarya di
                    tengah masyarakat. Didukung tenaga pendidik profesional dan fasilitas lengkap.
                </p>
                <a href="{{ route('profil') }}" class="inline-block bg-neutral-950 text-white px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-neutral-800 transition">Selengkapnya</a>

                <div class="grid grid-cols-4 gap-4 mt-10 text-center">
                    @foreach($statistik as $stat)
                        <div>
                            <p class="font-display text-2xl font-bold text-neutral-900">{{ $stat['nilai'] }}</p>
                            <p class="text-xs text-neutral-500 uppercase tracking-wide mt-1">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM KEAHLIAN --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="font-display text-2xl font-bold text-gray-900 text-center mb-2">Program Keahlian (Jurusan)</h2>
        <div class="w-12 h-px bg-red-600 mx-auto mb-10"></div>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white p-6 border border-gray-100 rounded-lg text-center hover:shadow-lg transition group">
                <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-2xl mx-auto mb-4 group-hover:bg-red-600 group-hover:text-white transition"><i class="fa fa-laptop-code"></i></div>
                <h3 class="font-bold text-gray-900 mb-2">Rekayasa Perangkat Lunak (RPL)</h3>
                <p class="text-xs text-gray-500">Pemrograman web, mobile, dan database.</p>
            </div>
            <div class="bg-white p-6 border border-gray-100 rounded-lg text-center hover:shadow-lg transition group">
                <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-2xl mx-auto mb-4 group-hover:bg-red-600 group-hover:text-white transition"><i class="fa fa-network-wired"></i></div>
                <h3 class="font-bold text-gray-900 mb-2">Teknik Komputer & Jaringan (TKJ)</h3>
                <p class="text-xs text-gray-500">Infrastruktur IT, server, dan keamanan jaringan.</p>
            </div>
            <div class="bg-white p-6 border border-gray-100 rounded-lg text-center hover:shadow-lg transition group">
                <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-2xl mx-auto mb-4 group-hover:bg-red-600 group-hover:text-white transition"><i class="fa fa-video"></i></div>
                <h3 class="font-bold text-gray-900 mb-2">Produksi Siar & Program TV (PSPT)</h3>
                <p class="text-xs text-gray-500">Broadcasting, penyutradaraan, dan produksi televisi.</p>
            </div>
            <div class="bg-white p-6 border border-gray-100 rounded-lg text-center hover:shadow-lg transition group">
                <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-2xl mx-auto mb-4 group-hover:bg-red-600 group-hover:text-white transition"><i class="fa fa-palette"></i></div>
                <h3 class="font-bold text-gray-900 mb-2">Desain Komunikasi Visual (DKV)</h3>
                <p class="text-xs text-gray-500">Desain grafis, animasi, dan branding.</p>
            </div>
        </div>
    </section>

    {{-- BERITA TERBARU --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="font-display text-2xl font-bold text-neutral-900 text-center mb-2">Berita Terbaru</h2>
        <div class="w-12 h-px bg-red-500 mx-auto mb-10"></div>
        <div class="grid md:grid-cols-4 gap-6">
            @foreach($beritaTerbaru as $berita)
                <div class="bg-white border border-neutral-200 overflow-hidden group">
                    @if($berita->gambar && file_exists(public_path('images/berita/'.$berita->gambar)))
                        <img src="{{ asset('images/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="h-36 w-full object-cover">
                    @else
                        <div class="h-36 bg-neutral-200 flex items-center justify-center text-neutral-400 text-sm">Gambar</div>
                    @endif
                    <div class="p-5">
                        <p class="font-semibold text-neutral-900 text-sm leading-snug">{{ $berita->judul }}</p>
                        <p class="text-xs text-neutral-400 mt-3">{{ $berita->tanggal->format('d M Y') }} · {{ $berita->penulis }}</p>
                        <a href="{{ route('berita.show', $berita->slug) }}" class="inline-block mt-4 text-xs uppercase tracking-wide text-red-600 font-semibold hover:text-red-700">Baca Selengkapnya →</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('berita.index') }}" class="bg-neutral-950 text-white px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-neutral-800 transition">Lihat Berita Lainnya</a>
        </div>
    </section>

    {{-- GALERI KEGIATAN --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="font-display text-2xl font-bold text-neutral-900 text-center mb-2">Galeri Kegiatan</h2>
            <div class="w-12 h-px bg-red-500 mx-auto mb-10"></div>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                @foreach($galeriTerbaru as $galeri)
                    @if($galeri->gambar && file_exists(public_path('images/galeri/'.$galeri->gambar)))
                        <img src="{{ asset('images/galeri/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="h-28 w-full object-cover">
                    @else
                        <div class="h-28 bg-neutral-200 flex items-center justify-center text-xs text-neutral-500 text-center px-2">
                            {{ $galeri->judul }}
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('galeri.index') }}" class="border border-neutral-950 text-neutral-950 px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-neutral-950 hover:text-white transition">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

@endsection
