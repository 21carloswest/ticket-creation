@extends('layouts.app')
@section('content')

    <div class="mx-3 mt-3">
    <h1>Editar Sistema</h1>
    <form method=POST action="{{ route('sistema.update', $sistema) }}">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="nome_sistema" class="col-form-label">Sistema:</label>
                <input type="text" class="form-control @error('nome_sistema') is-invalid @enderror" id="nome_sistema" name="nome_sistema" value="{{old('nome_sistema', $sistema->nome_sistema)}}">
                @error('nome_sistema')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{($sistema->ativo == 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo1">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{($sistema->ativo != 1 ? ' checked' : '')}}>
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
            <button type="button" class="btn btn-secondary">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
