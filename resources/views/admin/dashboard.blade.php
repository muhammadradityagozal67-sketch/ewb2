<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMK INFOKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- SIDEBAR --}}
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 flex flex-col">
            <div class="px-6 py-5 border-b border-gray-700">
                <p class="font-bold text-red-400 text-sm">SMK INFOKOM</p>
                <p class="text-xs text-gray-400 mt-0.5">Panel Admin</p>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-red-700 text-white text-sm font-medium">
                    <i class="fa fa-home w-4"></i> Dashboard
                </a>
                <a href="{{ route('guru.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white text-sm transition">
                    <i class="fa fa-chalkboard-teacher w-4"></i> Data Guru
                </a>
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white text-sm transition">
                    <i class="fa fa-globe w-4"></i> Lihat Website
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-gray-700">
                <p class="text-xs text-gray-400 mb-3">Login sebagai: <span class="text-white font-semibold">{{ Auth::user()->name }}</span></p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-2 text-sm text-red-400 hover:text-red-300 transition">
                        <i class="fa fa-sign-out-alt w-4"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Dashboard Admin</h1>
            <p class="text-sm text-gray-500 mb-8">Selamat datang, {{ Auth::user()->name }}</p>

            {{-- STATISTIK CARDS --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-8">
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-red-100 text-red-600 rounded-lg flex items-center justify-center"><i class="fa fa-chalkboard-teacher"></i></div>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalGuru }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Guru & Staff</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center"><i class="fa fa-user-graduate"></i></div>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Siswa</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center"><i class="fa fa-newspaper"></i></div>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalBerita }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Berita</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center"><i class="fa fa-eye"></i></div>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalPengunjung }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">Total Pengunjung</p>
                </div>
            </div>

            {{-- DAFTAR GURU --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="font-bold text-gray-800">Daftar Guru & Staff</h2>
                    <a href="{{ route('guru.index') }}" class="text-sm text-red-600 hover:underline">Lihat Halaman Publik →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Jabatan</th>
                                <th class="px-6 py-3 text-left">Bidang</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($gurus as $i => $guru)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 text-gray-400">{{ $i+1 }}</td>
                                <td class="px-6 py-3 font-medium text-gray-800">{{ $guru->nama }}</td>
                                <td class="px-6 py-3 text-gray-600">{{ $guru->jabatan }}</td>
                                <td class="px-6 py-3 text-gray-400">{{ $guru->bidang ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
