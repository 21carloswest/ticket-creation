@extends('layouts.app')

@section('content')
    <form method="POST" class="d-flex flex-row" action="{{ route('ticket.store') }}">
        @csrf
        @method('patch')
        <div class="d-flex flex-column flex-grow-1 table-overflow me-3 px-3 text-light mh-100 min-vw-20 min-vh-100 shadow" style="background-color: #474787">
            <h4 class="mt-2">Nº: {{$ticket->id}}</h4>
            <div class="mb-3">
                <label class="form-label" for="status_id">Status</label>
                <select for="status" class="form-control" id="status" name="status_id">
                    @foreach($status as $stat)
                        <option value="{{$stat->id}}" @if($stat->id == $ticket->status_id) selected @endif>{{$stat->nome_status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="sys">Sistema</label>
                <select for="sys" class="form-control" id="sys" name="sys">
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="SLA">Urgência</label>
                <select for="SLA" class="form-control" id="SLA" name="SLA">
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="category">Categoria</label>
                <select for="category" class="form-control" id="category" name="category">
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="author">Responsável</label>
                <select for="author" class="form-control" id="author"name="author">
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="costumer">Cliente</label>
                <select for="costumer" class="form-control" id="costumer"name="costumer">
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="tag">Tag</label>
                <select for="tag" class="form-control" id="tag" name="tag">
                </select>
            </div>
        </div>

        <div class="d-flex flex-column col-md-10 min-vh-100">
            <div class="mb-3 mt-2">
                <div class="d-flex justify-content-between flex-row"> 
                    <div class="p-2"> 
                        <label class="form-label" for="titulo"><h4>Título</h4></label>
                    </div> 
                    <div class="p-2"> 
                        <p>Criado por: {{$user->name}}, em: {{date('d/m/Y H:i', strtotime($ticket->created_at))}}</p>
                    </div> 
                </div> 
                <input class="form-control shadow-lg rounded" id="titulo" value="{{ $ticket->titulo }}" type = "text" name="titulo">
            </div>

            <div class="mb-3 navbar-nav-scroll" style="scrollbar-width: thin;">
                @foreach($descricaos as $descricao)
                <label class="form-label" for="descricao">Criado por: {{$descricao->name }} em {{date('d/m/Y H:i', strtotime($descricao->created_at))}}</label>
                @if ($descricao->user_id == Auth::id())
                <button type="button" class="btn btn-outline-dark btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i></button>
                @endif
                <textarea class="form-control shadow-sm rounded mb-3" id="descricao"name="descricao" rows="16" disabled
                    >{{ $descricao->descricao }}</textarea>
                @endforeach
            </div>
            <div class="align-self-end">
                <a href="{{ route("ticket.index") }}"><button type="button" class="btn btn-secondary me-2">Voltar</button></a>
                <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#ModalNova"><i class="bi bi-plus-circle"></i></button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="ModalNova" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Nova interação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST action="{{ route('descricao.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="descricao" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="14"></textarea>
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
