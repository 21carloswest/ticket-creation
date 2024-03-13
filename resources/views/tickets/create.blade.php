@extends('layouts.app')

@section('content')
    <form method="POST" class="d-flex flex-row" action="{{ route('ticket.store') }}">
        @csrf
        <div class="d-flex flex-column flex-grow-1 table-overflow me-3 px-3 text-light mh-100 min-vw-20 shadow" style="background-color: #474787">
            <div class="mb-3">
                <label class="form-label" for="status_id">Status</label>
                <select for="status" class="form-control @error('status_id') is-invalid @enderror" id="status" name="status_id">
                    @foreach($status as $stat)
                        <option value={{$stat->id}}>{{$stat->nome_status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="sistema_id">Sistema</label>
                <select for="sistema_id" class="form-control @error('sistema_id') is-invalid @enderror" id="sistema_id" name="sistema_id">
                    @foreach($sistemas as $sistema)
                        <option value={{$sistema->id}}>{{$sistema->nome_sistema}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="urgencia_id">Urgência</label>
                <select for="urgencia_id" class="form-control" id="urgencia_id" name="urgencia_id">
                    @foreach($sistemas as $urgencia)
                        <option value={{$urgencia->id}}>{{$urgencia->urgencia_sistema}}</option>
                    @endforeach
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
                <input class="form-control @error('titulo') is-invalid @enderror shadow-lg rounded" id="titulo" type = "text" name="titulo" value={{old('titulo')}}>
            </div>

            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição</label>
                <textarea class="form-control shadow-lg rounded" 
                    id="descricao" 
                    name="descricao" 
                    rows="16">{{old('descricao')}}</textarea>
            </div>
            <div class="align-self-end">
                <button type="button"class="btn btn-primary me-2" onclick="window.location='index.php'">Voltar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
@endsection
