<?php

namespace App\Exports;

use App\Models\Present;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Fromview;

class UsersPresentExport implements Fromview
{
    private $tanggal;

    public function __construct($tanggal) {
        $this->tanggal = $tanggal;
    }
    
    public function view(): view
    {
        $presents = Present::whereTanggal($this->tanggal)->orderBy('jam_masuk')->get();
        return view('bo.page.absen.excel_rekapbulanan', compact('presents'));
    }

}
