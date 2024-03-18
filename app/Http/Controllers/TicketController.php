<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Notifications\AtualizaçãoTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index', [
            'tickets' => Ticket::with('user', 'status')
                ->latest()
                ->paginate(
                    $perPage = 20, $columns = ['id', 'titulo', 'user_id', 'status_id', 'created_at']
                )
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create', [
            'status' => DB::table('statuses')->select('id', 'nome_status')->where('ativo', '1')->get(),
            'sistemas' => DB::table('sistemas')->select('id', 'nome_sistema')->where('ativo', '1')->get(),
            'urgencias' => DB::table('urgencias')->select('id', 'nome_urgencia')->where('ativo', '1')->get(),
            'responsaveis' => DB::table('users')->select('id', 'name')->where('ativo', '1')->get(),
            'clientes' => DB::table('clientes')->select('id', 'cliente_nome')->where('ativo', '1')->get(),
            'tags' => DB::table('tags')->select('id', 'nome_tag')->where('ativo', '1')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            ...$request->validate([
                'titulo' => 'required|string',
                'status_id' => 'required|integer',
                'sistema_id' => 'required|integer',
                'urgencia_id' => 'required|integer',
                'responsavel_id' => 'required|integer',
                'cliente_id' => 'required|integer',
                'tag_id' => 'nullable|integer',
            ]),
            'user_id' => $request->user()->id,
        ])->descricao()->create([
            ...$request->validate([
                'descricao' => 'nullable|string',
            ]),
            'user_id' => $request->user()->id,
        ]);
        User::find(Auth::user()->id)->notify(new AtualizaçãoTicket($ticket->id));

        return redirect("ticket/$ticket->ticket_id/edit");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {     
        return view('tickets.edit', [
            'ticket' => $ticket,
            'user' => DB::table('users')->select('id', 'name')->where('id', $ticket->user_id)->first(),
            'descricaos' => DB::select(
                'SELECT descricaos.id, descricaos.descricao, descricaos.created_at, users.id as user_id, users.`name`
                 FROM descricaos
                 INNER JOIN users
                 ON descricaos.user_id = users.id
                 WHERE descricaos.ticket_id ='.$ticket->id.
                 ' ORDER BY descricaos.created_at DESC'),
            'status' => DB::table('statuses')->select('id', 'nome_status')->where('ativo', '1')->get(),
            'sistemas' => DB::table('sistemas')->select('id', 'nome_sistema')->where('ativo', '1')->get(),
            'urgencias' => DB::table('urgencias')->select('id', 'nome_urgencia')->where('ativo', '1')->get(),
            'responsaveis' => DB::table('users')->select('id', 'name')->where('ativo', '1')->get(),
            'clientes' => DB::table('clientes')->select('id', 'cliente_nome')->where('ativo', '1')->get(),
            'tags' => DB::table('tags')->select('id', 'nome_tag')->where('ativo', '1')->get(),
            //'users' => 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
