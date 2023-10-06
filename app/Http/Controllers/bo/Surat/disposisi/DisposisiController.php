<?php

namespace App\Http\Controllers\bo\Surat\disposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model
use App\Models\User;
use App\Models\DisposisiSurat;
use App\Models\DetailDisposisiSurat;
use App\Models\ArsipSurat;
use App\Models\SMasuk;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = DisposisiSurat::all();

        return view('bo.page.surat.disposisi.index',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Disposisi Surat Masuk',
            // 'badge_status' => $badge_status,
            'surat' => $surat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //kone mrene
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
