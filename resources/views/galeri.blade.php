@extends('layouts.app')

@section('title', 'Galeri - SMK INFOKOM Kota Bogor')

@section('content')

    <div class="bg-gray-900 text-white py-14 border-b border-red-600">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="font-display text-4xl font-bold">Galeri Kegiatan</h1>
            <p class="text-sm text-gray-300 mt-2">Beranda / Galeri</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14" x-data="{ modalOpen: false, modalImg: '', modalTitle: '', modalKategori: '' }">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($galeriList as $galeri)
                <div @click="modalImg = '{{ asset('images/galeri/'.$galeri->gambar) }}'; modalTitle = '{{ addslashes($galeri->judul) }}'; modalKategori = '{{ addslashes($galeri->kategori) }}'; modalOpen = true" class="cursor-pointer overflow-hidden rounded-xl group relative aspect-video shadow-md border border-gray-100 hover:shadow-xl transition-shadow">
                    @if($galeri->gambar && file_exists(public_path('images/galeri/'.$galeri->gambar)))
                        <img src="{{ asset('images/galeri/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <p class="text-white font-bold text-lg drop-shadow-md truncate">{{ $galeri->judul }}</p>
                            <p class="text-red-400 font-medium text-sm mt-1 drop-shadow-sm">{{ $galeri->kategori }}</p>
                        </div>
                    @else
                        <div class="h-full w-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">Foto</div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Alpine Modal -->
        <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="modalOpen = false" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                    <div class="relative bg-black">
                        <button @click="modalOpen = false" class="absolute top-4 right-4 bg-white bg-opacity-20 hover:bg-opacity-40 text-white rounded-full w-10 h-10 flex items-center justify-center z-10"><i class="fa fa-times"></i></button>
                        <img :src="modalImg" class="w-full max-h-[70vh] object-contain">
                    </div>
                    <div class="bg-white px-6 py-4">
                        <h3 class="text-lg leading-6 font-bold text-gray-900" x-text="modalTitle"></h3>
                        <p class="text-sm text-cyan-600 uppercase tracking-wide mt-1" x-text="modalKategori"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
            {{ $galeriList->links() }}
        </div>
    </div>

@endsection
