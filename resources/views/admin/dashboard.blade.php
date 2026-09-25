<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMK INFOKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ tab: '{{ request('tab', 'overview') }}' }">

    <div class="flex min-h-screen">
        {{-- SIDEBAR --}}
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 flex flex-col">
            <div class="px-6 py-5 border-b border-gray-700">
                <p class="font-bold text-red-400 text-sm">SMK INFOKOM</p>
                <p class="text-xs text-gray-400 mt-0.5">Panel Admin</p>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1">
                <button @click="tab = 'overview'" :class="{'bg-red-700 text-white': tab === 'overview', 'hover:bg-gray-800 text-gray-300': tab !== 'overview'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-home w-4 text-center"></i> Overview
                </button>
                <button @click="tab = 'profil'" :class="{'bg-red-700 text-white': tab === 'profil', 'hover:bg-gray-800 text-gray-300': tab !== 'profil'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-building w-4 text-center"></i> Profil Sekolah
                </button>
                <button @click="tab = 'jurusan'" :class="{'bg-red-700 text-white': tab === 'jurusan', 'hover:bg-gray-800 text-gray-300': tab !== 'jurusan'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-laptop-code w-4 text-center"></i> Jurusan
                </button>
                <button @click="tab = 'guru'" :class="{'bg-red-700 text-white': tab === 'guru', 'hover:bg-gray-800 text-gray-300': tab !== 'guru'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-chalkboard-teacher w-4 text-center"></i> Data Guru
                </button>
                <button @click="tab = 'berita'" :class="{'bg-red-700 text-white': tab === 'berita', 'hover:bg-gray-800 text-gray-300': tab !== 'berita'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-newspaper w-4 text-center"></i> Berita
                </button>
                <button @click="tab = 'informasi'" :class="{'bg-red-700 text-white': tab === 'informasi', 'hover:bg-gray-800 text-gray-300': tab !== 'informasi'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-bullhorn w-4 text-center"></i> Informasi & Prestasi
                </button>
                <button @click="tab = 'galeri'" :class="{'bg-red-700 text-white': tab === 'galeri', 'hover:bg-gray-800 text-gray-300': tab !== 'galeri'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-images w-4 text-center"></i> Galeri
                </button>
                <button @click="tab = 'ppdb'" :class="{'bg-red-700 text-white': tab === 'ppdb', 'hover:bg-gray-800 text-gray-300': tab !== 'ppdb'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-user-plus w-4 text-center"></i> PPDB
                </button>
                <button @click="tab = 'magang'" :class="{'bg-red-700 text-white': tab === 'magang', 'hover:bg-gray-800 text-gray-300': tab !== 'magang'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-plane w-4 text-center"></i> Magang Jepang
                </button>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white text-sm transition">
                    <i class="fa fa-globe w-4 text-center"></i> Lihat Website
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-gray-700">
                <p class="text-xs text-gray-400 mb-3">Login: <span class="text-white font-semibold">{{ Auth::user()->name }}</span></p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-2 text-sm text-red-400 hover:text-red-300 transition">
                        <i class="fa fa-sign-out-alt w-4 text-center"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-8 bg-gray-50 h-screen overflow-y-auto">
            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h1 class="text-2xl font-bold text-gray-800 mb-1">Dashboard Admin</h1>
            <p class="text-sm text-gray-500 mb-8">Kelola data website SMK INFOKOM</p>

            {{-- TAB: OVERVIEW --}}
            <div x-show="tab === 'overview'">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-5 mb-8">
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mb-2"><i class="fa fa-chalkboard-teacher"></i></div>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalGuru }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Total Guru</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-2"><i class="fa fa-user-graduate"></i></div>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Total Siswa</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-2"><i class="fa fa-newspaper"></i></div>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalBerita }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Total Berita</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center mb-2"><i class="fa fa-eye"></i></div>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalPengunjung }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Pengunjung</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-2"><i class="fa fa-user-plus"></i></div>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalPpdb }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Pendaftar PPDB</p>
                    </div>
                </div>
            </div>

            {{-- TAB: PROFIL --}}
            <div x-show="tab === 'profil'" style="display: none;">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold mb-4">Kelola Profil Sekolah</h2>
                    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4 mb-6">
                            <div><label class="block text-sm mb-1">Sejarah</label><textarea name="sejarah" class="w-full border p-2 rounded" rows="4">{{ $profil->sejarah ?? '' }}</textarea></div>
                            <div><label class="block text-sm mb-1">Visi & Misi (HTML)</label><textarea name="visi_misi" class="w-full border p-2 rounded" rows="4">{{ $profil->visi_misi ?? '' }}</textarea></div>
                            <div class="border p-4 rounded-lg bg-gray-50">
                                <h4 class="font-bold mb-2">Sambutan Kepala Sekolah</h4>
                                <div><label class="block text-sm mb-1">Nama Kepala Sekolah</label><input type="text" name="nama_kepsek" value="{{ $profil->nama_kepsek ?? '' }}" class="w-full border p-2 rounded mb-2"></div>
                                <div><label class="block text-sm mb-1">Teks Sambutan</label><textarea name="sambutan" class="w-full border p-2 rounded mb-2" rows="4">{{ $profil->sambutan ?? '' }}</textarea></div>
                                <div><label class="block text-sm mb-1">Foto Kepala Sekolah (Kosongkan jika tidak diubah)</label><input type="file" name="foto_kepsek_file" class="w-full border p-2 rounded bg-white text-sm"></div>
                                @if(isset($profil) && $profil->foto_kepsek)
                                    <img src="{{ asset($profil->foto_kepsek) }}" class="mt-2 h-20 rounded">
                                @endif
                            </div>
                            <div class="border p-4 rounded-lg bg-gray-50">
                                <h4 class="font-bold mb-2">Struktur Organisasi</h4>
                                <div><label class="block text-sm mb-1">Teks Pengantar</label><textarea name="struktur" class="w-full border p-2 rounded mb-2" rows="2">{{ $profil->struktur ?? '' }}</textarea></div>
                                <div><label class="block text-sm mb-1">Gambar Bagan Struktur (Kosongkan jika tidak diubah)</label><input type="file" name="foto_struktur_file" class="w-full border p-2 rounded bg-white text-sm"></div>
                                @if(isset($profil) && $profil->foto_struktur)
                                    <img src="{{ asset($profil->foto_struktur) }}" class="mt-2 h-20 rounded">
                                @endif
                            </div>
                            <div><label class="block text-sm mb-1">Pengantar Fasilitas</label><textarea name="fasilitas" class="w-full border p-2 rounded" rows="2">{{ $profil->fasilitas ?? '' }}</textarea></div>
                            <div><label class="block text-sm mb-1">Pengantar Jurusan</label><textarea name="jurusan_teks" class="w-full border p-2 rounded" rows="2">{{ $profil->jurusan_teks ?? '' }}</textarea></div>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

            {{-- TAB: JURUSAN --}}
            <div x-show="tab === 'jurusan'" style="display: none;" x-data="{ showModal: false, editMode: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Data Jurusan</h2>
                        <button @click="showModal = true; editMode = false; form = {}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            + Tambah Jurusan
                        </button>
                    </div>
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-3 text-left w-20">Foto</th>
                                <th class="p-3 text-left">Nama Jurusan</th>
                                <th class="p-3 text-left">Deskripsi</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jurusans as $j)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    @if($j->foto)
                                        <img src="{{ asset($j->foto) }}" class="w-16 h-12 object-cover rounded border">
                                    @else
                                        <span class="text-xs text-gray-400">No image</span>
                                    @endif
                                </td>
                                <td class="p-3 font-medium">{{ $j->nama }}</td>
                                <td class="p-3 truncate max-w-xs">{{ $j->deskripsi }}</td>
                                <td class="p-3 text-center flex justify-center gap-2 items-center h-full pt-4">
                                    <button @click="showModal = true; editMode = true; form = {{ json_encode($j) }}" class="text-blue-500 hover:text-blue-700"><i class="fa fa-edit"></i></button>
                                    <form action="{{ route('admin.jurusan.destroy', $j->id) }}" method="POST" onsubmit="return confirm('Hapus jurusan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Modal Form Jurusan --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-md p-6">
                        <h3 class="text-lg font-bold mb-4" x-text="editMode ? 'Edit Jurusan' : 'Tambah Jurusan'"></h3>
                        <form :action="editMode ? '{{ url('admin/jurusan') }}/' + form.id : '{{ route('admin.jurusan.store') }}'" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Nama Jurusan</label><input type="text" name="nama" x-model="form.nama" required class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">Deskripsi Singkat</label><textarea name="deskripsi" x-model="form.deskripsi" class="w-full border p-2 rounded" rows="3"></textarea></div>
                                <div>
                                    <label class="block text-sm mb-1">Foto Ilustrasi <span class="text-xs text-gray-400" x-text="editMode ? '(Kosongkan jika tidak diubah)' : ''"></span></label>
                                    <input type="file" name="foto_file" accept="image/*" class="w-full border p-2 rounded text-sm">
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TAB: GURU --}}
            <div x-show="tab === 'guru'" style="display: none;" x-data="{ showModal: false, editMode: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Data Guru & Staff</h2>
                        <button @click="showModal = true; editMode = false; form = {}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            + Tambah Guru
                        </button>
                    </div>
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-3 text-left w-16">Foto</th>
                                <th class="p-3 text-left">Nama</th>
                                <th class="p-3 text-left">Jabatan</th>
                                <th class="p-3 text-left">Bidang</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gurus as $g)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    @if($g->foto)
                                        <img src="{{ asset($g->foto) }}" class="w-10 h-10 object-cover rounded-full border">
                                    @else
                                        <div class="w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold">
                                            {{ strtoupper(substr($g->nama, 0, 1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td class="p-3">{{ $g->nama }}</td>
                                <td class="p-3">{{ $g->jabatan }}</td>
                                <td class="p-3">{{ $g->bidang ?? '-' }}</td>
                                <td class="p-3 text-center flex justify-center gap-2 items-center h-full pt-4">
                                    <button @click="showModal = true; editMode = true; form = {{ json_encode($g) }}" class="text-blue-500 hover:text-blue-700"><i class="fa fa-edit"></i></button>
                                    <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Hapus guru ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Modal Form Guru --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-md p-6">
                        <h3 class="text-lg font-bold mb-4" x-text="editMode ? 'Edit Data Guru' : 'Tambah Guru Baru'"></h3>
                        <form :action="editMode ? '{{ url('admin/guru') }}/' + form.id : '{{ route('admin.guru.store') }}'" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Nama Lengkap</label><input type="text" name="nama" x-model="form.nama" required class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">Jabatan</label><input type="text" name="jabatan" x-model="form.jabatan" required class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">Bidang / Mata Pelajaran</label><input type="text" name="bidang" x-model="form.bidang" class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">Urutan Tampil</label><input type="number" name="urutan" x-model="form.urutan" class="w-full border p-2 rounded"></div>
                                <div>
                                    <label class="block text-sm mb-1">Foto <span class="text-xs text-gray-400" x-text="editMode && form.foto ? '(Kosongkan jika tidak ingin mengubah)' : ''"></span></label>
                                    <input type="file" name="foto" accept="image/*" class="w-full border p-2 rounded text-sm">
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TAB: BERITA --}}
            <div x-show="tab === 'berita'" style="display: none;" x-data="{ showModal: false, editMode: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Kelola Berita</h2>
                        <button @click="showModal = true; editMode = false; form = {}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            + Tulis Berita
                        </button>
                    </div>
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-3 text-left">Tanggal</th>
                                <th class="p-3 text-left">Judul</th>
                                <th class="p-3 text-left">Penulis</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beritas as $b)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                <td class="p-3 font-medium">{{ $b->judul }}</td>
                                <td class="p-3">{{ $b->penulis ?? '-' }}</td>
                                <td class="p-3 text-center flex justify-center gap-2">
                                    <button @click="showModal = true; editMode = true; form = {{ json_encode($b) }}; form.tanggal = '{{ \Carbon\Carbon::parse($b->tanggal)->format('Y-m-d') }}'" class="text-blue-500 hover:text-blue-700"><i class="fa fa-edit"></i></button>
                                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Modal Form Berita --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-2xl p-6 max-h-[90vh] overflow-y-auto">
                        <h3 class="text-lg font-bold mb-4" x-text="editMode ? 'Edit Berita' : 'Tulis Berita Baru'"></h3>
                        <form :action="editMode ? '{{ url('admin/berita') }}/' + form.id : '{{ route('admin.berita.store') }}'" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Judul Berita</label><input type="text" name="judul" x-model="form.judul" required class="w-full border p-2 rounded"></div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="block text-sm mb-1">Tanggal</label><input type="date" name="tanggal" x-model="form.tanggal" required class="w-full border p-2 rounded"></div>
                                    <div><label class="block text-sm mb-1">Penulis</label><input type="text" name="penulis" x-model="form.penulis" class="w-full border p-2 rounded"></div>
                                </div>
                                <div>
                                    <label class="block text-sm mb-1">Gambar Berita <span class="text-xs text-gray-400" x-text="editMode ? '(Kosongkan jika tidak ingin diubah)' : ''"></span></label>
                                    <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
                                </div>
                                <div><label class="block text-sm mb-1">Ringkasan</label><textarea name="ringkasan" x-model="form.ringkasan" class="w-full border p-2 rounded" rows="2"></textarea></div>
                                <div><label class="block text-sm mb-1">Isi Berita</label><textarea name="isi" x-model="form.isi" required class="w-full border p-2 rounded" rows="6"></textarea></div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TAB: INFORMASI & PRESTASI --}}
            <div x-show="tab === 'informasi'" style="display: none;" x-data="{ showModal: false, editMode: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Kelola Informasi & Prestasi</h2>
                        <button @click="showModal = true; editMode = false; form = {}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            + Tambah Data
                        </button>
                    </div>
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-3 text-left w-20">Gambar</th>
                                <th class="p-3 text-left">Tanggal</th>
                                <th class="p-3 text-left">Kategori</th>
                                <th class="p-3 text-left">Judul</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($informasis as $inf)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    @if($inf->gambar)
                                        <img src="{{ asset('images/informasi/' . $inf->gambar) }}" class="w-16 h-12 object-cover rounded border">
                                    @else
                                        <span class="text-xs text-gray-400">No image</span>
                                    @endif
                                </td>
                                <td class="p-3">{{ \Carbon\Carbon::parse($inf->tanggal)->format('d M Y') }}</td>
                                <td class="p-3"><span class="px-2 py-1 bg-cyan-100 text-cyan-800 rounded text-xs font-bold">{{ $inf->kategori }}</span></td>
                                <td class="p-3 font-medium">{{ $inf->judul }}</td>
                                <td class="p-3 text-center flex justify-center gap-2 items-center h-full pt-4">
                                    <button @click="showModal = true; editMode = true; form = {{ json_encode($inf) }}; form.tanggal = '{{ \Carbon\Carbon::parse($inf->tanggal)->format('Y-m-d') }}'" class="text-blue-500 hover:text-blue-700"><i class="fa fa-edit"></i></button>
                                    <form action="{{ route('admin.informasi.destroy', $inf->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Modal Form Informasi --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-2xl p-6 max-h-[90vh] overflow-y-auto">
                        <h3 class="text-lg font-bold mb-4" x-text="editMode ? 'Edit Data' : 'Tambah Data Baru'"></h3>
                        <form :action="editMode ? '{{ url('admin/informasi') }}/' + form.id : '{{ route('admin.informasi.store') }}'" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Kategori</label>
                                    <select name="kategori" x-model="form.kategori" required class="w-full border p-2 rounded">
                                        <option value="Pengumuman">Pengumuman</option>
                                        <option value="Agenda">Agenda</option>
                                        <option value="Prestasi">Prestasi</option>
                                        <option value="Galeri">Galeri</option>
                                    </select>
                                </div>
                                <div><label class="block text-sm mb-1">Judul</label><input type="text" name="judul" x-model="form.judul" required class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">Tanggal</label><input type="date" name="tanggal" x-model="form.tanggal" required class="w-full border p-2 rounded"></div>
                                <div>
                                    <label class="block text-sm mb-1">Gambar (Upload File) <span class="text-xs text-gray-400" x-text="editMode ? '(Kosongkan jika tidak ingin diubah)' : ''"></span></label>
                                    <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
                                </div>
                                <div><label class="block text-sm mb-1">Konten / Isi Lengkap</label><textarea name="isi" x-model="form.isi" required class="w-full border p-2 rounded" rows="6"></textarea></div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TAB: GALERI --}}
            <div x-show="tab === 'galeri'" style="display: none;" x-data="{ showModal: false, editMode: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Galeri Foto</h2>
                        <button @click="showModal = true; editMode = false; form = {}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">
                            + Tambah Foto
                        </button>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($galeris as $gal)
                        <div class="border rounded-lg p-2 relative group">
                            <img src="{{ filter_var($gal->gambar, FILTER_VALIDATE_URL) ? $gal->gambar : asset('images/galeri/' . $gal->gambar) }}" class="w-full h-32 object-cover rounded mb-2">
                            <p class="text-sm font-medium truncate">{{ $gal->judul }}</p>
                            <p class="text-xs text-gray-500">{{ $gal->kategori ?? 'Umum' }}</p>
                            
                            <div class="absolute top-4 right-4 bg-white rounded shadow-md p-1 opacity-0 group-hover:opacity-100 transition flex gap-1">
                                <button @click="showModal = true; editMode = true; form = {{ json_encode($gal) }}" class="p-1 text-blue-500"><i class="fa fa-edit"></i></button>
                                <form action="{{ route('admin.galeri.destroy', $gal->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-1 text-red-500"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Modal Form Galeri --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-md p-6">
                        <h3 class="text-lg font-bold mb-4" x-text="editMode ? 'Edit Foto' : 'Tambah Foto Baru'"></h3>
                        <form :action="editMode ? '{{ url('admin/galeri') }}/' + form.id : '{{ route('admin.galeri.store') }}'" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Judul Foto</label><input type="text" name="judul" x-model="form.judul" required class="w-full border p-2 rounded"></div>
                                <div>
                                    <label class="block text-sm mb-1">Upload Gambar <span class="text-xs text-gray-400" x-text="editMode ? '(Kosongkan jika tidak ingin diubah)' : ''"></span></label>
                                    <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
                                </div>
                                <div><label class="block text-sm mb-1">Kategori</label><input type="text" name="kategori" x-model="form.kategori" class="w-full border p-2 rounded" placeholder="Kegiatan / Fasilitas"></div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TAB: PPDB --}}
            <div x-show="tab === 'ppdb'" style="display: none;" x-data="{ showModal: false, form: {} }">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold mb-4">Pendaftar PPDB Online</h2>
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="p-3 text-left">No. Daftar</th>
                                <th class="p-3 text-left">Nama</th>
                                <th class="p-3 text-left">Asal Sekolah</th>
                                <th class="p-3 text-left">Jurusan</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ppdbList as $p)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-mono font-medium">{{ $p->no_pendaftaran }}</td>
                                <td class="p-3">{{ $p->nama_lengkap }}<br><span class="text-xs text-gray-500">{{ $p->no_hp_siswa }}</span></td>
                                <td class="p-3">{{ $p->asal_smp }}</td>
                                <td class="p-3">{{ $p->jurusan_pilihan_1 }}</td>
                                <td class="p-3">
                                    @php $badge = $p->status_badge; @endphp
                                    <span class="px-2 py-1 text-xs font-semibold rounded border {{ $badge['class'] }}">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="p-3 text-center flex justify-center gap-2">
                                    <a href="{{ route('ppdb.bukti', $p->no_pendaftaran) }}" target="_blank" class="px-2 py-1 bg-gray-200 text-gray-700 rounded text-xs hover:bg-gray-300">Detail</a>
                                    <button @click="showModal = true; form = {{ json_encode($p) }}" class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs hover:bg-blue-200">Ubah Status</button>
                                    <form action="{{ route('admin.ppdb.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data pendaftar ini secara permanen?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs hover:bg-red-200">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $ppdbList->appends(['tab' => 'ppdb'])->links() }}
                    </div>
                </div>

                {{-- Modal Ubah Status PPDB --}}
                <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-xl w-full max-w-md p-6">
                        <h3 class="text-lg font-bold mb-4">Update Status PPDB</h3>
                        <div class="mb-4 p-3 bg-gray-50 rounded border text-sm">
                            <p><span class="text-gray-500">No:</span> <span class="font-bold" x-text="form.no_pendaftaran"></span></p>
                            <p><span class="text-gray-500">Nama:</span> <span class="font-bold" x-text="form.nama_lengkap"></span></p>
                        </div>
                        <form :action="'{{ url('admin/ppdb-pendaftar') }}/' + form.id + '/status'" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="space-y-4 mb-6">
                                <div>
                                    <label class="block text-sm mb-1">Status Verifikasi</label>
                                    <select name="status" x-model="form.status" class="w-full border p-2 rounded" required>
                                        <option value="menunggu">Menunggu Verifikasi</option>
                                        <option value="terverifikasi">Berkas Terverifikasi</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">Tidak Diterima</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm mb-1">Catatan Admin (Opsional)</label>
                                    <textarea name="catatan_admin" x-model="form.catatan_admin" class="w-full border p-2 rounded" rows="3" placeholder="Misal: Berkas fotokopi KK kurang jelas..."></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg text-sm">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- TAB: MAGANG --}}
            <div x-show="tab === 'magang'" x-data="{ showModal: false, form: {} }">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Pendaftar Magang Jepang</h2>
                        <p class="text-sm text-gray-500">Kelola data pendaftaran magang Jepang</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600 font-medium border-b border-gray-100">
                            <tr>
                                <th class="p-3">No. Pendaftaran</th>
                                <th class="p-3">Nama Lengkap</th>
                                <th class="p-3">Asal Jurusan</th>
                                <th class="p-3">No HP</th>
                                <th class="p-3">Status</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($magangList ?? [] as $mgn)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-3 font-bold text-red-600">{{ $mgn->no_pendaftaran }}</td>
                                <td class="p-3 font-medium">{{ $mgn->nama_lengkap }}</td>
                                <td class="p-3">{{ $mgn->asal_jurusan }}</td>
                                <td class="p-3">{{ $mgn->no_hp }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 text-xs font-bold rounded 
                                        @if($mgn->status == 'Menunggu') bg-yellow-100 text-yellow-800 
                                        @elseif($mgn->status == 'Diproses') bg-blue-100 text-blue-800 
                                        @elseif($mgn->status == 'Diterima') bg-green-100 text-green-800 
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ $mgn->status }}
                                    </span>
                                </td>
                                <td class="p-3 text-center flex justify-center gap-2 items-center">
                                    <form action="{{ route('admin.magang.destroy', $mgn->id) }}" method="POST" onsubmit="return confirm('Hapus pendaftar magang ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
