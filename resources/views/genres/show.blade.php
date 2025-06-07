<!DOCTYPE html>
<html>
<head>
    <title>Ver Gênero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Detalhes do Gênero</h1>

    <p><strong>Nome:</strong> {{ $genre->name }}</p>
    <p><strong>Descrição:</strong> {{ $genre->description }}</p>

    <a class="btn btn-secondary" href="{{ route('genres.index') }}">Voltar</a>
</body>
</html>
