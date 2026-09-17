<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function ortu()
    {
        return view('portal-ortu');
    }

    public function siswa()
    {
        return view('portal-siswa');
    }
}
