@extends('layouts.app')

@section('title', 'Berita - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-cyan-500 text-xs tracking-[0.3em] uppercase mb-2">Kabar Sekolah</p>
            <h1 class="font-display text-3xl font-bold">Berita Terbaru</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / Berita</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid md:grid-cols-4 gap-6">
            @foreach($beritaList as $berita)
                <a href="{{ route('berita.show', $berita->slug) }}" class="block bg-white border border-neutral-200 overflow-hidden hover:border-cyan-500 hover:shadow-md transition">
                    @if($berita->gambar && file_exists(public_path('images/berita/'.$berita->gambar)))
                        <img src="{{ asset('images/berita/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="h-48 w-full object-contain bg-gray-50 border-b">
                    @else
                        <div class="h-48 bg-neutral-200 flex items-center justify-center text-neutral-400 text-sm">Gambar</div>
                    @endif
                    <div class="p-5">
                        <p class="font-semibold text-neutral-900 text-sm leading-snug">{{ $berita->judul }}</p>
                        <p class="text-xs text-neutral-400 mt-3">{{ $berita->tanggal->format('d M Y') }} · {{ $berita->penulis }}</p>
                        <span class="inline-block mt-4 text-xs uppercase tracking-wide text-cyan-600 font-semibold">Baca Selengkapnya →</span>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $beritaList->links() }}
        </div>
    </div>

@endsection
