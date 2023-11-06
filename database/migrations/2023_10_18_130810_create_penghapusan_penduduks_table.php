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
        Schema::create('penghapusan_penduduk', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_penduduk');
            $table->string('delete_by');
            $table->text('catatan');
            $table->string('dokumen');
            $table->text('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghapusan_penduduk');
    }
};
