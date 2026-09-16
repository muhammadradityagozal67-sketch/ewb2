@extends('layouts.app')

@section('title', $berita->judul . ' - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="font-display text-2xl font-bold">Detail Berita</h1>
            <p class="text-sm text-neutral-400 mt-2">
                <a href="{{ route('home') }}" class="hover:text-cyan-500">Beranda</a> /
                <a href="{{ route('berita.index') }}" class="hover:text-cyan-500">Berita</a> /
                {{ $berita->judul }}
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-14">
        <div class="bg-white border border-neutral-200 p-8">
            @if($berita->gambar && file_exists(public_path('images/berita/'.$berita->gambar)))
                <img src="{{ asset('images/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="h-64 w-full object-cover mb-6">
            @else
                <div class="h-64 bg-neutral-200 mb-6 flex items-center justify-center text-neutral-400">Gambar Berita</div>
            @endif
            <h1 class="font-display text-2xl font-bold text-neutral-900">{{ $berita->judul }}</h1>
            <p class="text-sm text-neutral-400 mt-3">{{ $berita->tanggal->format('d F Y') }} · Ditulis oleh {{ $berita->penulis }}</p>
            <div class="w-12 h-px bg-cyan-500 my-6"></div>
            <div class="text-neutral-700 leading-relaxed whitespace-pre-line">
                {{ $berita->isi }}
            </div>
        </div>

        @if($beritaLainnya->isNotEmpty())
            <div class="mt-14">
                <h2 class="font-display text-xl font-bold text-neutral-900 mb-6">Berita Lainnya</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($beritaLainnya as $lain)
                        <div class="bg-white border border-neutral-200 overflow-hidden">
                            @if($lain->gambar && file_exists(public_path('images/berita/'.$lain->gambar)))
                                <img src="{{ asset('images/berita/'.$lain->gambar) }}" alt="{{ $lain->judul }}" class="h-32 w-full object-cover">
                            @else
                                <div class="h-32 bg-neutral-200 flex items-center justify-center text-neutral-400 text-sm">Gambar</div>
                            @endif
                            <div class="p-5">
                                <p class="font-semibold text-neutral-900 text-sm">{{ $lain->judul }}</p>
                                <a href="{{ route('berita.show', $lain->slug) }}" class="inline-block mt-3 text-xs uppercase tracking-wide text-cyan-600 font-semibold hover:text-cyan-700">Baca →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection
