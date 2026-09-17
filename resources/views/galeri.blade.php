@extends('layouts.app')

@section('title', 'Galeri - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-neutral-950 text-white py-14 border-b border-cyan-600/20">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="font-display text-3xl font-bold">Galeri Kegiatan</h1>
            <p class="text-sm text-neutral-400 mt-2">Beranda / Galeri</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($galeriList as $galeri)
                <div class="bg-white border border-neutral-200 overflow-hidden">
                    @if($galeri->gambar && file_exists(public_path('images/galeri/'.$galeri->gambar)))
                        <img src="{{ asset('images/galeri/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="h-40 w-full object-cover">
                    @else
                        <div class="h-40 bg-neutral-200 flex items-center justify-center text-neutral-400 text-sm">Foto</div>
                    @endif
                    <div class="p-4">
                        <p class="text-sm font-medium text-neutral-900">{{ $galeri->judul }}</p>
                        <p class="text-xs text-cyan-600 uppercase tracking-wide mt-1">{{ $galeri->kategori }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $galeriList->links() }}
        </div>
    </div>

@endsection
