<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(string $section = 'sejarah')
    {
        $menu = [
            'sejarah' => 'Sejarah Sekolah',
            'visi-misi' => 'Visi & Misi',
            'sambutan' => 'Sambutan Kepala Sekolah',
            'jurusan' => 'Program Keahlian (Jurusan)',
            'struktur' => 'Struktur Organisasi',
            'fasilitas' => 'Fasilitas Sekolah',
        ];

        if (!array_key_exists($section, $menu)) {
            abort(404);
        }

        $profil = \App\Models\Profil::first();
        $jurusans = \App\Models\Jurusan::all();

        $kontenSection = '';
        if ($profil) {
            $kontenSection = match($section) {
                'sejarah' => $profil->sejarah,
                'visi-misi' => $profil->visi_misi,
                'sambutan' => $profil->sambutan,
                'jurusan' => $profil->jurusan_teks,
                'struktur' => $profil->struktur,
                'fasilitas' => $profil->fasilitas,
                default => ''
            };
        }

        return view('profil', [
            'menu' => $menu,
            'activeSection' => $section,
            'judulSection' => $menu[$section],
            'kontenSection' => $kontenSection,
            'profil' => $profil,
            'jurusanList' => $jurusans,
        ]);
    }
}
