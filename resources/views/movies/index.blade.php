@extends('layouts.app')

@section('title', 'Filmes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="bi bi-film"></i> Catálogo de Filmes
        </h1>
        <a class="btn btn-primary" href="{{ route('movies.create') }}">
            <i class="bi bi-plus-circle"></i> Adicionar Filme
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-custom mb-0">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">ID</th>
                            <th width="25%">Título</th>
                            <th width="10%" class="text-center">Ano</th>
                            <th width="15%">Gênero</th>
                            <th>Sinopse</th>
                            <th width="15%" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movies as $movie)
                            <tr>
                                <td class="text-center">{{ $movie->id }}</td>
                                <td>
                                    <strong>{{ $movie->title }}</strong>
                                </td>
                                <td class="text-center">{{ $movie->year }}</td>
                                <td>
                                    <span class="badge badge-genre">
                                        {{ $movie->genre->name ?? 'Sem Gênero' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($movie->synopsis, 70) }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('movies.show', $movie->id) }}" 
                                           class="btn btn-outline-primary" title="Ver detalhes">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('movies.edit', $movie->id) }}" 
                                           class="btn btn-outline-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este filme?')"
                                                    title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-exclamation-circle" style="font-size: 2rem;"></i>
                                    <p class="mt-2 mb-0">Nenhum filme cadastrado ainda.</p>
                                    <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary mt-2">
                                        Adicionar primeiro filme
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection