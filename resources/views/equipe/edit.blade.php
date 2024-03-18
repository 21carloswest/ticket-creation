@extends('layouts.app')
@section('content')

    <div class="mx-3 mt-3">
    <h1>Editar Equipe</h1>
    <form method=POST action="{{ route('equipe.update', $equipe) }}">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="nome_equipe" class="col-form-label">Equipe:</label>
                <input type="text" class="form-control @error('nome_equipe') is-invalid @enderror" id="nome_equipe" name="nome_equipe" value="{{old('nome_equipe', $equipe->nome_equipe)}}">
                @error('nome_equipe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{($equipe->ativo == 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo1">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{($equipe->ativo != 1 ? ' checked' : '')}}>
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
            <a href="{{route("equipe.index")}}"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
