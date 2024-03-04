<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('status.index', [
            'status' => Status::paginate(10)
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
        Status::create([
            ...$request->validate([
                'nome_status' => 'required|string',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('status.edit', [
            'Status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        if(!DB::table("tickets")->where("status_id", "$status->id")->first())
        {
            $status->delete();
            return Redirect::back()->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','O status não pode ser deletado pois há tickets vinculados a ele.');
        };

    }
}
