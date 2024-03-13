@extends('layouts.app')
@section('content')
    <table class="table bg-light mt-3">

        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Responsável</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tickets as $ticket)
                    <tr style='cursor: pointer;' onclick=window.location.href="{{route('ticket.edit', $ticket)}}">
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->titulo}}</td>
                        <td>{{$ticket?->status?->nome_status}}</td>
                        <td>{{$ticket->status_id}}</td>
                    </tr>
                </a>
            @endforeach

        </tbody>
    </table>
    {{ $tickets->links() }} 
@endsection