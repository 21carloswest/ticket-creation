<?php

namespace App\Http\Controllers;

use App\Models\Urgencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UrgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('urgencia.index', [
            'urgencias' => Urgencia::paginate(10)
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
        Urgencia::create([
            ...$request->validate([
                'nome_urgencia' => 'required|string',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Urgencia $urgencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Urgencia $urgencia)
    {
        return view('urgencia.edit', [
            'urgencia' => $urgencia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Urgencia $urgencia)
    {
        $urgencia->update([
            ...$request->validate([
                'nome_urgencia' => 'required|string',
                'ativo' => 'sometimes|boolean'
            ])
        ]);

        return Redirect::route('urgencias.index')->with('message','Edição concluída com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Urgencia $urgencia)
    {
        if(!DB::table("tickets")->where("urgencia_id", "$urgencia->id")->first())
        {
            $urgencia->delete();
            return Redirect::back()->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','A SLA não pode ser deletada pois há tickets vinculados a ela.');
        };
    }
}
