@extends('layouts.app')

@section('title', 'Daftar Guru & Staff - SMK INFOKOM Kota Bogor')

@section('content')

    {{-- PAGE HEADER --}}
    <div class="bg-neutral-950 text-white py-14 border-b border-red-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-red-500 text-xs tracking-[0.3em] uppercase mb-2">Sumber Daya Manusia</p>
            <h1 class="font-display text-3xl font-bold">Daftar Guru & Staff</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / Guru & Staff</p>
        </div>
    </div>

<div class="max-w-7xl mx-auto px-4 py-12">

    {{-- PIMPINAN --}}
    <div class="mb-12">
        <h2 class="text-lg font-bold text-red-700 uppercase tracking-wider mb-6 flex items-center gap-2">
            <i class="fa fa-star text-yellow-500"></i> Pimpinan Sekolah
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($pimpinan as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden">
                <div class="bg-gradient-to-br from-red-50 to-red-100 h-52 flex items-center justify-center">
                    @if($guru->foto)
                        <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="h-48 w-full object-contain">
                    @else
                        <div class="w-24 h-24 bg-red-200 text-red-600 rounded-full flex items-center justify-center text-4xl font-bold">
                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="p-4 text-center border-t">
                    <p class="font-bold text-gray-800 text-sm leading-snug">{{ $guru->nama }}</p>
                    <p class="text-xs text-red-600 font-semibold mt-1">{{ $guru->jabatan }}</p>
                    @if($guru->bidang)
                        <p class="text-xs text-gray-400 mt-0.5">{{ $guru->bidang }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- STRUKTURAL --}}
    <div class="mb-12">
        <h2 class="text-lg font-bold text-blue-700 uppercase tracking-wider mb-6 flex items-center gap-2">
            <i class="fa fa-sitemap text-blue-500"></i> Struktural & Kepala Program
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($struktural as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 h-52 flex items-center justify-center">
                    @if($guru->foto)
                        <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="h-48 w-full object-contain">
                    @else
                        <div class="w-24 h-24 bg-blue-200 text-blue-600 rounded-full flex items-center justify-center text-4xl font-bold">
                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="p-4 text-center border-t">
                    <p class="font-bold text-gray-800 text-sm leading-snug">{{ $guru->nama }}</p>
                    <p class="text-xs text-blue-600 font-semibold mt-1">{{ $guru->jabatan }}</p>
                    @if($guru->bidang)
                        <p class="text-xs text-gray-400 mt-0.5">{{ $guru->bidang }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- GURU & STAFF --}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 uppercase tracking-wider mb-6 flex items-center gap-2">
            <i class="fa fa-chalkboard-teacher text-gray-500"></i> Guru & Staff
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($staff as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 h-44 flex items-center justify-center">
                    @if($guru->foto)
                        <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="h-40 w-full object-contain">
                    @else
                        <div class="w-16 h-16 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold text-xl">
                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="p-3 text-center border-t">
                    <p class="font-semibold text-gray-800 text-xs leading-snug">{{ $guru->nama }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $guru->jabatan }}</p>
                    @if($guru->bidang)
                        <span class="inline-block mt-1 text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">{{ $guru->bidang }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

