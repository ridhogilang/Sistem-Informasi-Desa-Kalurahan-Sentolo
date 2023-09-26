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
        Schema::create('arsip_surats', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_surat');
            $table->string('nomor_surat');
            $table->string('jenis_surat');
            $table->string('jenis_surat_2');
            $table->string('surat_penghapusan')->nullable();
            $table->string('is_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_surats');
    }
};
