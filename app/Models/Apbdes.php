<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;
    protected $table = 'apbdes';
    protected $fillable = [
        //Terpakai
        'tahun',
        //APBDes Pelaksanaan
        'pendapatan_desa',
        'belanja_desa',
        'pembiayaan_desa',
        //APBDes Pendapatan
        'hasil_usaha',
        'hasilaset_desa',
        'dana_desa',
        'bagihasil_pajak',
        'alokasidana_desa',
        'koreksi_kesalahan',
        'bunga_bank',
        //APBDes Pembelanjaan
        'bdng_pp_desa',
        'bdng_p_p_desa',
        'bdng_p_k_desa',
        'bdng_pm_desa',
        'bdng_pbdm_desa',
        //Anggaran
        //APBDes Pelaksanaan
        'pendapatan_desa2',
        'belanja_desa2',
        'pembiayaan_desa2',
         //APBDes Pendapatan
         'hasil_usaha2',
         'hasilaset_desa2',
         'dana_desa2',
         'bagihasil_pajak2',
         'alokasidana_desa2',
         'koreksi_kesalahan2',
         'bunga_bank',
        //APBDes 2019 Pembelanjaan
        'bdng_pp_desa2',
        'bdng_p_p_desa2',
        'bdng_p_k_desa2',
        'bdng_pm_desa2',
        'bdng_pbdm_desa2',
    ];
}
