@extends('layouts.app')

@section('title', 'PPDB - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="font-display text-3xl font-bold">Penerimaan Peserta Didik Baru</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / PPDB</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14 space-y-16">

        <div class="bg-neutral-950 border border-cyan-500/40 p-10 text-white flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="font-display text-xl font-bold text-cyan-500">PPDB Tahun Ajaran 2026/2027 Telah Dibuka</h2>
                <p class="text-sm mt-2 text-neutral-400">Daftarkan dirimu sekarang dan jadilah bagian dari keluarga besar SMK INFOKOM Kota Bogor.</p>
            </div>
            <a href="#" class="bg-cyan-500 text-neutral-950 px-6 py-3 text-sm tracking-wide uppercase font-semibold hover:bg-cyan-400 transition whitespace-nowrap">Daftar Sekarang</a>
        </div>

        <div>
            <h2 class="font-display text-xl font-bold text-neutral-900 mb-2">Jalur Pendaftaran</h2>
            <div class="w-12 h-px bg-cyan-500 mb-8"></div>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($jalur as $item)
                    <div class="bg-white border-t-2 border-cyan-500 p-6">
                        <p class="font-semibold text-neutral-900">{{ $item['nama'] }}</p>
                        <p class="text-sm text-neutral-600 mt-3">{{ $item['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="font-display text-xl font-bold text-neutral-900 mb-2">Jadwal Pendaftaran</h2>
            <div class="w-12 h-px bg-cyan-500 mb-8"></div>
            <div class="bg-white border border-neutral-200 divide-y">
                @foreach($jadwal as $tahap)
                    <div class="flex justify-between px-6 py-4 text-sm">
                        <span class="font-medium text-neutral-800">{{ $tahap['tahap'] }}</span>
                        <span class="text-neutral-500">{{ $tahap['waktu'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="font-display text-xl font-bold text-neutral-900 mb-2">Syarat Pendaftaran</h2>
            <div class="w-12 h-px bg-cyan-500 mb-8"></div>
            <ul class="bg-white border border-neutral-200 p-6 list-disc list-inside space-y-2 text-sm text-neutral-700">
                @foreach($syarat as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
