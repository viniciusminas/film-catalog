@extends('layouts.app')

@section('title', 'Filmes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="bi bi-film"></i> REVIL Catalog
        </h1>
        <a class="btn btn-primary" href="{{ route('movies.create') }}" target="_blank" rel="noopener noreferrer">
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
        <div class="card-header bg-light">
            <form method="GET" action="{{ route('movies.index') }}" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Buscar por título..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="genre_id" class="form-select">
                        <option value="">Todos os gêneros</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Filtrar
                    </button>
                    @if(request()->has('search') || request()->has('genre_id'))
                        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                            <i class="bi bi-x-circle"></i> Limpar
                        </a>
                    @endif
                </div>
            </form>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
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
                                    <span class="badge bg-primary">
                                        {{ $movie->genre->name ?? 'Sem Gênero' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($movie->synopsis, 70) }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('movies.show', $movie->id) }}" 
                                           class="btn btn-outline-primary" title="Ver detalhes" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('movies.edit', $movie->id) }}" 
                                           class="btn btn-outline-warning" title="Editar" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
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
                                    @if(request()->has('search') || request()->has('genre_id'))
                                        <i class="bi bi-search" style="font-size: 2rem;"></i>
                                        <p class="mt-2 mb-0">Nenhum filme encontrado com esses critérios.</p>
                                        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                            Limpar filtros
                                        </a>
                                    @else
                                        <i class="bi bi-film" style="font-size: 2rem;"></i>
                                        <p class="mt-2 mb-0">Nenhum filme cadastrado ainda.</p>
                                        <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary mt-2">
                                            Adicionar primeiro filme
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($movies->links())
        <div class="mt-3">
            {{ $movies->appends(request()->query())->links() }}
        </div>
    @endif
@endsection