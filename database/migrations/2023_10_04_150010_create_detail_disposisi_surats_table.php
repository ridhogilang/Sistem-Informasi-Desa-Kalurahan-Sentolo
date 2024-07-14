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
        Schema::create('detail_disposisi_surats', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_surat');
            $table->string('id_user');
            $table->string('jabatan_user');
            $table->string('diterima_dari_disposisi'); //jika sama dengan id surat maka disposisi pertama
            $table->string('tgl_diterima_dari_disposisi');
            $table->string('dilanjutkan_ke_disposisi')->nullable();
            $table->string('tgl_dilanjutkan_ke_disposisi')->nullable();
            $table->string('jenis_disposisi');
            //1 menunggu, 2 dilanjutkan, 3 dikembalikan, 4 dilaksanakan, 5 gagal/terlamat 
            $table->string('status_disposisi');
            //Pertama atau penerima dari PU (nanti bisa menjadi pelaksana juga atau mengoper untuk di disposisikan serta menolak), TRS(hanya menolak melaksanakan dan mungkin jika terlambat hanya bisa mengisi alasan keterlambatan adeh kok tambah akeh yo), PLK(pelaksana nanti juga bisa menolak tetapi ini akan masuk dalam menu acara walaupun ini akan rada ribet hmmm ntahlah iyolah ngono sikik) 

            //koyone pode si
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_disposisi_surats');
    }
};
