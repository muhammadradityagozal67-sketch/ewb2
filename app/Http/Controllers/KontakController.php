<?php

namespace App\Http\Controllers;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = [
            'alamat' => 'Jl. Letjen Ibrahim Adjie No.178, RT.03/RW.08, Sindangbarang, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16117',
            'telepon' => '(0251) 8765432',
            'email' => 'info@smkinfokom.sch.id',
            'jam_operasional' => 'Senin - Jumat: 07.00 - 16.00',
            'maps_embed' => 'https://maps.google.com/maps?q=Jl.+Letjen+Ibrahim+Adjie+No.178,+Sindangbarang,+Bogor+Barat&t=&z=16&ie=UTF8&iwloc=&output=embed',
        ];

        $sosialMedia = [
            ['nama' => 'Facebook', 'url' => '#', 'icon' => 'facebook'],
            ['nama' => 'Instagram', 'url' => '#', 'icon' => 'instagram'],
            ['nama' => 'YouTube', 'url' => '#', 'icon' => 'youtube'],
            ['nama' => 'TikTok', 'url' => '#', 'icon' => 'tiktok'],
        ];

        return view('kontak', compact('kontak', 'sosialMedia'));
    }
}
