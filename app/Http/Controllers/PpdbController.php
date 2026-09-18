<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbPendaftar;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $jalur = [
            [
                'nama' => 'Jalur Prestasi',
                'deskripsi' => 'Untuk calon siswa dengan nilai akademik atau prestasi non-akademik (lomba, olahraga, seni) yang unggul.',
                'kuota' => '25%',
            ],
            [
                'nama' => 'Jalur Reguler',
                'deskripsi' => 'Pendaftaran umum berdasarkan nilai rapor dan tes peminatan kompetensi keahlian.',
                'kuota' => '60%',
            ],
            [
                'nama' => 'Jalur Afirmasi & KIP',
                'deskripsi' => 'Untuk calon siswa pemegang KIP/KKS atau keluarga prasejahtera yang berdomisili di Kota/Kabupaten Bogor.',
                'kuota' => '15%',
            ],
        ];

        $jadwal = [
            ['tahap' => 'Pendaftaran Online Gelombang 1', 'waktu' => '1 Mei - 20 Juni 2026', 'status' => 'Sedang Berjalan'],
            ['tahap' => 'Verifikasi Berkas & Wawancara', 'waktu' => '22 - 25 Juni 2026', 'status' => 'Mendatang'],
            ['tahap' => 'Pengumuman Hasil Seleksi', 'waktu' => '28 Juni 2026', 'status' => 'Mendatang'],
            ['tahap' => 'Daftar Ulang Siswa Baru', 'waktu' => '1 - 7 Juli 2026', 'status' => 'Mendatang'],
        ];

        $syarat = [
            'Memiliki Ijazah / Surat Keterangan Lulus (SKL) SMP/MTs/Sederajat',
            'Fotokopi Kartu Keluarga (KK) & Akta Kelahiran',
            'Nomor Induk Siswa Nasional (NISN) aktif 10 digit',
            'Rata-rata Nilai Rapor SMP Semester 1-5 minimal 75.00',
            'Pasfoto berwarna terbaru ukuran 3x4 (3 lembar)',
            'Sertifikat kejuaraan/prestasi (khusus Jalur Prestasi)',
        ];

        // Kuota Jurusan Realtime
        $jurusanList = [
            'Rekayasa Perangkat Lunak (RPL)' => ['kuota' => 108, 'deskripsi' => 'Web & Mobile Dev, Database, AI Dasar'],
            'Teknik Komputer & Jaringan (TKJ)' => ['kuota' => 108, 'deskripsi' => 'Cisco Networking, Mikrotik, Cloud Computing'],
            'Desain Komunikasi Visual (DKV)' => ['kuota' => 72, 'deskripsi' => 'Graphic Design, 2D/3D Animation, UI/UX'],
            'Produksi & Siaran Program Televisi (PSPT)' => ['kuota' => 72, 'deskripsi' => 'Broadcasting, Sinematografi, Video Editing'],
        ];

        $kuotaJurusan = [];
        foreach ($jurusanList as $nama => $data) {
            $terdaftar = PpdbPendaftar::where('jurusan_pilihan_1', $nama)->count();
            $diterima = PpdbPendaftar::where('jurusan_pilihan_1', $nama)->where('status', 'diterima')->count();
            $kuotaJurusan[] = [
                'nama' => $nama,
                'deskripsi' => $data['deskripsi'],
                'kuota' => $data['kuota'],
                'terdaftar' => $terdaftar,
                'sisa' => max(0, $data['kuota'] - $diterima),
            ];
        }

        // Pencarian Status jika ada query
        $pendaftarHasil = null;
        $keywordCari = $request->query('keyword') ?? $request->query('no');
        if ($keywordCari) {
            $pendaftarHasil = PpdbPendaftar::where('no_pendaftaran', $keywordCari)
                ->orWhere('nisn', $keywordCari)
                ->first();
        }

        $activeTab = $request->query('tab', 'daftar');

        return view('ppdb', compact('jalur', 'jadwal', 'syarat', 'kuotaJurusan', 'pendaftarHasil', 'keywordCari', 'activeTab'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jalur'             => 'required|string',
            'jurusan_pilihan_1' => 'required|string',
            'jurusan_pilihan_2' => 'nullable|string',
            'nama_lengkap'      => 'required|string|max:255',
            'nisn'              => 'required|numeric|digits:10',
            'nik'               => 'nullable|numeric|digits:16',
            'jenis_kelamin'     => 'required|in:L,P',
            'tempat_lahir'      => 'required|string|max:100',
            'tanggal_lahir'     => 'required|date',
            'agama'             => 'required|string|max:50',
            'alamat_tinggal'    => 'required|string',
            'asal_smp'          => 'required|string|max:255',
            'tahun_lulus'       => 'required|string|max:4',
            'nama_ortu_wali'    => 'required|string|max:255',
            'pekerjaan_ortu'    => 'nullable|string|max:100',
            'no_hp_ortu'        => 'nullable|string|max:20',
            'no_hp_siswa'       => 'required|string|max:20',
            'nilai_rata_rata'   => 'required|numeric|between:0,100',
        ], [
            'nisn.digits'       => 'NISN harus terdiri dari tepat 10 digit angka.',
            'nilai_rata_rata.between' => 'Nilai rata-rata rapor harus antara 0 sampai 100.',
        ]);

        // Cek apakah NISN sudah pernah daftar
        $existing = PpdbPendaftar::where('nisn', $validated['nisn'])->first();
        if ($existing) {
            return redirect()->route('ppdb.index', ['tab' => 'status', 'keyword' => $existing->nisn])
                ->with('warning', 'NISN ini sudah terdaftar sebelumnya dengan No. Pendaftaran: ' . $existing->no_pendaftaran . '. Berikut detail status pendaftaran Anda.');
        }

        // Generate Nomor Pendaftaran unik: PPDB-2026-XXXX
        $lastId = PpdbPendaftar::max('id') ?? 0;
        $noPendaftaran = 'PPDB-2026-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        $validated['no_pendaftaran'] = $noPendaftaran;
        $validated['status'] = 'menunggu';
        $validated['catatan_admin'] = 'Pendaftaran online telah berhasil disimpan. Mohon cetak kartu bukti pendaftaran dan tunggu konfirmasi jadwal verifikasi berkas dari panitia.';

        $pendaftar = PpdbPendaftar::create($validated);

        return redirect()->route('ppdb.bukti', $pendaftar->no_pendaftaran)
            ->with('success', 'Selamat! Pendaftaran PPDB online Anda berhasil disimpan dengan No. Registrasi: ' . $noPendaftaran . '. Simpan dan cetak kartu bukti pendaftaran ini.');
    }

    public function bukti($no_pendaftaran)
    {
        $pendaftar = PpdbPendaftar::where('no_pendaftaran', $no_pendaftaran)->firstOrFail();
        return view('ppdb.bukti', compact('pendaftar'));
    }

    public function cekStatus(Request $request)
    {
        $request->validate(['keyword' => 'required|string']);
        return redirect()->route('ppdb.index', [
            'tab' => 'status',
            'keyword' => trim($request->keyword),
        ]);
    }
}
