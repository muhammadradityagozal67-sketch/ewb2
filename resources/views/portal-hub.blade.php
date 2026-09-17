@extends('layouts.app')

@section('title', 'Portal Login - SMK INFOKOM Kota Bogor')

@php $activeTab = session('active_tab', 'siswa'); @endphp

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-red-50 py-12 px-4">

    <div class="text-center mb-10">
        <img src="{{ asset('images/umum/logo-smk.png') }}" alt="Logo" class="w-20 h-20 object-contain mx-auto mb-4">
        <h1 class="font-display text-3xl font-bold text-gray-900">Portal Akademik Siswa & Wali Murid</h1>
        <p class="text-gray-500 mt-1">SMK INFOKOM Kota Bogor &mdash; Silakan pilih portal masuk Anda</p>
        <div class="w-16 h-1 bg-red-600 mx-auto mt-4 rounded-full"></div>
    </div>

    {{-- TAB SELECTOR (SISWA & ORANG TUA) --}}
    <div class="max-w-lg mx-auto mb-6">
        <div class="flex bg-white rounded-xl shadow-sm border border-gray-100 p-1 gap-1">
            <button onclick="switchTab('siswa')" id="tab-siswa"
                class="flex-1 py-2.5 rounded-lg text-sm font-semibold transition tab-btn {{ $activeTab === 'siswa' ? 'active-tab' : '' }} flex items-center justify-center gap-2">
                <i class="fa fa-graduation-cap"></i> Portal Siswa
            </button>
            <button onclick="switchTab('ortu')" id="tab-ortu"
                class="flex-1 py-2.5 rounded-lg text-sm font-semibold transition tab-btn {{ $activeTab === 'ortu' ? 'active-tab' : '' }} flex items-center justify-center gap-2">
                <i class="fa fa-users"></i> Orang Tua / Wali
            </button>
        </div>
    </div>

    {{-- ===================== ORANG TUA PANEL ===================== --}}
    <div id="panel-ortu" class="max-w-lg mx-auto portal-panel hidden">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-red-600 px-8 py-6 text-center">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fa fa-users text-white text-2xl"></i>
                </div>
                <h2 class="text-white font-bold text-lg">Portal Orang Tua</h2>
                <p class="text-red-100 text-xs mt-1">Pantau perkembangan putra/putri Anda</p>
            </div>
            <div class="px-8 py-6">
                @if(session('error_ortu'))
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">{{ session('error_ortu') }}</div>
                @endif
                <div class="grid grid-cols-2 gap-3 mb-5 text-xs">
                    <div class="bg-red-50 rounded-lg p-3 text-center border border-red-100">
                        <i class="fa fa-money-bill-wave text-red-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Tagihan & Tunggakan</p>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-3 text-center border border-blue-100">
                        <i class="fa fa-chart-line text-blue-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Nilai Siswa</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-3 text-center border border-green-100">
                        <i class="fa fa-calendar-check text-green-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Absensi</p>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-3 text-center border border-purple-100">
                        <i class="fa fa-book-reader text-purple-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Perpustakaan</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('portal.ortu.login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">Email</label>
                        <div class="relative">
                            <i class="fa fa-envelope absolute left-3 top-3 text-gray-400 text-sm"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100"
                                placeholder="ortu@smkinfokom.sch.id">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">Password</label>
                        <div class="relative">
                            <i class="fa fa-lock absolute left-3 top-3 text-gray-400 text-sm"></i>
                            <input type="password" name="password" required
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100"
                                placeholder="••••••••">
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-red-600 text-white rounded-lg py-3 font-semibold hover:bg-red-700 transition text-sm">
                        <i class="fa fa-sign-in-alt mr-2"></i> Masuk ke Portal Orang Tua
                    </button>
                </form>
                <p class="text-center text-xs text-gray-400 mt-4">Demo: <code>ortu@smkinfokom.sch.id</code> / <code>ortu123</code></p>
            </div>
        </div>
    </div>

    {{-- ===================== SISWA PANEL ===================== --}}
    <div id="panel-siswa" class="max-w-lg mx-auto portal-panel hidden">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-blue-700 px-8 py-6 text-center">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fa fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h2 class="text-white font-bold text-lg">Portal Siswa</h2>
                <p class="text-blue-100 text-xs mt-1">Akses data akademik dan administrasi Anda</p>
            </div>
            <div class="px-8 py-6">
                @if(session('error_siswa'))
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">{{ session('error_siswa') }}</div>
                @endif
                <div class="grid grid-cols-3 gap-3 mb-5 text-xs">
                    <div class="bg-blue-50 rounded-lg p-3 text-center border border-blue-100">
                        <i class="fa fa-wallet text-blue-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Bayaran</p>
                    </div>
                    <div class="bg-indigo-50 rounded-lg p-3 text-center border border-indigo-100">
                        <i class="fa fa-star text-indigo-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Nilai & KKM</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-3 text-center border border-green-100">
                        <i class="fa fa-user-check text-green-500 text-lg mb-1 block"></i>
                        <p class="text-gray-600">Kehadiran</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('portal.siswa.login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">Email</label>
                        <div class="relative">
                            <i class="fa fa-envelope absolute left-3 top-3 text-gray-400 text-sm"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                placeholder="siswa@smkinfokom.sch.id">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">Password</label>
                        <div class="relative">
                            <i class="fa fa-lock absolute left-3 top-3 text-gray-400 text-sm"></i>
                            <input type="password" name="password" required
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                placeholder="••••••••">
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-blue-700 text-white rounded-lg py-3 font-semibold hover:bg-blue-800 transition text-sm">
                        <i class="fa fa-sign-in-alt mr-2"></i> Masuk ke Portal Siswa
                    </button>
                </form>
                <p class="text-center text-xs text-gray-400 mt-4">Demo: <code>siswa@smkinfokom.sch.id</code> / <code>siswa123</code></p>
            </div>
        </div>
    </div>

    {{-- LINK TERPISAH KE PORTAL ADMIN --}}
    <div class="max-w-lg mx-auto mt-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 hover:bg-white text-gray-600 rounded-full text-xs font-medium transition border border-gray-200 shadow-sm">
            <i class="fa fa-shield-halved text-red-600"></i>
            <span>Akses khusus Administrator?</span>
            <a href="{{ route('admin.login') }}" class="text-red-700 font-bold hover:underline">Buka Portal Admin &rarr;</a>
        </div>
    </div>

</div>

<style>
.active-tab { background-color: #b91c1c; color: white; }
.tab-btn:not(.active-tab) { color: #6b7280; }
.tab-btn:not(.active-tab):hover { background-color: #f3f4f6; color: #374151; }
</style>

<script>
function switchTab(tab) {
    document.querySelectorAll('.portal-panel').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active-tab'));

    const targetPanel = document.getElementById('panel-' + tab);
    const targetBtn = document.getElementById('tab-' + tab);
    if (targetPanel && targetBtn) {
        targetPanel.classList.remove('hidden');
        targetBtn.classList.add('active-tab');
    }
}

const hash = window.location.hash.replace('#', '');
if (['ortu', 'siswa'].includes(hash)) {
    switchTab(hash);
}
</script>
@endsection
