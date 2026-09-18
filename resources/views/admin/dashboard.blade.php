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
                <button @click="tab = 'guru'" :class="{'bg-red-700 text-white': tab === 'guru', 'hover:bg-gray-800 text-gray-300': tab !== 'guru'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-chalkboard-teacher w-4 text-center"></i> Data Guru
                </button>
                <button @click="tab = 'berita'" :class="{'bg-red-700 text-white': tab === 'berita', 'hover:bg-gray-800 text-gray-300': tab !== 'berita'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-newspaper w-4 text-center"></i> Berita
                </button>
                <button @click="tab = 'galeri'" :class="{'bg-red-700 text-white': tab === 'galeri', 'hover:bg-gray-800 text-gray-300': tab !== 'galeri'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-images w-4 text-center"></i> Galeri
                </button>
                <button @click="tab = 'ppdb'" :class="{'bg-red-700 text-white': tab === 'ppdb', 'hover:bg-gray-800 text-gray-300': tab !== 'ppdb'}" class="w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition">
                    <i class="fa fa-user-plus w-4 text-center"></i> PPDB
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
                        <form :action="editMode ? '{{ url('admin/berita') }}/' + form.id : '{{ route('admin.berita.store') }}'" method="POST">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Judul Berita</label><input type="text" name="judul" x-model="form.judul" required class="w-full border p-2 rounded"></div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="block text-sm mb-1">Tanggal</label><input type="date" name="tanggal" x-model="form.tanggal" required class="w-full border p-2 rounded"></div>
                                    <div><label class="block text-sm mb-1">Penulis</label><input type="text" name="penulis" x-model="form.penulis" class="w-full border p-2 rounded"></div>
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
                            <img src="{{ $gal->gambar }}" class="w-full h-32 object-cover rounded mb-2">
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
                        <form :action="editMode ? '{{ url('admin/galeri') }}/' + form.id : '{{ route('admin.galeri.store') }}'" method="POST">
                            @csrf
                            <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">
                            <div class="space-y-4 mb-6">
                                <div><label class="block text-sm mb-1">Judul Foto</label><input type="text" name="judul" x-model="form.judul" required class="w-full border p-2 rounded"></div>
                                <div><label class="block text-sm mb-1">URL Gambar</label><input type="url" name="gambar" x-model="form.gambar" required class="w-full border p-2 rounded" placeholder="https://..."></div>
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

        </main>
    </div>

</body>
</html>
