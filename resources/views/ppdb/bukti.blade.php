@extends('layouts.app')

@section('title', 'Bukti Pendaftaran PPDB - ' . $pendaftar->no_pendaftaran)

@section('content')
<div class="py-10 px-4 bg-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto">

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-800 flex items-start gap-3 shadow-sm print:hidden">
                <i class="fa fa-check-circle text-green-600 text-xl mt-0.5"></i>
                <div>
                    <h4 class="font-bold">Pendaftaran Berhasil!</h4>
                    <p class="text-sm mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- ACTION BUTTONS (HIDDEN ON PRINT) --}}
        <div class="flex items-center justify-between mb-6 print:hidden">
            <a href="{{ route('ppdb.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-red-700 font-medium">
                <i class="fa fa-arrow-left"></i> Kembali ke Informasi PPDB
            </a>
            <div class="flex items-center gap-3">
                <button onclick="window.print()" class="px-4 py-2.5 bg-red-700 hover:bg-red-800 text-white text-sm font-semibold rounded-lg shadow-sm flex items-center gap-2 transition">
                    <i class="fa fa-print"></i> Cetak Kartu / Simpan PDF
                </button>
            </div>
        </div>

        {{-- KARTU TANDA BUKTI PENDAFTARAN --}}
        <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-8 sm:p-10 relative overflow-hidden print:shadow-none print:border-none print:p-0">
            
            {{-- KOP SEKOLAH --}}
            <div class="border-b-2 border-gray-800 pb-5 mb-6 text-center relative">
                <div class="flex items-center justify-center gap-4 mb-2">
                    <img src="{{ asset('images/umum/logo-smk.png') }}" alt="Logo SMK" class="w-16 h-16 object-contain">
                    <div class="text-left">
                        <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">Yayasan Pendidikan Informatika & Komunikasi</p>
                        <h1 class="text-xl sm:text-2xl font-black text-gray-900 leading-tight">SMK INFOKOM KOTA BOGOR</h1>
                        <p class="text-[11px] text-gray-600">Terakreditasi "A" · NPSN: 20220299 · NSS: 322020501001</p>
                        <p class="text-[11px] text-gray-500">Jl. Letjen Ibrahim Adjie No.178, RT.03/RW.08, Sindangbarang, Kec. Bogor Bar., Kota Bogor 16117</p>
                    </div>
                </div>
                <div class="h-0.5 bg-gray-800 mt-3"></div>
                <div class="h-px bg-gray-800 mt-0.5"></div>
            </div>

            <div class="text-center mb-6">
                <h2 class="text-lg font-bold text-gray-900 uppercase tracking-wide">KARTU TANDA BUKTI PENDAFTARAN PPDB</h2>
                <p class="text-xs text-gray-500">Tahun Ajaran 2026/2027</p>
            </div>

            {{-- NO PENDAFTARAN & STATUS BADGE --}}
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wide font-semibold block">Nomor Registrasi PPDB</span>
                    <span class="text-2xl font-mono font-black text-red-700 tracking-wider">{{ $pendaftar->no_pendaftaran }}</span>
                </div>
                <div class="text-center sm:text-right">
                    <span class="text-xs text-gray-500 uppercase tracking-wide font-semibold block mb-1">Status Saat Ini</span>
                    @php $badge = $pendaftar->status_badge; @endphp
                    <span class="inline-block px-3 py-1 text-xs font-bold rounded-full border {{ $badge['class'] }}">
                        {{ $badge['label'] }}
                    </span>
                </div>
            </div>

            {{-- DETAIL BIODATA --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                
                {{-- PASFOTO & QR CODE MOCKUP --}}
                <div class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl border border-dashed border-gray-300 text-center">
                    <div class="w-32 h-40 bg-gray-200 rounded-lg flex flex-col items-center justify-center text-gray-400 border border-gray-300 mb-3 overflow-hidden">
                        <i class="fa fa-user text-4xl mb-1 text-gray-400"></i>
                        <span class="text-[10px] text-gray-500 font-semibold uppercase">Pasfoto 3 x 4</span>
                    </div>
                    <div class="p-2 bg-white rounded border border-gray-200 shadow-xs text-center w-full">
                        <div class="font-mono text-[9px] text-gray-500 tracking-widest uppercase">KODE VERIFIKASI</div>
                        <div class="text-xs font-mono font-bold text-gray-800">{{ substr(md5($pendaftar->no_pendaftaran), 0, 10) }}</div>
                    </div>
                </div>

                {{-- DATA PENDAFTAR --}}
                <div class="md:col-span-2 space-y-2.5 text-xs text-gray-700">
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Nama Lengkap</span>
                        <span class="col-span-2 font-bold text-gray-900 uppercase text-sm">{{ $pendaftar->nama_lengkap }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">NISN / NIK</span>
                        <span class="col-span-2 font-mono font-semibold text-gray-800">{{ $pendaftar->nisn }} / {{ $pendaftar->nik ?? '-' }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Jenis Kelamin</span>
                        <span class="col-span-2">{{ $pendaftar->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Tempat, Tgl Lahir</span>
                        <span class="col-span-2">{{ $pendaftar->tempat_lahir }}, {{ date('d F Y', strtotime($pendaftar->tanggal_lahir)) }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Agama</span>
                        <span class="col-span-2">{{ $pendaftar->agama }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Asal Sekolah</span>
                        <span class="col-span-2 font-semibold text-gray-800">{{ $pendaftar->asal_smp }} (Lulus {{ $pendaftar->tahun_lulus }})</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Rata-rata Rapor</span>
                        <span class="col-span-2 font-bold text-red-600">{{ number_format($pendaftar->nilai_rata_rata, 2) }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Jalur Pendaftaran</span>
                        <span class="col-span-2 font-semibold text-gray-800">{{ $pendaftar->jalur }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Jurusan Pilihan 1</span>
                        <span class="col-span-2 font-bold text-blue-700">{{ $pendaftar->jurusan_pilihan_1 }}</span>
                    </div>
                    @if($pendaftar->jurusan_pilihan_2)
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Jurusan Pilihan 2</span>
                        <span class="col-span-2 text-gray-700">{{ $pendaftar->jurusan_pilihan_2 }}</span>
                    </div>
                    @endif
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">Nama Orang Tua</span>
                        <span class="col-span-2">{{ $pendaftar->nama_ortu_wali }} ({{ $pendaftar->pekerjaan_ortu ?? '-' }})</span>
                    </div>
                    <div class="grid grid-cols-3 py-1 border-b border-gray-100">
                        <span class="text-gray-500 font-medium">No. WhatsApp</span>
                        <span class="col-span-2 font-mono">{{ $pendaftar->no_hp_siswa }} / {{ $pendaftar->no_hp_ortu ?? '-' }}</span>
                    </div>
                    <div class="grid grid-cols-3 py-1">
                        <span class="text-gray-500 font-medium">Alamat Tinggal</span>
                        <span class="col-span-2">{{ $pendaftar->alamat_tinggal }}</span>
                    </div>
                </div>
            </div>

            {{-- CATATAN PANITIA --}}
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 text-xs text-blue-800 mb-8">
                <span class="font-bold block mb-0.5"><i class="fa fa-info-circle mr-1"></i> Catatan Panitia PPDB:</span>
                <p>{{ $pendaftar->catatan_admin ?? 'Harap simpan kartu ini dan bawa dokumen asli serta fotokopi saat verifikasi berkas di sekolah.' }}</p>
            </div>

            {{-- TANDA TANGAN & PENGESAHAN --}}
            <div class="grid grid-cols-2 text-center text-xs text-gray-700 pt-4 border-t border-gray-200">
                <div>
                    <p class="text-gray-500">Calon Siswa Baru,</p>
                    <div class="h-16"></div>
                    <p class="font-bold underline text-gray-900 uppercase">({{ $pendaftar->nama_lengkap }})</p>
                </div>
                <div>
                    <p class="text-gray-500">Kota Bogor, {{ date('d F Y', strtotime($pendaftar->created_at)) }}</p>
                    <p class="text-gray-500">Panitia PPDB SMK INFOKOM,</p>
                    <div class="h-14 flex items-center justify-center">
                        <span class="text-[10px] uppercase tracking-widest text-red-700 font-black border border-red-300 px-2 py-0.5 rounded rotate-[-5deg]">TERVERIFIKASI SISTEM</span>
                    </div>
                    <p class="font-bold underline text-gray-900">( Panitia Penerimaan Siswa Baru )</p>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
@media print {
    body { background-color: white !important; font-size: 11pt; }
    header, footer, nav, .print\:hidden { display: none !important; }
}
</style>
@endsection