@extends('layouts.app')

@section('title', 'Editar Filme')

@section('content')
    <h1>Editar Filme</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Ano</label>
            <input type="number" name="year" class="form-control" value="{{ $movie->year }}" required>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Gênero</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopse</label>
            <textarea name="synopsis" class="form-control" rows="3" required>{{ $movie->synopsis }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
