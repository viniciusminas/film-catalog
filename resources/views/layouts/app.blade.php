<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catálogo de Filmes')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <i class="bi bi-camera-reels me-2"></i>
            Catálogo de Filmes
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('movies.*')) active @endif" href="{{ route('movies.index') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-film me-1"></i> Filmes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('genres.*')) active @endif" href="{{ route('genres.index') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-tags me-1"></i> Gêneros
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <main class="container">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>