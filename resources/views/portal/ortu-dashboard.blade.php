<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Orang Tua - SMK INFOKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    {{-- TOP BAR --}}
    <div class="bg-red-700 text-white text-xs py-2 px-6 flex justify-between items-center">
        <span><i class="fa fa-users mr-2"></i>Portal Orang Tua - SMK INFOKOM Kota Bogor</span>
        <div class="flex items-center gap-4">
            <span><i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:text-yellow-300 transition"><i class="fa fa-sign-out-alt mr-1"></i>Logout</button>
            </form>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-red-600"><i class="fa fa-home"></i></a>
            <span class="text-gray-300">/</span>
            <span class="text-red-600 font-semibold text-sm">Portal Orang Tua</span>
        </div>

        @if(!$siswa)
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-8 text-center">
                <i class="fa fa-exclamation-circle text-yellow-400 text-4xl mb-3"></i>
                <h3 class="font-bold text-gray-700">Data siswa tidak ditemukan</h3>
                <p class="text-sm text-gray-500 mt-2">Hubungi pihak sekolah untuk menghubungkan akun Anda dengan data siswa.</p>
            </div>
        @else
        {{-- INFO SISWA --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                </div>
                <div>
                    <h2 class="font-bold text-gray-800 text-lg">{{ $siswa->nama }}</h2>
                    <p class="text-sm text-gray-500">NISN: {{ $siswa->nisn }} · {{ $siswa->kelas }} · {{ $siswa->jurusan }}</p>
                    <p class="text-sm text-gray-500">Wali Murid: {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">

            {{-- TAGIHAN --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <i class="fa fa-money-bill-wave text-red-500"></i>
                    <h3 class="font-bold text-gray-800">Tunggakan / Tagihan</h3>
                </div>
                <div class="p-4 space-y-3">
                    @forelse($tagihan as $t)
                    <div class="flex justify-between items-center p-3 rounded-lg {{ $t->status === 'belum_lunas' ? 'bg-red-50 border border-red-100' : 'bg-green-50 border border-green-100' }}">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $t->jenis }}@if($t->bulan) - {{ $t->bulan }}@endif</p>
                            <p class="text-xs text-gray-500">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</p>
                        </div>
                        <span class="text-xs font-bold px-2 py-1 rounded {{ $t->status === 'belum_lunas' ? 'bg-red-200 text-red-700' : 'bg-green-200 text-green-700' }}">
                            {{ $t->status === 'belum_lunas' ? 'Belum Lunas' : 'Lunas' }}
                        </span>
                    </div>
                    @empty <p class="text-sm text-gray-400 p-3">Tidak ada tagihan.</p>
                    @endforelse
                </div>
            </div>

            {{-- NILAI --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <i class="fa fa-chart-line text-blue-500"></i>
                    <h3 class="font-bold text-gray-800">Nilai-Nilai Siswa</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs">
                        <thead class="bg-gray-50 text-gray-500 uppercase">
                            <tr><th class="px-4 py-2 text-left">Mapel</th><th class="px-4 py-2">Tugas</th><th class="px-4 py-2">UTS</th><th class="px-4 py-2">UAS</th><th class="px-4 py-2">Akhir</th><th class="px-4 py-2">KKM</th></tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($nilai as $n)
                            <tr class="{{ $n->nilai_akhir < $n->kkm ? 'bg-red-50' : '' }}">
                                <td class="px-4 py-2 font-medium text-gray-700">{{ $n->mata_pelajaran }}</td>
                                <td class="px-4 py-2 text-center">{{ $n->nilai_tugas }}</td>
                                <td class="px-4 py-2 text-center">{{ $n->nilai_uts }}</td>
                                <td class="px-4 py-2 text-center">{{ $n->nilai_uas }}</td>
                                <td class="px-4 py-2 text-center font-bold {{ $n->nilai_akhir >= $n->kkm ? 'text-green-600' : 'text-red-600' }}">{{ $n->nilai_akhir }}</td>
                                <td class="px-4 py-2 text-center text-gray-400">{{ $n->kkm }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ABSENSI --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <i class="fa fa-calendar-check text-green-500"></i>
                    <h3 class="font-bold text-gray-800">Absensi Kehadiran</h3>
                </div>
                <div class="p-4 space-y-3">
                    @foreach($absensi as $a)
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-sm font-semibold text-gray-700 mb-2">{{ $a->bulan }}</p>
                        <div class="grid grid-cols-4 gap-2 text-center text-xs">
                            <div class="bg-green-100 rounded p-2"><p class="font-bold text-green-700">{{ $a->hadir }}</p><p class="text-gray-500">Hadir</p></div>
                            <div class="bg-blue-100 rounded p-2"><p class="font-bold text-blue-700">{{ $a->sakit }}</p><p class="text-gray-500">Sakit</p></div>
                            <div class="bg-yellow-100 rounded p-2"><p class="font-bold text-yellow-700">{{ $a->izin }}</p><p class="text-gray-500">Izin</p></div>
                            <div class="bg-red-100 rounded p-2"><p class="font-bold text-red-700">{{ $a->alpa }}</p><p class="text-gray-500">Alpa</p></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ESKUL --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <i class="fa fa-futbol text-purple-500"></i>
                    <h3 class="font-bold text-gray-800">Ekstrakurikuler</h3>
                </div>
                <div class="p-4 space-y-3">
                    @forelse($eskul as $e)
                    <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg border border-purple-100">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $e->nama_eskul }}</p>
                            <p class="text-xs text-gray-500">{{ $e->pelatih }} · {{ $e->hari }}</p>
                        </div>
                        <span class="text-sm font-bold text-purple-700 bg-purple-200 px-2 py-1 rounded">{{ $e->nilai }}</span>
                    </div>
                    @empty <p class="text-sm text-gray-400 p-3">Tidak ada data eskul.</p>
                    @endforelse
                </div>
            </div>

            {{-- PERPUSTAKAAN --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm md:col-span-2">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <i class="fa fa-book-reader text-yellow-500"></i>
                    <h3 class="font-bold text-gray-800">Peminjaman Perpustakaan</h3>
                </div>
                <div class="p-4 space-y-3">
                    @forelse($perpustakaan as $p)
                    <div class="flex justify-between items-center p-3 rounded-lg border {{ $p->status === 'dipinjam' ? 'bg-yellow-50 border-yellow-100' : 'bg-gray-50 border-gray-100' }}">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $p->judul_buku }}</p>
                            <p class="text-xs text-gray-500">Pinjam: {{ $p->tanggal_pinjam }} @if($p->tanggal_kembali) · Kembali: {{ $p->tanggal_kembali }} @endif</p>
                        </div>
                        <span class="text-xs font-bold px-2 py-1 rounded {{ $p->status === 'dipinjam' ? 'bg-yellow-200 text-yellow-700' : 'bg-gray-200 text-gray-700' }}">
                            {{ $p->status === 'dipinjam' ? 'Dipinjam' : 'Dikembalikan' }}
                        </span>
                    </div>
                    @empty <p class="text-sm text-gray-400 p-3">Tidak ada riwayat peminjaman.</p>
                    @endforelse
                </div>
            </div>

        </div>
        @endif
    </div>
</body>
</html>
