<!DOCTYPE html>
<html>
<head>
    <title>Criar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Criar Filme</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Sinopse:</label>
            <textarea name="synopsis" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Ano:</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gênero:</label>
            <select name="genre_id" class="form-control" required>
                <option value="">Selecione um gênero</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-secondary" href="{{ route('movies.index') }}">Voltar</a>
    </form>
</body>
</html>
