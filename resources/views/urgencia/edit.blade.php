@extends('layouts.app')
@section('content')

    <div class="mx-3 mt-3">
    <h1>Editar SLA/Urgência</h1>
    <form method=POST action="{{ route('urgencias.update', $urgencia) }}">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="nome_urgencia" class="col-form-label">Urgência:</label>
                <input type="text" class="form-control @error('nome_urgencia') is-invalid @enderror" id="nome_urgencia" name="nome_urgencia" value="{{old('nome_urgencia', $urgencia->nome_urgencia)}}">
                @error('nome_urgencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{($urgencia->ativo == 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo1">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{($urgencia->ativo != 1 ? ' checked' : '')}}>
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
            <a href="{{route("urgencias.index")}}"><button type="button" class="btn btn-secondary">Cancelar</button></a>            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
