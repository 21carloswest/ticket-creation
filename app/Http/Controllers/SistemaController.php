<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sistema.index', [
            'sistemas' => Sistema::paginate(10)
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
        Sistema::create([
            ...$request->validate([
                'nome_sistema' => 'required|string',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        return view('sistema.edit', [
            'sistema' => $sistema
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        if(!DB::table("tickets")->where("sistema_id", "$sistema->id")->first())
        {
            $sistema->delete();
            return Redirect::back()->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','O sistema não pode ser deletado pois há ticket(s) vinculados a ele.');
        };
    }
}
