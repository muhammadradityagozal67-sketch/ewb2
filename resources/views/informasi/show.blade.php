@extends('layouts.app')

@section('title', $informasi->judul . ' - SMK INFOKOM')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <div class="mb-8">
        <span class="text-sm font-bold text-cyan-600 uppercase tracking-widest">{{ $informasi->kategori }}</span>
        <h1 class="text-3xl md:text-4xl font-extrabold text-neutral-900 mt-2 mb-4">{{ $informasi->judul }}</h1>
        <p class="text-sm text-neutral-500"><i class="fa fa-calendar-alt mr-2"></i>{{ $informasi->tanggal->format('d M Y') }}</p>
    </div>

    @if($informasi->gambar)
        <div class="mb-8 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
            <img src="{{ asset('images/informasi/' . $informasi->gambar) }}" alt="{{ $informasi->judul }}" class="w-full object-cover max-h-[500px]">
        </div>
    @endif

    <div class="prose prose-lg text-neutral-700 max-w-none">
        {!! $informasi->isi !!}
    </div>
    
    <div class="mt-12">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-cyan-600 font-bold hover:text-cyan-800 transition-colors">
            <i class="fa fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
