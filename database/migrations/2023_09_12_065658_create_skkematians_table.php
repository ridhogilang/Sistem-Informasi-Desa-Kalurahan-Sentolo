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
            $table->string('kewarganegaraan');
            $table->string('status_perkawinan');
            $table->string('deskripsi');
            $table->string('jenis_kkematian');
            $table->string('status_surat');
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