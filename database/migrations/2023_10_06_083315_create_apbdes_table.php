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
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->nullable();
            /**Terpakai */
            $table->string('pendapatan_desa')->nullable();
            $table->string('belanja_desa')->nullable();
            $table->string('pembiayaan_desa')->nullable();
            //
            $table->string('hasil_usaha')->nullable();
            $table->string('hasilaset_desa')->nullable();
            $table->string('dana_desa')->nullable();
            $table->string('bagihasil_pajak')->nullable();
            $table->string('alokasidana_desa')->nullable();
            $table->string('koreksi_kesalahan')->nullable();
            $table->string('bunga_bank')->nullable();
            //
            $table->string('bdng_pp_desa')->nullable();
            $table->string('bdng_p_p_desa')->nullable();
            $table->string('bdng_p_k_desa')->nullable();
            $table->string('bdng_pm_desa')->nullable();
            $table->string('bdng_pbdm_desa')->nullable();
            /**Anggran */
            $table->string('pendapatan_desa2')->nullable();
            $table->string('belanja_desa2')->nullable();
            $table->string('pembiayaan_desa2')->nullable();
           //
           $table->string('hasil_usaha2')->nullable();
           $table->string('hasilaset_desa2')->nullable();
           $table->string('dana_desa2')->nullable();
           $table->string('bagihasil_pajak2')->nullable();
           $table->string('alokasidana_desa2')->nullable();
           $table->string('koreksi_kesalahan2')->nullable();
           $table->string('bunga_bank2')->nullable();
           //
           $table->string('bdng_pp_desa2')->nullable();
           $table->string('bdng_p_p_desa2')->nullable();
           $table->string('bdng_p_k_desa2')->nullable();
           $table->string('bdng_pm_desa2')->nullable();
           $table->string('bdng_pbdm_desa2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
