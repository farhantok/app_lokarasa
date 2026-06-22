<?php

namespace App\Contracts;

interface DetailInterface
{
    public function getMovieDetail(int $movieId): array;

    public function getAnimeDetail(int $animeId): array;
}