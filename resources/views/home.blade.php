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
            <div class="relative">
                <img src="{{ asset('images/umum/tentang-kami.jpg') }}" alt="Kegiatan Siswa SMK INFOKOM" class="w-full h-80 object-cover rounded-xl shadow-lg">
                <div class="absolute -bottom-4 -right-4 bg-red-600 text-white px-5 py-3 rounded-lg shadow-lg">
                    <p class="text-2xl font-bold">20+</p>
                    <p class="text-xs">Tahun Berdiri</p>
                </div>
            </div>
            <div>
                <p class="text-red-500 text-xs tracking-[0.2em] uppercase mb-2 font-semibold">Tentang Kami</p>
                <h2 class="font-display text-2xl font-bold text-neutral-900 mb-4">SMK INFOKOM Kota Bogor</h2>
                <div class="w-12 h-px bg-red-500 mb-5"></div>
                <p class="text-neutral-600 leading-relaxed mb-6">
                    SMK INFOKOM Kota Bogor adalah lembaga pendidikan menengah kejuruan yang berkomitmen membentuk generasi
                    berintegritas, kompetitif, dan siap melanjutkan pendidikan tinggi maupun berkarya di
                    tengah masyarakat. Didukung tenaga pendidik profesional dan fasilitas lengkap.
                </p>
                <a href="{{ route('profil') }}" class="inline-block bg-neutral-950 text-white px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-red-600 transition rounded-lg">Selengkapnya</a>

                <div class="grid grid-cols-4 gap-4 mt-10 text-center">
                    @foreach($statistik as $stat)
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="font-display text-2xl font-bold text-red-600">{{ $stat['nilai'] }}</p>
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
                <a href="{{ route('berita.show', $berita->slug) }}" class="block bg-white border border-neutral-200 overflow-hidden hover:border-red-500 hover:shadow-md transition">
                    @if($berita->gambar && file_exists(public_path('images/berita/'.$berita->gambar)))
                        <img src="{{ asset('images/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="h-48 w-full object-contain bg-gray-50 border-b">
                    @else
                        <div class="h-48 bg-neutral-200 flex items-center justify-center text-neutral-400 text-sm">Gambar</div>
                    @endif
                    <div class="p-5">
                        <p class="font-semibold text-neutral-900 text-sm leading-snug">{{ $berita->judul }}</p>
                        <p class="text-xs text-neutral-400 mt-3">{{ $berita->tanggal->format('d M Y') }} · {{ $berita->penulis }}</p>
                        <span class="inline-block mt-4 text-xs uppercase tracking-wide text-red-600 font-semibold">Baca Selengkapnya →</span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('berita.index') }}" class="bg-neutral-950 text-white px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-neutral-800 transition">Lihat Berita Lainnya</a>
        </div>
    </section>

    {{-- GALERI KEGIATAN --}}
    <section class="bg-gray-50 py-16" x-data="{ modalOpen: false, modalImg: '', modalTitle: '', modalKategori: '' }">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="font-display text-2xl font-bold text-neutral-900 text-center mb-2">Galeri Kegiatan</h2>
            <div class="w-12 h-px bg-red-500 mx-auto mb-10"></div>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                @foreach($galeriTerbaru as $galeri)
                    @if($galeri->gambar && file_exists(public_path('images/galeri/'.$galeri->gambar)))
                        <div @click="modalImg = '{{ asset('images/galeri/'.$galeri->gambar) }}'; modalTitle = '{{ addslashes($galeri->judul) }}'; modalKategori = '{{ addslashes($galeri->kategori) }}'; modalOpen = true" class="cursor-pointer overflow-hidden rounded-lg hover:shadow-lg transition transform hover:-translate-y-1">
                            <img src="{{ asset('images/galeri/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="h-32 w-full object-cover bg-white border border-neutral-200 hover:scale-105 transition duration-300">
                        </div>
                    @else
                        <div class="h-32 border border-neutral-200 bg-neutral-100 flex items-center justify-center text-xs text-neutral-500 text-center px-2 rounded-lg">
                            {{ $galeri->judul }}
                        </div>
                    @endif
                @endforeach
            </div>
            
            <!-- Alpine Modal for Galeri Home -->
            <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-80 transition-opacity" @click="modalOpen = false" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                        <div class="relative bg-black">
                            <button @click="modalOpen = false" class="absolute top-4 right-4 bg-white bg-opacity-20 hover:bg-opacity-40 text-white rounded-full w-10 h-10 flex items-center justify-center z-10"><i class="fa fa-times"></i></button>
                            <img :src="modalImg" class="w-full max-h-[70vh] object-contain">
                        </div>
                        <div class="bg-white px-6 py-4">
                            <h3 class="text-lg leading-6 font-bold text-gray-900" x-text="modalTitle"></h3>
                            <p class="text-sm text-cyan-600 uppercase tracking-wide mt-1" x-text="modalKategori"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('galeri.index') }}" class="border-2 border-neutral-900 text-neutral-900 px-8 py-3 text-sm tracking-wide uppercase font-bold hover:bg-neutral-900 hover:text-white transition rounded-full">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

@endsection
