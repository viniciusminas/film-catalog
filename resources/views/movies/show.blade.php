<!DOCTYPE html>
<html>
<head>
    <title>Ver Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Detalhes do Filme</h1>

    <p><strong>Título:</strong> {{ $movie->title }}</p>
    <p><strong>Sinopse:</strong> {{ $movie->synopsis }}</p>
    <p><strong>Ano:</strong> {{ $movie->year }}</p>
    <p><strong>Gênero:</strong> {{ $movie->genre->name }}</p>

    <a class="btn btn-secondary" href="{{ route('movies.index') }}">Voltar</a>
</body>
</html>
