<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Equipe::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipe = Equipe::create(
            [
                ...$request->validate(
                    [
                        'nome' => 'required|string|max:255',
                        'ativo' => 'required|boolean',

                    ]),
            ]);
        return $equipe;
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        return  $equipe;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe)
    {
        $equipe->update($request->validate(
            [
                'nome' => 'sometimes|string|max:255',
                'ativo' => 'sometimes|boolean',
            ]));
        return $equipe;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();

        return response(status: 204);
    }
}
