# Website Profil Sekolah - SMK INFOKOM Kota Bogor (Laravel)

Website profil sekolah tanpa sistem login, dibuat dengan Laravel + Blade + Tailwind CSS (via CDN).

## Halaman yang tersedia
- `/` — Beranda (hero, info terbaru, tentang kami, berita terbaru, galeri)
- `/profil` dan `/profil/{section}` — Profil Sekolah (Sejarah, Visi Misi, Sambutan, Struktur, Fasilitas)
- `/berita` — Daftar berita
- `/berita/{slug}` — Detail berita
- `/galeri` — Galeri kegiatan
- `/ppdb` — Info Penerimaan Peserta Didik Baru
- `/kontak` — Kontak & lokasi (Google Maps embed)

Tidak ada halaman login/admin sama sekali — semua konten murni tampilan publik.

## Cara Instalasi (di komputer Anda yang sudah ada PHP & Composer)

Karena file ini hanya berisi kode aplikasi (bukan seluruh skeleton framework Laravel), langkah instalasinya:

1. **Buat project Laravel baru** (butuh koneksi internet & Composer terpasang):
   ```bash
   composer create-project laravel/laravel smk-website
   cd smk-website
   ```

2. **Salin folder dari paket ini** ke dalam project Laravel yang baru dibuat, timpa file yang sudah ada:
   - `app/Http/Controllers/*.php` → `smk-website/app/Http/Controllers/`
   - `app/Models/*.php` → `smk-website/app/Models/`
   - `database/migrations/*.php` → `smk-website/database/migrations/`
   - `database/seeders/*.php` → `smk-website/database/seeders/`
   - `resources/views/*` (seluruh isi folder ini) → `smk-website/resources/views/` (timpa `layouts` bawaan jika ada)
   - `routes/web.php` → `smk-website/routes/web.php` (timpa file bawaan)
   - `public/css/style.css` → `smk-website/public/css/style.css`

3. **Konfigurasi database** di file `.env` (contoh menggunakan SQLite paling simpel):
   ```env
   DB_CONNECTION=sqlite
   ```
   Lalu buat file kosong `database/database.sqlite`.

   Atau gunakan MySQL seperti biasa dengan mengisi `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` di `.env`.

4. **Jalankan migration & seeder** (mengisi data contoh berita & galeri):
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server lokal:**
   ```bash
   php artisan serve
   ```
   Buka `http://127.0.0.1:8000` di browser.

## Catatan
- Gambar pada berita/galeri masih berupa placeholder abu-abu (kotak "Gambar"/"Foto") karena tidak ada file gambar asli yang disertakan. Anda bisa:
  1. Menaruh file gambar di `public/images/`, lalu
  2. Mengganti kotak placeholder di file Blade (`resources/views/home.blade.php`, `berita/*.blade.php`, `galeri.blade.php`) dengan tag `<img src="{{ asset('images/'.$berita->gambar) }}">`.
- Peta lokasi di halaman Kontak memakai Google Maps embed dummy — ganti nilai `maps_embed` di `app/Http/Controllers/KontakController.php` dengan link embed lokasi sekolah Anda yang sebenarnya.
- Desain memakai Tailwind CSS via CDN supaya tidak perlu proses build (`npm run build`). Jika ingin memakai Tailwind versi build (lebih optimal untuk produksi), install via NPM sesuai dokumentasi Laravel + Tailwind resmi.
- Tidak ada sistem login/admin sesuai permintaan — semua konten (berita, galeri) diisi lewat database seeder. Jika nanti ingin mengelola konten secara dinamis, tambahkan panel admin terpisah (di luar cakupan permintaan ini).
