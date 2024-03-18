@extends('layouts.app')

@section('content')
    <form method="POST" class="d-flex flex-row" action="{{ route('ticket.store') }}">
        @csrf
        <div class="d-flex flex-column flex-grow-1 me-3 px-3 text-light mh-100 min-vw-20 min-vh-100 shadow" style="background-color: #474787">
            <div class="my-3">
                <label class="form-label" for="status_id">Status</label>
                <select for="status" class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                    @foreach($status as $stat)
                        <option value={{$stat->id}} {{ old('status_id') == $stat->id ? 'selected' : '' }}>{{$stat->nome_status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="sistema_id">Sistema</label>
                <select for="sistema_id" class="form-control @error('sistema_id') is-invalid @enderror" id="sistema_id" name="sistema_id">
                    <option></option>
                    @foreach($sistemas as $sistema)
                        <option value={{$sistema->id}} {{ old('sistema_id') == $sistema->id ? 'selected' : ''}}>{{$sistema->nome_sistema}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="urgencia_id">Urgência</label>
                <select for="urgencia_id" class="form-control @error('urgencia_id') is-invalid @enderror" id="urgencia_id" name="urgencia_id">
                    <option></option>
                    @foreach($urgencias as $urgencia)
                        <option value={{$urgencia->id}} {{ old('urgencia_id') == $urgencia->id ? 'selected' : '' }}>{{$urgencia->nome_urgencia}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="responsavel_id">Responsável</label>
                <select for="author" class="form-control @error('responsavel_id') is-invalid @enderror" id="responsavel_id" name="responsavel_id">
                    <option></option>
                    @foreach($responsaveis as $responsavel)
                        <option value={{$responsavel->id}} {{ old('responsavel_id') == $responsavel->id ? 'selected' : '' }}>{{$responsavel->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="cliente_id">Cliente</label>
                <select for="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id">
                    <option></option>
                    @foreach($clientes as $cliente)
                        <option value={{$cliente->id}} {{ old('cliente_id') == $cliente->id ? 'selected' : ''}}>{{$cliente->cliente_nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="tag_id">Tag</label>
                <select for="tag_id" class="form-control @error('tag_id') is-invalid @enderror" id="tag_id" name="tag_id">
                    <option></option>
                    @foreach($tags as $tag)
                        <option value={{$tag->id}} {{ old('tag_id') == $tag->id ? 'selected' : ''}}>{{$tag->nome_tag}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex flex-column mt-1 me-3 col-md-10 min-vh-100">
            <div class="mb-3 mt-2">
                <label class="form-label" for="titulo"><h4>Título</h4></label>
                <input class="form-control @error('titulo') is-invalid @enderror shadow-lg rounded" id="titulo" type = "text" name="titulo" value={{old('titulo')}}>
            </div>

            <div class="mb-3">
                <label class="form-label" for="descricao"><h5>Descrição</h5></label>
                <textarea class="form-control shadow-lg rounded"
                    id="descricao"
                    name="descricao"
                    rows="16">{{old('descricao')}}</textarea>
            </div>
            <div class="align-self-end">
                <a href="{{ url()->previous() }}"><button type="button"class="btn btn-primary me-2">Voltar</button></a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
@endsection
