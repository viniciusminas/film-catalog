@extends('layouts.app')

@section('title', 'Detalhes do Filme')

@section('content')
    <h1>Detalhes do Filme</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $movie->id }}</li>
        <li class="list-group-item"><strong>Título:</strong> {{ $movie->title }}</li>
        <li class="list-group-item"><strong>Ano:</strong> {{ $movie->year }}</li>
        <li class="list-group-item"><strong>Gênero:</strong> {{ $movie->genre->name }}</li>
        <li class="list-group-item"><strong>Sinopse:</strong> {{ $movie->synopsis }}</li>
    </ul>

    <a href="{{ route('movies.index') }}" class="btn btn-primary">Voltar</a>
@endsection
