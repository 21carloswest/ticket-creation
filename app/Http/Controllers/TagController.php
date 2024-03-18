<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tag.index', [
            'tags' => Tag::paginate(10)
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
        Tag::create([
            ...$request->validate([
                'nome_tag' => 'required|string',
            ]),
            'ativo' => '1'
        ]);

        return Redirect::back()->with('message','Cadastro concluído com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            ...$request->validate([
                'nome_tag' => 'required|string',
                'ativo' => 'sometimes|boolean'
            ])
        ]);

        return Redirect::route('tag.index')->with('message','Edição concluída com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if(!DB::table("tickets")->where("status_id", "$tag->id")->first())
        {
            $tag->delete();
            return Redirect::back()->with('message','Exclusão concluída com sucesso.');
        } else
        {
            return Redirect::back()->with('message','A tag não pode ser deletada pois há tickets vinculados a ele.');
        };
    }
}
