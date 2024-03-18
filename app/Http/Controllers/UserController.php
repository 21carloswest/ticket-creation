<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuario.index', [
            'usuarios' => User::with('equipe')->
                paginate(
                    $perPage = 10, $columns = ['id', 'name', 'email', 'equipe_id', 'ativo']
                ),
            'equipes' => DB::table('equipes')->select('id', 'nome_equipe')->where('ativo', '1')->get()
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
        $user = User::create([
            ...$request->validate([
                'equipe_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('usuario.edit', [
            'usuario' => $user,
            'equipes' => DB::table('equipes')->select('id', 'nome_equipe')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            ...$request->validate([
                'equipe_id' => 'sometimes|integer',
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|max:255',
                'password' => 'sometimes|string|min:6',
                'ativo' => 'sometimes|boolean',
            ]),
        ]);

        return redirect()->route('user.index')->with('message','Edição concluída com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->name == 'master' || $user->id == '1')
        {
            return Redirect::back()->with('message','O usuário master não pode ser excluído.');
        } elseif(!DB::table("tickets")->where("responsavel_id", "$user->user_id")->first())
        {
            $user->delete();
            return Redirect::route('user.index')->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','O(a) usuário(a) não pode ser deletado pois há tickets vinculados a ele(a).');
        };
    }
}
