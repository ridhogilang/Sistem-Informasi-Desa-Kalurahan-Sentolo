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
        Schema::create('pektp', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('deskripsi');
            $table->string('jenis_pektp');
            $table->string('status_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pektp');
    }
};