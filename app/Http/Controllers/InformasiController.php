<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function show(\App\Models\Informasi $informasi)
    {
        return view('informasi.show', compact('informasi'));
    }
}
