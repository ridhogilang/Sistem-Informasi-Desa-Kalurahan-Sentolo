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
        Schema::create('spn', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('nama');
            $table->string('deskripsi1');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            // Ayah
            $table->string('namaayah');
            $table->string('nikayah');
            $table->string('tempat_lahirayah');
            $table->string('tanggal_lahirayah');
            $table->string('jenis_kelaminayah');
            $table->string('agamaayah');
            $table->string('pekerjaanayah');
            $table->string('alamatayah');
            // Ibu
            $table->string('namaibu');
            $table->string('nikibu');
            $table->string('tempat_lahiribu');
            $table->string('tanggal_lahiribu');
            $table->string('jenis_kelaminibu');
            $table->string('agamaibu');
            $table->string('pekerjaanibu');
            $table->string('alamatibu');
            $table->string('deskripsi2');
            $table->string('jenis_surat');
            $table->string('status_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spn');
    }
};
