@extends('layouts.app')
@section('content')

    <div class="mx-3 mt-3">
        <div class="d-flex justify-content-between flex-row">
            <h1 class="col-md-6">Editar Usuário</h1>
            <form method="POST" action="{{ route('user.destroy', $usuario) }}">
                @csrf
                @method('delete')
                <a :href="route('user.destroy', $usuario)" onclick="event.preventDefault(); this.closest('form').submit();">
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                </a>
            </form>
        </div>
    <form method=POST action="{{ route('user.update', $usuario) }}">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="equipe_id">Equipe</label>
                <select for="equipe_id" class="form-control @error('equipe_id') is-invalid @enderror" id="equipe_id" name="equipe_id">
                    @foreach($equipes as $equipe)
                        <option value="{{$equipe->id}}" {{old('equipe_id', $usuario->equipe_id) == $usuario->equipe_id ? 'selected' : ''}}>{{$equipe->nome_equipe}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $usuario->name) }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $usuario->email) }}">
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-start flex-row">
                    <label for="password" class="form-label pe-3">Senha</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" onclick="habilitar('password');">
                        
                    </div>
                    
                </div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" disabled id="password" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mt-3">
            <a href="{{route("user.index")}}"><button type="button" class="btn btn-secondary">Cancelar</button></a>            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
    <script>
        function habilitar(x){
            document.getElementById(x).disabled = false;
        }
</script>
</div>
@endsection
