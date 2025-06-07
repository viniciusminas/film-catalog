<!DOCTYPE html>
<html>
<head>
    <title>Editar Gênero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Editar Gênero</h1>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
        </div>

        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="description" class="form-control">{{ $genre->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a class="btn btn-secondary" href="{{ route('genres.index') }}">Voltar</a>
    </form>
</body>
</html>
