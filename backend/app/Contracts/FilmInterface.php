<?php

namespace App\Contracts;

interface FilmInterface
{
    public function searchByTitle(string $title): array;

    public function searchByGenre(int $genreId): array;

    public function getDetail(int $movieId): array;
}