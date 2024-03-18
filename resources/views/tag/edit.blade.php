@extends('layouts.app')
@section('content')

    <div class="mx-3 mt-3">
    <h1>Editar Tag</h1>
    <form method=POST action="{{ route('tag.update', $tag) }}">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="nome_tag" class="col-form-label">Tag:</label>
                <input type="text" class="form-control @error('nome_tag') is-invalid @enderror" id="nome_tag" name="nome_tag" value="{{old('nome_tag', $tag->nome_tag)}}">
                @error('nome_tag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{($tag->ativo == 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo1">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{($tag->ativo != 1 ? ' checked' : '')}}>
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
            <a href="{{route("tag.index")}}"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
