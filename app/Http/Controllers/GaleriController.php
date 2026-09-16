<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriList = Galeri::orderByDesc('id')->paginate(12);

        return view('galeri', compact('galeriList'));
    }
}
