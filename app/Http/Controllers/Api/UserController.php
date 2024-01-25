<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::with('equipe')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create(
            [
                ...$request->validate(
                    [
                        'equipe_id' => 'required|integer',
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:App\Models\User,email',
                        'password' => 'required|string|min:8',
                    ]),
                'ativo' => '1' //ao criar um usuário, ele é automaticamente ativado
            ]);
            $user->load('equipe');
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('equipe');
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
                'equipe_id' => 'sometimes|integer',
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:App\Models\User,email,'.$user->id,
                'password' => 'sometimes|string|min:8',
                'ativo' => 'sometimes|boolean',
            ]));
        $user->load('equipe');
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
