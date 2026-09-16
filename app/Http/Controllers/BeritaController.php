<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaList = Berita::orderByDesc('tanggal')->paginate(8);

        return view('berita.index', compact('beritaList'));
    }

    public function show(Berita $berita)
    {
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->orderByDesc('tanggal')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaLainnya'));
    }
}
