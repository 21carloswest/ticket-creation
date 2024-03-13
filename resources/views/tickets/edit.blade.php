@extends('layouts.app')

@section('content')
    <form method="POST" class="d-flex flex-row" action="{{ route('ticket.store') }}">
        @csrf
        @method('patch')
        <div class="d-flex flex-column flex-grow-1 table-overflow me-3 px-3 text-light mh-100 min-vw-20 shadow" style="background-color: #474787">
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

        <div class="d-flex flex-column col-md-10">
        <h2 class="">Novo ticket</h2>
            <div class="mb-3">
                <label class="form-label" for="titulo">Título</label>
                <input class="form-control shadow-lg rounded" id="titulo" value="{{ $ticket->titulo }}" type = "text" name="titulo">
            </div>

            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição</label>
                <textarea class="form-control shadow-lg rounded" id="descricao"name="descricao" rows="16"
                    >{{ $descricao->descricao }}</textarea>
            </div>
            <div class="align-self-end">
                <button type="button"class="btn btn-primary me-2" onclick="window.location='index.php'">Voltar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
@endsection
