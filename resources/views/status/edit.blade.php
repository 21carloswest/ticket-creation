@extends('layouts.app')
@section('content')

    <h1>Editar Status</h1>
    <form method=POST action="{{ route('status.update', $status) }}">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="nome_status" class="col-form-label">Status:</label>
                <input type="text" class="form-control @error('nome_status') is-invalid @enderror" id="nome_status" name="nome_status" value={{old('nome_status', $status->nome_status)}}>
                @error('nome_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="ativo" value="1" id="ativo1" {{($status->ativo == 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo1">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('ativo') is-invalid @enderror" type="radio" name="ativo" value= "0" id="ativo2" {{($status->ativo != 1 ? ' checked' : '')}}>
                <label class="form-check-label" for="ativo2">
                  Inativo
                </label>
                @error('ativo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
        <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endsection
