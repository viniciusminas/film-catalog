@extends('layouts.app')

@section('title', 'Criar Filme')

@section('content')
    <h1>Criar Filme</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Ano</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Gênero</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopse</label>
            <textarea name="synopsis" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
