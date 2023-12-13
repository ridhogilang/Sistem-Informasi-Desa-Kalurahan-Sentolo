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
        Schema::create('kkematian', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('nama');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('tanggal_meninggal');
            $table->string('waktu');
            $table->string('alamat');
            $table->string('tempat_pemakaman');
            $table->string('jenis_surat');
            $table->string('status_surat');
            $table->string('is_arsip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kkematian');
    }
};
