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
            
            @if($activeSection === 'sejarah')
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="md:w-1/2">
                        <img src="{{ asset('img/fasilitas-studio.jpg') }}" alt="Sejarah SMK" class="w-full h-auto rounded-xl shadow-lg border border-gray-100 object-cover aspect-video">
                    </div>
                    <div class="md:w-1/2 text-neutral-600 leading-relaxed text-justify">
                        <div class="prose max-w-none">
                            <p class="first-letter:text-5xl first-letter:font-bold first-letter:text-cyan-600 first-letter:float-left first-letter:mr-3 first-letter:mt-1">{{ $kontenSection }}</p>
                        </div>
                    </div>
                </div>

            @elseif($activeSection === 'visi-misi')
                <div class="prose max-w-none text-neutral-600">
                    {!! $kontenSection !!}
                </div>

            @elseif($activeSection === 'sambutan')
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/3">
                        <img src="{{ $profil->foto_kepsek ? asset($profil->foto_kepsek) : asset('img/kepala-sekolah.jpg') }}" alt="Kepala Sekolah" class="w-full h-auto object-cover rounded-lg shadow-md border border-gray-200" onerror="this.src='https://placehold.co/400x500?text=Foto+Kepala+Sekolah'">
                        <div class="mt-4 text-center">
                            <h3 class="font-bold text-lg text-gray-800">{{ $profil->nama_kepsek ?? 'Nama Kepala Sekolah' }}</h3>
                            <p class="text-sm text-cyan-600 font-semibold">Kepala SMK INFOKOM Kota Bogor</p>
                        </div>
                    </div>
                    <div class="md:w-2/3 text-neutral-600 leading-relaxed text-justify">
                        <p>{!! nl2br(e($kontenSection)) !!}</p>
                    </div>
                </div>

            @elseif($activeSection === 'struktur')
                <div class="text-center mb-6">
                    <p class="text-neutral-600 leading-relaxed mb-6">{{ $kontenSection }}</p>
                    <img src="{{ $profil->foto_struktur ? asset($profil->foto_struktur) : asset('img/struktur-organisasi.jpg') }}" alt="Struktur Organisasi" class="mx-auto max-w-full h-auto rounded shadow-md border border-gray-200" onerror="this.src='https://placehold.co/800x600?text=Bagan+Struktur+Organisasi'">
                </div>

            @elseif($activeSection === 'fasilitas')
                <div x-data="{ modalOpen: false, modalImg: '', modalTitle: '', modalDesc: '' }">
                    <p class="text-neutral-600 leading-relaxed mb-8">{{ $kontenSection }}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- Fasilitas 1 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-lab-rpl.jpg') }}'; modalTitle = 'Laboratorium Komputer'; modalDesc = 'Fasilitas praktikum dengan komputer spesifikasi tinggi untuk menunjang pembelajaran coding dan desain.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-lab-rpl.jpg') }}" alt="Lab Komputer" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Lab+Komputer'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Laboratorium Komputer</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Fasilitas praktikum dengan komputer spesifikasi tinggi untuk menunjang pembelajaran coding dan desain.</p>
                            </div>
                        </div>
                        <!-- Fasilitas 2 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-lab-tkj.jpg') }}'; modalTitle = 'Laboratorium Jaringan'; modalDesc = 'Pusat praktikum perakitan dan konfigurasi jaringan server, router, dan fiber optic.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-lab-tkj.jpg') }}" alt="Lab Jaringan" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Lab+Jaringan'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Laboratorium Jaringan</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Pusat praktikum perakitan dan konfigurasi jaringan server, router, dan fiber optic.</p>
                            </div>
                        </div>
                        <!-- Fasilitas 3 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-studio.jpg') }}'; modalTitle = 'Studio Broadcasting'; modalDesc = 'Studio produksi televisi lengkap dengan kamera, pencahayaan, dan ruang kendali siaran.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-studio.jpg') }}" alt="Studio TV" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Studio+Broadcasting'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Studio Broadcasting</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Studio produksi televisi lengkap dengan kamera, pencahayaan, dan ruang kendali siaran.</p>
                            </div>
                        </div>
                        <!-- Fasilitas 4 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-perpustakaan.jpg') }}'; modalTitle = 'Perpustakaan'; modalDesc = 'Koleksi buku lengkap yang nyaman untuk belajar mandiri dan membaca referensi industri.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-perpustakaan.jpg') }}" alt="Perpustakaan" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Perpustakaan'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Perpustakaan</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Koleksi buku lengkap yang nyaman untuk belajar mandiri dan membaca referensi industri.</p>
                            </div>
                        </div>
                        <!-- Fasilitas 5 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-lapangan.jpg') }}'; modalTitle = 'Lapangan Olahraga'; modalDesc = 'Area olahraga multifungsi untuk kegiatan jasmani siswa dan ekstrakurikuler.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-lapangan.jpg') }}" alt="Lapangan Olahraga" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Lapangan+Olahraga'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Lapangan Olahraga</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Area olahraga multifungsi untuk kegiatan jasmani siswa dan ekstrakurikuler.</p>
                            </div>
                        </div>
                        <!-- Fasilitas 6 -->
                        <div @click="modalImg = '{{ asset('img/fasilitas-aula.jpg') }}'; modalTitle = 'Aula Serbaguna'; modalDesc = 'Ruangan luas untuk pertemuan, seminar, dan acara besar sekolah.'; modalOpen = true" class="cursor-pointer border rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-cyan-500 transition">
                            <img src="{{ asset('img/fasilitas-aula.jpg') }}" alt="Aula" class="w-full h-48 object-contain bg-gray-50 border-b" onerror="this.src='https://placehold.co/400x300?text=Aula+Serbaguna'">
                            <div class="p-4 bg-white">
                                <h4 class="font-semibold text-gray-800">Aula Serbaguna</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">Ruangan luas untuk pertemuan, seminar, dan acara besar sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alpine Modal untuk Fasilitas -->
                    <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <!-- Background overlay -->
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="modalOpen = false" aria-hidden="true"></div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <!-- Modal panel -->
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                <div class="bg-white">
                                    <div class="relative">
                                        <img :src="modalImg" class="w-full h-64 object-contain bg-gray-50 border-b">
                                        <button @click="modalOpen = false" class="absolute top-2 right-2 bg-black bg-opacity-50 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-opacity-75"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="px-6 py-6">
                                        <h3 class="text-2xl leading-6 font-bold text-gray-900" id="modal-title" x-text="modalTitle"></h3>
                                        <div class="mt-4">
                                            <p class="text-gray-600 text-sm leading-relaxed" x-text="modalDesc"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="modalOpen = false">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif($activeSection === 'jurusan')
                <div x-data="{ modalOpen: false, modalData: {} }">
                    <p class="text-neutral-600 leading-relaxed mb-6">{{ $kontenSection }}</p>
                    <div class="grid sm:grid-cols-2 gap-5">
                        @foreach($jurusanList as $jurusan)
                            <div @click="modalData = { nama: '{{ addslashes($jurusan->nama) }}', foto: '{{ $jurusan->foto ? asset($jurusan->foto) : 'https://placehold.co/400x250?text='.urlencode($jurusan->nama) }}', deskripsi: '{{ addslashes($jurusan->deskripsi) }}' }; modalOpen = true" class="cursor-pointer border border-neutral-200 rounded-lg overflow-hidden hover:border-cyan-500 hover:shadow-md transition bg-white flex flex-col">
                                <img src="{{ $jurusan->foto ? asset($jurusan->foto) : 'https://placehold.co/400x250?text='.urlencode($jurusan->nama) }}" alt="{{ $jurusan->nama }}" class="w-full h-56 object-contain bg-gray-50 border-b border-neutral-200">
                                <div class="p-5 flex-1 flex flex-col">
                                    <h3 class="font-display font-bold text-neutral-900 mb-2">{{ $jurusan->nama }}</h3>
                                    <p class="text-sm text-neutral-600 leading-relaxed flex-1 line-clamp-3">{{ $jurusan->deskripsi }}</p>
                                    <span class="text-cyan-600 text-xs font-semibold mt-3 mt-auto">Detail <i class="fa fa-arrow-right"></i></span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Alpine Modal -->
                    <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <!-- Background overlay -->
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="modalOpen = false" aria-hidden="true"></div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <!-- Modal panel -->
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                <div class="bg-white">
                                    <div class="relative">
                                        <img :src="modalData.foto" class="w-full h-64 object-contain bg-gray-50 border-b">
                                        <button @click="modalOpen = false" class="absolute top-2 right-2 bg-black bg-opacity-50 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-opacity-75"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="px-6 py-6">
                                        <h3 class="text-2xl leading-6 font-bold text-gray-900" id="modal-title" x-text="modalData.nama"></h3>
                                        <div class="mt-4">
                                            <p class="text-gray-600 text-sm leading-relaxed" x-text="modalData.deskripsi"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="modalOpen = false">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
