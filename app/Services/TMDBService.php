<?php

namespace App\Services;

use GuzzleHttp\Client;

class TMDBService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.themoviedb.org/3/',
        ]);
        $this->apiKey = config('services.tmdb.key');
    }

    public function getMovieDetails($movieTitle, $year = null)
    {
        $response = $this->client->get('search/movie', [
            'query' => [
                'api_key' => $this->apiKey,
                'query' => $movieTitle,
                'year' => $year,
                'language' => 'pt-BR'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}