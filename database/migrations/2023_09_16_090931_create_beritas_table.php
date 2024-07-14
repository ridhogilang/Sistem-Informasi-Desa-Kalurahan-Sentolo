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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->string('penulis');
            $table->string('ringkasan')->nullable();
            $table->string('tanggal');
            $table->string('gambar')->nullable();
            $table->foreignId('kategoriberita_id');
            $table->longText('artikel')->nullable();
            $table->string('link')->nullable();
            $table->string('kategori_link')->nullable();
            $table->unsignedInteger('views_count')->default(0);
            $table->boolean('tampil')->default(false);
            $table->boolean('status')->default(false);
            $table->boolean('sideberita')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
