<?php

namespace App\Services;

use App\Contracts\DetailInterface;
use Illuminate\Support\Facades\Http;

class DetailService implements DetailInterface
{
    public function getMovieDetail(int $movieId): array
    {
        return Http::get(
            "https://api.themoviedb.org/3/movie/$movieId"
        )->json();
    }

    public function getAnimeDetail(int $animeId): array
    {
        return Http::get(
            "https://api.jikan.moe/v4/anime/$animeId"
        )->json();
    }
}