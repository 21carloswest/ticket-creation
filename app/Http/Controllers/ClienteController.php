<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cliente.index', [
            'clientes' => Cliente::with('sistema')->
                paginate(
                    $perPage = 20, $columns = ['id', 'empresa', 'email', 'celular', 'sistema_id']
                ),
            'sistemas' => DB::table('sistemas')->select('id', 'nome_sistema')->where('ativo', '1')->get()
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
        $Cliente = Cliente::create([
            ...$request->validate([
                'sistema_id' => 'required|integer',
                'cliente_nome' => 'nullable|string|max:255',
                'empresa' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'telefone' => 'required|string|max:10',
                'celular' => 'required|string|max:11',
                'link' => 'nullable|string|max:255',
                'cnpj' => 'nullable|string|max:14',
                'codigo_cliente' => 'nullable|string|max:10',
            ]),
            'ativo' => '1',
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', [
            'cliente' => $cliente,
            'sistemas' => DB::table('sistemas')->select('id', 'nome_sistema')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update([
            ...$request->validate([
                'sistema_id' => 'required|integer',
                'cliente_nome' => 'nullable|string|max:255',
                'empresa' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'telefone' => 'required|string|max:10',
                'celular' => 'required|string|max:11',
                'link' => 'nullable|string|max:255',
                'cnpj' => 'nullable|string|max:14',
                'codigo_cliente' => 'nullable|string|max:10',
                'ativo' => 'required|boolean',
            ]),
        ]);

        return redirect()->route('cliente.index')->with('message','Edição concluída com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if(!DB::table("tickets")->where("cliente_id", "$cliente->id")->first())
        {
            $cliente->delete();
            return redirect()->route('cliente.index')->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return redirect()->route('cliente.index')->with('message','O cliente não pode ser deletado pois há tickets vinculados a ele.');
        };
    }
}
