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
        Schema::create('disposisi_surats', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_surat');
            $table->string('nomor_surat');
            $table->string('keperluan_surat');
            $table->string('tanggal_kegiatan');
            $table->string('id_user');
            $table->string('jabatan_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_surats');
    }
};