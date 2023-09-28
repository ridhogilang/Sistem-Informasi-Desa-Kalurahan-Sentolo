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
        Schema::create('scstm', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nomor_surat')->unique();
            $table->string('judulsurat')->nullable();
            $table->string('tanggalsurat')->nullable();
            // Penerima surat
            $table->string('penerimasurat')->nullable();
            $table->string('jabatanpenerima')->nullable();
            $table->string('alamatpenerima')->nullable();
            $table->string('kotapenerima')->nullable();
            // Salam Pembuka
            $table->string('salampembuka')->nullable();
            // Isi Surat
            $table->string('paragrafpembuka')->nullable();
            $table->string('paragraf1')->nullable();
            $table->string('paragraf2')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('hari')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('waktu')->nullable();
            $table->string('acara')->nullable();
            // Paragraf Penutup
            $table->string('paragrafpenutup')->nullable();
            $table->string('kalimatpenutup')->nullable();
            $table->string('namattd')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('status_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scstm');
    }
};
