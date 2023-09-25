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
        Schema::create('mengetahui_verifikasi_surats', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_surat');
            $table->string('nomor_surat');
            $table->string('jenis_surat');
            $table->string('id_user');
            $table->string('nama_user');
            $table->string('jabatan_user');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengetahui_verifikasi_surats');
    }
};
