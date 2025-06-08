@extends('layouts.app')

@section('title', 'Gêneros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="bi bi-tags"></i> Gêneros
        </h1>
        <a class="btn btn-primary" href="{{ route('genres.create') }}">
            <i class="bi bi-plus-circle"></i> Criar Gênero
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
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="8%">ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th width="25%" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td>
                                    <strong>{{ $genre->name }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $genre->description ?? 'Sem descrição' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('genres.show', $genre->id) }}" 
                                           class="btn btn-outline-primary" title="Ver detalhes">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('genres.edit', $genre->id) }}" 
                                           class="btn btn-outline-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este gênero?')"
                                                    title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="bi bi-exclamation-circle" style="font-size: 2rem;"></i>
                                    <p class="mt-2 mb-0">Nenhum gênero cadastrado ainda.</p>
                                    <a href="{{ route('genres.create') }}" class="btn btn-sm btn-primary mt-2">
                                        Criar primeiro gênero
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