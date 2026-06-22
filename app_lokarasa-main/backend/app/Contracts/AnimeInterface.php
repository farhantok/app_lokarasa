<?php

namespace App\Contracts;

interface AnimeInterface
{
    public function searchByTitle(string $title): array;

    public function searchByGenre(string $genre): array;

    public function getDetail(int $animeId): array;
}