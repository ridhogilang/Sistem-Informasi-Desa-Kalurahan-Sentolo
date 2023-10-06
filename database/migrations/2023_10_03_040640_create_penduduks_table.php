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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->text('alamat');
            $table->string('kewarganegaraan');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('nomor_telepon');
            $table->string('penghasilan')->nullable();
            $table->string('foto_penduduk')->nullable();
            $table->string('nomor_kk');
            $table->string('nomor_ktp');
            $table->string('status_nyawa');
            $table->string('keterangan_kematian')->nullable();
            $table->string('kontak_darurat');
            $table->string('status_migrasi')->nullable();
            $table->string('status_pajak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
