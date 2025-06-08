@extends('layouts.app')

@section('title', 'Editar Gênero')

@section('content')
    <h1>Editar Gênero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $genre->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
