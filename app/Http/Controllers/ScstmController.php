<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScstmRequest;
use App\Http\Requests\UpdateScstmRequest;
use App\Models\Scstm;
use Carbon\Carbon;

class ScstmController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('permission:surat Custom');
        Carbon::setLocale('id');
    }
    public function index()
    {
        $scstm = Scstm::all();
        $bulanSekarang = date('n');
        $angkaRomawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];
        $bulanRomawi = $angkaRomawi[$bulanSekarang];
        $TemplateNoSurat = "000/KMS/{$bulanRomawi}/" . date('Y');

        return view('bo.page.surat.keluar.surat-cstm', [
            'dropdown1' => 'Surat Keluar',
            'dropdown2' => 'Kemasyarakatan',
            'title' => 'Surat Custom',
            'TemplateNoSurat' => $TemplateNoSurat
        ])->with('spn', $scstm);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScstmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Scstm $scstm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scstm $scstm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScstmRequest $request, Scstm $scstm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scstm $scstm)
    {
        //
    }
}
