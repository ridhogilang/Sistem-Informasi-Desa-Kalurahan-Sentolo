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
        Schema::create('buatsurat', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nik');
            $table->string('nama');
            $table->string('tanggal_blanko');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('foto_akta_lahir')->nullable();
            $table->string('foto_surat_keterangan_dokter')->nullable();
            $table->string('jenis_surat');
            $table->string('status_blanko');
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buatsurat');
    }
};
