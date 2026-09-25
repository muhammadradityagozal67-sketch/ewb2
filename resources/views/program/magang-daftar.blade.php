@extends('layouts.app')

@section('title', 'Pendaftaran Magang Jepang - SMK INFOKOM')

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-3xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Header Form -->
            <div class="bg-red-700 p-8 text-white text-center">
                <i class="fa fa-plane-departure text-4xl mb-4 text-red-200"></i>
                <h1 class="text-3xl font-display font-extrabold mb-2">Formulir Pendaftaran</h1>
                <p class="text-red-100">Program Magang Kerja ke Jepang - SMK INFOKOM</p>
            </div>

            <!-- Form Body -->
            <div class="p-8 md:p-12">
                @if ($errors->any())
                    <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('program.magang.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">NISN</label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}" class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Asal Jurusan *</label>
                            <select name="asal_jurusan" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                                <option value="">Pilih Jurusan</option>
                                <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                                <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                                <option value="Produksi Siar dan Program TV (PSPT)">Produksi Siar dan Program TV (PSPT)</option>
                                <option value="Desain Komunikasi Visual (DKV)">Desain Komunikasi Visual (DKV)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') }}" class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" value="{{ old('berat_badan') }}" class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor HP / WhatsApp *</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap *</label>
                        <textarea name="alamat" required rows="4" class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm p-3">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('program.magang-jepang') }}" class="text-sm font-bold text-gray-500 hover:text-red-700 transition">Batal</a>
                        <button type="submit" class="bg-red-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg hover:bg-red-800 hover:shadow-red-500/30 transition-all duration-300 transform hover:-translate-y-1">
                            Kirim Formulir <i class="fa fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
