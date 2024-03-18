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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST action="{{ route('user.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="equipe_id">Equipe</label>
                                <select for="equipe_id" class="form-control" id="equipe_id" name="equipe_id">
                                    @foreach($equipes as $equipe)
                                        <option value="{{$equipe->id}}">{{$equipe->nome_equipe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
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
                <th>Ativo(a)</th>
                <th>Equipe</th>
                <th>E-mail</th>
                <th>Editar</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->ativo == 1 ? 'Ativo(a)' : 'Inativo(a)'}}</td>
                    <td>{{$usuario?->equipe?->nome_equipe}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        <a href={{route("user.edit", $usuario)}}>
                            <button class="btn btn-outline-dark btn-sm"><i class='bi bi-pencil'></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
@endsection
