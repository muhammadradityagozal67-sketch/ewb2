@extends('layouts.app')

@section('title', 'Kontak - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="font-display text-3xl font-bold">Kontak Kami</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / Kontak</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14 grid md:grid-cols-2 gap-8">
        <div class="bg-white border border-neutral-200 p-8 space-y-6">
            <h2 class="font-display font-bold text-neutral-900 text-lg">Informasi Kontak</h2>
            <div>
                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wide">Alamat</p>
                <p class="text-neutral-800 mt-1">{{ $kontak['alamat'] }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wide">Telepon</p>
                <p class="text-neutral-800 mt-1">{{ $kontak['telepon'] }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wide">Email</p>
                <p class="text-neutral-800 mt-1">{{ $kontak['email'] }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wide">Jam Operasional</p>
                <p class="text-neutral-800 mt-1">{{ $kontak['jam_operasional'] }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wide mb-3">Ikuti Kami</p>
                <div class="flex gap-3">
                    @foreach($sosialMedia as $sosial)
                        <a href="{{ $sosial['url'] }}" class="w-9 h-9 border border-neutral-950 text-neutral-950 flex items-center justify-center text-xs font-semibold hover:bg-neutral-950 hover:text-white transition">{{ substr($sosial['nama'], 0, 1) }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="border border-neutral-200 overflow-hidden h-80 md:h-auto">
            <iframe
                src="{{ $kontak['maps_embed'] }}"
                width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
            </iframe>
        </div>
    </div>

@endsection
