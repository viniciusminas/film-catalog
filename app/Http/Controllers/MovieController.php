<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'synopsis' => 'nullable|string',
            'year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')
                         ->with('success', 'Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'synopsis' => 'nullable',
            'year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')
                         ->with('success', 'Filme atualizado com sucesso.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
                         ->with('success', 'Filme excluído com sucesso.');
    }
}
