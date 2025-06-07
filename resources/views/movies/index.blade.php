<!DOCTYPE html>
<html>
<head>
    <title>Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Filmes</h1>

    <a class="btn btn-primary mb-3" href="{{ route('movies.create') }}">Criar Filme</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Gênero</th>
            <th>Sinopse</th>
            <th>Ações</th>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->genre->name }}</td>
            <td>{{ $movie->synopsis }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('movies.show', $movie->id) }}">Ver</a>
                <a class="btn btn-warning btn-sm" href="{{ route('movies.edit', $movie->id) }}">Editar</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
