<?php

namespace App\Http\Controllers\bo\Sid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgendaGOR;


class AgendaGORController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendagor = AgendaGOR::all();
        return view('bo.page.sid.agenda_gor', [
            "title" => "Bagan",
            "dropdown1" => "Komponen Website",
            "agendagor" => $agendagor,
           
        ]);
    }

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
