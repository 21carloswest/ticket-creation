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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST action="{{ route('cliente.store') }}">
                    @csrf
                    <div class="modal-body">
                    
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label" for="sistema_id">Sistema</label>
                                <select for="sistema_id" class="form-control" id="sistema_id" name="sistema_id">
                                    @foreach($sistemas as $sistema)
                                        <option value="{{$sistema->id}}">{{$sistema->nome_sistema}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="cliente_nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="cliente_nome" name="cliente_nome">
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="empresa" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="empresa" name="empresa">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="celular">Celular</label>
                                <input type="number" class="form-control" id="celular" name="celular">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="telefone">Telefone</label>
                                <input type="number" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="company" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cnpj" class="form-label">CNPJ</label>
                                <input type="number" class="form-control" id="cnpj" name="cnpj">
                            </div>

                            <div class="col-md-6">
                                <label for="codigo_cliente" class="form-label">Código de cliente</label>
                                <input type="number" class="form-control" id="codigo_cliente" name="codigo_cliente">
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
                <th>Empresa</th>
                <th>Sistema</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Editar</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->empresa}}</td>
                    <td>{{$cliente->sistema->nome_sistema}}</td>
                    <td>{{$cliente->celular}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>
                        <a href="{{route('cliente.edit', $cliente->id)}}">
                            <button class="btn btn-outline-dark btn-sm"><i class='bi bi-pencil'></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
@endsection
