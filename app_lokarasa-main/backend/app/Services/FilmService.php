<?php

namespace App\Services;

use App\Contracts\FilmInterface;
use Illuminate\Support\Facades\Http;

class FilmService implements FilmInterface
{
    public function searchByTitle(string $title): array
    {
        return Http::get('https://api.themoviedb.org/3/search/movie', [
            'query' => $title
        ])->json();
    }

    public function searchByGenre(int $genreId): array
    {
        return Http::get('https://api.themoviedb.org/3/discover/movie', [
            'with_genres' => $genreId
        ])->json();
    }

    public function getDetail(int $movieId): array
    {
        return Http::get(
            "https://api.themoviedb.org/3/movie/$movieId"
        )->json();
    }
}