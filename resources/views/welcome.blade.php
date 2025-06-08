@extends('layouts.app')

@section('title', 'Bem-vindo ao Catálogo de Filmes')

@section('content')
    <div class="text-center">
        <h1 class="display-4">Bem-vindo ao Catálogo de Filmes</h1>
        <p class="lead">Gerencie filmes e gêneros de forma simples e rápida.</p>
        <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg mt-3">Ver Filmes</a>
    </div>
@endsection
