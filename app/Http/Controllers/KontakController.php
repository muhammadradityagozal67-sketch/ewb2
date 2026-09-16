<?php

namespace App\Http\Controllers;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = [
            'alamat' => 'Jl. Raya Dramaga, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680',
            'telepon' => '(0251) 8765432',
            'email' => 'info@smkinfokom.sch.id',
            'jam_operasional' => 'Senin - Jumat: 07.00 - 16.00',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1000!2d106.7!3d-6.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1',
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
