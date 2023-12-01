<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendudukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Penduduk::all();
    // }
    public function collection()
    {
        return Penduduk::where('is_active', 1)->get();
    }
}
