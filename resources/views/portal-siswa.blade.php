@extends('layouts.app')

@section('title', 'Portal Siswa - SMK INFOKOM Kota Bogor')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-display font-bold text-blue-700">Portal Siswa</h1>
            <p class="text-gray-500 mt-2">Layanan Akademik dan Administrasi Siswa</p>
            <div class="w-16 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Bayaran --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-blue-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                    <i class="fa fa-wallet"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Informasi Bayaran</h3>
                <p class="text-sm text-gray-500">Lihat rincian tagihan dan riwayat pembayaran administrasi sekolah Anda.</p>
            </div>

            {{-- Nilai KKM --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-blue-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                    <i class="fa fa-star"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Nilai & KKM</h3>
                <p class="text-sm text-gray-500">Cek daftar KKM per mata pelajaran dan bandingkan dengan nilai yang Anda peroleh.</p>
            </div>

            {{-- Kehadiran --}}
            <div class="p-6 border border-gray-100 rounded-lg hover:border-blue-300 hover:shadow-md transition cursor-pointer group">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fa fa-user-check"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Rekap Kehadiran</h3>
                <p class="text-sm text-gray-500">Pantau persentase kehadiran Anda untuk memastikan syarat kelulusan terpenuhi.</p>
            </div>
        </div>
        
        <div class="mt-12 bg-blue-50 p-6 rounded-lg border border-blue-100 text-center">
            <i class="fa fa-fingerprint text-blue-300 text-3xl mb-3"></i>
            <h4 class="font-bold text-blue-900">Login Siswa</h4>
            <p class="text-sm text-blue-700 mt-2">Silakan login menggunakan akun yang telah diberikan oleh pihak sekolah untuk mengakses data pribadi Anda.</p>
            <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded font-medium hover:bg-blue-700 transition">Login Sekarang</button>
        </div>
    </div>
</div>
@endsection
