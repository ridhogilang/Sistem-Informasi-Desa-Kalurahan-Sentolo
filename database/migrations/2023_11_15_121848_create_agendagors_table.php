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
        Schema::create('agendagor', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            $table->string('tanggal')->nullable();
            $table->string('waktu');
            $table->string('selesai');
            $table->string('koordinator');
            $table->string('nomorhp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendagor');
    }
};
