@extends('layouts.app')

@section('title', 'Daftar Guru & Staff - SMK INFOKOM Kota Bogor')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="text-center mb-12">
        <h1 class="font-display text-3xl font-bold text-gray-900 mb-2">Daftar Guru & Staff</h1>
        <p class="text-gray-500">SMK INFOKOM Kota Bogor</p>
        <div class="w-16 h-1 bg-red-600 mx-auto mt-4 rounded-full"></div>
    </div>

    {{-- PIMPINAN --}}
    <div class="mb-12">
        <h2 class="text-lg font-bold text-red-700 uppercase tracking-wider mb-6 flex items-center gap-2">
            <i class="fa fa-star text-yellow-500"></i> Pimpinan Sekolah
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($pimpinan as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition flex items-start gap-4">
                @if($guru->foto)
                    <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="w-12 h-12 rounded-full object-cover flex-shrink-0 border border-gray-200">
                @else
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex-shrink-0 flex items-center justify-center text-lg font-bold">
                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                    </div>
                @endif
                <div>
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
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($struktural as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition flex items-start gap-4">
                @if($guru->foto)
                    <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="w-12 h-12 rounded-full object-cover flex-shrink-0 border border-gray-200">
                @else
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex-shrink-0 flex items-center justify-center text-lg font-bold">
                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <p class="font-bold text-gray-800 text-sm leading-snug">{{ $guru->nama }}</p>
                    <p class="text-xs text-blue-600 font-semibold mt-1">{{ $guru->jabatan }}</p>
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
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($staff as $guru)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 hover:shadow-md transition flex items-start gap-3">
                @if($guru->foto)
                    <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama }}" class="w-10 h-10 rounded-full object-cover flex-shrink-0 border border-gray-200">
                @else
                    <div class="w-10 h-10 bg-gray-100 text-gray-500 rounded-full flex-shrink-0 flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <p class="font-semibold text-gray-800 text-xs leading-snug">{{ $guru->nama }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $guru->jabatan }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
