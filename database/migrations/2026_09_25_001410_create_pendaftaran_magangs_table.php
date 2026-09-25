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
        Schema::create('pendaftaran_magang', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique();
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->string('asal_jurusan');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->enum('status', ['Menunggu', 'Diproses', 'Diterima', 'Ditolak'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magangs');
    }
};
