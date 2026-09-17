<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Visitor;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\PpdbPendaftar;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalGuru      = Guru::count();
        $totalSiswa     = Siswa::count();
        $totalBerita    = Berita::count();
        $totalPengunjung = Visitor::count();
        $totalPpdb      = PpdbPendaftar::count();
        $gurus          = Guru::orderBy('urutan')->get();
        $beritas        = Berita::orderBy('tanggal', 'desc')->get();
        $galeris        = Galeri::orderBy('created_at', 'desc')->get();
        $ppdbList       = PpdbPendaftar::orderBy('created_at', 'desc')->paginate(15, ['*'], 'ppdb_page');
        
        return view('admin.dashboard', compact(
            'totalGuru', 'totalSiswa', 'totalBerita', 'totalPengunjung', 'totalPpdb',
            'gurus', 'beritas', 'galeris', 'ppdbList'
        ));
    }

    // ======================== GURU ========================
    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang'  => 'nullable|string|max:255',
            'urutan'  => 'nullable|integer',
        ]);
        Guru::create($request->only('nama', 'jabatan', 'bidang', 'urutan'));
        return redirect()->route('admin.dashboard', ['tab' => 'guru'])->with('success', 'Guru berhasil ditambahkan.');
    }

    public function updateGuru(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang'  => 'nullable|string|max:255',
            'urutan'  => 'nullable|integer',
        ]);
        $guru = Guru::findOrFail($id);
        $guru->update($request->only('nama', 'jabatan', 'bidang', 'urutan'));
        return redirect()->route('admin.dashboard', ['tab' => 'guru'])->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroyGuru($id)
    {
        Guru::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard', ['tab' => 'guru'])->with('success', 'Guru berhasil dihapus.');
    }

    // ======================== BERITA ========================
    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi'       => 'required|string',
            'penulis'   => 'nullable|string|max:100',
            'tanggal'   => 'required|date',
        ]);
        $slug = Str::slug($request->judul) . '-' . time();
        Berita::create(array_merge($request->only('judul', 'ringkasan', 'isi', 'penulis', 'tanggal'), ['slug' => $slug]));
        return redirect()->route('admin.dashboard', ['tab' => 'berita'])->with('success', 'Berita berhasil ditambahkan.');
    }

    public function updateBerita(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi'       => 'required|string',
            'penulis'   => 'nullable|string|max:100',
            'tanggal'   => 'required|date',
        ]);
        $berita = Berita::findOrFail($id);
        $berita->update($request->only('judul', 'ringkasan', 'isi', 'penulis', 'tanggal'));
        return redirect()->route('admin.dashboard', ['tab' => 'berita'])->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroyBerita($id)
    {
        Berita::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard', ['tab' => 'berita'])->with('success', 'Berita berhasil dihapus.');
    }

    // ======================== GALERI ========================
    public function storeGaleri(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'gambar'   => 'required|url',
            'kategori' => 'nullable|string|max:100',
        ]);
        Galeri::create($request->only('judul', 'gambar', 'kategori'));
        return redirect()->route('admin.dashboard', ['tab' => 'galeri'])->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function updateGaleri(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'gambar'   => 'required|url',
            'kategori' => 'nullable|string|max:100',
        ]);
        $galeri = Galeri::findOrFail($id);
        $galeri->update($request->only('judul', 'gambar', 'kategori'));
        return redirect()->route('admin.dashboard', ['tab' => 'galeri'])->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroyGaleri($id)
    {
        Galeri::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard', ['tab' => 'galeri'])->with('success', 'Foto galeri berhasil dihapus.');
    }

    // ======================== PPDB MANAGEMENT ========================
    public function ppdbIndex()
    {
        $ppdbList = PpdbPendaftar::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.ppdb', compact('ppdbList'));
    }

    public function updatePpdbStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:menunggu,terverifikasi,diterima,ditolak']);
        $pendaftar = PpdbPendaftar::findOrFail($id);
        $pendaftar->update([
            'status'         => $request->status,
            'catatan_admin'  => $request->catatan_admin,
        ]);
        return redirect()->route('admin.dashboard', ['tab' => 'ppdb'])->with('success', 'Status pendaftar berhasil diperbarui.');
    }

    public function destroyPpdb($id)
    {
        PpdbPendaftar::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard', ['tab' => 'ppdb'])->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
