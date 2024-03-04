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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST action="{{ route('status.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome_status" class="col-form-label">Status:</label>
                            <input type="text" class="form-control @error('nome_status') is-invalid @enderror" id="nome_status" name="nome_status">
                            @error('nome_status')
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
            @foreach ($status as $stat)
                <tr>
                    <td>{{$stat->nome_status}}</td>
                    <td>{{$stat->ativo == 1 ? 'Ativo' : 'Inativo'}}</td>
                    <td>
                        <a href={{route("status.edit", $stat)}}>
                            <button class="btn btn-outline-dark btn-sm"><i class='bi bi-pencil'></i></button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('status.destroy', $stat) }}">
                            @csrf
                            @method('delete')
                            <a :href="route('status.destroy', $stat)" onclick="event.preventDefault(); this.closest('form').submit();">
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $status->links() }}
@endsection
