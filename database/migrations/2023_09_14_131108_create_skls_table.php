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
        Schema::create('skl', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('nama'); //bayi
            $table->string('status_hubungan');
            $table->string('kalurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('anak_ke');
            $table->string('agama');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('tempat_lahir_ayah');
            $table->string('tanggal_lahir_ayah');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('tempat_lahir_ibu');
            $table->string('tanggal_lahir_ibu');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_ibu');
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
        Schema::dropIfExists('skl');
    }
};
