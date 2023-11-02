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
        Schema::create('skpenghasilan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('nama');
            $table->string('nik');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('kewarganegaraan');
            $table->string('alamat');
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
        Schema::dropIfExists('skpenghasilan');
    }
};
