@extends('layouts.app')

@section('title', 'Portal Orang Tua - SMK INFOKOM Kota Bogor')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-display font-bold text-red-700">Portal Orang Tua</h1>
            <p class="text-gray-500 mt-2">Sistem Informasi dan Pemantauan Siswa</p>
            <div class="w-16 h-1 bg-red-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Tagihan --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-red-600 group-hover:text-white transition">
                    <i class="fa fa-money-bill-wave"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Tunggakan / Tagihan Siswa</h3>
                <p class="text-sm text-gray-500">Cek informasi tagihan SPP, uang pangkal, dan administrasi lainnya.</p>
            </div>

            {{-- Nilai --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                    <i class="fa fa-chart-line"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Nilai-Nilai Siswa</h3>
                <p class="text-sm text-gray-500">Pantau perkembangan nilai tugas, UTS, UAS, dan nilai akhir siswa.</p>
            </div>

            {{-- Absensi --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-green-600 group-hover:text-white transition">
                    <i class="fa fa-calendar-check"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Absensi Kehadiran</h3>
                <p class="text-sm text-gray-500">Rekapitulasi kehadiran, izin, sakit, maupun alpa dari siswa.</p>
            </div>

            {{-- Eskul --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-purple-600 group-hover:text-white transition">
                    <i class="fa fa-futbol"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Kegiatan Ekstrakurikuler</h3>
                <p class="text-sm text-gray-500">Informasi keikutsertaan dan prestasi siswa pada ekstrakurikuler.</p>
            </div>

            {{-- Perpustakaan --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-yellow-600 group-hover:text-white transition">
                    <i class="fa fa-book-reader"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Perpustakaan</h3>
                <p class="text-sm text-gray-500">Riwayat peminjaman, pengembalian, dan denda buku perpustakaan.</p>
            </div>

            {{-- Wali Kelas --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-red-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-teal-600 group-hover:text-white transition">
                    <i class="fa fa-chalkboard-teacher"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Riwayat Wali Kelas</h3>
                <p class="text-sm text-gray-500">Informasi kontak dan pesan dari wali kelas terkait perkembangan siswa.</p>
            </div>
        </div>
        
        <div class="mt-12 bg-gray-50 p-6 rounded-lg border border-gray-200 text-center">
            <i class="fa fa-lock text-gray-400 text-3xl mb-3"></i>
            <h4 class="font-bold text-gray-700">Area Terbatas</h4>
            <p class="text-sm text-gray-500 mt-2">Fitur-fitur di atas membutuhkan login menggunakan Nomor Induk Siswa (NISN) dan kata sandi yang diberikan oleh sekolah.</p>
            <button class="mt-4 px-6 py-2 bg-red-700 text-white rounded font-medium hover:bg-red-800 transition">Login ke Sistem</button>
        </div>
    </div>
</div>
@endsection
