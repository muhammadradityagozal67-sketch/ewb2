<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function magangJepang()
    {
        return view('program.magang-jepang');
    }

    public function daftarMagang()
    {
        return view('program.magang-daftar');
    }

    public function storeMagang(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'asal_jurusan' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
        ]);

        $no_pendaftaran = 'MGJ-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(5));

        \App\Models\PendaftaranMagang::create([
            'no_pendaftaran' => $no_pendaftaran,
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'asal_jurusan' => $request->asal_jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('program.magang-jepang')->with('success', 'Pendaftaran Magang Jepang berhasil! Nomor pendaftaran Anda: ' . $no_pendaftaran);
    }

    public function pkl()
    {
        return view('program.pkl');
    }
}
