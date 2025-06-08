@extends('layouts.app')

@section('title', 'Visualizar Gênero')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="bi bi-tag-fill"></i> Detalhes do Gênero
        </h1>
        <div>
            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title text-primary">
                    <i class="bi bi-card-heading"></i> Nome
                </h5>
                <p class="card-text fs-5">{{ $genre->name }}</p>
            </div>

            <div class="mb-4">
                <h5 class="card-title text-primary">
                    <i class="bi bi-text-paragraph"></i> Descrição
                </h5>
                <p class="card-text">{{ $genre->description ?? 'Nenhuma descrição fornecida' }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('genres.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar para lista
                </a>
                
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Tem certeza que deseja excluir este gênero?')">
                        <i class="bi bi-trash"></i> Excluir Gênero
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection