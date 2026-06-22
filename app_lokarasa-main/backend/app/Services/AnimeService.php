<?php

namespace App\Services;

use App\Contracts\AnimeInterface;
use Illuminate\Support\Facades\Http;

class AnimeService implements AnimeInterface
{
    public function searchByTitle(string $title): array
    {
        return Http::get(
            "https://api.jikan.moe/v4/anime?q=$title"
        )->json();
    }

    public function searchByGenre(string $genre): array
    {
        return Http::get(
            "https://api.jikan.moe/v4/anime?genres=$genre"
        )->json();
    }

    public function getDetail(int $animeId): array
    {
        return Http::get(
            "https://api.jikan.moe/v4/anime/$animeId"
        )->json();
    }
}