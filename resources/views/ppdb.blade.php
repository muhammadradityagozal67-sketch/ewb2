@extends('layouts.app')

@section('title', 'PPDB Online 2026/2027 - SMK INFOKOM Kota Bogor')

@section('content')

    {{-- HERO HEADER --}}
    <div class="bg-gradient-to-r from-gray-900 via-red-950 to-gray-900 text-white py-14 border-b border-red-800/30">
        <div class="max-w-7xl mx-auto px-6">
            <span class="inline-block px-3 py-1 bg-red-600/30 border border-red-500/40 text-red-300 rounded-full text-xs font-semibold uppercase tracking-wider mb-3">
                Tahun Ajaran 2026 / 2027
            </span>
            <h1 class="font-display text-3xl sm:text-4xl font-black tracking-tight">Penerimaan Peserta Didik Baru (PPDB)</h1>
            <p class="text-sm text-gray-300 mt-2 max-w-2xl">
                Bergabunglah bersama SMK INFOKOM Kota Bogor di Jl. Letjen Ibrahim Adjie No.178 Sindangbarang. Wujudkan masa depan gemilang di bidang teknologi informasi dan komunikasi dengan kurikulum berbasis industri.
            </p>
        </div>
    </div>

    {{-- ALUR PENDAFTARAN 5 LANGKAH --}}
    <div class="bg-white border-b border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-4 text-center">5 Langkah Alur Pendaftaran PPDB Online</p>
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 text-center">
                <div class="p-3 bg-red-50 rounded-xl border border-red-100">
                    <span class="w-7 h-7 bg-red-700 text-white text-xs font-bold rounded-full flex items-center justify-center mx-auto mb-2">1</span>
                    <h4 class="text-xs font-bold text-gray-900">Isi Formulir</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Lengkapi biodata online</p>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                    <span class="w-7 h-7 bg-gray-700 text-white text-xs font-bold rounded-full flex items-center justify-center mx-auto mb-2">2</span>
                    <h4 class="text-xs font-bold text-gray-900">Cetak Bukti</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Dapatkan No. Registrasi</p>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                    <span class="w-7 h-7 bg-gray-700 text-white text-xs font-bold rounded-full flex items-center justify-center mx-auto mb-2">3</span>
                    <h4 class="text-xs font-bold text-gray-900">Verifikasi Berkas</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Bawa berkas ke sekolah</p>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                    <span class="w-7 h-7 bg-gray-700 text-white text-xs font-bold rounded-full flex items-center justify-center mx-auto mb-2">4</span>
                    <h4 class="text-xs font-bold text-gray-900">Tes Minat Bakat</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Wawancara & peminatan</p>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl border border-gray-200 col-span-2 sm:col-span-1">
                    <span class="w-7 h-7 bg-gray-700 text-white text-xs font-bold rounded-full flex items-center justify-center mx-auto mb-2">5</span>
                    <h4 class="text-xs font-bold text-gray-900">Daftar Ulang</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Resmi jadi siswa baru</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- FLASH MESSAGES --}}
        @if(session('warning'))
            <div class="mb-8 p-4 bg-yellow-50 border border-yellow-200 rounded-xl text-yellow-800 flex items-start gap-3 shadow-sm">
                <i class="fa fa-exclamation-triangle text-yellow-600 text-xl mt-0.5"></i>
                <div>
                    <h4 class="font-bold">Informasi</h4>
                    <p class="text-sm mt-0.5">{{ session('warning') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 p-4 bg-red-50 border border-red-200 rounded-xl text-red-800 shadow-sm">
                <div class="flex items-center gap-2 font-bold mb-2">
                    <i class="fa fa-exclamation-circle text-red-600"></i>
                    <span>Terdapat kesalahan pada isian formulir:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- TABS NAVIGATION --}}
        <div class="flex flex-wrap border-b border-gray-200 mb-8 gap-2">
            <button onclick="switchPpdbTab('daftar')" id="ppdb-tab-btn-daftar"
                class="ppdb-tab-btn px-5 py-3 text-sm font-bold border-b-2 transition flex items-center gap-2 {{ $activeTab === 'daftar' ? 'border-red-700 text-red-700' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <i class="fa fa-file-signature"></i> Formulir Pendaftaran Online
            </button>
            <button onclick="switchPpdbTab('status')" id="ppdb-tab-btn-status"
                class="ppdb-tab-btn px-5 py-3 text-sm font-bold border-b-2 transition flex items-center gap-2 {{ $activeTab === 'status' ? 'border-red-700 text-red-700' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <i class="fa fa-search"></i> Cek Status Seleksi
            </button>
            <button onclick="switchPpdbTab('kuota')" id="ppdb-tab-btn-kuota"
                class="ppdb-tab-btn px-5 py-3 text-sm font-bold border-b-2 transition flex items-center gap-2 {{ $activeTab === 'kuota' ? 'border-red-700 text-red-700' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <i class="fa fa-chart-pie"></i> Kuota & Jurusan
            </button>
            <button onclick="switchPpdbTab('info')" id="ppdb-tab-btn-info"
                class="ppdb-tab-btn px-5 py-3 text-sm font-bold border-b-2 transition flex items-center gap-2 {{ $activeTab === 'info' ? 'border-red-700 text-red-700' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <i class="fa fa-info-circle"></i> Jalur & Syarat
            </button>
        </div>
        {{-- ================= TAB 1: FORMULIR PENDAFTARAN ONLINE ================= --}}
        <div id="ppdb-panel-daftar" class="ppdb-panel {{ $activeTab !== 'daftar' ? 'hidden' : '' }}">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sm:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Formulir Pendaftaran Siswa Baru 2026/2027</h2>
                    <p class="text-sm text-gray-500 mt-1">Harap mengisi semua data dengan benar sesuai dokumen resmi (Rapor, KK, Akta Kelahiran).</p>
                </div>

                <form method="POST" action="{{ route('ppdb.daftar.post') }}" class="space-y-8">
                    @csrf

                    {{-- BAGIAN 1: JALUR & JURUSAN PILIHAN --}}
                    <div>
                        <div class="flex items-center gap-2 pb-2 mb-4 border-b border-gray-100">
                            <span class="w-6 h-6 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                            <h3 class="font-bold text-gray-800 text-base">Jalur & Jurusan Pilihan</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Jalur Pendaftaran *</label>
                                <select name="jalur" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white">
                                    <option value="Reguler" {{ old('jalur') == 'Reguler' ? 'selected' : '' }}>Jalur Reguler (Nilai Rapor)</option>
                                    <option value="Prestasi" {{ old('jalur') == 'Prestasi' ? 'selected' : '' }}>Jalur Prestasi (Akademik / Non-Akademik)</option>
                                    <option value="Afirmasi & KIP" {{ old('jalur') == 'Afirmasi & KIP' ? 'selected' : '' }}>Jalur Afirmasi & KIP</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Program Keahlian Pilihan 1 *</label>
                                <select name="jurusan_pilihan_1" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white">
                                    <option value="Rekayasa Perangkat Lunak (RPL)" {{ old('jurusan_pilihan_1') == 'Rekayasa Perangkat Lunak (RPL)' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                                    <option value="Teknik Komputer & Jaringan (TKJ)" {{ old('jurusan_pilihan_1') == 'Teknik Komputer & Jaringan (TKJ)' ? 'selected' : '' }}>Teknik Komputer & Jaringan (TKJ)</option>
                                    <option value="Desain Komunikasi Visual (DKV)" {{ old('jurusan_pilihan_1') == 'Desain Komunikasi Visual (DKV)' ? 'selected' : '' }}>Desain Komunikasi Visual (DKV)</option>
                                    <option value="Produksi & Siaran Program Televisi (PSPT)" {{ old('jurusan_pilihan_1') == 'Produksi & Siaran Program Televisi (PSPT)' ? 'selected' : '' }}>Produksi & Siaran Program Televisi (PSPT)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Program Keahlian Pilihan 2 (Opsional)</label>
                                <select name="jurusan_pilihan_2" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white">
                                    <option value="">-- Pilih Jurusan Cadangan --</option>
                                    <option value="Rekayasa Perangkat Lunak (RPL)" {{ old('jurusan_pilihan_2') == 'Rekayasa Perangkat Lunak (RPL)' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                                    <option value="Teknik Komputer & Jaringan (TKJ)" {{ old('jurusan_pilihan_2') == 'Teknik Komputer & Jaringan (TKJ)' ? 'selected' : '' }}>Teknik Komputer & Jaringan (TKJ)</option>
                                    <option value="Desain Komunikasi Visual (DKV)" {{ old('jurusan_pilihan_2') == 'Desain Komunikasi Visual (DKV)' ? 'selected' : '' }}>Desain Komunikasi Visual (DKV)</option>
                                    <option value="Produksi & Siaran Program Televisi (PSPT)" {{ old('jurusan_pilihan_2') == 'Produksi & Siaran Program Televisi (PSPT)' ? 'selected' : '' }}>Produksi & Siaran Program Televisi (PSPT)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 2: DATA CALON SISWA --}}
                    <div>
                        <div class="flex items-center gap-2 pb-2 mb-4 border-b border-gray-100">
                            <span class="w-6 h-6 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                            <h3 class="font-bold text-gray-800 text-base">Identitas Calon Siswa</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Lengkap (sesuai Ijazah SMP) *</label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Contoh: Budi Santoso">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">NISN (10 Digit) *</label>
                                    <input type="text" name="nisn" maxlength="10" value="{{ old('nisn') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                        placeholder="0012345678">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">NIK KTP/KK (16 Digit)</label>
                                    <input type="text" name="nik" maxlength="16" value="{{ old('nik') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                        placeholder="3271xxxxxxxxxxxx">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Tempat Lahir *</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                        placeholder="Kota Bogor">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Tanggal Lahir *</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Jenis Kelamin *</label>
                                    <select name="jenis_kelamin" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white">
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Agama *</label>
                                    <select name="agama" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white">
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen Protestan" {{ old('agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nomor WhatsApp Siswa *</label>
                                <input type="text" name="no_hp_siswa" value="{{ old('no_hp_siswa') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="081234567890">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Alamat Tempat Tinggal Lengkap *</label>
                                <input type="text" name="alamat_tinggal" value="{{ old('alamat_tinggal') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota">
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 3: ASAL SEKOLAH & NILAI RAPOR --}}
                    <div>
                        <div class="flex items-center gap-2 pb-2 mb-4 border-b border-gray-100">
                            <span class="w-6 h-6 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                            <h3 class="font-bold text-gray-800 text-base">Asal Sekolah & Nilai Rapor</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Asal SMP / MTs *</label>
                                <input type="text" name="asal_smp" value="{{ old('asal_smp') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="SMP Negeri 1 Bogor">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Tahun Lulus *</label>
                                <input type="number" name="tahun_lulus" value="{{ old('tahun_lulus', '2026') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="2026">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Rata-rata Nilai Rapor Sem 1-5 (0-100) *</label>
                                <input type="number" step="0.01" name="nilai_rata_rata" value="{{ old('nilai_rata_rata') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Contoh: 85.50">
                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 4: DATA ORANG TUA / WALI --}}
                    <div>
                        <div class="flex items-center gap-2 pb-2 mb-4 border-b border-gray-100">
                            <span class="w-6 h-6 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold">4</span>
                            <h3 class="font-bold text-gray-800 text-base">Data Orang Tua / Wali</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Orang Tua / Wali *</label>
                                <input type="text" name="nama_ortu_wali" value="{{ old('nama_ortu_wali') }}" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Nama Ayah / Ibu / Wali">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">Pekerjaan Orang Tua</label>
                                <input type="text" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Wiraswasta / Karyawan / PNS">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5">No. WhatsApp Orang Tua</label>
                                <input type="text" name="no_hp_ortu" value="{{ old('no_hp_ortu') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="0813xxxxxxxx">
                            </div>
                        </div>
                    </div>

                    {{-- PERSETUJUAN & SUBMIT --}}
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex items-start gap-3 mb-6">
                            <input type="checkbox" id="setuju" required class="mt-1 rounded text-red-700 focus:ring-red-500">
                            <label for="setuju" class="text-xs text-gray-600">
                                Saya menyatakan bahwa seluruh data yang diisikan adalah benar dan dapat dipertanggungjawabkan. Jika di kemudian hari ditemukan ketidaksesuaian dokumen, saya bersedia menerima sanksi pembatalan kelulusan.
                            </label>
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-red-700 hover:bg-red-800 text-white font-bold rounded-xl shadow-md transition flex items-center justify-center gap-2">
                            <i class="fa fa-paper-plane"></i> Kirim Pendaftaran PPDB Online
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- ================= TAB 2: CEK STATUS PENDAFTARAN ================= --}}
        <div id="ppdb-panel-status" class="ppdb-panel {{ $activeTab !== 'status' ? 'hidden' : '' }}">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-8">
                    <div class="text-center mb-6">
                        <div class="w-14 h-14 bg-red-100 text-red-700 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                            <i class="fa fa-search"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Cek Status Hasil Seleksi PPDB</h2>
                        <p class="text-xs text-gray-500 mt-1">Masukkan Nomor Registrasi (contoh: PPDB-2026-0001) atau 10 digit NISN Anda</p>
                    </div>

                    <form method="GET" action="{{ route('ppdb.index') }}" class="flex gap-2">
                        <input type="hidden" name="tab" value="status">
                        <input type="text" name="keyword" value="{{ $keywordCari }}" required
                            placeholder="PPDB-2026-0001 atau NISN Anda"
                            class="flex-1 border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 font-mono">
                        <button type="submit" class="px-6 py-3 bg-red-700 hover:bg-red-800 text-white font-bold rounded-xl transition text-sm flex items-center gap-2">
                            <i class="fa fa-search"></i> Periksa
                        </button>
                    </form>

                    <div class="mt-4 text-center text-xs text-gray-400">
                        Contoh Nomor Demo: <a href="{{ route('ppdb.index', ['tab' => 'status', 'keyword' => 'PPDB-2026-0001']) }}" class="text-red-600 font-mono underline">PPDB-2026-0001</a> atau <a href="{{ route('ppdb.index', ['tab' => 'status', 'keyword' => '0087654321']) }}" class="text-red-600 font-mono underline">0087654321</a>
                    </div>
                </div>

                {{-- HASIL PENCARIAN --}}
                @if($keywordCari)
                    @if($pendaftarHasil)
                        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
                            <div class="p-6 bg-gradient-to-r from-gray-900 to-gray-800 text-white flex justify-between items-center">
                                <div>
                                    <span class="text-xs text-gray-400 font-mono uppercase block">Nomor Registrasi</span>
                                    <span class="text-xl font-bold font-mono text-red-400">{{ $pendaftarHasil->no_pendaftaran }}</span>
                                </div>
                                <div>
                                    @php $b = $pendaftarHasil->status_badge; @endphp
                                    <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $b['class'] }}">
                                        {{ $b['label'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-3 text-xs">
                                <div class="flex justify-between py-1 border-b border-gray-100">
                                    <span class="text-gray-500">Nama Calon Siswa</span>
                                    <span class="font-bold text-gray-900 uppercase text-sm">{{ $pendaftarHasil->nama_lengkap }}</span>
                                </div>
                                <div class="flex justify-between py-1 border-b border-gray-100">
                                    <span class="text-gray-500">NISN</span>
                                    <span class="font-mono font-semibold text-gray-800">{{ $pendaftarHasil->nisn }}</span>
                                </div>
                                <div class="flex justify-between py-1 border-b border-gray-100">
                                    <span class="text-gray-500">Asal SMP</span>
                                    <span class="font-medium text-gray-800">{{ $pendaftarHasil->asal_smp }}</span>
                                </div>
                                <div class="flex justify-between py-1 border-b border-gray-100">
                                    <span class="text-gray-500">Pilihan Jurusan 1</span>
                                    <span class="font-bold text-blue-700">{{ $pendaftarHasil->jurusan_pilihan_1 }}</span>
                                </div>
                                <div class="flex justify-between py-1 border-b border-gray-100">
                                    <span class="text-gray-500">Nilai Rata-rata Rapor</span>
                                    <span class="font-bold text-red-600">{{ number_format($pendaftarHasil->nilai_rata_rata, 2) }}</span>
                                </div>
                                <div class="p-3 bg-gray-50 rounded-xl border border-gray-200 mt-3">
                                    <span class="font-bold text-gray-700 block mb-1">Catatan Panitia:</span>
                                    <p class="text-gray-600">{{ $pendaftarHasil->catatan_admin ?? 'Berkas pendaftaran sedang dalam peninjauan oleh tim panitia PPDB.' }}</p>
                                </div>
                                <div class="pt-3 flex gap-3">
                                    <a href="{{ route('ppdb.bukti', $pendaftarHasil->no_pendaftaran) }}" target="_blank"
                                        class="flex-1 py-2.5 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg text-center transition flex items-center justify-center gap-2">
                                        <i class="fa fa-print"></i> Buka / Cetak Kartu Bukti Pendaftaran
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="p-8 bg-red-50 border border-red-200 rounded-2xl text-center text-red-800">
                            <i class="fa fa-user-slash text-3xl mb-2 text-red-500"></i>
                            <h3 class="font-bold text-base">Data Pendaftaran Tidak Ditemukan</h3>
                            <p class="text-xs text-red-600 mt-1">Tidak ada calon siswa dengan nomor registrasi atau NISN "{{ $keywordCari }}". Pastikan penulisan sudah benar atau silakan lakukan pendaftaran baru.</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        {{-- ================= TAB 3: KUOTA & JURUSAN REALTIME ================= --}}
        <div id="ppdb-panel-kuota" class="ppdb-panel {{ $activeTab !== 'kuota' ? 'hidden' : '' }}">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Daya Tampung & Kuota Jurusan 2026/2027</h2>
                <p class="text-sm text-gray-500 mt-1">Informasi kuota pendaftar dan ketersediaan kursi di SMK INFOKOM Kota Bogor secara realtime.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($kuotaJurusan as $k)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-gray-900 text-base">{{ $k['nama'] }}</h3>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $k['deskripsi'] }}</p>
                        </div>
                        <span class="px-2.5 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-lg whitespace-nowrap">
                            Kuota {{ $k['kuota'] }} Kursi
                        </span>
                    </div>
                    <div class="grid grid-cols-3 gap-3 p-3 bg-gray-50 rounded-xl text-center my-4">
                        <div>
                            <span class="text-lg font-bold text-gray-800">{{ $k['kuota'] }}</span>
                            <span class="block text-[11px] text-gray-500">Daya Tampung</span>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-blue-600">{{ $k['terdaftar'] }}</span>
                            <span class="block text-[11px] text-gray-500">Pendaftar</span>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-green-600">{{ $k['sisa'] }}</span>
                            <span class="block text-[11px] text-gray-500">Sisa Kuota</span>
                        </div>
                    </div>
                    <button onclick="pilihJurusan('{{ $k['nama'] }}')" class="w-full py-2 bg-gray-100 hover:bg-red-700 hover:text-white text-gray-800 font-semibold text-xs rounded-lg transition">
                        Daftar ke Jurusan Ini &rarr;
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ================= TAB 4: JALUR & JADWAL & SYARAT ================= --}}
        <div id="ppdb-panel-info" class="ppdb-panel {{ $activeTab !== 'info' ? 'hidden' : '' }} space-y-10">
            <div>
                <h3 class="font-bold text-gray-900 text-lg mb-4">Jalur Penerimaan</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($jalur as $item)
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold text-gray-900">{{ $item['nama'] }}</h4>
                                <span class="text-xs bg-red-100 text-red-700 font-bold px-2 py-0.5 rounded">{{ $item['kuota'] }}</span>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $item['deskripsi'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="font-bold text-gray-900 text-lg mb-4">Jadwal Pelaksanaan PPDB</h3>
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                    <table class="w-full text-xs">
                        <thead class="bg-gray-50 text-gray-500 uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-3 text-left">Tahapan Kegiatan</th>
                                <th class="px-6 py-3 text-left">Waktu Pelaksanaan</th>
                                <th class="px-6 py-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($jadwal as $j)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3.5 font-bold text-gray-800">{{ $j['tahap'] }}</td>
                                <td class="px-6 py-3.5 text-gray-600">{{ $j['waktu'] }}</td>
                                <td class="px-6 py-3.5 text-center">
                                    <span class="px-2 py-1 rounded text-[11px] font-bold {{ $j['status'] === 'Sedang Berjalan' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $j['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <h3 class="font-bold text-gray-900 text-lg mb-4">Persyaratan Berkas Pendaftaran</h3>
                <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                    <ul class="space-y-2 text-xs text-gray-700">
                        @foreach($syarat as $s)
                        <li class="flex items-start gap-2">
                            <i class="fa fa-check-circle text-green-600 mt-0.5"></i>
                            <span>{{ $s }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

<script>
function switchPpdbTab(tab) {
    document.querySelectorAll('.ppdb-panel').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.ppdb-tab-btn').forEach(b => {
        b.classList.remove('border-red-700', 'text-red-700');
        b.classList.add('border-transparent', 'text-gray-500');
    });

    const panel = document.getElementById('ppdb-panel-' + tab);
    const btn = document.getElementById('ppdb-tab-btn-' + tab);
    if (panel && btn) {
        panel.classList.remove('hidden');
        btn.classList.add('border-red-700', 'text-red-700');
        btn.classList.remove('border-transparent', 'text-gray-500');
    }
}

function pilihJurusan(namaJurusan) {
    switchPpdbTab('daftar');
    const select = document.querySelector('select[name="jurusan_pilihan_1"]');
    if (select) {
        select.value = namaJurusan;
        select.scrollIntoView({ behavior: 'smooth' });
    }
}
</script>

@endsection
