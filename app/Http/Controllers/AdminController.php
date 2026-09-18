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
        
        $profil         = \App\Models\Profil::first();
        $jurusans       = \App\Models\Jurusan::all();

        return view('admin.dashboard', compact(
            'totalGuru', 'totalSiswa', 'totalBerita', 'totalPengunjung', 'totalPpdb',
            'gurus', 'beritas', 'galeris', 'ppdbList', 'profil', 'jurusans'
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
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->only('nama', 'jabatan', 'bidang', 'urutan');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/guru'), $filename);
            $data['foto'] = 'images/guru/' . $filename;
        }

        Guru::create($data);
        return redirect()->route('admin.dashboard', ['tab' => 'guru'])->with('success', 'Guru berhasil ditambahkan.');
    }

    public function updateGuru(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang'  => 'nullable|string|max:255',
            'urutan'  => 'nullable|integer',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $guru = Guru::findOrFail($id);
        $data = $request->only('nama', 'jabatan', 'bidang', 'urutan');
        
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && file_exists(public_path($guru->foto))) {
                unlink(public_path($guru->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/guru'), $filename);
            $data['foto'] = 'images/guru/' . $filename;
        }

        $guru->update($data);
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
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $data = $request->only('judul', 'ringkasan', 'isi', 'tanggal');
        $data['penulis'] = $request->filled('penulis') ? $request->penulis : 'Admin';
        $data['slug'] = Str::slug($request->judul) . '-' . time();
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_berita.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
            $data['gambar'] = $filename;
        }

        Berita::create($data);
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
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $berita = Berita::findOrFail($id);
        $data = $request->only('judul', 'ringkasan', 'isi', 'tanggal');
        $data['penulis'] = $request->filled('penulis') ? $request->penulis : 'Admin';
        
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('images/berita/' . $berita->gambar))) {
                unlink(public_path('images/berita/' . $berita->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_berita.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
            $data['gambar'] = $filename;
        }

        $berita->update($data);
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
            'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:100',
        ]);
        
        $data = $request->only('judul', 'kategori');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_galeri.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/galeri'), $filename);
            $data['gambar'] = $filename;
        }

        Galeri::create($data);
        return redirect()->route('admin.dashboard', ['tab' => 'galeri'])->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function updateGaleri(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:100',
        ]);
        
        $galeri = Galeri::findOrFail($id);
        $data = $request->only('judul', 'kategori');
        
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(public_path('images/galeri/' . $galeri->gambar))) {
                unlink(public_path('images/galeri/' . $galeri->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_galeri.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/galeri'), $filename);
            $data['gambar'] = $filename;
        }

        $galeri->update($data);
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

    // ======================== PROFIL ========================
    public function updateProfil(Request $request)
    {
        $data = $request->except(['_token', 'foto_kepsek_file', 'foto_struktur_file']);
        
        if ($request->hasFile('foto_kepsek_file')) {
            $file = $request->file('foto_kepsek_file');
            $filename = time() . '_kepsek.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['foto_kepsek'] = 'img/' . $filename;
        }

        if ($request->hasFile('foto_struktur_file')) {
            $file = $request->file('foto_struktur_file');
            $filename = time() . '_struktur.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['foto_struktur'] = 'img/' . $filename;
        }

        $profil = \App\Models\Profil::first();
        if ($profil) {
            $profil->update($data);
        } else {
            \App\Models\Profil::create($data);
        }

        return redirect()->route('admin.dashboard', ['tab' => 'profil'])->with('success', 'Profil berhasil diperbarui.');
    }

    // ======================== JURUSAN ========================
    public function storeJurusan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only('nama', 'deskripsi');
        if ($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $filename = time() . '_jurusan.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['foto'] = 'img/' . $filename;
        }

        \App\Models\Jurusan::create($data);
        return redirect()->route('admin.dashboard', ['tab' => 'jurusan'])->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function updateJurusan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $jurusan = \App\Models\Jurusan::findOrFail($id);
        $data = $request->only('nama', 'deskripsi');
        
        if ($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $filename = time() . '_jurusan.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['foto'] = 'img/' . $filename;
        }

        $jurusan->update($data);
        return redirect()->route('admin.dashboard', ['tab' => 'jurusan'])->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroyJurusan($id)
    {
        \App\Models\Jurusan::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard', ['tab' => 'jurusan'])->with('success', 'Jurusan berhasil dihapus.');
    }
}
