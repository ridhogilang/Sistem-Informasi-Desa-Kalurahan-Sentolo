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
            $table->string('nik')->index();
            $table->string('nama')->index();
            $table->string('jenis_kelamin')->index();
            $table->string('tempat_lahir')->index();
            $table->string('tanggal_lahir')->index();
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->text('alamat');
            $table->string('kewarganegaraan');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('nomor_telepon');
            $table->string('penghasilan')->nullable();
            $table->string('foto_penduduk')->nullable();
            $table->string('nomor_kk')->index();
            $table->string('nomor_ktp')->index();
            $table->string('status_nyawa');
            $table->string('keterangan_kematian')->nullable();
            $table->string('kontak_darurat');
            $table->string('status_migrasi')->nullable();
            $table->string('status_pajak')->nullable();
            $table->string('is_active');
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
