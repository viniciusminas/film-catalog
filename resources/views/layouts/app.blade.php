<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catálogo de Filmes')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>

    body {
        padding-top: 70px; /* Altura do navbar + margem */
    }

    @media (max-width: 768px) {
        body {
            padding-top: 60px;
        }
    }

        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-custom .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 0.25rem;
            transition: all 0.3s;
        }
        
        .navbar-custom .nav-link:hover {
            background-color: rgba(255,255,255,0.15);
        }
        
        .table-custom thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(108, 92, 231, 0.05);
        }
        
        .badge-genre {
            background-color: var(--secondary-color);
            color: white;
        }
        
        main {
            padding-top: 2rem;
            padding-bottom: 3rem;
        }
    </style>
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