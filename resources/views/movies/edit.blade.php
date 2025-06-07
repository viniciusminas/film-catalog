<!DOCTYPE html>
<html>
<head>
    <title>Editar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Editar Filme</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
        </div>

        <div class="mb-3">
            <label>Sinopse:</label>
            <textarea name="synopsis" class="form-control">{{ $movie->synopsis}}</textarea>
        </div>

        <div class="mb-3">
            <label>Ano:</label>
            <input type="number" name="year" class="form-control" value="{{ $movie->year }}" required>
        </div>

        <div class="mb-3">
            <label>Gênero:</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a class="btn btn-secondary" href="{{ route('movies.index') }}">Voltar</a>
    </form>
</body>
</html>
