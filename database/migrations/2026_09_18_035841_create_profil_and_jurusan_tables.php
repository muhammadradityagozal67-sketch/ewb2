<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->text('sejarah')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('sambutan')->nullable();
            $table->string('foto_kepsek')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->text('struktur')->nullable();
            $table->string('foto_struktur')->nullable();
            $table->text('fasilitas')->nullable();
            $table->text('jurusan_teks')->nullable();
            $table->timestamps();
        });

        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
        Schema::dropIfExists('profil');
    }
};
