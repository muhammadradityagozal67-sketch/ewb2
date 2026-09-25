@extends('layouts.app')

@section('title', 'Praktek Kerja Lapangan (PKL) - SMK INFOKOM')

@section('content')
<!-- Hero Section -->
<div class="relative bg-blue-900 py-20 lg:py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80" alt="Students Working" class="w-full h-full object-cover opacity-20 mix-blend-overlay">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-800/80"></div>
    <div class="relative max-w-7xl mx-auto px-6 text-center lg:text-left flex flex-col lg:flex-row items-center gap-12">
        <div class="flex-1">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-700 font-bold text-xs mb-6 uppercase tracking-widest">Program Akademik</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 font-display leading-tight">Praktek Kerja Lapangan <br><span class="text-blue-300">(PKL)</span></h1>
            <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                Membentuk kompetensi siswa agar siap menghadapi dunia kerja nyata melalui pengalaman langsung di industri, instansi, dan perusahaan mitra terkemuka.
            </p>
            <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                <a href="#informasi" class="px-8 py-3 bg-white text-blue-800 font-bold rounded-lg shadow-lg hover:bg-gray-50 hover:shadow-xl transition-all duration-300">Detail Program</a>
            </div>
        </div>
        <div class="hidden lg:block w-96 relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-cyan-400 to-blue-600 rounded-3xl transform -rotate-3 scale-105 opacity-50 blur-lg"></div>
            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80" alt="PKL" class="relative rounded-3xl shadow-2xl border-4 border-white object-cover h-96 w-full">
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16" id="informasi">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Kolom Kiri / Utama -->
        <div class="lg:col-span-2 space-y-12">
            
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xl shadow-sm"><i class="fa fa-bullseye"></i></div>
                    <h2 class="text-2xl font-bold text-gray-800">Tujuan PKL</h2>
                </div>
                <div class="prose prose-blue text-gray-600">
                    <p>Praktek Kerja Lapangan (PKL) adalah bentuk penyelenggaraan pendidikan dan pelatihan keahlian kejuruan yang memadukan secara sistematik dan sinkron program pendidikan di sekolah dan program penguasaan keahlian yang diperoleh melalui bekerja langsung di dunia kerja.</p>
                    <ul>
                        <li>Memberikan pengalaman kerja langsung (real experience) kepada siswa.</li>
                        <li>Menanamkan etos kerja yang tinggi sesuai budaya industri.</li>
                        <li>Memenuhi hal-hal yang belum dipenuhi di sekolah agar mencapai standar kompetensi lulusan.</li>
                        <li>Membina kerja sama yang baik antara sekolah dengan Dunia Usaha/Dunia Industri (DU/DI).</li>
                    </ul>
                </div>
            </section>

            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xl shadow-sm"><i class="fa fa-building"></i></div>
                    <h2 class="text-2xl font-bold text-gray-800">Mitra DU/DI (Dunia Usaha / Dunia Industri)</h2>
                </div>
                <p class="text-gray-600 mb-6">SMK INFOKOM telah bekerjasama dengan puluhan perusahaan terkemuka, baik skala nasional maupun lokal, untuk menjamin penempatan PKL yang relevan dengan kompetensi keahlian siswa.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="https://cakrawaladigitalindonesia.web.indotrading.com/" target="_blank" class="bg-white p-6 border rounded-xl flex flex-col items-center justify-center text-center hover:shadow-lg hover:border-blue-500 transition group">
                        <i class="fa fa-network-wired text-4xl text-blue-300 group-hover:text-blue-600 mb-3 transition"></i>
                        <span class="text-sm font-bold text-gray-800">PT Cakrawala Digital Indonesia</span>
                        <span class="text-xs text-gray-500 mt-1">Supplier Alat Voting & IT</span>
                    </a>
                    <a href="#" class="bg-white p-6 border rounded-xl flex flex-col items-center justify-center text-center hover:shadow-lg hover:border-red-500 transition group">
                        <i class="fa fa-camera-retro text-4xl text-red-300 group-hover:text-red-600 mb-3 transition"></i>
                        <span class="text-sm font-bold text-gray-800">Radar Bogor (Pojok Satu)</span>
                        <span class="text-xs text-gray-500 mt-1">Media Cetak & Digital</span>
                    </a>
                    <a href="#" class="bg-white p-6 border rounded-xl flex flex-col items-center justify-center text-center hover:shadow-lg hover:border-green-500 transition group">
                        <i class="fa fa-building text-4xl text-green-300 group-hover:text-green-600 mb-3 transition"></i>
                        <span class="text-sm font-bold text-gray-800">PT Telkom Akses Bogor</span>
                        <span class="text-xs text-gray-500 mt-1">Infrastruktur Jaringan</span>
                    </a>
                    <a href="#" class="bg-white p-6 border rounded-xl flex flex-col items-center justify-center text-center hover:shadow-lg hover:border-purple-500 transition group">
                        <i class="fa fa-laptop-code text-4xl text-purple-300 group-hover:text-purple-600 mb-3 transition"></i>
                        <span class="text-sm font-bold text-gray-800">PT Integra Solusi</span>
                        <span class="text-xs text-gray-500 mt-1">Software Development</span>
                    </a>
                </div>
            </section>

        </div>

        <!-- Kolom Kanan / Sidebar -->
        <div class="space-y-8">
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-blue-100 rounded-bl-full -mr-4 -mt-4 opacity-50"></div>
                <h3 class="text-lg font-bold text-gray-800 mb-6 relative z-10">Alur Pelaksanaan PKL</h3>
                
                <div class="relative border-l-2 border-blue-200 ml-3 space-y-6">
                    <div class="relative pl-6">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>
                        <h4 class="font-bold text-sm text-gray-800">Pembekalan</h4>
                        <p class="text-xs text-gray-500 mt-1">Siswa diberikan materi soft skill dan etika kerja.</p>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>
                        <h4 class="font-bold text-sm text-gray-800">Penempatan</h4>
                        <p class="text-xs text-gray-500 mt-1">Siswa disalurkan ke DU/DI sesuai dengan peminatan dan ketersediaan kuota.</p>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>
                        <h4 class="font-bold text-sm text-gray-800">Pelaksanaan</h4>
                        <p class="text-xs text-gray-500 mt-1">Siswa bekerja dan belajar di industri selama 3 hingga 6 bulan.</p>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>
                        <h4 class="font-bold text-sm text-gray-800">Monitoring</h4>
                        <p class="text-xs text-gray-500 mt-1">Guru pembimbing memantau perkembangan siswa secara berkala.</p>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-green-500 border-2 border-white shadow"></div>
                        <h4 class="font-bold text-sm text-gray-800">Sidang Laporan</h4>
                        <p class="text-xs text-gray-500 mt-1">Evaluasi akhir melalui presentasi laporan kegiatan PKL.</p>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection
