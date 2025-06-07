<!DOCTYPE html>
<html>
<head>
    <title>Gêneros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Gêneros</h1>

    <a class="btn btn-primary mb-3" href="{{ route('genres.create') }}">Criar Gênero</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
            <td>{{ $genre->description }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('genres.show', $genre->id) }}">Ver</a>
                <a class="btn btn-warning btn-sm" href="{{ route('genres.edit', $genre->id) }}">Editar</a>
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
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
