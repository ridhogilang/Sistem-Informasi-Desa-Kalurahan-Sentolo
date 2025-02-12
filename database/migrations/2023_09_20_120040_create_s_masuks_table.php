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
        Schema::create('s_masuk', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('judul_surat');
            $table->date('tanggal_surat');
            $table->string('kepada_id_user');
            $table->string('kepada_jabatan');
            $table->string('keperluan');
            $table->date('tanggal_kegiatan');
            $table->string('catatan');
            $table->string('lampiran');
            $table->string('dokumen');
            $table->string('status_surat')->nullable();
            $table->string('jenis_surat');
            $table->string('is_arsip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_masuk');
    }
};
