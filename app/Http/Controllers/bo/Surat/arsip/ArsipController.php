<?php

namespace App\Http\Controllers\bo\Surat\arsip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model arsip
use App\Models\ArsipSurat;
//model surat keluar
//model surat masuk
use App\Models\SMasuk;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arsip = ArsipSurat::get();
        $badge_status = [
            '0' => '<span class="badge bg-info"> blanko </span>', 
            '1' => '<span class="badge bg-secondary"> menunggu verifikasi </span>', 
            '2' => '<span class="badge bg-success"> terverifikasi </span>', 
            '3' => '<span class="badge bg-danger"> verifikasi ditolak </span>', 
            '4' => '<span class="badge bg-primary"> arsip </span>', 
        ];

        return view('bo.page.surat.arsip.arsip',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Arsip Desa',
            'badge_status' => $badge_status,
            'arsip_surat' => $arsip
        ]);
        //
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
        //
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
