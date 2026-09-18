<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SMK INFOKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition; }
        .sidebar-link:hover { @apply bg-gray-800 text-white; }
        .sidebar-link.active { @apply bg-red-600 text-white font-semibold; }
        .sidebar-link:not(.active) { @apply text-gray-400; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-gray-950 min-h-screen flex flex-col fixed top-0 left-0 z-40">
        <div class="px-5 py-5 border-b border-gray-800">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                    <i class="fa fa-shield-halved text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-white font-bold text-xs leading-tight">SMK INFOKOM</p>
                    <p class="text-red-400 text-[10px]">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
            <p class="text-[10px] text-gray-600 uppercase tracking-wider px-4 mb-2 mt-1">Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-home w-4"></i> Dashboard
            </a>

            <p class="text-[10px] text-gray-600 uppercase tracking-wider px-4 mb-2 mt-4">Data Sekolah</p>
            <a href="{{ route('admin.guru.index') }}" class="sidebar-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                <i class="fa fa-chalkboard-teacher w-4"></i> Data Guru
            </a>
            <a href="{{ route('admin.siswa.index') }}" class="sidebar-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                <i class="fa fa-user-graduate w-4"></i> Data Siswa
            </a>
            <a href="{{ route('admin.pengguna.index') }}" class="sidebar-link {{ request()->routeIs('admin.pengguna*') ? 'active' : '' }}">
                <i class="fa fa-users-cog w-4"></i> Pengguna
            </a>

            <p class="text-[10px] text-gray-600 uppercase tracking-wider px-4 mb-2 mt-4">Akademik & Keuangan</p>
            <a href="{{ route('admin.tagihan.index') }}" class="sidebar-link {{ request()->routeIs('admin.tagihan*') ? 'active' : '' }}">
                <i class="fa fa-money-bill-wave w-4"></i> Tagihan / Tunggakan
            </a>
            <a href="{{ route('admin.nilai.index') }}" class="sidebar-link {{ request()->routeIs('admin.nilai*') ? 'active' : '' }}">
                <i class="fa fa-star w-4"></i> Nilai Siswa
            </a>
            <a href="{{ route('admin.absensi.index') }}" class="sidebar-link {{ request()->routeIs('admin.absensi*') ? 'active' : '' }}">
                <i class="fa fa-calendar-check w-4"></i> Absensi
            </a>
            <a href="{{ route('admin.eskul.index') }}" class="sidebar-link {{ request()->routeIs('admin.eskul*') ? 'active' : '' }}">
                <i class="fa fa-futbol w-4"></i> Ekstrakurikuler
            </a>
            <a href="{{ route('admin.perpustakaan.index') }}" class="sidebar-link {{ request()->routeIs('admin.perpustakaan*') ? 'active' : '' }}">
                <i class="fa fa-book w-4"></i> Perpustakaan
            </a>

            <p class="text-[10px] text-gray-600 uppercase tracking-wider px-4 mb-2 mt-4">Konten Website</p>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                <i class="fa fa-newspaper w-4"></i> Berita
            </a>

            <p class="text-[10px] text-gray-600 uppercase tracking-wider px-4 mb-2 mt-4">Lainnya</p>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="fa fa-globe w-4"></i> Lihat Website
            </a>
        </nav>

        <div class="px-3 py-4 border-t border-gray-800">
            <div class="flex items-center gap-3 px-4 mb-3">
                <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center text-xs font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-white text-xs font-semibold leading-tight">{{ Str::limit(Auth::user()->name, 18) }}</p>
                    <p class="text-gray-500 text-[10px]">Administrator</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="sidebar-link w-full text-left hover:bg-red-900 hover:text-red-300">
                    <i class="fa fa-sign-out-alt w-4"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="ml-60 flex-1 min-h-screen flex flex-col">
        {{-- TOP BAR --}}
        <div class="bg-white border-b border-gray-200 px-6 py-3 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h1 class="font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400">@yield('page-subtitle', 'SMK INFOKOM Kota Bogor')</p>
            </div>
            <div class="flex items-center gap-3">
                @if(session('success'))
                    <span class="text-xs bg-green-100 text-green-700 px-3 py-1.5 rounded-full font-medium">
                        <i class="fa fa-check mr-1"></i>{{ session('success') }}
                    </span>
                @endif
                @if(session('error'))
                    <span class="text-xs bg-red-100 text-red-700 px-3 py-1.5 rounded-full font-medium">
                        <i class="fa fa-times mr-1"></i>{{ session('error') }}
                    </span>
                @endif
            </div>
        </div>

        <main class="flex-1 p-6">
            @yield('content')
        </main>

        <footer class="bg-white border-t border-gray-100 px-6 py-3 text-xs text-gray-400 text-center">
            © {{ date('Y') }} SMK INFOKOM Kota Bogor — Admin Panel
        </footer>
    </div>

</body>
</html>
