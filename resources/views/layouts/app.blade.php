<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK INFOKOM Kota Bogor')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .nav-dropdown:hover .dropdown-menu { display: block; }
        .dropdown-menu { display: none; }
        .mobile-menu { display: none; }
        .mobile-menu.open { display: block; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- TOP BAR --}}
    <div class="bg-red-700 text-white text-xs py-1.5 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span><i class="fa fa-phone mr-1"></i> (0251) 8765432 &nbsp;|&nbsp; <i class="fa fa-envelope mr-1"></i> info@smkinfokom.sch.id</span>
            <div class="flex items-center gap-4">
                <span><i class="fa fa-eye mr-1"></i> Pengunjung: <strong>{{ session('visitor_count', 1247) }}</strong></span>
                <a href="https://facebook.com" target="_blank" class="hover:text-yellow-300"><i class="fab fa-facebook"></i></a>
                <a href="https://instagram.com" target="_blank" class="hover:text-yellow-300"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com" target="_blank" class="hover:text-yellow-300"><i class="fab fa-youtube"></i></a>
                <a href="https://tiktok.com" target="_blank" class="hover:text-yellow-300"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/umum/logo-smk.png') }}"
                     alt="Logo SMK INFOKOM"
                     class="w-14 h-14 object-contain">
                <div class="leading-tight">
                    <p class="font-display font-bold text-red-700 text-sm tracking-wide">SMK INFOKOM</p>
                    <p class="font-display font-bold text-gray-800 text-sm tracking-wide">Kota Bogor</p>
                    <p class="text-[9px] text-gray-500 tracking-[0.15em] uppercase">Terakreditasi A · Est. 1998</p>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-0.5 text-sm font-medium">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('home') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('profil*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Profil</a>
                <a href="{{ route('guru.index') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('guru*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Guru</a>

                {{-- Akademik Dropdown --}}
                <div class="relative nav-dropdown">
                    <button class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition text-gray-700 flex items-center gap-1">
                        Akademik <i class="fa fa-chevron-down text-xs"></i>
                    </button>
                    <div class="dropdown-menu absolute top-full left-0 bg-white shadow-lg rounded-lg w-52 py-2 border border-gray-100 z-50">
                        <a href="{{ route('profil.section', 'jurusan') }}" class="block px-4 py-2 text-sm hover:bg-red-50 hover:text-red-700">Program Keahlian</a>
                        <a href="{{ route('profil.section', 'fasilitas') }}" class="block px-4 py-2 text-sm hover:bg-red-50 hover:text-red-700">Fasilitas</a>
                        <a href="{{ route('profil.section', 'struktur') }}" class="block px-4 py-2 text-sm hover:bg-red-50 hover:text-red-700">Struktur Organisasi</a>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('berita*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Berita</a>
                <a href="{{ route('galeri.index') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('galeri*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Galeri</a>
                <a href="{{ route('ppdb.index') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('ppdb*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">PPDB</a>
                <a href="{{ route('kontak.index') }}" class="px-3 py-2 rounded hover:bg-red-50 hover:text-red-700 transition {{ request()->routeIs('kontak*') ? 'text-red-700 font-semibold' : 'text-gray-700' }}">Kontak</a>

                {{-- Portal Button --}}
                <a href="{{ route('portal') }}" class="ml-2 px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 transition flex items-center gap-2 text-sm font-semibold">
                    <i class="fa fa-user-circle"></i> Portal Login
                </a>
            </nav>

            {{-- Mobile Hamburger --}}
            <button onclick="toggleMobile()" class="md:hidden text-gray-700 text-2xl">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="mobile-menu md:hidden bg-white border-t border-gray-100 px-4 pb-4">
            <a href="{{ route('home') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Beranda</a>
            <a href="{{ route('profil') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Profil</a>
            <a href="{{ route('profil.section', 'jurusan') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Program Keahlian</a>
            <a href="{{ route('berita.index') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Berita</a>
            <a href="{{ route('galeri.index') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Galeri</a>
            <a href="{{ route('ppdb.index') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">PPDB</a>
            <a href="{{ route('kontak.index') }}" class="block py-2 text-sm border-b border-gray-100 hover:text-red-700">Kontak</a>
            <a href="{{ route('portal') }}" class="block py-2 text-sm text-red-700 font-semibold"><i class="fa fa-user-circle mr-2"></i>Portal Login</a>
        </div>
    </header>

    <main class="bg-gray-50 text-gray-800">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/umum/logo-smk.png') }}"
                         alt="Logo SMK INFOKOM" class="w-12 h-12 object-contain">
                    <div>
                        <p class="font-display text-white font-bold">SMK INFOKOM</p>
                        <p class="font-display text-white font-bold">Kota Bogor</p>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-gray-400">Membentuk generasi unggul, berintegritas, dan berwawasan luas untuk masa depan gemilang.</p>
                <p class="text-xs mt-4 text-gray-500">© {{ date('Y') }} SMK INFOKOM Kota Bogor. All rights reserved.</p>
            </div>
            <div>
                <p class="text-red-400 text-xs font-semibold uppercase tracking-wider mb-4">Menu Utama</p>
                <ul class="text-sm space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-red-400 transition">Profil Sekolah</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-red-400 transition">Berita</a></li>
                    <li><a href="{{ route('galeri.index') }}" class="hover:text-red-400 transition">Galeri</a></li>
                    <li><a href="{{ route('ppdb.index') }}" class="hover:text-red-400 transition">PPDB Online</a></li>
                    <li><a href="{{ route('kontak.index') }}" class="hover:text-red-400 transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <p class="text-red-400 text-xs font-semibold uppercase tracking-wider mb-4">Portal</p>
                <ul class="text-sm space-y-2 mb-6">
                    <li><a href="{{ route('portal') }}#ortu" class="hover:text-red-400 transition"><i class="fa fa-users mr-2 text-red-500"></i>Portal Orang Tua</a></li>
                    <li><a href="{{ route('portal') }}#siswa" class="hover:text-blue-400 transition"><i class="fa fa-graduation-cap mr-2 text-blue-400"></i>Portal Siswa</a></li>
                    <li><a href="{{ route('portal') }}#admin" class="hover:text-gray-400 transition"><i class="fa fa-shield-halved mr-2 text-gray-500"></i>Admin</a></li>
                </ul>
                <p class="text-red-400 text-xs font-semibold uppercase tracking-wider mb-3">Statistik Pengunjung</p>
                <div class="bg-gray-800 rounded-lg p-3 text-center">
                    <p class="text-2xl font-bold text-white font-display">{{ session('visitor_count', 1247) }}</p>
                    <p class="text-xs text-gray-400 mt-1"><i class="fa fa-eye mr-1"></i>Total Pengunjung Website</p>
                </div>
            </div>
            <div>
                <p class="text-red-400 text-xs font-semibold uppercase tracking-wider mb-4">Kontak Kami</p>
                <div class="space-y-3 text-sm">
                    <div class="flex gap-3">
                        <i class="fa fa-map-marker-alt text-red-500 mt-0.5 w-4 flex-shrink-0"></i>
                        <span class="text-gray-400">Jl. Raya Dramaga, Bogor, Jawa Barat 16680</span>
                    </div>
                    <div class="flex gap-3">
                        <i class="fa fa-phone text-red-500 mt-0.5 w-4"></i>
                        <span class="text-gray-400">(0251) 8765432</span>
                    </div>
                    <div class="flex gap-3">
                        <i class="fa fa-envelope text-red-500 mt-0.5 w-4"></i>
                        <span class="text-gray-400">info@smkinfokom.sch.id</span>
                    </div>
                </div>
                <p class="text-red-400 text-xs font-semibold uppercase tracking-wider mb-3 mt-6">Ikuti Kami</p>
                <div class="flex gap-3">
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-blue-600 rounded-full flex items-center justify-center transition"><i class="fab fa-facebook text-sm"></i></a>
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-pink-600 rounded-full flex items-center justify-center transition"><i class="fab fa-instagram text-sm"></i></a>
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-red-600 rounded-full flex items-center justify-center transition"><i class="fab fa-youtube text-sm"></i></a>
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-gray-600 rounded-full flex items-center justify-center transition"><i class="fab fa-tiktok text-sm"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 py-4 text-center text-xs text-gray-500">
            Website Resmi SMK INFOKOM Kota Bogor · Terakreditasi A · Kota Bogor, Jawa Barat
        </div>
    </footer>

    <script>
        function toggleMobile() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('open');
        }
    </script>

</body>
</html>
