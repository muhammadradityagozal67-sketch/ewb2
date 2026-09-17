<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $pimpinan = Guru::where('urutan', '<=', 6)->orderBy('urutan')->get();
        $struktural = Guru::whereBetween('urutan', [7, 13])->orderBy('urutan')->get();
        $staff = Guru::where('urutan', '>', 13)->orderBy('urutan')->get();
        return view('guru', compact('pimpinan', 'struktural', 'staff'));
    }
}
