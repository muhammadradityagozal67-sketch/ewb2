<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('nama_ortu');
            $table->foreignId('ortu_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('mata_pelajaran');
            $table->integer('nilai_tugas')->nullable();
            $table->integer('nilai_uts')->nullable();
            $table->integer('nilai_uas')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->integer('kkm')->default(75);
            $table->string('semester')->default('1');
            $table->timestamps();
        });

        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('bulan');
            $table->integer('hadir')->default(0);
            $table->integer('sakit')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('alpa')->default(0);
            $table->timestamps();
        });

        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('jenis'); // SPP, Uang Pangkal, dll
            $table->string('bulan')->nullable();
            $table->integer('jumlah');
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->date('jatuh_tempo')->nullable();
            $table->timestamps();
        });

        Schema::create('eskul', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('nama_eskul');
            $table->string('pelatih')->nullable();
            $table->string('hari')->nullable();
            $table->string('nilai')->nullable();
            $table->timestamps();
        });

        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('judul_buku');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->integer('denda')->default(0);
            $table->timestamps();
        });

        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('session_id')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitors');
        Schema::dropIfExists('peminjaman_buku');
        Schema::dropIfExists('eskul');
        Schema::dropIfExists('tagihan');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('siswas');
    }
};
