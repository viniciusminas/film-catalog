@extends('layouts.app')

@section('title', 'Detalhes do Filme')

@section('content')
    <h1>Detalhes do Filme</h1>

    <div class="row">
    <div class="col-md-4">
        @if($tmdb && $tmdb['poster_path'])
            <img src="https://image.tmdb.org/t/p/w500/{{ $tmdb['poster_path'] }}" 
                 class="img-fluid rounded shadow" 
                 alt="{{ $movie->title }}">
        @else
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                 style="height: 300px; width: 100%;">
                <i class="bi bi-film" style="font-size: 3rem;"></i>
            </div>
        @endif
    </div>
    <div class="col-md-8">
        <h2>{{ $movie->title }} <small class="text-muted">{{ $movie->year }}</small></h2>
        
        @if($tmdb && $tmdb['vote_average'])
            <div class="mb-3">
                <span class="badge bg-warning text-dark">
                    <i class="bi bi-star-fill"></i> {{ $tmdb['vote_average'] }}/10
                </span>
                <span class="text-muted ms-2">{{ $tmdb['vote_count'] }} avaliações</span>
            </div>
        @endif

        <div class="mb-4">
            <h4>Sinopse</h4>
            <p>{{ $tmdb['overview'] ?? $movie->synopsis }}</p>
        </div>

        <!-- Outros detalhes do filme -->
    </div>
</div>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $movie->id }}</li>
        <li class="list-group-item"><strong>Título:</strong> {{ $movie->title }}</li>
        <li class="list-group-item"><strong>Ano:</strong> {{ $movie->year }}</li>
        <li class="list-group-item"><strong>Gênero:</strong> {{ $movie->genre->name }}</li>
    </ul>

    <a href="{{ route('movies.index') }}" class="btn btn-primary">Voltar</a>
@endsection
