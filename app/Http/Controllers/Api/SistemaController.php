<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SistemaResource;
use App\Models\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  SistemaResource::collection(Sistema::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sistema = Sistema::create(
            [
                ...$request->validate(
                    [
                        'nome' => 'required|string|max:255',
                    ]),
                'ativo' => '1'
            ]);
        return new SistemaResource($sistema);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        return new SistemaResource($sistema);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {
        $sistema->update($request->validate([
            'nome' => 'sometimes|string|max:255',
            'ativo' => 'sometimes|boolean'
        ]));
        return new SistemaResource($sistema);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
