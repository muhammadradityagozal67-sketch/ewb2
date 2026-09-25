@extends('layouts.app')

@section('title', 'Beranda - SMK INFOKOM Kota Bogor')

@section('content')

    <section class="relative bg-gray-900 text-white overflow-hidden min-h-[80vh] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-no-repeat bg-center bg-cover"
                 style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRabwJ6LhUd19EUsPnNFage9ujNRURi8WkvKKh6pvXQvA&s=10');">
            </div>
            <!-- Overlay Gelap dan Gradient Merah -->
            <div class="absolute inset-0 bg-gray-900/70 z-10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent z-20"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-20 text-center relative z-40 w-full">
            <p class="text-red-400 text-sm tracking-[0.3em] uppercase mb-4 font-bold">Selamat Datang di</p>
            <h1 class="font-display text-5xl md:text-6xl font-bold leading-tight tracking-tight text-white mb-6">
                SMK INFOKOM Kota Bogor
            </h1>
            <div class="w-16 h-1 bg-red-600 mx-auto my-6 rounded-full"></div>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed">Membentuk pribadi unggul, berintegritas, dan berwawasan luas untuk masa depan yang <span class="text-white font-bold">gemilang</span>.</p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('profil') }}" class="inline-flex items-center justify-center px-6 py-3 font-bold text-white transition-colors duration-200 bg-red-700 rounded-lg hover:bg-red-800">
                    Profil Sekolah
                </a>
                <a href="{{ route('ppdb.index') }}" class="inline-flex items-center justify-center px-6 py-3 font-bold text-white transition-colors duration-200 bg-transparent border-2 border-white rounded-lg hover:bg-white hover:text-gray-900">
                    PPDB Online
                </a>
            </div>
        </div>
    </section>

    {{-- SAMBUTAN KEPALA SEKOLAH --}}
    @if(isset($profil) && $profil->sambutan)
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
            <div class="grid md:grid-cols-3 gap-8 items-center p-8 md:p-12">
                <div class="md:col-span-1 flex justify-center">
                    <div class="relative group">
                        <div class="absolute -inset-2 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                        <img src="{{ asset('images/umum/kepsek.png') }}" alt="Kepala Sekolah" class="relative w-64 h-80 object-cover rounded-2xl border-4 border-white shadow-lg bg-gray-100" onerror="this.src='https://ui-avatars.com/api/?name=Kepala+Sekolah&background=B91C1C&color=fff&size=512'">
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-1 bg-red-600 rounded-full"></div>
                        <h2 class="font-display text-2xl font-bold text-gray-900 uppercase tracking-widest">Sambutan Kepala Sekolah</h2>
                    </div>
                    <div class="prose prose-lg text-gray-600 leading-relaxed max-w-none line-clamp-6">
                        {!! $profil->sambutan !!}
                    </div>
                    <a href="{{ route('profil.section', 'sambutan') }}" class="inline-flex items-center gap-2 mt-6 text-red-600 font-bold hover:text-red-700 transition-colors">
                        Baca Selengkapnya <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- INFO TERBARU --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl font-extrabold text-red-700 mb-4">Informasi Terbaru</h2>
            <div class="w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($infoTerbaru as $info)
                <a href="{{ route('informasi.show', $info->slug) }}" class="block text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-200 hover:-translate-y-1 transition-all duration-300">
                    @if($info->gambar)
                        <img src="{{ asset('images/informasi/' . $info->gambar) }}" alt="{{ $info->judul }}" class="w-full h-32 object-cover rounded-lg mb-4">
                    @endif
                    <p class="font-bold text-red-600 text-xs tracking-widest uppercase mb-3">{{ $info->kategori }}</p>
                    <p class="text-sm font-semibold text-gray-800 leading-snug">{{ $info->judul }}</p>
                    <p class="text-xs text-gray-400 mt-4 font-medium"><i class="fa fa-calendar-alt mr-1"></i>{{ $info->tanggal->format('d M Y') }}</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section class="bg-gray-50 py-24 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-1 bg-red-600 rounded-2xl opacity-10"></div>
                <img src="{{ asset('images/umum/tentang-kami.jpg') }}" alt="Kegiatan Siswa SMK INFOKOM" class="relative w-full h-[400px] object-cover rounded-2xl shadow-xl ring-1 ring-gray-900/5">
                <div class="absolute -bottom-6 -right-6 bg-red-700 text-white p-6 rounded-2xl shadow-xl transform group-hover:scale-105 transition-transform duration-300">
                    <p class="text-4xl font-extrabold">20+</p>
                    <p class="text-sm font-medium tracking-wide mt-1">Tahun Berdiri</p>
                </div>
            </div>
            <div>
                <p class="text-red-700 text-sm tracking-[0.2em] uppercase mb-3 font-bold">Tentang Kami</p>
                <h2 class="font-display text-4xl font-extrabold text-gray-900 mb-6 leading-tight">Mengenal Lebih Dekat <br><span class="text-red-700">SMK INFOKOM</span></h2>
                <p class="text-gray-600 leading-relaxed mb-8 text-lg">
                    SMK INFOKOM Kota Bogor adalah lembaga pendidikan menengah kejuruan yang berkomitmen membentuk generasi
                    berintegritas, kompetitif, dan siap melanjutkan pendidikan tinggi maupun berkarya di
                    tengah masyarakat. Didukung tenaga pendidik profesional dan fasilitas lengkap.
                </p>
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 bg-red-700 text-white px-8 py-4 text-sm tracking-wide uppercase font-bold hover:bg-red-800 transition-colors duration-300 rounded-xl shadow-lg hover:shadow-red-500/30">
                    Selengkapnya <i class="fa fa-arrow-right"></i>
                </a>

                <div class="grid grid-cols-4 gap-4 mt-12 text-center">
                    @foreach($statistik as $stat)
                        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:border-red-200 transition-colors">
                            <p class="font-display text-3xl font-extrabold text-gray-900">{{ $stat['nilai'] }}</p>
                            <p class="text-[10px] sm:text-xs text-gray-500 uppercase tracking-wider mt-2 font-semibold">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM KEAHLIAN --}}
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl font-extrabold text-gray-900 mb-4">Program Keahlian (Jurusan)</h2>
            <div class="w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid md:grid-cols-4 gap-8">
            <a href="{{ route('profil.section', 'jurusan') }}" class="block bg-white p-8 border border-gray-100 rounded-2xl text-center shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 transform group-hover:rotate-6"><i class="fa fa-laptop-code"></i></div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg group-hover:text-red-700 transition-colors">Rekayasa Perangkat Lunak (RPL)</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Pemrograman web, mobile, dan database.</p>
            </a>
            <a href="{{ route('profil.section', 'jurusan') }}" class="block bg-white p-8 border border-gray-100 rounded-2xl text-center shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 transform group-hover:rotate-6"><i class="fa fa-network-wired"></i></div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg group-hover:text-red-700 transition-colors">Teknik Komputer & Jaringan (TKJ)</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Infrastruktur IT, server, dan keamanan jaringan.</p>
            </a>
            <a href="{{ route('profil.section', 'jurusan') }}" class="block bg-white p-8 border border-gray-100 rounded-2xl text-center shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 transform group-hover:rotate-6"><i class="fa fa-video"></i></div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg group-hover:text-red-700 transition-colors">Produksi Siar & Program TV (PSPT)</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Broadcasting, penyutradaraan, dan produksi televisi.</p>
            </a>
            <a href="{{ route('profil.section', 'jurusan') }}" class="block bg-white p-8 border border-gray-100 rounded-2xl text-center shadow-sm hover:shadow-lg hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 transform group-hover:rotate-6"><i class="fa fa-palette"></i></div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg group-hover:text-red-700 transition-colors">Desain Komunikasi Visual (DKV)</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Desain grafis, animasi, dan branding.</p>
            </a>
        </div>
    </section>

    {{-- BERITA TERBARU --}}
    <section class="max-w-7xl mx-auto px-6 py-20 bg-gray-50/50 rounded-3xl mb-10">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl font-extrabold text-gray-900 mb-4">Berita Terbaru</h2>
            <div class="w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid md:grid-cols-4 gap-8">
            @foreach($beritaTerbaru as $berita)
                <a href="{{ route('berita.show', $berita->slug) }}" class="flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-gray-100 hover:border-red-200 transition-all duration-300 transform hover:-translate-y-1 group">
                    @if($berita->gambar && file_exists(public_path('images/berita/'.$berita->gambar)))
                        <div class="relative overflow-hidden h-52">
                            <img src="{{ asset('images/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    @else
                        <div class="h-52 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400 text-sm">
                            <i class="fa fa-image text-3xl opacity-50"></i>
                        </div>
                    @endif
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="font-bold text-gray-900 text-base leading-snug group-hover:text-red-700 transition-colors">{{ $berita->judul }}</p>
                        <p class="text-xs text-gray-500 mt-4 mb-4 flex items-center gap-2"><i class="fa fa-calendar-alt text-red-600"></i> {{ $berita->tanggal->format('d M Y') }}</p>
                        <div class="mt-auto">
                            <span class="inline-flex items-center text-xs uppercase tracking-wider text-red-600 font-bold group-hover:text-red-800">Baca Selengkapnya <i class="fa fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i></span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center px-8 py-4 font-bold text-gray-900 transition-all duration-200 bg-white border-2 border-gray-200 rounded-full hover:bg-gray-50 hover:border-red-600 hover:text-red-700 shadow-sm">
                Lihat Berita Lainnya
            </a>
        </div>
    </section>

    {{-- GALERI KEGIATAN --}}
    <section class="py-20" x-data="{ modalOpen: false, modalImg: '', modalTitle: '', modalKategori: '' }">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="font-display text-3xl font-extrabold text-gray-900 mb-4">Galeri Kegiatan</h2>
                <div class="w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($galeriTerbaru as $galeri)
                    @if($galeri->gambar && file_exists(public_path('images/galeri/'.$galeri->gambar)))
                        <div @click="modalImg = '{{ asset('images/galeri/'.$galeri->gambar) }}'; modalTitle = '{{ addslashes($galeri->judul) }}'; modalKategori = '{{ addslashes($galeri->kategori) }}'; modalOpen = true" class="cursor-pointer overflow-hidden rounded-xl group relative aspect-video shadow-md border border-gray-100 hover:shadow-xl transition-shadow">
                            <img src="{{ asset('images/galeri/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                <p class="text-white font-bold text-lg drop-shadow-md truncate">{{ $galeri->judul }}</p>
                                <p class="text-red-400 font-medium text-sm mt-1 drop-shadow-sm">{{ $galeri->kategori }}</p>
                            </div>
                        </div>
                    @else
                        <div class="aspect-video border border-gray-200 bg-gray-50 flex items-center justify-center text-xs text-gray-400 text-center px-4 rounded-xl shadow-sm">
                            {{ $galeri->judul }}
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('galeri.index') }}" class="inline-flex items-center gap-2 text-red-600 font-bold hover:text-red-700 transition-colors">
                    Lihat Semua Album <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Alpine Modal for Galeri Home -->
            <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-neutral-900/90 backdrop-blur-sm transition-opacity" @click="modalOpen = false" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-white/10">
                        <div class="relative bg-black group">
                            <button @click="modalOpen = false" class="absolute top-4 right-4 bg-black/50 hover:bg-cyan-600 text-white rounded-full w-10 h-10 flex items-center justify-center z-10 transition-colors backdrop-blur-md"><i class="fa fa-times"></i></button>
                            <img :src="modalImg" class="w-full max-h-[75vh] object-contain">
                        </div>
                        <div class="bg-white px-8 py-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-1" x-text="modalTitle"></h3>
                            <p class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 uppercase tracking-wide" x-text="modalKategori"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('galeri.index') }}" class="inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-neutral-900 border border-transparent rounded-full hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 shadow-lg hover:shadow-cyan-500/30">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>

@endsection
