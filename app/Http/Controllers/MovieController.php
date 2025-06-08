<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Services\TMDBService;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query()->with('genre');
    
        // Filtro por título
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        // Filtro por gênero
        if ($request->has('genre_id')) {
            $query->where('genre_id', $request->genre_id);
        }
        
        $movies = $query->paginate(10);
        $genres = Genre::all();
        
        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')
                        ->with('success', 'Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        $tmdb = new TMDBService();
        $apiData = $tmdb->getMovieDetails($movie->title, $movie->year);
        
        $movieDetails = $apiData['results'][0] ?? null;
        
        return view('movies.show', [
            'movie' => $movie,
            'tmdb' => $movieDetails
        ]);
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'genre_id' => 'required|exists:genres,id',
        ]);

        $movie->update($validated);

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