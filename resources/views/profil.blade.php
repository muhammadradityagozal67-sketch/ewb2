@extends('layouts.app')

@section('title', $judulSection . ' - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-cyan-500 text-xs tracking-[0.3em] uppercase mb-2">Tentang Kami</p>
            <h1 class="font-display text-3xl font-bold">Profil Sekolah</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / Profil Sekolah</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14 grid md:grid-cols-4 gap-8">
        <aside class="md:col-span-1">
            <ul class="bg-white border border-neutral-200 divide-y">
                @foreach($menu as $key => $label)
                    <li>
                        <a href="{{ route('profil.section', $key) }}"
                           class="block px-5 py-4 text-sm {{ $activeSection === $key ? 'bg-neutral-950 text-cyan-500 font-semibold' : 'hover:bg-neutral-50 text-neutral-700' }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <div class="md:col-span-3 bg-white border border-neutral-200 p-8">
            <h2 class="font-display text-xl font-bold text-neutral-900 mb-2">{{ $judulSection }}</h2>
            <div class="w-12 h-px bg-cyan-500 mb-5"></div>
            <p class="text-neutral-600 leading-relaxed">{{ $kontenSection }}</p>

            @if($activeSection === 'jurusan')
                <div class="grid sm:grid-cols-2 gap-5 mt-8">
                    @foreach($jurusanList as $jurusan)
                        <div class="border border-neutral-200 p-5 hover:border-cyan-500 transition">
                            <p class="font-display font-bold text-neutral-900 mb-2">{{ $jurusan['nama'] }}</p>
                            <p class="text-sm text-neutral-600 leading-relaxed">{{ $jurusan['deskripsi'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
