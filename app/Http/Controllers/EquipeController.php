<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('equipe.index', [
            'equipes' => Equipe::paginate(10)
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
        Equipe::create([
            ...$request->validate([
                'nome_equipe' => 'required|string',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        return view('equipe.edit', [
            'equipe' => $equipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe)
    {
        $equipe->update([
            ...$request->validate([
                'nome_equipe' => 'required|string',
                'ativo' => 'sometimes|boolean'
            ])
        ]);

        return Redirect::route('equipe.index')->with('message','Edição concluída com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        if(!DB::table("users")->where("equipe_id", "$equipe->id")->first())
        {
            $equipe->delete();
            return Redirect::back()->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','A equipe não pode ser deletada pois há usuários vinculados a ela.');
        };
    }
}
