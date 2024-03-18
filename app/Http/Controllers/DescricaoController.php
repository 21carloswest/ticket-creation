<?php

namespace App\Http\Controllers;

use App\Models\Descricao;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DescricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Descricao::create([
            ...$request->validate([
                'descricao' => 'required|string',
                'ticket_id' => 'required|integer',
            ]),
            'user_id' => $request->user()->id,
        ]);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Descricao $descricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Descricao $descricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Descricao $descricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Descricao $descricao)
    {
        //
    }
}
