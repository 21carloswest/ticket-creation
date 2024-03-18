@extends('layouts.app')
@section('content')

<div class="mx-3 mt-3">
    <div class="d-flex justify-content-between flex-row">
        <h1 class="col-md-6">Editar Cliente</h1>
        <form method="POST" action="{{ route('cliente.destroy', $cliente) }}">
            @csrf
            @method('delete')
            <a :href="route('cliente.destroy', $cliente)" onclick="event.preventDefault(); this.closest('form').submit();">
                <button class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></button>
            </a>
        </form>
    </div>
    <form method=POST action="{{ route('cliente.update', $cliente) }}">
        @csrf
        @method('PATCH')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="sistema_id">Sistema</label>
                    <select for="sistema_id" class="form-control @error('sistema_id') is-invalid @enderror" id="sistema_id" name="sistema_id">
                        @foreach($sistemas as $sistema)
                            <option value="{{$sistema->id}}" {{old('sistema_id', $cliente->sistema_id) == $cliente->sistema_id ? 'selected' : ''}}>{{$sistema->nome_sistema}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="cliente_nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="cliente_nome" name="cliente_nome" value="{{ old('cliente_nome', $cliente->cliente_nome) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control @error('empresa') is-invalid @enderror" id="empresa" name="empresa" value="{{ old('empresa', $cliente->empresa) }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $cliente->email) }}">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="celular">Celular</label>
                    <input type="number" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular', $cliente->celular)}}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="telefone">Telefone</label>
                    <input type="number" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $cliente->link) }}">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="number" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj', $cliente->cnpj) }}">
                </div>
                <div class="col-md-6">
                    <label for="codigo_cliente" class="form-label">Código de cliente</label>
                    <input type="number" class="form-control" id="codigo_cliente" name="codigo_cliente" value="{{ old('codigo_cliente', $cliente->codigo_cliente) }}">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{ old('ativo', $cliente->ativo)== "1" ? 'checked' : '' }}>
                <label class="form-check-label" for="ativo1">
                    Ativo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{ old('ativo', $cliente->ativo)== "0" ? 'checked' : '' }}>
                <label class="form-check-label" for="ativo2">
                    Inativo
                </label>
                @error('ativo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <a href="{{ route("cliente.index") }}"><button type="button" class="btn btn-secondary me-2">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
    </form>
</div>
@endsection
