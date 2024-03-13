@extends('layouts.app')
@section('content')

    <div class="d-flex flex-row">
        <div>
            @if ((Session::has('message')))
                <div class="alert alert-info mt-2 ms-2">
                {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="ms-auto mt-2 me-2">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <i class="bi bi-plus-circle"></i>
            </button>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Sistema</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST action="{{ route('sistema.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome_sistema" class="col-form-label">Sistema:</label>
                            <input type="text" class="form-control @error('nome_sistema') is-invalid @enderror" id="nome_sistema" name="nome_sistema">
                            @error('nome_sistema')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

    <table class="table table-striped table-hover bg-light mt-3">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Ativo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($sistemas as $sistema)
                <tr>
                    <td>{{$sistema->nome_sistema}}</td>
                    <td>{{$sistema->ativo == 1 ? 'Ativo' : 'Inativo'}}</td>
                    <td>
                        <a href={{route("sistema.edit", $sistema)}}>
                            <button class="btn btn-outline-dark btn-sm"><i class='bi bi-pencil'></i></button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('sistema.destroy', $sistema) }}">
                            @csrf
                            @method('delete')
                            <a :href="route('sistema.destroy', $sistema)" onclick="event.preventDefault(); this.closest('form').submit();">
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sistemas->links() }}
@endsection
