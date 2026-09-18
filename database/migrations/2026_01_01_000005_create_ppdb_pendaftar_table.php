<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique();
            $table->string('jalur'); // Prestasi, Reguler, Afirmasi
            $table->string('jurusan_pilihan_1');
            $table->string('jurusan_pilihan_2')->nullable();
            $table->string('nama_lengkap');
            $table->string('nisn', 10);
            $table->string('nik', 16)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->text('alamat_tinggal');
            $table->string('asal_smp');
            $table->string('tahun_lulus')->default('2026');
            $table->string('nama_ortu_wali');
            $table->string('pekerjaan_ortu')->nullable();
            $table->string('no_hp_ortu')->nullable();
            $table->string('no_hp_siswa');
            $table->decimal('nilai_rata_rata', 5, 2)->default(0);
            $table->enum('status', ['menunggu', 'terverifikasi', 'diterima', 'ditolak'])->default('menunggu');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_pendaftar');
    }
};
