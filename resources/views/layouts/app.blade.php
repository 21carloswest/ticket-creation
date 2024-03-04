<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        table { table-layout: fixed; }
        table th, table td { overflow: hidden; }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Dashboard
                        </a>
                        <a class="navbar-brand" href="{{ route('ticket.create') }}">
                            Novo
                        </a>
                        <a class="navbar-brand" href="{{ route('ticket.index') }}">
                            Tickets
                        </a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="navbar-brand nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Cadastros
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('categoria.index') }}">
                                    Categoria
                                </a>
                                <a class="dropdown-item" href="{{ route('cliente.index') }}">
                                    Cliente
                                </a>
                                <a class="dropdown-item" href="{{ route('equipe.index') }}">
                                    Equipe
                                </a>
                                <a class="dropdown-item" href="{{ route('sistema.index') }}">
                                    Sistema
                                </a>
                                <a class="dropdown-item" href="{{ route('status.index') }}">
                                   Status
                                </a>
                                <a class="dropdown-item" href="{{ route('tag.index') }}">
                                    Tag
                                </a>
                                <a class="dropdown-item" href="{{ route('urgencia.index') }}">
                                    Urgência
                                </a>
                                <a class="dropdown-item" href="{{ route('usuario.index') }}">
                                    Usuário
                                </a>
                            </div>
                        </li>
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-bell-fill"></i>
                                <span class="badge badge-light bg-success badge-xs">{{auth()->user()->unreadNotifications->count()}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                        @if (auth()->user()->unreadNotifications)
                                        <li class="d-flex justify-content-end mx-1 my-2">
                                            <a href="{{route('mark-as-read')}}" class="btn btn-success btn-sm">Mark All as Read</a>
                                        </li>
                                        @endif
                        
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                        <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['data']}}</li></a>
                                        @endforeach
                                        @foreach (auth()->user()->readNotifications as $notification)
                                        <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['data']}}</li></a>
                                        @endforeach
                            </ul>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>