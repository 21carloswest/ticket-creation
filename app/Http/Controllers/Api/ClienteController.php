<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClienteResource::collection(Cliente::with('sistema')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create(
            [
                ...$request->validate(
                    [
                        'sistema_id' => 'required|integer',
                        'nome' => 'required|string|max:255',
                        'empresa' => 'required|string|max:255',
                        'email' => 'required|email',
                        'telefone' => 'required|integer',
                        'celular' => 'required|integer',
                        'link' => 'required|string|max:255',
                        'cnpj' => 'required|integer',
                        'codigo' => 'required|integer',
                    ]),
                'ativo' => '1' //ao criar um cliente, ele é automaticamente ativado
            ]);
        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
